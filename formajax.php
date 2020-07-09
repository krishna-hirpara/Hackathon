<?php
$str=$_GET['s'];
$id=$_GET['i'];
if(empty($str)){
    echo "Required";
}
if($str!=="" && $id=="cid"){
    if(!filter_var($str, FILTER_VALIDATE_EMAIL)){
        echo "* Invalid Email";
    }
}

?>