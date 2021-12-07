<?php 
	session_start();
	include("include/connection.php");

	if (isset($_POST['login'])) {
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
	}	
	if (empty($uname)) {
		//echo "<script>alert('enter username');</script>";
	}else if (empty($pass)) {
		//echo "<script>alert('enter password');</script>";
	}else{
		$result = $dbh->query("SELECT * FROM patients WHERE username='$uname' AND password='$pass'");
		if (count($result->fetchAll()) == 1) {
			header("Location:patient/index.php");
			$_SESSION['patient'] = $uname;
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>patient</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<?php include("include/header.php") ?>
	<div class="container">
		<div class="col-md-12 my-3">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6 jumbotron">
					<img src="patient/img/patient.png" id="img_log"> 
					<form method="post">
						<div class="form-group">
							<label>Nom d'utilisateur</label>
							<input type="text" name="uname" class="form-control">
							
						</div>
						<div class="form-group">
							<label>Mot de passe</label>
							<input type="password" name="pass" class="form-control">
							
						</div>
						<input type="submit" name="login" value="connexion" class="btn btn-info my-2 form-control">
						<p class="my-2">vous n'avez pas de compte ? <a href="account.php">s'inscrire maintenant!</a></p>
						
					</form>	
				</div>
				
			</div>			
		</div>
		
	</div>

</body>
</html>