
<?php


$servername="localhost";
$username="root";
$password="";
$database="vaccine";

$showmassage=false;
$no=false;

$con= mysqli_connect($servername, $username, $password, $database);

if($con){
    // echo "database connected successfully";
}

if(!$con){
    echo "database not connected";
}

// checkinmg

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $pin= $_POST["pin"];
  

  $sql = "Select * from zipcode where pin = '$pin'";

  $result=mysqli_query($con, $sql);

  $num=mysqli_num_rows($result);
if($num==1){
  // $responce=true;
  // echo "yes";
  $showmassage=true;
  // echo "yes";
}
else{
  // echo "no you cant";
  $no=true;
}
}

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Zip check</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- <style> -->
      <link rel="stylesheet" href="css/form.css">
  </head>


  <script>
<?php
if($showmassage==true){
echo "alert('Yes You are able to take vaccine at your pincode')";
}
?>
</script>

<script>
<?php
if($no==true){
echo "alert('No, You are able to take vaccine at your pincode')";
}
?>
</script>

</script>
<body>

<div class="testbox">
      <form action="zipcheck.php" method="post">
        <div class="banner">
          <!-- <img src="yaa.jpg" height="100%" width="100%"> -->
          <h1>Zip check</h1>
        </div>
        <div class="colums">
          <div class="item">
            <label for="fname">Enter zip<span>*</span></label>
            <input id="pin" type="number" name="pin"  required/>
          </div>
    



            <button type="submit" href="">Submit</button>

            <script>


        </div>
        </div>
      </form>
    </div>
  </body>
</html>
