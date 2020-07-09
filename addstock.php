<?php
session_start();
if(!isset($_SESSION['uid1']))
{
    echo " <script>alert('Please login first');</script> ";
    header("Location: login.php");
}
include("navbar2.php"); 
$capacity=10000000;
$summation=$_GET['s'];

$flag=0;
if(isset($_POST['sub'])){
    if(empty($_POST['cid'])||empty($_POST['tos'])||empty($_POST['dol'])||empty($_POST['dod'])){
        echo "<script>alert('All fields Required')</script>";
        $flag=1;
    }
    if($flag==0){
        $em=$_POST['cid'];
        $tos=$_POST['tos'];
        $load=$_POST['dol'];
        $dept=$_POST['dod'];
        $weight=$_POST['nw'];
        $days=(strtotime($dept)-strtotime($load))/60/60/24;
        $tcost=$weight*$days*20;
        $status='';
        $today=date('d-m-Y');
        if(strtotime($dept)<strtotime($today)){
            $status="Finished";
        }
        else{
            $status="Ongoing";
            $summation=$summation+(int)$weight;
        }
        if($summation<=$capacity)
        {
            if(strtotime($load)>strtotime($dept)){
                echo "<script>alert('Departure date or Loading date invalid')</script>";
            }
            else
            {
                $connect=mysqli_connect('localhost','root','','hackathon');
                $sql="SELECT * from credentials where email='$em';";
                $count=mysqli_num_rows(mysqli_query($con,$sql));
                if($count<=0)
                {
                    echo "<script>alert('registered yourself first')</script>";
                }
        
                else
                {
                    $sql="Insert INTO stockdetails(email,typeofstock,load_date,dept_date,weight,cost,status) values('$em','$tos','$load','$dept','$weight','$tcost','$status')";
                    if(mysqli_query($connect,$sql))
                    {
                        echo "Success";
                        header('Location: owner_home.php');
                    }
                    else
                    {
                        echo "Failed";
                    }
                }
            }
        }
        else{
            echo "<script>alert('Capacity Over')</script>";
        }
    }
}
?>
<html>
    <style>
     
         td,tr{padding: 10px;}
    </style>
    <script>
        function showMsg(str,id){
            if(str==""){
                document.getElementById(id).innerHTML="";
                return;
            }
            else{
                var xml=new XMLHttpRequest();
                xml.onreadystatechange= function(){
                    if(this.readyState==4 && this.status==200){
                        document.getElementById(id).innerHTML=this.responseText;
                    }
                };
                xml.open('GET','formajax.php?s='+str+"&i="+id,true);
                xml.send();
            }
        }
    </script>
    <body>
        
        <center>
            <br>
         <br>
        <br>
        <form action='<?php $_PHP_SELF ?>' method='post'>
            <div align='center' color='purple' class='insertBackground'>
             
            <table class='insertTable' border-collapse='collapse' >
              <caption>New Stock</caption>
           
                <tr>
                    <td>Client Email:</td>
                    <td><input name='cid' type='text' onkeyup="showMsg(this.value,this.name)">
                    <span id='cid'>* </span></td>
                </tr>
                <tr>
                    <td>Type of Stock:</td>
                    <td><input name='tos' type='text'>
                    <span id='tos'>*</span></td>
                </tr>
                <tr>
                    <td>Date of Loading:</td>
                    <td><input type='date' name='dol'>
                    <span id='dol'>*</span></td>
                </tr>
                <tr>
                    <td>Date of Departure:</td>
                    <td><input type='date' name='dod'>
                    <span id='dod'>*</span></td>
                </tr>
                <tr>
                    <td>Net weight:</td>
                    <td><input type='number' name='nw'>
                    <span id='nw'>*</span></td>
                </tr>
                </div>
            </table>
            <table align="center">
                <tr>
                    <td><input type='reset' class="insertButton" name='reset' value='Reset'></td>
                    <td><input type='submit' class="insertButton" name='sub' value='Submit'></td>
                </tr>
            </table>
        
        </form></center>
    </body>
</html>