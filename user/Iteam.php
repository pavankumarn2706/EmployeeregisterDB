<?php session_start();
include "Includes/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/blog-home.css" rel="stylesheet">

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
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="edit.php">Edit</a></li>
  <li><a href="attendance.php">Attendance</a></li>
  <li><a href="view.php">Attendance View</a></li>
  <li><a href="details.php">Employee Details</a></li>
  <li><a href="Iteam.php">Rate and Discount</a></li>
</ul>
<div class="well">
<table class="table">
    <thead>
        <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Discount</th>
        <th>Total</th>
        <th>Add</th>
        <th>Remove</th>
        </tr>
    </thead>
    <tbody id="tbody" class="tbody">
    <form action="Iteam.php" method="post" class="form-control" id="form-control">
        <tr id="tr">
            <td><select name='item[]'class='item'id='item'>
            <option value=''>No Select</option>
            <option value='item1'>item1</option>
            <option value='item2'>item2</option>
            <option value='item3'>item3</option>
            <option value='item4'>item4</option>
            <option value='item5'>item5</option>
        </select></td>
            <td><input type="number" name="quantity[]" id="quantity" class = "quantity"></td>
            <td><input type="number" name="rate[]" id="rate" class = "rate"></td>
            <td><input type="number" name="discount[]" id="discount" class = "discount"></td>
            <td><input type="number" name="total[]" id="total" class = "total" readonly></td>
            <td><button id = 'pluse' class='btn btn-primary'>+</button></td>
            <td><button id = 'remove' class='btn btn-danger' disabled>x</button></td>
        </tr>
    </tbody>
</table>
<div class='grandtotaldiv'>
    <p>Grand Total:</p>
    <input type="number" class="grandtotal" id="grandtotal" name="grandtotal" readonly>
</div>
</div>
<input type="submit" value="submit" name="submit">
</form>
<script src="js/next.js"></script>