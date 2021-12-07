<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include("../include/header.php");
		include("../include/connection.php");
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php include("side_nav.php"); ?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center">Modifier DOCTEUR</h5>
					<?php 
						if (isset($_GET['id'])) {
							$id = $_GET['id'];
							$result = $dbh->query("SELECT * FROM doctors WHERE id='$id'");
							$row = $result->fetch();
						}
					 ?>
					 <div class="row">
					 	<div class="col-md-8">
					 		<h5 class="text-center">détails du médecin</h5>
					 		<h5 class="my-3">ID: <?php echo $row['id']; ?></h5>
					 		<h5 class="my-3">Prénom: <?php echo $row['firstname']; ?></h5>
					 		<h5 class="my-3">nom: <?php echo $row['lastname']; ?></h5>
					 		<h5 class="my-3">Nom d'utilisateur: <?php echo $row['username']; ?></h5>
					 		<h5 class="my-3">e-mail: <?php echo $row['email']; ?></h5>
					 		<h5 class="my-3">téléphone: +<?php echo $row['phone']; ?></h5>
					 		<h5 class="my-3">sexe: <?php echo $row['gender']; ?></h5>
					 		<h5 class="my-3">pays: <?php echo $row['pays']; ?></h5>
					 		<h5 class="my-3">date d'inscription:<?php echo $row['data']; ?></h5>
					 		<h5 class="my-3">salaire: <?php echo $row['salaire']; ?>$</h5>
					 	</div>
					 	<div class="col-md-4">
					 		<h5 class="text-center">modifier le salaire</h5>
					 		<?php 
					 			if (isset($_POST['update'])) {
					 				$salary = $_POST['salary'];
					 				$result = $dbh->query("UPDATE doctors SET salaire='$salary' WHERE id ='$id'");
					 			}
					 		 ?>
					 		<form method="post">
					 			<label>saisir le nouveau salaire</label>
					 			<input type="number" name="salary" class="form-control" value ="<?php echo $row['salaire']; ?>">
					 			<input type="submit" name="update" class="btn btn-info my-3" value="update salary">
					 			
					 		</form>
					 	</div>
					 	
					 </div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>