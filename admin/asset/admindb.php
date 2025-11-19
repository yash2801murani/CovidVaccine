<?php


$servername="localhost";
$username="root";
$password="";
$database="vaccine";

$con= mysqli_connect($servername, $username, $password, $database);


if($con){
    // echo "connected successfully";
}

else{
    echo "databasee cant connect successfully";
}

?>
