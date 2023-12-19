<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="../index.php"> <span>CIH</span> BANK</a>
        </div>
        <ul class="menu">
            <li><a href="../../public/index.php">BANK</a></li>
            <li><a href="../signupAgence.php">AGENCE</a></li>
            <li><a href="../../st_mark/index.php">Distributeur</a></li>
            <li><a href="../signup.php">ADMIN</a></li>
            <li><a href="../../gestion-employes-chaine/index.php">sabAdmin</a></li>

        </ul>
        <div class="responsive-menu"></div>
    </header>
    <!-- acceuil section -->
    <section id="home">
        <h2>hello</h2>
        <h4>Bank en Sécurité</h4>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit accusantium consectetur in voluptates neque.</p>
        <p>molestiae illum eaque praesentium esse. Quos iusto.</p>
        <div class="find_trip">
            <form action="">
                <div>
                    <label>Pays</label>
                    <input type="text" placeholder="Entrez un Pays">
                </div>
                <div>
                    <label>Ville</label>
                    <input type="text" placeholder="Entrez une ville">
                </div>
                <div>
                    <label>Région</label>
                    <input type="text" placeholder="Entrez une région">
                </div>
                <input type="submit" value="voir">
            </form>
        </div>
    </section>   
    <footer>
        <p> Réalisé par <span>Yassine Elmiri</span> | Tous les droits sont réservés.</p>
    </footer>


    <script>
        var toggle_menu = document.querySelector('.responsive-menu');
        var menu = document.querySelector('.menu');
        toggle_menu.onclick= function(){
             toggle_menu.classList.toggle('active');
             menu.classList.toggle('responsive')
        }
    </script>
</body>
</html>