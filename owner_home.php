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
</head>
<body>
    <br>
<center><h1 style="border-bottom: 3px solid black; width:220px;">Stock Details</h1></center>
</body>
</html>
<?php
$summation="";
    $connect=mysqli_connect('localhost','root','','hackathon');
    $sql='select * from stockdetails';
    $x=mysqli_query($connect,$sql);
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
                mysqli_query($connect,$sql2);   
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
    table,td,th,tr{border: 1px solid black; border-collapse: collapse; text-align:center;}
    </style>
    <br><br>
    <table>
    <tr>
    <th>Stock ID</th>
    <th>Email</th>
    <th>Type of Stock</th>
   <th>Date of Loading</th>
    <th>Date of Departure</th>
    <th>Net weight</th>
    <th>Total Cost</th>
    <th>Status</th>";

    for($i=0;$i<$y;$i++)
    {
         echo '<tr><td>'.$stockid[$i].'</td>';
        echo '<td>'.$email[$i].'</td>';
        echo '<td>'.$tos[$i].'</td>';
        echo '<td>'.$load[$i].'</td>';
        echo '<td>'.$dept[$i].'</td>';
        echo '<td>'.$weight[$i].'</td>';
        echo '<td>'.$cost[$i].'</td>';
        echo '<td>'.$stat[$i].'</td></tr>';   
    }
   echo '</table>';
   echo '</center>';
   echo '</body>';
   echo '</html>'; 
?>
