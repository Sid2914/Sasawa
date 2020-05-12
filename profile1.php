<?php 
session_start();
require "config/constants.php";

$servername = "localhost";
$username = "root";
$password = "test";
$db = "sasawa";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

#echo $con;
#$ip_add = getenv("REMOTE_ADDR");
#include "db.php"; 


#include "db.php"; 
$user_id = $_SESSION["uid"];
$sql = "SELECT * FROM user_info where user_id = '$user_id'"; 
#echo $sql;
$query = mysqli_query($con,$sql); 

#while($r = $query->fetch()) {
while ($r=mysqli_fetch_array($query)) {
    echo '<div class="col-sm-12 col-md-12 col-lg-12 membersGrid">';
	echo "<b  style=font-size:30px> Customer Profile </b>"; echo "<br>"; echo "<br>"; 
    echo "First Name- "; echo $r['first_name'], '<br>';
	echo "</br>";
	echo "Last Name- "; echo $r['last_name'], '<br>';
	echo "</br>";
	echo "Email- "; echo $r['email'], '<br>';
	echo "</br>";
	echo "Mobile- "; echo $r['mobile'], '<br>';
	echo "</br>";
	echo "Address1- "; echo $r['address1'], '<br>';
	echo "</br>";
	echo "City, State, Zipcode- "; echo $r['City_State_Zipcode'], '<br>';
	echo "</br>";
    
    echo '<a class="viewProfile" href="profile.php?id=' . $r['user_id']. '"><button>Home</button></a>';
    echo '</div>';
    echo '</div>';

}
  ?>