<?php
include("navbar1.php"); 
session_start();
if(!isset($_SESSION['uid1']))
{
    echo " <script>alert('Please login first');</script> ";
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
<center><h1 style="border-bottom: 3px solid black; width:160px;">Old Stock</h1></center>
</body>
</html>
<?php 
$summation="";
$con=mysqli_connect('localhost','root','','hackathon');
 $sql='select * from stockdetails';
    $x=mysqli_query($con,$sql);
    $y=mysqli_num_rows($x);
    $i=0;
    $stock=array();
    $email=array();
    $tos=array();
    $load=array();
    $dept=array();
    $weight=array();
    $cost=array();
    $stat=array();
    if ($y>0){
        while($z=mysqli_fetch_array($x))
        {
            $stockid[$i]=$z['stockid'];
            $email[$i]=$z['email'];
            $tos[$i]=$z['typeofstock'];
            $load[$i]=$z['load_date'];
            $dept[$i]=$z['dept_date'];
            $weight[$i]=$z['weight'];
            $cost[$i]=$z['cost'];
            $today=date('d-m-Y');
            if(strtotime($today)>strtotime($dept[$i])){
                $sql2= "Update stockdetails SET status='Finished' WHERE stockid=".$z['stockid']."";
                mysqli_query($con,$sql2);   
            }
            $stat[$i]=$z['status'];
            if($stat[$i]=="Ongoing"){
                $summation=(int)$summation+$weight[$i];
            }
            $i++;
        }
    }
    echo "
    <center>
    <html>
    <body>
    <style>
    table,td,tr{border: 1px solid black; text-align:center; }
    </style>
    <br><br>
    <table align:'center'>
    <tr>
    <td>Stock ID</td>
    <td>Type of Stock</td>
    <td>Date of Loading</td>
    <td>Date of Departure</td>
    <td>Cost</td>
    <td>Weight</td>
    <td>Status</td></tr>";
    $Email=$_SESSION['uid1'];
	$que="select * from stockdetails where email='$Email'";
	$result=mysqli_query($con,$que);
    $r=mysqli_num_rows($result);
    if($r>0)
    {
	
       while($r1=mysqli_fetch_assoc($result))
       {
         echo '<tr><td>'.$r1['stockid'].'</td>';
        echo '<td>'.$r1['typeofstock'].'</td>';
        echo '<td>'.$r1['load_date'].'</td>';
        echo '<td>'.$r1['dept_date'].'</td>';
        echo '<td>'.$r1['cost'].'</td>';
        echo '<td>'.$r1['weight'].'</td>';
        echo '<td>'.$r1['status'].'</td></tr>'; 
    
       }
   }
   echo '</table>';
   echo '</center>';
   echo '</body>';
   echo '</html>';
 ?>