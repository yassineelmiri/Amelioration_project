<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="administration.php">
                        <span class="icon">
                            <ion-icon name="card-sharp"></ion-icon>
                        </span>
                        <span class="title">CIH BANK</span>
                    </a>
                </li>

                <li>
                    <a href="administration.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="administrationRecherch.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Rechercher</span>
                    </a>
                </li>

                <li>
                    <a href="administrationCompte.php">
                        <span class="icon">
                            <ion-icon name="add-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Ajouter</span>
                    </a>
                </li>

                <li>
                    <a href="administrationDelete.php">
                        <span class="icon">
                            <ion-icon name="trash-outline"></ion-icon>
                        </span>
                        <span class="title">supprimer</span>
                    </a>
                </li>


                <li>
                    <a href="administrationUpdate.php">
                        <span class="icon">
                            <ion-icon name="cloud-upload-outline"></ion-icon>
                        </span>
                        <span class="title">update</span>
                    </a>
                </li>

                <li>
                    <a href="administrationTransactions.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Transaction</span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            include("connect.php");

                            // Exécution de la requête SQL
                            $result = mysqli_query($con, "SELECT SUM(id) AS total_balance FROM client");

                            // Vérification des erreurs d'exécution de la requête
                            if ($result) {
                                // Extraction de la somme du résultat
                                $row = mysqli_fetch_assoc($result);
                                $somme = $row['total_balance'];

                                // Affichage de la somme dans la balise <div>
                                echo $somme;
                            } else {
                                // Gestion des erreurs
                                echo "Erreur d'exécution de la requête : " . mysqli_error($con);
                            }

                            // Fermeture de la connexion à la base de données
                            mysqli_close($con);
                            ?>
                        </div>
                        <div class="cardName">Client</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Transaction</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="swap-horizontal-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            include("connect.php");

                            // Exécution de la requête SQL
                            $result = mysqli_query($con, "SELECT SUM(balance) AS total_balance FROM compte");

                            // Vérification des erreurs d'exécution de la requête
                            if ($result) {
                                // Extraction de la somme du résultat
                                $row = mysqli_fetch_assoc($result);
                                $somme = $row['total_balance'];

                                // Affichage de la somme dans la balise <div>
                                echo $somme . "$";
                            } else {
                                // Gestion des erreurs
                                echo "Erreur d'exécution de la requête : " . mysqli_error($con);
                            }

                            // Fermeture de la connexion à la base de données
                            mysqli_close($con);
                            ?>
                        </div>

                        <div class="cardName">Capitale</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ ajoute les client ================= -->
            <h1 id="ajouter">Gestion Compte</h1>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="label">Number de Client</div>
                <input type="text" name="idCompte">
                <div class="label">First Name</div>
                <input type="text" name="FirstName">
                <div class="label">montant</div>
                <input type="number" name="montant">
                <div class="label">types</div>
                <select name="types">
                    <option></option>
                    <option>crédit</option>
                    <option>débit</option>
                </select>
                <button class="submit" type="submit" name="submit">Submit</button>
                <?php

                include("connect.php");

                if (isset($_POST["submit"])) {
                    $FirstName = htmlspecialchars(strtolower(trim($_POST['FirstName'])));
                    $montant = htmlspecialchars(strtolower(trim($_POST['montant'])));
                    $types = htmlspecialchars(strtolower(trim($_POST['types'])));
                    $idCompte = htmlspecialchars(strtolower(trim($_POST['idCompte'])));

                    if ($idCompte && $montant && $FirstName && $types) {
                        // Ne spécifiez pas la colonne id dans la requête d'insertion
                        $query = "INSERT INTO transactions(FirstName,montant,types,idCompte)values( '$FirstName', '$montant','$types','$idCompte')";
                        mysqli_query($con, $query);
                        echo "valid";
                    } else {
                        echo "Il faut saisir tous les champs";
                    }
                }
                ?>
            </form>


            <!-- ================ Order Details List ================= -->
            <div id="details" class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Résultat </h2>
                        <a href="#" class="btn">View All</a>
                    </div>


                    <?php // Connexion à la base de données
                    include("connect.php");

                    // Vérifier la connexion
                    if (!$con) {
                        die("La connexion a échoué : " . mysqli_connect_error());
                    }

                    // Requête pour récupérer la liste des comptes
                    $query = "SELECT * FROM transactions";
                    $result = mysqli_query($con, $query);

                    // Vérifier si la requête a réussi
                    if ($result) {
                        // Afficher la liste des comptes
                        echo "<table border='1'>
                                    <thead>
                                    <tr>
                                        <th>Les Transaction</th>
                                        <th>FirstName</th>
                                        <th>montant</th>
                                        <th>types</th
                                        <th>client</th>
                                    </tr>
                                    </thead>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                                                    <tbody><tr>
                                                        <td>{$row['id']}</td>
                                                        <td>{$row['FirstName']}</td>
                                                        <td>{$row['montant']}DHs</td>
                                                        <td>{$row['types']}</td>
                                                        <td>{$row['idCompte']}</td>
                                                         
                                                     </tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
                    }
                    ?>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>