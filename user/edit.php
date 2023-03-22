<!-- Header -->
<?php include 'Includes/header.php';
session_start();?>

<body>
<!-- Navigation -->
<div class="container">
<?php include 'Includes/navigation.php'?>
<?php include 'Includes/db.php';
include 'Includes/function.php';
// Inserting data to Employee

if(isset($_POST['update'])){
    echo updatetoemp();
}
?>
<h1><?php echo "WELCOME ".$_SESSION['firstname']." ".$_SESSION['middlename'].' '.$_SESSION['lastname'];?></h2>
<?php
$sql4="SELECT * FROM Employee WHERE employee_id={$_SESSION['employee_id']};";
$result4=mysqli_query($connection,$sql4);
$row=mysqli_fetch_assoc($result4);
?>
<!-- Edit Details -->
<h2>Edit Details</h2>
<div class="col-xs-6">
<form action="edit.php" method="post">
<div class="form-group">
    <!-- username -->
<label> Username: </label>       
<input type="text" name="username" value="<?php echo $row['username']?>" required/> <br> <br>
    <!-- firstname -->
<label> Firstname: </label>       
<input type="text" name="firstname" title="Must start with uppercase" value="<?php echo $row['firstname']?>"required/> <br> <br>
<!-- middlename  -->
<label> Middlename: </label>   
<input type="text" name="middlename" value="<?php echo $row['middlename']?>"/> <br> <br>
<!-- lastname -->
<label> Lastname: </label>       
<input type="text" name="lastname" value="<?php echo $row['lastname']?>"required/> <br> <br>
<!-- course -->
<label> 
Course :
</label> 
<select name="course" id="" class="form-control-file" required>
<option value="">Course</option>
<option value="BCA">BCA</option>
<option value="BBA">BBA</option>
<option value="B.Tech">B.Tech</option>
<option value="MBA">MBA</option>
<option value="MCA">MCA</option>
<option value="M.Tech">M.Tech</option>
</select>

<br>
<br>
<!-- genger -->
<label> 
Gender :
</label>
<select name="gender" id="" class="form-control-file" required>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
<br>
<br>
<!-- phone -->
<label> 
Phone :
</label>
<input type="text" name="country code"  value="+91" size="2"/> 
<input type="text" name="phone" size="10" value="<?php echo $row['phone']?>"/> <br> <br>
<!-- address -->
<label for="address">Address</label>
<br>
<textarea cols="80" rows="5" value="address" name="address"><?php echo $row['address']?>
</textarea>  
<br> <br>
<!-- email -->
<label for="address">Email: </label> 
<input type="email" id="email" name="email" value="<?php echo $row['email']?>"required/> <br>    
<br> <br> 
<!-- password  -->
<label for="address">Password: </label> 
<input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br> <br>  
<input class='btn btn-primary' type="submit" value="Update" name="update"/>
<hr>
<?php //include 'Includes/footer.php';?>  
</form>
</div>
</div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>  
</html>

