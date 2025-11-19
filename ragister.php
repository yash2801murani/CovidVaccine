
<?php
include 'database/dbconnect.php';



$signup=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

  $name=$_POST["name"];
  $age=$_POST["age"];
  $mobile=$_POST["mobile"];
  $aadhar=$_POST["aadhar"];
  $password=$_POST["password"];

$sql="INSERT INTO `vaccine` (`sno`, `name`, `age`, `mobile`, `aadhar`, `password`) VALUES (NULL, '$name', '$age', '$mobile', '$aadhar', '$password');";
  

$result=mysqli_query($con, $sql);
if($result){
  $signup=true;
  // echo "success";
  // header("location:login.php");
}

if($signup=true){
  header("location:ragister success.php");
}
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Corona virus id ragistration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- <style> -->
      <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    <div class="testbox">
      <form action="ragister.php" method="post">
        <div class="banner">
          <!-- <img src="yaa.jpg" height="100%" width="100%"> -->
          <h1>Corona Vaccine ID Ragistration</h1>
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
            <label for="address1">Mobile<span>*</span></label>
            <input id="mobile" type="number"   name="mobile" required/>
          </div>
          <div class="item">
            <label for="address2">Aadhar Number<span>*</span></label>
            <input id="adhar" type="number"   name="aadhar" required/>
          </div>

          <div class="item">
            <label for="address2">Password<span>*</span></label>
            <input id="password" type="password"   name="password" required/>
          </div>

        </div>
          <button type="submit" href="">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>