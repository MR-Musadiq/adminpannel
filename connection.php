<?php
$con=mysqli_connect("localhost","root","","mydb");
if($con->connect_error){
    echo"connect error";
}
else{
    echo"connect built";
}
?>