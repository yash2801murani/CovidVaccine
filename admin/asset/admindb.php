<?php


$servername="db";
$username="root";
$password="root";
$database="vaccine";

$con= mysqli_connect($servername, $username, $password, $database);


if($con){
    // echo "connected successfully";
}

else{
    echo "databasee cant connect successfully";
}

?>
