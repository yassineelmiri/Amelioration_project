<style>
    img {
        max-width: 80px;
        max-height: 80px;
        border-radius: 50%;
        border: 2px solid #ccc;
    }

    td, th {
        width: 6%;
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

        <?php include('teacher_header.php'); ?>

        <table class="table table-responsive table-lg table-md table-sm table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Numéro d'élève</th>
                    <th>Image</th>
                    <th>Classe</th>
                    <th>Prénom</th>
                    <th>Nom de famille</th>
                    <th>Numéro de téléphone</th>
                    <th>Matière 1</th>
                    <th>Matière 2</th>
                    <th>Matière 3</th>
                    <th>Matière 4</th>
                    <th>Pourcentage</th>
                    <th>Résultat</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM records ";

            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {

                $id = $row['id'];
                $id_school = $row['id_school'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $phone = $row['phone'];
                $first_grading = $row['first_grading'];
                $second_grading = $row['second_grading'];
                $third_grading = $row['third_grading'];
                $fourth_grading = $row['fourth_grading'];
                $final_grade = ($first_grading + $second_grading + $third_grading + $fourth_grading) / 4;
                if ($final_grade >= 75) {
                    $remarks = "Réussi";
                } else {
                    $remarks = "Échoué";
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
                    <td><?php echo "$first_grading"; ?></td>
                    <td><?php echo "$second_grading"; ?></td>
                    <td><?php echo "$third_grading"; ?></td>
                    <td><?php echo "$fourth_grading"; ?></td>
                    <td style="background-color: #6fca5f;"><?php echo "$final_grade"; ?></td>
                    <td style="background-color: #ccc;"><?php echo "$remarks"; ?></td>
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
