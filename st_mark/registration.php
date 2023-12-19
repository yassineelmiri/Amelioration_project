<!DOCTYPE html>
<html dir="rtl">

<head>
  <meta charset="utf-8" />
  <title>Nouveau Compte</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/login.css" />

</head>

<body>
  <?php
  require('conn/conn.php');

  if (isset($_POST['username'])) {
    // Supprimez les barres obliques inverses
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);

    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $create_datetime = date("Y-m-d H:i:s");

    $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {

      echo '<div class="alert alert-danger" style="width:100%;height:100% ;
			text-align: center;">Cet e-mail est déjà utilisé.
            <p class="link">Cliquez ici <a href="registration.php">ici</a> pour vous réinscrire </p>
            
            </div>';

    } else {

      $query = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
      $result = mysqli_query($conn, $query);
      if ($result) {
        echo "<div class='form alert alert-info'>
                  <h3 class='text-cnter'>Inscription réussie</h3><br/>
                  <p class='link text-cnter'>Cliquez ici <a href='st_login.php'>Connectez-vous maintenant</a></p>
                  </div>
                            <script>
                  setTimeout(function(){window.location.href='st_login.php';},4000)
                           </script>
                  ";
      } else {
        echo "<div class='form alert alert-info'>
                  <h3>Les champs ne sont pas valides</h3><br/>
                  <p class='link'>Cliquez ici <a href='registration.php'></a>pour vous réinscrire </p>
                  </div>";
      }
    }
  } else {
    ?>
    <main class="form-signin">
      <form class="form" method="post" action="">
        <img class="mb-4" src="logo/student.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Nouveau Membre</h1>

        <div class="form-floating">
          <input type="text" class="form-control" name="username" placeholder="Entrez votre nom" required>
          <label for="floatingInput">Entrez votre nom</label>
        </div>

        <div class="form-floating">
          <input type="email" autofocus="autofocus" name="email" id="login1" class="form-control" id="floatingPassword"
            placeholder="Entrez l'e-mail" required>
          <label>Entrez l'e-mail</label>
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword"
            placeholder="Entrez le mot de passe" required>
          <label for="floatingPassword" required>Entrez le mot de passe</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Inscrivez-vous maintenant</button>

        <p class="link">Vous avez déjà un compte? <a href="st_login.php">Connectez-vous maintenant</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2022.2023</p>
      </form>
    </main>

    <?php
  }
  ?>
</body>

</html>