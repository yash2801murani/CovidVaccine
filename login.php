<?php

require 'database/dbconnect.php';
$login=true;
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $name= $_POST["name"];
  
  $password= $_POST["password"];

  $sql = "Select * from vaccine where name = '$name' AND password='$password'";

  $result=mysqli_query($con, $sql);

  $num=mysqli_num_rows($result);
if($num==1){
  // $login=true;
session_start();
$_SESSION['login']=true;
$_SESSION['name']=$name;

$massage=false;
header("location:form.php");

// header("location : form.php");

}
else{
  // $massage=true;
  $login=false;
}
}

?>




<!DOCTYPE html>
<html>
  <head>
    <title>Login to your account</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- <style> -->
      <link rel="stylesheet" href="css/form.css">
  </head>
<script>
<?php
if($login==false){
echo "alert('your id or password is wrong')";
}
?>
</script>



<body>
    <div class="testbox">
      <form action="login.php" method="post">
        <div class="banner">
          <!-- <img src="yaa.jpg" height="100%" width="100%"> -->
          <h1>Login Your Id</h1>
        </div>
        <div class="colums">
          <div class="item">
            <label for="fname">Name<span>*</span></label>
            <input id="name" type="text" name="name"  required/>
          </div>
          <div class="item">
            <label for="lname"> Password<span>*</span></label>
            <input id="password" type="password" name="password" required/>

            <button type="submit" href="">Submit</button>

        </div>
        </div>
      </form>
    </div>
  </body>
</html>
