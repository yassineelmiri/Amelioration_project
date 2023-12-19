<style>
img {
    max-width: 80px;
    max-height: 80px;
    border-radius: 50%;
    border: 2px solid #ccc;
}
tr, td, th {
    width: 8%;
    text-align: center;
}
</style>

<?php
require_once './conn/conn.php';
include_once "header.php";

session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
    header('location: index.php');
}
?>
<body>
    <center>

        <?php include('teacher_header.php');?>

        <table class="table table-responsive table-lg table-md 
        table-sm table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Numéro d'élève</th>
                    <th>Image</th>
                    <th>Classe</th>
                    <th>Prénom</th>
                    <th>Nom de famille</th>
                    <th>Numéro de portable</th>
                    <th>Matière 1</th>
                    <th>Matière 2</th>
                    <th>Matière 3</th>
                    <th>Matière 4</th>
                    <th>Proportion</th>
                    <th>Résultat</th>
                    <th>Ajouter les notes</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM info_student WHERE teacher_number = '".$_SESSION["id"]."' ";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {
                $id = $row['id'];
                $id_school = $row['id_school'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $phone = $row['phone'];
                $first_mark = $row['first_mark'];
                $second_mark = $row['second_mark'];
                $third_mark = $row['third_mark'];
                $fourth_mark = $row['fourth_mark'];
                $final_mark = ($first_mark + $second_mark + $third_mark + $fourth_mark) / 4;

                if (($final_mark >= 90) && ($final_mark <= 100)) {
                    $remarks = "Excellent";
                } elseif (($final_mark >= 70) && ($final_mark <= 80)) {
                    $remarks = "Très bien";
                } elseif (($final_mark >= 60) && ($final_mark <= 70)) {
                    $remarks = "Bien";
                } elseif (($final_mark >= 50) && ($final_mark <= 60)) {
                    $remarks = "Acceptable";
                } else {
                    $remarks = "Échec";
                }
                $picture = $row['picture'];
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo "$id_school"; ?></td>
                    <td><img src="images/<?php echo "$picture"; ?>"></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo "$firstname"; ?></td>
                    <td><?php echo "$lastname"; ?></td>
                    <td><?php echo "$phone"; ?></td>
                    <td><?php echo "$first_mark"; ?></td>
                    <td><?php echo "$second_mark"; ?></td>
                    <td><?php echo "$third_mark"; ?></td>
                    <td><?php echo "$fourth_mark"; ?></td>
                    <td style="background-color: #6fca5f;"><?php echo "$final_mark"; ?></td>
                    <td style="background-color: #ccc;"><?php echo "$remarks"; ?></td>
                    <td>
                        <a class="btn btn-outline-info btn-md" href="st_add.php?id=<?php echo $row['id']; ?>" role="button">Ajouter les notes</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-warning btn-lg" href="st_edit.php?id=<?php echo $row['id']; ?>" role="button">Modifier</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger btn-lg" href="st_delete.php?id=<?php echo $row['id']; ?>" role="button">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </center>
</body>
</html>
