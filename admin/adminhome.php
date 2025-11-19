<?php
require 'asset/admindb.php';

// $done=false;
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    $_SESSION['username']=$username;
    header('location: alogin.php');
    exit;
echo "hello admin";
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/table..css">
    <title>Admin Page</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <!-- <a href="adlogout.php">logout</a> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!--  Admin card-->

<div class="card text-center">
  <div class="card-header">
    <!-- Featured -->
  </div>
  <div class="card-body">
      
    <h1>Hello Admin</h1>
     
    <p class="card-text">Control Data From Hear</p>
    <a href="adlogout.php" class="btn btn-primary">Logout</a>
  </div>
  <div class="card-footer text-muted">
    Vaccine Ragistration Form Details Are Hear
  </div>
</div>


<!-- table is hear -->


<!-- php script -->











<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive" data-pattern="priority-columns">
        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
          <!-- <caption class="text-center">An example of a responsive table based on RWD-Table-Patterns' <a href="http://gergeo.se/RWD-Table-Patterns/" target="_blank"> solution</a>:</caption> -->
          <thead>
           
            <tr>
            
            <th data-priority="1">Sno.</th>
              <th data-priority="1">Name</th>
              <th data-priority="2">Age</th>
              <th data-priority="3">Contact</th>
              <th data-priority="4">Aadhar Number</th>
              
              <th data-priority="4">City</th>
              <th data-priority="4">Pincode</th>
              <th data-priority="4">Email</th>
              <th data-priority="4">Gender</th>
              <th data-priority="4">Blood-group</th>
            </tr>
          </thead>
          <tbody>


          <?php 
          $sql = "SELECT * FROM `ragistration`";
          $result = mysqli_query($con, $sql);

          while($row = mysqli_fetch_assoc($result)){

            echo "<tr>

            
            <td>". $row['sn'] . "</td>
            <td>". $row['name'] . "</td>
            <td>". $row['age'] . "</td> 
            <td>". $row['contact'] . "</td> 
            <td>". $row['aadhar'] . "</td> 
            <td>". $row['city'] . "</td> 
            <td>". $row['pincode'] . "</td> 
            <td>". $row['email'] . "</td> 
            <td>". $row['gender'] . "</td> 
            <td>". $row['bloodgroup'] . "</td> 
            </tr>";

          }

          ?>

  
          
          </tfoot>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>






  </body>
</html>