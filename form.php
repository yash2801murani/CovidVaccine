<?php
require 'database/dbconnect.php';

// $done=false;
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){

    header('location: login.php');
    exit;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

  $name=$_POST["name"];
  $age=$_POST["age"];

  $contact=$_POST["contact"];
  $aadhar=$_POST["aadhar"];

  $city=$_POST["city"];
  $pincode=$_POST["pincode"];
  $email=$_POST["email"];
  $gender=$_POST['gender'];
  $bloodgroup=$_POST["bloodgroup"];


  $sql="INSERT INTO `ragistration` (`sn`, `name`, `age`, `contact`, `aadhar`, `city`, `pincode`, `email`, `gender`, `bloodgroup`) VALUES (NULL, '$name', '$age', '$contact', '$aadhar', '$city', '$pincode', '$email', '$gender', '$bloodgroup');";
  $result=mysqli_query($con,$sql);

$done=true;
  if($result){
      header('location: success.php');
      // echo "done";
  }

  else{
      echo "cant";
  }


}
?>




<!DOCTYPE html>
<html>
  <head>
    <title>New Member Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- <style> -->
      <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    <div class="testbox">
      <form action="form.php" method="post">
        <div class="banner">
          <!-- <img src="yaa.jpg" height="100%" width="100%"> -->
          <h1>Corona Vaccine Slot Ragistration</h1>
        </div>
        <div class="colums">
          <div class="item">
            <label for="fname"> Full Name<span>*</span></label>
            <input id="name" type="text" name="name"  required/>
          </div>
           <div class="item">
            <label for="lname"> Age<span>*</span></label>
            <input id="age" type="number" name="age" required/>
          </div>
          <div class="item">
            <label for="address1">Contact Number<span>*</span></label>
            <input id="contact" type="number"   name="contact" required/>
          </div>
          <div class="item">
            <label for="address2">Aadhar Number<span>*</span></label>
            <input id="adhar" type="number"   name="aadhar" required/>
          </div>
           <div class="item">
            <label for="state">City<span>*</span></label>
            <input id="city" type="text"   name="city" required/>
          </div>
          <div class="item">
            <label for="zip">Zip/Postal Code<span>*</span></label>
            <input id="pincode" type="number" name="pincode" required/>
          </div>
          <div class="item">
            <label for="eaddress">Email Address<span>*</span></label>
            <input id="email" type="email"   name="email" required/>
          </div>
          <div class="item">
            <label for="phone">Gender<span>*</span></label>
            <input id="gender" type="text"  placeholder="Male/Female" name="gender" required/>
          </div>
<div class="item"> 


<label for="bloodgroup">Blood Group</label>

<select name="bloodgroup" id="bloodgroup">
  <option value="a">A</option>
  <option value="a+">A+</option>
  <option value="b">B</option>
  <option value="b+">B+</option>
</select> 


</div> 



        </div>
          <button type="submit" href="success.php">Submit</button>
          <!-- <button type="" href="logout.php">Log out</button> -->
        </div>
      </form>
    

    </div>
  </body>
</html>