<?php 
	session_start();
	include 'include/connection.php';

	if (isset($_POST['login'])) {

		$uname = $_POST['uname'];
		$password = $_POST['pass'];
 
		$error = array();
		$result = $dbh->query("SELECT * FROM doctors WHERE username='$uname' AND password='$password'");
		$row = $result->fetch();

		if (empty($uname)) {
			$error['login'] = "enter username";
		}else if (empty($password)) {
			$error['login'] = "enter password";
		}else if ($row['statut'] == "pendding") {
			$error['login'] = "please wait until an admin verify your identity";
		}else if ($row['statut'] == "rejected") {
			$error['login'] = "Try again later";
		}

		if (count($error) == 0) {
			$result = $dbh->query("SELECT * FROM doctors WHERE username='$uname' AND password='$password'");
			if (count($result->fetchAll()) == 1) {
				echo "<script>alert('done!')</script>";
				$_SESSION['doctor'] = $uname;
				header("Location:doctor/index.php");

			}else{
				echo "<script>alert('Failed!')</script>";
			}
		}
	}

	if (isset($error['login'])) {
		$e = $error['login'];
		$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
	}else{
		$show  ="";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Docteur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<?php 
	include("include/header.php");
	 ?>
	 <div class="container">
	 	<div class="col-md-12 my-3">
	 		<div class="row">
	 			<div class="col-md-3">
	 				
	 			</div>
	 			<div class="col-md-6 jumbotron">
	 				<img src="doctor/img/doctor.png" id="img_log">
	 				<?php echo $show; ?>
	 				<form method="post">
	 					<div class="form-group">
	 						<label>Nom d'utilisateur</label>
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="username">
	 					</div>
	 					<div class="form-group">
	 						<label>Mot de passe</label>
	 						<input type="password" name="pass" class="form-control" autocomplete="off">
	 					</div>
	 					<input type="submit" name="login" class="btn btn-success my-2 form-control" value="connexion">
	 						<p class="my-2">vous n'avez pas de compte ? <a href="apply.php">appliquer maintenant!</a></p>
	 					
	 				</form>
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 	
	 </div>

</body>
</html>