<!-- Header -->
<?php include 'Includes/header.php'?>
<body>
<!-- Navigation -->
<div class="container">
<?php include 'Includes/navigation.php'?>
<div class="well">
        <h4>Login</h4>
        <!-- form -->
        <form action="Includes/login.php" method="post">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username"><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="myInput" class="form-control"placeholder='Enter password'><br><br>
            <input type="checkbox" onclick="myFunction()">Show Password
            <br>      
            <input name="login"class="btn btn-primary" type="submit" value='Login'>
                    <!-- <span class="glyphicon glyphicon-search"></span> -->

        </div>
        </form>
        <!-- /.input-group -->
    </div>
    </div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
  // myFunction to showpassword
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>  
</html>