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
            <h1 id="ajouter">update</h1>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                <div class="label">First Name</div>
                <input type="text" name="FirstName">
                <div class="label">Last Name</div>
                <input type="text" name="LastName">
                <div class="label">Email </div>
                <input type="email" name="email">
                <div class="label">Phone Number</div>
                <input type="number" name="tel">
                <div class="label">Date</div>
                <input type="date" name="date_in">
                <div class="label">Gender</div>
                <select>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                <div class="label">Address</div>
                <input type="text" name="Address_C"><br><br>
                <button class="submit" type="submit" name="submit">Submit</button>
                <?php
                include("connect.php");
                if (isset($_POST["submit"])) {


                    $query = "UPDATE client set  email ='$_POST[email]',tel ='$_POST[tel]',date_in ='$_POST[date_in]',Address_C ='$_POST[Address_C]' WHERE FirstName ='$_POST[FirstName]' && LastName ='$_POST[LastName]'";
                    mysqli_query($con, $query);
                    echo "RECORD updated :" . mysqli_affected_rows($con);
                    mysqli_close($con);


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
                    $query = "SELECT * FROM client";
                    $result = mysqli_query($con, $query);

                    // Vérifier si la requête a réussi
                    if ($result) {
                        // Afficher la liste des comptes
                        echo "<table border='1'>
                                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Email</th>
                                        <th>telephone</th>
                                        <th>Date de na</th>
                                        <th>Address</th>
                                        <th>Salary</th>
                                    </tr>
                                    </thead>

                                                ";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                                                    <tbody><tr>
                                                        <td>{$row['id']}</td>
                                                        <td>{$row['FirstName']}</td>
                                                        <td>{$row['LastName']}</td>
                                                        <td>{$row['email']}</td>
                                                        <td>{$row['tel']}</td>
                                                        <td>{$row['date_in']}</td>
                                                        <td>{$row['Address_C']}</td>
                                                        <td>1000DHs</td>
                                                     </tr>";
                        }

                        echo "</tbody></table>";
                    } else {
                        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
                    }

                    // Fermer la connexion
                    mysqli_close($con); ?>
                </div>

                <!-- ================= New Customers ================ -->

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