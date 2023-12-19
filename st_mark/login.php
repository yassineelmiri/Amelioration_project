<style>
   img {
      width: 20%;
      height: 20%;
   }
</style>

<?php
require_once './conn/conn.php';
include_once "header.php";
session_start();
$type = $_GET['usertype'];

$sql = "SELECT * FROM admin_accounts where usertype = '" . $type . "'";

$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($query)) {
   $image = $row['picture'];
}

if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $query1 = "SELECT * FROM admin_accounts where username='$username' 
    and password = '$password' and usertype = '$type'";

   $result = mysqli_query($conn, $query1);
   $row = mysqli_fetch_array($result);

   if (is_array($row)) {
      $_SESSION["id"] = $row['id'];
      if ($type == "ADMIN") {
         header('location: mang_accounts.php');
      } elseif ($type == "te") {
         header('location:st_view.php');
      }
   } else {
      echo "<script>alert('Nom d'utilisateur ou mot de passe incorrect')</script>";
   }
}
?>

<div class="container">
   <div class="mb-6 g-3 row justify-content-center">
      <div class="col-lg-8">
         <br>
         <center>
            <strong style="text-align:center">FORMULAIRE DE CONNEXION</strong>

            <div class="container">
               <form role="form" action="" method="post">
                  <strong>(
                     <?php echo $type; ?>)
                  </strong>
                  <br>
                  <?php
                  if ($type == "ADMIN") {
                     ?>
                     <img src="images/<?php echo $image; ?>" alt="User Image">
                  <?php } ?>

                  <div class="form-group">
                     <label for="Title" class="col-sm-2 control-label">Nom d'utilisateur</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur"
                           required>
                     </div>
                  </div>

                  <div class="form-group col-lg-12 col-sm-8">
                     <label for="Author" class="col-sm-2 control-label">Mot de passe</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                     </div>
                  </div>

                  <br>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button name="login" class="btn btn-info col-lg-12" data-toggle="modal">
                           Connexion
                        </button>
                     </div>
                  </div>
                  <br>
               </form>

               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <a href="index.php">
                        <button name="login" class="btn btn-warning col-lg-12" data-toggle="modal">
                           Retour
                        </button>
                     </a>
                  </div>
               </div>
            </div>
         </center>
      </div>
   </div>
</div>