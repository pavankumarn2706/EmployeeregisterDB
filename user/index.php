<?php session_start();
include "Includes/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
</style>
</head>
<body>
  <!-- navigation bar -->
<ul>
  <li><a class="active" href="">Home</a></li>
  <li><a href="edit.php">Edit</a></li>
  <li><a href="attendance.php">Attendance</a></li>
  <li><a href="view.php">Attendance View</a></li>
</ul>
  <!-- /navigation bar -->
  <?php 
  $id=$_SESSION['employee_id'];
  $sql6="SELECT * FROM `Employee` WHERE `employee_id`='{$id}';";
  $result6=mysqli_query($connection,$sql6);
  $row2=mysqli_fetch_assoc($result6);
  // print_r($row2)
  ?>

<!-- User DashBoard -->
<h2 style="text-align:center">User DashBoard</h2>
<h1 style="text-align:center">Welcome <?php echo $row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'];?></h1>
<div class="card">
  <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%"> -->
  <h1></h1>
  <p class="title">
    <label for="">Course:</label>
    <?php echo $row2['course'];?></p>
    <p class="title">
    <label for="">Gender:</label>
    <?php echo $row2['gender'];?></p>
  <p><?php echo $row2['address'];?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i><?php echo $row2['email'];?></a> 
    <!-- <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>   -->
 <br>   <a href="#"><i class="fa fa-phone"></i><?php echo $row2['phone'];?></a> 
  </div>
  <p><a href="signout.php">Sign Out</a></p>
</div>
<!-- /User DashBoard -->

</body>
</html>
