<?php 
if(isset($_POST['register1']))
{
		$fn=$_POST['name1'];
			$ps=$_POST['psw'];
			$ad=$_POST['add'];
			$mail=$_POST['uid'];
			$mob=$_POST['mob'];
			
			$con=mysqli_connect("localhost","root","","hackathon");
				$sql="SELECT * from credentials where email='$mail';";
			$count=mysqli_num_rows(mysqli_query($con,$sql));
			if($count>=1)
			{
				echo "<script>alert('user already exist');</script>";
			}
			else
			{
			$s="INSERT INTO credentials(name, email, mobile, PASSWORD, address) VALUES('$fn' ,'$mail','$mob','$ps','$ad');";

			if(mysqli_query($con,$s))
				echo "<script>alert('data inserted successfully');</script>";
			else
				echo "<script>alert(' cant insert into database');</script>";
			}
}
?>
				