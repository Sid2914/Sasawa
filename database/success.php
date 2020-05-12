<?php

session_start();
require "config/constants.php";
$ip_add = getenv("REMOTE_ADDR");
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

$servername = "localhost";
$username = "sasawa_mysql";
$password = "QW_3ceBZ5IQH";
$db = "sasawa_638";

$con = mysqli_connect($servername, $username, $password,$db);


if (!$con) {
	echo "ent 2";
    die("Connection failed: " . mysqli_connect_error());
}

echo "ent 1";


$user_id = $_SESSION["uid"];

$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$user_id'"; 

$query = mysqli_query($con,$sql); 


			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}
		
			
			for ($i=0; $i < count($product_id); $i++) { 
				$sql = "INSERT INTO orders (user_id,product_id,qty) VALUES ('$user_id','".$product_id[$i]."','".$qty[$i]."')";
				mysqli_query($con,$sql);
			} 

	$sql = "DELETE FROM cart WHERE user_id = '$user_id'"; 
	
	$con = mysqli_connect("localhost", $username, $password,$db); 


	if (!$con) { 
	echo "ent 2";
    die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_query($con,$sql); 
	if(mysqli_query($con,$sql)){
	}
	
#}

#}
	
?>
 <!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Mystore</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="#" class="navbar-brand">My Store</a>
								</div>
								<ul class="nav navbar-nav">
									<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
									<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
										
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>
											<br>Your order has been placed, you can continue your Shopping </br></p>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

		

	
		
	



