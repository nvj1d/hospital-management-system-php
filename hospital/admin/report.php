<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TOUS LES RAPPORTS</title>
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
				<div class="col-md-10 my-2">
					<h5 class="text-center ">TOUS LES RAPPORTS</h5>
					<?php 
						$result = $dbh->query("SELECT * FROM reports");
						$output ="";
						$output .="
							<table class ='table table-bordered'>
							<tr>
								<th>ID</th>
								<th>titre</th>
								<th>message</th>
								<th>nom d'utilisateur</th>
								<th>date d'envoi</th>
							</tr>
							";

							if ($result-> rowCount() < 1) {
								$output .="
									<tr>
									<td colspan='8' class='text-center'>AUCUN RAPPORT ENCORE !</td>
									</tr>
								";
									
							}
							while ($row = $result->fetch()) {
								$output.="
									<tr>
										<td>".$row['id']."</td>
										<td>".$row['title']."</td>
										<td>".$row['message']."</td>
										<td>".$row['username']."</td>
										<td>".$row['date_send']."</td>
								";
							}
							$output .="
								</tr>
								</table>
							";
							echo $output;

					 ?>
					
					
					
				</div>
				
			</div>
			
		</div>
	</div>

</body>
</html>