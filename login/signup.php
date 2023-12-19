<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Luxe</title>
    <link rel="stylesheet" href="styleHome.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
</head>
<body>
    <br><br><br>
    <main class="signup-form">
        <form class="" action="includes/signup.inc.php" method="post">
            <div class="form-signup">
                <h1 class="form-title">Sign Up</h1>
                <input type="number" name="idAgences" class="form-input" placeholder="Numero agences"
                value="<?php echo isset($_GET['idAgences']) ? $_GET['idAgences'] : ''; ?>">

                <input type="text" name="uid" class="form-input" placeholder="Your Name"
                    value="<?php echo isset($_GET['uid']) ? $_GET['uid'] : ''; ?>">
                <input type="text" name="email" class="form-input" placeholder="Email"
                    value="<?php echo isset($_GET['email']) ? $_GET['email'] : "" ?>">
                <input type="password" name="password" class="form-input" placeholder="Password">
                <input type="password" name="password-repeat" class="form-input" placeholder="Repeat Password">
                <button type="submit" name="signup-submit" class="form-button">Next Up</button>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class="error">fill the inputs</p>';
                    } elseif ($_GET['error'] == "invalidemailUid") {
                        echo '<p class="error">email and username not valid</p>';
                    } elseif ($_GET['error'] == "invalidemail") {
                        echo '<p class="error">email not valid</p>';
                    } elseif ($_GET['error'] == "invaliduid") {
                        echo '<p class="error"> username not valid</p>';
                    } elseif ($_GET['error'] == "passwordcheck") {
                        echo '<p class="error">Passwords do not match</p>';
                    }
                } elseif (isset($_GET['signup']) == "success") {
                    echo '<p class="success">Sign up Successfully</p>';
                }
                ?>
            </div>
        </form>
    </main>
    <script>
        //menu responsive code JS
        var menu_toggle = document.querySelector('.menu_toggle');
        var menu = document.querySelector('.menu');
        var menu_toggle_span = document.querySelector('.menu_toggle span');
        menu_toggle.onclick = function () {
            menu_toggle.classList.toggle('active');
            menu_toggle_span.classList.toggle('active');
            menu.classList.toggle('responsive');
        }
    </script>
</body>

</html>