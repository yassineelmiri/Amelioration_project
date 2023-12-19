<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Page de Connexion</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <?php
  require_once './conn/conn.php';

  if (isset($_POST['username'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
      $_SESSION['username'] = $username;

      header("Location: st_marks.php");
    } else {
      echo
        "<div class='form alert alert-info'>
                  <h3>Le nom d'utilisateur ou le mot de passe est incorrect</h3><br/>
                  <p class='link'>Cliquez ici <a href='st_login.php'>pour réessayer</a> </p>
                  </div>";
    }
  } else {
    ?>
    <main class="form-signin">
      <form class="form" method="post" name="login">
        <img class="mb-4" src="logo/student.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

        <div class="form-floating">
          <input type="text" class="form-control" name="username" placeholder="Entrez le nom d'utilisateur">
          <label for="floatingInput" required>Entrez le nom d'utilisateur</label>
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword"
            placeholder="Entrez le mot de passe">
          <label for="floatingPassword" required>Entrez le mot de passe</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Connectez-vous maintenant</button>

        <p class="link">Vous n'avez pas de compte? <a href="registration.php">Inscrivez-vous ici</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2022.2023</p>
      </form>

    </main>

    <?php
  }
  ?>
</body>

</html>
