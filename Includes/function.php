<?php ob_start();?>
<?php include '../Includes/db.php';

function instertoemployee()
{
    global $connection;
// assigining values from form to virables
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $course=$_POST['course'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $address=$_POST['address'];

// selecting Data from DB to compare value in form  and DB    
    $sql1="SELECT * FROM Employee;";
    $result1=mysqli_query($connection,$sql1);
    while($row=mysqli_fetch_assoc($result1)){
        $db_email=$row['email'];
        $db_phone=$row['phone'];
        $db_username=$row['username'];
        if($email==$db_email || $phone==$db_phone || $username==$db_username){
            $x = "<h3 class='bg-danger' >Username or Email or Phone already exists</h3>";
            return $x;
        }
    }
    // comparing password and repassword
    if($password===$repassword)
    {
        // hashing the password
        $hashFormat="$2y$10$";
        $salt="iamjayamakshay1115161718";
        $hash_and_salt=$hashFormat . $salt;
        $password=crypt($password,$hash_and_salt);
        // inserting query
        $sql2="INSERT INTO `Employee` (`employee_id`, `firstname`, `middlename`, `lastname`, `course`, `gender`, `phone`, `email`, `password`, `address`, `username`) VALUES (NULL, '$firstname', '$middlename', 
        '$lastname', '$course', '$gender', '$phone', '$email', '$password', '$address', '$username')";
        $result2 = mysqli_query($connection,$sql2);
        if(!$result2){
            die("Query Failed".mysqli_error($connection));
        }
        $x2="<h3 class='bg-success' >Register Succesfully <a href='login.php'>Login</a></h3>";
        return $x2;
    }
    else 
        return ("<h3 class='bg-danger' >Password & Re-type Password Does not Match</h3>");

// else return ("<h3 class='bg-danger' >No field can be Empty</h3>");

}
?>
