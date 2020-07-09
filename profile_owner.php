<?php
session_start();
if(!isset($_SESSION['uid1']))
{
    echo " <script>alert('Please login first');</script> ";
    header("Location: login.php");
}
include("navbar2.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
 		span
 		{
 			color: white;
 		}
 	</style>
 
</head>
<body>
	<br>
<center><h1 style="border-bottom: 3px solid black; width:170px;">My Profile</h1></center>
</body>
</html>
<?php
echo "<center>";
echo "<br><br><br><br>";
$con=mysqli_connect('localhost','root','','hackathon');
$Email=$_SESSION['uid1'];
$sql="SELECT * FROM credentials  where email='$Email'";
$s1=mysqli_query($con,$sql);
$R=mysqli_num_rows($s1);
if($R>0)
{
  while($r=mysqli_fetch_assoc($s1))
  {

		echo "<div align='center' color='purple' class='insertBackground'>
			<table  border-collapse='collapse' border='3px' width='400px' height='300px' class='insertTable' cellspacing='25px'>
		<tr><td>Id:</td>"."<td>".$r['id']."</td></tr>
		<tr><td>Name:</td><td>".$r['name']."</td></tr>
		<tr><td>Mobile No.:</td><td>".$r['mobile']."</td></tr>
		<tr><td>Email:</td><td>".$r['email']."</td></tr>
		<tr><td>Address:</td><td>".$r['address']."</td></tr>
		</table>
		</div>";
  }
}
echo "</center>";
?>