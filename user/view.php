<?php session_start();
include "Includes/db.php";
include "Includes/function.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Attendance Record</title>
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
      body {
        font-family: Arial, sans-serif;
      }
      
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      
      th {
        background-color: #f2f2f2;
      }
      
      tr:hover {
        background-color: #f5f5f5;
      }
      
      .present {
        color: green;
      }
      
      .absent {
        color: red;
      }
    </style>
  </head>
  <body>
      <!-- navigation bar -->
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="edit.php">Edit</a></li>
  <li><a href="attendance.php">Attendance</a></li>
  <li><a href="view.php">Attendance View</a></li>
</ul>
  <!-- /navigation bar -->
    <table>
      <thead>
        <tr>
          <th>Attendance ID</th>
          <th>Employee ID</th>
          <th>Date</th>
          <th>Status</th>
          <th>Check-In Time</th>
          <th>Check-Out Time</th>
          <th>Username</th>
        </tr>
      </thead>

        <?php 
        $sql9="SELECT * FROM Attendance WHERE employee_username='{$_SESSION['username']}';";
        $result9=mysqli_query($connection,$sql9);
        $res=array();
        while($row6=mysqli_fetch_assoc($result9)){
            $res[]=$row6;
        }
        view($res);
        ?>
        <!-- Add more rows as necessary -->
    </table>
  </body>
</html>
