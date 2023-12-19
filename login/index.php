<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Luxe </title>
    <link rel="stylesheet" href="styleHome.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- header  -->
    <header>
        <!-- menu responsive -->

        <div class="menu_toggle">
            <span></span>
        </div>

        <ul class="menu">
            <li><a href="#home">Acceuil</a></li>
            <li><a href="#cars">Vehicules</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>


        <div class="form">
            <?php
            include("connect.php");
            if (isset($_SESSION["userid"])) {
                echo '<form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
            </form>';
            } else {
                echo '   <form action="includes/login.inc.php" method="post">
                <input type="text" name="userId" placeholder="Username/Email ...">
                <input type="password" name="password" placeholder="Enter your password">
                <button type="submit" name="login-submit">Login</button>
            </form>
            ';
            }
            ?>


        </div>
    </header>
    <!-- section Acceuil -->

    <section id="home">
        <div class="left">
            <h1>HI <span>CIH BANK</span> Cheaper From MAROC</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit doloremque earum, totam laudantium dolor
                voluptatum fugiat. Odio doloribus nostrum harum corporis. Natus omnis deleniti reiciendis illum maxime
                necessitatibus accusantium esse.</p>
            <a href="bank/bank.php">sing up</a>
        </div>
        <div class="right">
            <img src="image/10293713_752465881521289_8183950733319840116_o.jpg">
        </div>
    </section>




    <!-- section vehicule -->

    <section id="cars">
        <h1 class="section_title">Nos vehicules</h1>
        <div class="images">
            <ul>
                <li class="car">
                    <div>
                        <img src="image/images (2).jpeg" alt="">
                    </div>
                    <span>CART PUP</span>
                    <span class="prix">30$/ans</span>
                    <a href="#">ACHETER MAINTENANT</a>
                </li>
                <li class="car">
                    <div>
                        <img src="image/gold_0.png" alt="">
                    </div>
                    <span>CART GOLD</span>
                    <span class="prix">1000$/ans</span>
                    <a href="#">ACHETER MAINTENANT</a>
                </li>
                <li class="car">
                    <div>
                        <img src="image/images (3).jpeg" alt="">
                    </div>
                    <span>CART DIAMOND</span>
                    <span class="prix">300.000$/ans</span>
                    <a href="#">ACHETER MAINTENANT</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- section services -->

    <section id="services">
        <h1 class="section_title">Nos Services</h1>
        <div class="list_services">
            <div class="service">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <h3>Dépannage</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis illum natus iste, dicta maiores
                    ipsam.</p>
                <a href="#" class="read_more">Lire Plus</a>
            </div>
            <div class="service">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <h3>Dépannage</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis illum natus iste, dicta maiores
                    ipsam.</p>
                <a href="#" class="read_more">Lire Plus</a>
            </div>
            <div class="service">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <h3>Dépannage</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis illum natus iste, dicta maiores
                    ipsam.</p>
                <a href="#" class="read_more">Lire Plus</a>
            </div>
        </div>
    </section>


    <!-- section contact -->

    <section id="contact">
        <h1 class="section_title">Nos Services</h1>
        <div class="localisation_contact_div">
            <div class="localisation">
                <h3>Notre Adresse</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3372.699891148458!2d-9.232511475175324!3d32.293045708562545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdac211719897669%3A0x6f59fa5bb517f58a!2sYoucode%20Safi!5e0!3m2!1sar!2sma!4v1700684810300!5m2!1sar!2sma"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="form_contact">
                <h3>Envoyer un message</h3>
                <form action="#">
                    <input type="text" placeholder="Nom">
                    <input type="email" placeholder="Adresse Mail">
                    <input type="text" placeholder="Objet">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </section>


    <footer>
        <p>CIH BANK Copyright 2024 </p>
    </footer>

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