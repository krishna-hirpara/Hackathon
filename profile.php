<?php
session_start();
if(!isset($_SESSION['uid1']))
{
    echo " <script>alert('Please login first');</script> ";
    header("Location: login.php");
}
include("navbar1.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
<center><h1 style="border-bottom: 3px solid black; width:170px;">My Profile</h1></center>
</body>
</html>
<?php
echo"<br><br>";
echo "<center>";
$con=mysqli_connect('localhost','root','','hackathon');
$Email=$_SESSION['uid1'];
$sql="SELECT * FROM credentials  where email='$Email'";
$s1=mysqli_query($con,$sql);
$R=mysqli_num_rows($s1);
if($R>0)
{
  while($r=mysqli_fetch_assoc($s1))
  {

		echo "<table align='center' border-collapse='collapse' border='3px' width='400px' height='300px'>
		<tr><td>Id:</td>"."<td>".$r['id']."</td></tr>
		<tr><td>Password:</td>"."<td>".$r['PASSWORD']."</td></tr>
		<tr><td>Name:</td><td>".$r['name']."</td></tr>
		<tr><td>Mobile No.:</td><td>".$r['mobile']."</td></tr>
		<tr><td>Email:</td><td>".$r['email']."</td></tr>
		<tr><td>Address:</td><td>".$r['address']."</td></tr>
		</table>";
  }
}
echo "</center>"
?>