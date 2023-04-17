<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Employee Search</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body class="bg-info">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="autocomplete.php">Search</a>
      </li>  
    </ul>
  </div>  
</nav>
  <div class="container">
    <div class="row mt-4">
        
      <div class="col-md-8 mx-auto bg-light rounded p-4">
        <h5 class="text-center font-weight-bold">Employee Search</h5>
        <hr class="my-1">
        <h5 class="text-center text-secondary">Search with Email</h5>
        <form action="autocomplete.php" method="post" class="p-3">
          <div class="input-group">
            <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Search..." autocomplete="off" required>
            <div class="input-group-append">
              <input type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-0">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
        <div class="list-group" id="show-list">
          <!-- Here autocomplete list will be display -->
        </div>
      </div>
    </div><br>
    <?php include "Includes/db.php";
  if(isset($_POST['submit'])){
    $email = $_POST['search'];
    $query3 = "SELECT * FROM Employee WHERE email = '{$email}'";
    $res1 = mysqli_query($connection,$query3);
    if(mysqli_num_rows($res1)){
        $row1 = mysqli_fetch_assoc($res1);
        ?>
      <div class="">
                <table class="table-bordered">
                    <thead class="table">
                    <tr>
                    <th>Employee id</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Course</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Username</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td><input type="text" class="form-control" value="<?php echo $row1['employee_id']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['firstname']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['middlename']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['lastname']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['course']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['gender']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['phone']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['email']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['address']?>"></td>
                    <td><input type="text" class="form-control" value="<?php echo $row1['username']?>"></td>
                    </tr>
                    </tbody>
                </table>
              </div>
        <?php
    }
}

  ?>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/script1.js"></script>
</body>

</html>