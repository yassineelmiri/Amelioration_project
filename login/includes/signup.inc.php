<?php
if (isset($_POST["signup-submit"])) {
    require "../connect.php";

    $name = trim($_POST["uid"]);
    $idAgences = trim($_POST["idAgences"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $repeatedPassword = $_POST["password-repeat"];

    if (empty($name) || empty($email) || empty($password) || empty($repeatedPassword) || empty($idAgences)) {
        header("Location: ../signup.php?error=emptyfields&uid=" . $name . "&email=" . $email . "&idAgences=" . $idAgences);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: ../signup.php?error=invalidemailUid&idAgences=" . $idAgences);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail&uid=" . $name . "&idAgences=" . $idAgences);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: ../signup.php?error=invaliduid&email=" . $email . "&idAgences=" . $idAgences);
        exit();
    } else if ($password !== $repeatedPassword) {
        header("Location: ../signup.php?error=passwordcheck&uid=" . $name . "&email=" . $email . "&idAgences=" . $idAgences);
        exit();
    } else {
        $sql = "SELECT id FROM agences WHERE id = ?";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror&idAgences=" . $idAgences);
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $idAgences);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resCheck = mysqli_stmt_num_rows($stmt);

            if ($resCheck <= 0) {
                header("Location: ../signup.php?error=invalidAgence&idAgences=" . $idAgences);
                exit();
            } else {
                // Existing code for inserting user data into the database
                $sql = "INSERT INTO users (userid, useremail, passwordUser, idAgences) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpdw = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $hashedpdw, $idAgences);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
} else {
    header("Location: ../signup.php?");
    exit();
}
