<?php 

session_start();

include("include/connection.php");

if (isset($_POST['login'])) {
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$error = array();

	if (empty($username)) {
		$error['admin'] = "enter username";
	}elseif(empty($password)){
		$error['admin'] = "enter password";
	}

	if (count($error) == 0) {
		$result = $dbh->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
		if(count($result->fetchAll()) == 1){
			echo "<script>alert('you have login as admin')</script>";
			$_SESSION['admin'] = $username;

			header("location:admin/index.php");
			exit();
		}else{
			echo "<script>alert('invalid username or password!')</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>administrateur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
	include("include/header.php");
	?>
	<div class="container my-3">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron">
					<img src="img/admin_login.png" id="img_log">
					<form method="post">
						<div>
							<?php 
							if (isset($error['admin'])) {
								$sh = $error['admin'];
								$show = "<h4 class='alert alert-danger'>".$sh."</h4>";
							}else{
								$show = "";
							}
							echo $show;

							 ?>				
						</div>
						<div class="form-group">
							<label>Nom d'utilisateur</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="username">			
						</div>
						<div class="form-group">
							<label>Mot de passe</label>
							<input type="password" name="pass" class="form-control">
							
						</div>
						<input type="submit" name="login" class="btn btn-dark form-control my-2" value="connexion">
						
					</form>
					
				</div>

				
			</div>
			
		</div>
		
	</div>

</body>
</html>