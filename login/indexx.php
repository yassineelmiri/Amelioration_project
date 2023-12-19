<main>
    <?php 
        if(isset($_SESSION["userid"])){
            echo "<p>you are logged in!</p>";
        }else{
            echo "<p>you are logged out!</p>";

        }
    ?>

</main>
<?php
require "administration.php";
?>