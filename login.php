<?php
	include("navbar.php"); 
	$uid=$psw=$e1=$e2="";
	if(isset($_POST['login']))
	{
		$uid=$_POST['uid'];
		$psw=$_POST['psw'];
		$con=mysqli_connect("localhost","root","","hackathon");
		if(!$con)
			echo "can't connetct to database";
		else
		{
			$sql="SELECT * from credentials where email='$uid' AND PASSWORD='$psw';";
			$count=mysqli_num_rows(mysqli_query($con,$sql));
		
			if($count==1)
			{
				session_start();
				$s="SELECT email from credentials where email='$uid' AND PASSWORD='$psw'";
				$r=mysqli_query($con,$s);
				while($row=mysqli_fetch_assoc($r))
				{
					$uid1=$row['email'];
				}
				$_SESSION['uid1']="$uid1";
				if(strcmp('abc123@gmail.com',$uid1)==0)
				{
					header("Location: owner_home.php");
				}
				else
				{
					header("Location: available_space1.php");
				}
			}	
			else
			{
				echo "<script>alert('Invalid user,please try again');</script>";
	   		}
		}
	}
	

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
 	<script>
 		function checkform()
		{
			var fn1=document.getElementById("name1").value;
			var ln1=document.getElementById("psw").value;
			var id1=document.getElementById("add").value;
			var email1=document.getElementById("uid").value;
			var mob1=document.getElementById("mob").value;
			
			if(fn1==''||ln1==''||id1==''||email1==''||mob1=='')
			{
				alert('All the field are must');
			}
			else 
			{
				var fn=document.getElementById("fname1").textContent;
				var ln=document.getElementById("pass1").textContent;
				var id=document.getElementById("address1").textContent;
				var email=document.getElementById("email1").textContent;
				var mob=document.getElementById("mob1").textContent;
					
				if(fn=='valid' && ln=='valid' && id=='valid' && email=='valid' && mob=='valid')
				{
					window.location="sample.php";
				}
				else
					alert('error while insereting data to database');
				}
 		}

 		function validate(field,query)
 		{
 			var x=new XMLHttpRequest();
 			x.onreadystatechange=function()
 			{
 				if(x.readyState!=4)
 					document.getElementById(field).innerHTML="validating...........";
 				else if(this.readyState==4 && this.status==200)
 				{
 						document.getElementById(field).innerHTML=x.responseText;
 						var b=document.getElementById('register1');
 						const name1 = document.getElementById('fname1').textContent;
 						const psw = document.getElementById('pass1').textContent;
 						const add = document.getElementById('address1').textContent;
 						const uid = document.getElementById('email1').textContent;
 						const mob = document.getElementById('mob1').textContent;
 						console.log("validateprof.php?field="+field+"&query="+query);

 				if(name1=="valid" && psw=="valid" && uid=="valid" && add=="valid" && mob=="valid")
 					{
 						b.removeAttribute('disabled');
 					}
 					else
 						b.setAttribute('disabled','disabled');
						
				}
 				else
 					document.getElementById(field).innerHTML="Error Occured <a href='index.php'>Reload Or Try Again</a>";
 			}

 			x.open("GET","validateprof.php?field="+field+"&query="+query,true);
 			x.send(); 		
 		 }		
 	</script>
 	
</head>
<body>
	<div class="hero">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Login</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
			<div class="social-icons">
				<a href="https://www.facebook.com"><img src="fb.png"></a>
				<a href="https://www.twitter.com"><img src="tw.png"></a>
				<a href="https://www.google.com"><img src="gp.png"></a>
			</div>

			<form id="login" class="input-group" method="post" action="">
				<input type="text" class="input-field" placeholder="email ID" name="uid">
				<input type="password" class="input-field" placeholder="Password" name="psw">
				<button type="submit" name="login" class="submit-btn">Login</button>
			</form>

			<form id="register" class="input-group" action="sample.php" method="post" name="myform">
				<table >
					<tr>
					<td><input type="text" class="input-field" id="uid" placeholder="email ID" name="uid" onkeyup="validate('email1',this.value)">
					</td>
					<td><span><div id='email1'></div></span></td>
				</tr>
				<tr>
					<td>
						<input type="password" class="input-field" id="psw" placeholder="Password" name="psw" onkeyup="validate('pass1',this.value)">
					</td>
					<td>
						<span><div id='pass1'></div></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="input-field" id="name1" placeholder="Name" name="name1"onkeyup="validate('fname1',this.value)">
					</td>
					<td>
						<span><div id='fname1'></div></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="input-field" id="mob" placeholder="Mobile" name="mob"onkeyup="validate('mob1',this.value)">
					</td>
					<td>
						<span><div id='mob1'></div></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="input-field" id="add" placeholder="Address" name="add" onkeyup="validate('address1',this.value)">
					</td>
					<td>
						<span><div id='address1'></div></span>
					</td>
				</tr>
				<tr>
				<td colspan="2">	
				<input type="submit" name="register1" class="submit-btn" value="Register" disabled onclick="checkform()" id="register1">
			</td>
		</tr>
				</table>
			</form>		
		</div>
	</div>

	<script type="text/javascript">
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");

		function login()
		{
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0";
		}

		function register()
		{
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}
	</script>
</body>
</html>
