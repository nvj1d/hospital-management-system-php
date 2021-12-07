<?php 
	include 'include/connection.php';
	if (isset($_POST['apply'])) {
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$username = $_POST['uname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];
		$password = $_POST['password'];
		$conf_password = $_POST['con_pass'];

		$error = array();

		if (empty($firstname)) {
			$error['apply'] = "entrer Firstname";
		}elseif (empty($lastname)) {
			$error['apply'] = "entrer lastname";
		}elseif (empty($username)) {
			$error['apply'] = "entrer username";
		}elseif (empty($email)) {
			$error['apply'] = "entrer email";
		}elseif ($gender == "") {
			$error['apply'] = "entrer gender";
		}elseif (empty($phone)) {
			$error['apply'] = "entrer phone number";
		}elseif ($country =="") {
			$error['apply'] = "select a country";
		}elseif (empty($password)) {
			$error['apply'] = "entrer password";
		}elseif ($conf_password != $password) {
			$error['apply'] = "passwords does not matches!";
		}

		if (count($error) == 0) {
			$result = $dbh->query("INSERT INTO doctors(firstname,lastname,username,email,gender,phone,pays,password,salaire,data,statut,profile) VALUES('$firstname','$lastname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.png')");
			if ($result) {
				echo "<script>alert('you have successfully appled')</script>";
				header("Location: doctor_login.php");
			}else{
				echo "<script>alert('Failed!');</script>";
			}
		}
	}

	if (isset($error['apply'])) {
		$e = $error['apply'];
		$show = "<h5 class='text-center alert alert-danger'>$e</h5>";

	}else{
		$show="";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>application</title>
	<script type="text/javascript" src="/hospital/js/script.js"></script>
</head>
	<?php 
		include("include/header.php");
	 ?>
	 <div class="container">
	 	<div class="col-md-12 my-3">
	 		<div class="row">
	 			<div class="col-md-3">
	 				
	 			</div>
	 			<div class="col-md-6 jumbotron">
	 				<h5 class="text-center">Appliquer</h5>
	 				<?php echo $show;?>
	 				<div>
	 				</div>
	 				<form method="post">
	 					<div class="form-group">
	 						<label>prénom</label>
	 						<input type="text" name="fname" class="form-control" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" id="f1" onclick="return validate2()">

	 					</div>
	 					<p id="p1" style="color: red;"></p>
	 					<div class="form-group">
	 						<label>nom</label>
	 						<input type="text" name="lname" class="form-control" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>" id="f2" onclick="return validate2()">
	 						
	 					</div>
	 					<p id="p2" style="color: red;"></p>
	 					<div class="form-group">
	 						<label>Nom d'utilisateur</label>
	 						<input type="text" name="uname" class="form-control" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>" id="f3" onclick="return validate2()">
	 						
	 					</div>
	 					<p id="p3" style="color: red;"></p>
	 					<div class="form-group">
	 						<label>E-mail</label>
	 						<input type="text" name="email" class="form-control" value="<?php if(isset($_POST['uname'])) echo $_POST['email']; ?>" id="f4" onclick="return validate2()" >
	 						
	 					</div>
	 					<p id="p4" style="color: red;"></p>
	 					<div class="form-group">
							<label>genre</label>
							<select name="gender" class="form-control">
								<option value="">sélectionnez le sexe</option>
								<option value="homme">homme</option>
								<option value="femme">femme</option>
								
							</select>
							
						</div>
	 					<div class="form-group">
	 						<label>téléphone</label>
	 						<input type="number" name="phone" class="form-control" value="<?php if(isset($_POST['uname'])) echo $_POST['phone']; ?>" id="f5" onclick="return validate2()">
	 						
	 					</div>
	 					<p id="p5" style="color: red;"></p>
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
	 						<input type="password" name="password" class="form-control" id="f6" onclick="return validate2()">
	 						
	 					</div>
	 					<p id="p6" style="color: red;"></p>
	 					<div class="form-group">
	 						<label>Confirmez le mot de passe</label>
	 						<input type="password" name="con_pass" class="form-control" id="f7" onclick="return validate2()">
	 					</div>
	 					<p id="p7" style="color: red;"></p>
	 					<input type="submit" name="apply" value="appliquer maintenant" class="btn btn-success form-control my-2">
	 					<p class="my-2">Vous avez déjà un compte? <a href="doctor_login.php">Connecte-toi maintenant!</a> </p>
	 				</form>
	 				
	 			</div>
	 			<div class="col-md-3">

	 				
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 </div>
<body>

</body>
</html>