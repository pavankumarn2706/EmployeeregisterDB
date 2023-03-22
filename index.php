<!-- Header -->
<?php include 'Includes/header.php'?>

<body>
<!-- Navigation -->
<div class="container">
<?php include 'Includes/navigation.php'?>
<?php include 'Includes/db.php';
include 'Includes/function.php';
// Inserting data to Employee

if(isset($_POST['register'])){
    echo instertoemployee();
}
?>

<!-- Employee Register form -->
<h1>Employee Registration Form</h1>
<div class="col-xs-6">
<form action="index.php" method="post">
<div class="form-group">
    <!-- username -->
<label> Username: </label>       
<input type="text" name="username"  required/> <br> <br>
    <!-- firstname -->
<label> Firstname: </label>       
<input type="text" name="firstname" title="Must start with uppercase" required/> <br> <br>
<label> Middlename: </label>   
<input type="text" name="middlename" /> <br> <br>
<label> Lastname: </label>       
<input type="text" name="lastname" required/> <br> <br>
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

<label> 
Phone :
</label>
<input type="text" name="country code"  value="+91" size="2"/> 
<input type="text" name="phone" size="10"/> <br> <br>
<label for="address">Address</label>
<br>
<textarea cols="80" rows="5" value="address" name="address">
</textarea>  
<br> <br>
<label for="address">Email: </label> 
<input type="email" id="email" name="email" required/> <br>    
<br> <br>  
<label for="address">Password: </label> 
<input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br> <br>  
<label for="address">Re-type Password: </label> 
<input type="password" id="psw" name="repassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br> <br>  

<input class='btn btn-primary' type="submit" value="Register" name="register"/>
<hr>
<?php //include 'Includes/footer.php';?>  
</form>
</div>
</div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<script>
    
</script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>  
</html>

