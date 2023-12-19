<?php
require_once './conn/conn.php';
include_once "header.php";
session_start();
?>

<div id="right_side"><br><br>
    <div id="demo">
        <!-- #Code de recherche d'étudiant---Début-->
        <?php

        ?>
        <center>
            <form action="" method="post">&nbsp;&nbsp;
                <b>Entrez le numéro de compter</b>&nbsp;&nbsp;
                <input type="text" placeholder="RIB" name="roll_no">
                <button class="w-20 btn btn-lg btn-primary" name="search_by_roll_no_for_search" type="submit">Rechercher
                </button>
            </form>
            <br><br>
            <h4><b><u>Bienvenue de CIH-BANK</u></b></h4><br><br>
        </center>
        <?php


        if (isset($_POST['search_by_roll_no_for_search'])) {
            $query = "select * from  info_student where id_school= '$_POST[roll_no]'";
            $query_run = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                <table class="table table-responsive table-lg table-md table-sm  table-hover   table-bordered">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>RIB</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>transaction 1</th>
                            <th>transaction 2</th>
                            <th>transaction 3</th>
                            <th>transaction 4</th>
                            <th>TOTAL</th>
                            <th>telecharger</th>
                        </tr>
                    </thead>
                    <?php
                    $id = $row['id'];
                    $id_school = $row['id_school'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $phone = $row['phone'];
                    $first_mark = $row['first_mark'];
                    $second_mark = $row['second_mark'];
                    $third_mark = $row['third_mark'];
                    $fourth_mark = $row['fourth_mark'];
                    $final_mark = ($first_mark + $second_mark + $third_mark + $fourth_mark);

                    if (($final_mark >= 90) && ($final_mark <= 100)) {
                        $remarks = "Excellent";
                    } elseif (($final_mark >= 70) && ($final_mark <= 80)) {
                        $remarks = "Très bien";
                    } elseif (($final_mark >= 60) && ($final_mark <= 70)) {
                        $remarks = "Bien";
                    } elseif (($final_mark >= 50) && ($final_mark <= 60)) {
                        $remarks = "Satisfaisant";
                    } else {
                        $remarks = "Redoublant";
                    }
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo "$id_school"; ?>
                        </td>
                        <td>
                            <?php echo "$firstname"; ?>
                        </td>
                        <td>
                            <?php echo "$lastname"; ?>
                        </td>
                        <td>
                            <?php echo "$first_mark"; ?>
                        </td>
                        <td>
                            <?php echo "$second_mark"; ?>
                        </td>
                        <td>
                            <?php echo "$third_mark"; ?>
                        </td>
                        <td>
                            <?php echo "$fourth_mark"; ?>
                        </td>
                        <td style="background-color: #6fca5f;">
                            <?php echo "$final_mark"; ?>Dhs
                        </td>
                        <td>

                            <a class="btn btn-outline-success btn-lg" href="print_pdf.php?id=<?php echo $row['id']; ?>"
                                role="button">PDF et imprimer</a>

                        </td>

                    </tr>
                </table>
                <?php
            }
        }
        ?>
        <a href="index.php">
            <button class="w-20 btn btn-lg btn-primary" name="search_by_roll_no_for_search"
                type="submit">Sortie</button>
        </a>
    </div>
</div>
</body>

</html>