<?php
session_start();
if(!isset($_SESSION['uid1']))
{
    echo " <script>alert('Please login first');</script> ";
    header("Location: login.php");
}
include("navbar1.php"); 
$Max_capacity=10000000;//in kg
	$con=mysqli_connect('localhost','root','','hackathon');
	$summation="";
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
	
$Available_space=$Max_capacity-$summation;
echo "<br><br>";
echo "Available space :"."\t".$Available_space."\t"."kg";

?>