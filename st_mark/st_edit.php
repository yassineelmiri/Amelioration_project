<?php
require_once './conn/conn.php';
include_once "header.php";
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
   header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM  info_student WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
   $upfirstname = $row['firstname'];
   $uplastname = $row['lastname'];
   $upfirst = $row['first_mark'];
   $upsecond = $row['second_mark'];
   $upthird = $row['third_mark'];
   $upfourth = $row['fourth_mark'];
}

if (empty($_POST['firstname'])) {
   echo "";
} else {

   $upfirstname = $_POST['firstname'];
   $uplastname = $_POST['lastname'];
   $upfirst = $_POST['first'];
   $upsecond = $_POST['second'];
   $upthird = $_POST['third'];
   $upfourth = $_POST['fourth'];

   $query = "UPDATE  info_student SET firstname='$upfirstname',lastname='$uplastname',first_mark='$upfirst',second_mark='$upsecond',third_mark='$upthird',fourth_mark='$upfourth' where id='" . $id . "'";
   if (mysqli_query($conn, $query)) {
      echo "<script>alert('Mise à jour réussie')</script>";
      echo '<script>windows: location="st_view.php"</script>';
   } else {
      echo "<script>alert('Une erreur s'est produite')</script>";
      echo '<script>windows: location="st_add.php?id=' . $id . '"</script>';
   }
}
?>

<body>
   <center>

      <?php include('teacher_header.php'); ?>
      <div class="container">
         <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
               <label for="Title" class="col-sm-2 control-label">Prénom</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="firstname" placeholder="Prénom"
                     value="<?php echo $upfirstname; ?>" required>
               </div>
            </div>

            <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">Nom de famille</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="lastname" placeholder="Nom de famille"
                     value="<?php echo $uplastname; ?>" required>
               </div>
            </div>

            <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">Matière 1</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="first" placeholder="Matière 1"
                     value="<?php echo $upfirst; ?>" required>
               </div>
            </div>

            <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">Matière 2</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="second" placeholder="Matière 2"
                     value="<?php echo $upsecond; ?>" required>
               </div>
            </div>

            <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">Matière 3</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="third" placeholder="Matière 3"
                     value="<?php echo $upthird; ?>" required>
               </div>
            </div>

            <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">Matière 4</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="fourth" placeholder="Matière 4"
                     value="<?php echo $upfourth; ?>" required>
               </div>
            </div>

            <br>
            <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                  <button name="update" class="btn btn-info col-lg-12" data-toggle="modal">
                     Modifier
                  </button>
               </div>
            </div>
            <br>

         </form>

      </div>

   </center>
</body>

</html>