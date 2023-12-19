<style>
	img {
		width: 80%;
		/* height: 20%	; */
	}

	td {
		width: 20%;
	}
</style>

<?php
require_once './conn/conn.php';
include_once "header.php";

session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
	header('location: index.php');
}
?>

<body>

	<?php include('admin_header.php'); ?>
	<br>
	<form action="" method="POST">
		<table class="table  table-responsive table-lg table-md table-sm  
		table-hover   table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Prénom</th>
					<th>Nom de famille</th>
					<th>Nom d'utilisateur</th>
					<th>Mot de passe</th>
					<th>Type d'utilisateur</th>
					<th>Image</th>
					<th>Modifier</th>
					<th>Supprimer</th>
				</tr>
			</thead>

			<?php
			$sql = "SELECT * FROM admin_accounts order by id ASC";
			$query = mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_array($query)) { ?>
				<tbody>
					<td>
						<?php echo $row['id']; ?>
					</td>
					<td>
						<?php echo $row['firstname']; ?>
					</td>
					<td>
						<?php echo $row['lastname']; ?>
					</td>
					<td>
						<?php echo $row['username']; ?>
					</td>
					<td>
						<?php echo $row['password']; ?>
					</td>
					<td>
						<?php echo $row['usertype']; ?>
					</td>
					<td><img src="images/<?php echo $row['picture']; ?>"></td>

					<td>
						<a class="btn btn-outline-info btn-lg"
							href="edit_account.php?id=<?php echo $row['id']; ?>">Modifier</a>
					</td>

					<td>
						<a class="btn btn-outline-danger btn-lg"
							href="delete_account.php?id=<?php echo $row['id']; ?>">Supprimer</a>
					</td>

				</tbody>
			<?php } ?>
		</table>
	</form>

</body>

</html>