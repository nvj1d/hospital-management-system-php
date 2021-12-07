<?php 
	include("include/connection.php");
	if (isset($_POST['sign_up'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$country = $_POST['country'];
		$pass = $_POST['pass'];
		$conf_pass = $_POST['conf_pass'];

		$error = array();

		if (empty($fname)) {
			$error['sign_up'] = "enter first name";
		}else if (empty($lname)) {
			$error['sign_up'] = "enter last name";
		}else if (empty($uname)) {
			$error['sign_up'] = "enter username";
		}else if (empty($email)) {
			$error['sign_up'] = "enter email";
		}else if (empty($phone)) {
			$error['sign_up'] = "enter Phone NO.";
		}else if ($gender =="") {
			$error['sign_up'] = "select gender";
		}else if ($country =="") {
			$error['sign_up'] = "select country";
		}else if (empty($pass)) {
			$error['sign_up'] = "enter password";
		}else if (empty($conf_pass)) {
			$error['sign_up'] = "confirm password";
		}else if ($pass != $conf_pass) {
			$error['sign_up'] = "passwords does not matches!";
		}

		if (count($error) == 0) {
			$result = $dbh->query("INSERT INTO patients(firstname,lastname,username,email, phone,gender,country,password,date_reg,profile) values('$fname','$lname','$uname','$email','$phone','$gender','$country','$pass',NOW(),'patient.png')");
			if ($result) {
				header("Location:patient_login.php");
			}else{
				echo "<script>alert('failed!');</script>";
			}

		}
	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>inscription patient</title>
</head>
<body>
	<script type="text/javascript" src="/hospital/js/script.js"></script>
	<?php include("include/header.php"); ?>
	<div class="container">
		<div class="col-md-12 my-2">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6 jumbotron">
					<h5 class="text-center">créer un compte</h5>
					<form method="post">
						<div class="form-group">
							<label>prénom</label>
							<input type="text" name="fname" class="form-control" id="fname" onclick="return validate()">
							
						</div>
						<p id="error_para1" style="color: red;"></p>
						<div class="form-group">
							<label>nom</label>
							<input type="text" name="lname" class="form-control" id="lname" onclick="return validate()">
							
						</div>
						<p id="error_para2" style="color: red;"></p>
						<div class="form-group">
							<label>Nom d'utilisateur</label>
							<input type="text" name="uname" class="form-control" id="uname" onclick="return validate()">
						</div>
						<p id="error_para3" style="color: red;"></p>
						<div class="form-group">
							<label>e-mail</label>
							<input type="text" name="email" class="form-control" id="email" onclick="return validate()">
							
						</div>
						<p id="error_para7" style="color: red;"></p>
						<div class="form-group">
							<label>téléphone</label>
							<input type="text" name="phone" class="form-control" id="phone" onclick="return validate()">
							
						</div>
						<p id="error_para4" style="color: red;"></p>
						<div class="form-group">
							<label>genre</label>
							<select name="gender" class="form-control">
								<option value="">sélectionnez le sexe</option>
								<option value="homme">homme</option>
								<option value="femme">femme</option>
								
							</select>
							
						</div>
						<div class="form-group">
							<label>pays</label>
							<select name="country" class="form-control">
								<option value="">sélectionnez le pays</option>
								<option value="maroc">maroc</option>
								<option value="algerie">algerie</option>
								<option value="libye">libye</option>
								<option value="tunisie">tunisie</option>
								<option value="mauritanie">mauritanie</option>	
							</select>
							
						</div>
						<div class="form-group">
							<label>mot de passe</label>
							<input type="password" name="pass" class="form-control" id="pass" onclick="return validate()">
							
						</div>
						<p id="error_para5" style="color: red;"></p>
						<div class="form-group">
							<label>Confirmez le mot de passe</label>
							<input type="password" name="conf_pass" class="form-control" id="conf_pass" onclick="return validate()">
							
						</div>
						<p id="error_para6" style="color: red;"></p>
						<input type="submit" name="sign_up" class="btn btn-info form-control" value="créer un compte">
						<p class="my-2">Vous avez déjà un compte? <a href="patient_login.php">Connecte-toi maintenant!</a></p>
						
					</form>
					
				</div>
				<div class="col-md-3"></div>
				
			</div>
			
		</div>
		
	</div>
</body>
</html>