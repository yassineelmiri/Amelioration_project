<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Distributeur</title>
    <link rel="stylesheet" href="styleD.css">
</head>

<body>
    <!-- section acceuil -->
    <section id="container">
        <header>
            <div class="logo">
                <p>CIH bank</p>
            </div>
        </header>
        <div class="container-text">
            <h1>Distributeur machine</h1>
            <p>Entre RIB</p>
            <form action="distribetuerMachine.php" method="POST">
                <input type="text" name="RIB" placeholder="ENTRE RIB">
                <input type="text" name="FirstName" placeholder="ENTRE UESRNAME">
                <input type="number" name="id" placeholder="ENTRE numero de Compte">
                <button class="submit" type="submit" name="submit">Submit</button>
            </form>
            <?php
            include("connect.php");
            if (isset($_POST["submit"])) {
                $query = "SELECT *FROM compte WHERE RIB ='$_POST[RIB]' && FirstName ='$_POST[FirstName]' ";
                $result = mysqli_query($con, $query);
                echo "<table border='1'>
                                        <thead>
                            <tr>
                                <th>Numero de Compter</th>
                                <th>FirstName</th>
                                <th>balance</th>
                                <th>RIB</th>
                            </tr>
                            </thead>

                                        ";
                while ($row = mysqli_fetch_array($result)) {
                    echo "
                             <tbody><tr>
                            <td>{$row['idClient']}</td>
                            <td>{$row['FirstName']}</td>
                            <td>{$row['balance']}</td>
                            <td>{$row['RIB']}</td>
                           </tr>";
                }

                echo "</tbody></table>";
                echo "RECORD SELECT :" . mysqli_affected_rows($con);

            }
            ?>
            <?php
            include("connect.php");
            if (isset($_POST["submit"])) {
                $query = "SELECT *FROM client WHERE id ='$_POST[id]' ";
                $result = mysqli_query($con, $query);
                echo "<table border='1'>
                                        <thead>
                            <tr>
                                <th>Numero de compte</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>email</th>
                                <th>telephone</th>
                                <th>Date de na</th>
                                <th>Address</th>
                            </tr>
                            </thead>

                                        ";
                while ($row = mysqli_fetch_array($result)) {
                    echo "
                             <tbody><tr>
                             <td>{$row['id']}</</td>
                             <td>{$row['FirstName']}</td>
                             <td>{$row['LastName']}</td>
                             <td>{$row['email']}</td>
                             <td>0{$row['tel']}</td>
                             <td>{$row['date_in']}</td>
                             <td>{$row['Address_C']}</td>
                             
                           </tr>";
                }

                echo "</tbody></table>";
                echo "RECORD SELECT :" . mysqli_affected_rows($con);

            }
            ?>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <p>Copyright Yassine Elmiri 2025</p>
    </footer>
</body>

</html>