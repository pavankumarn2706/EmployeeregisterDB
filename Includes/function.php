<?php ob_start();?>
<?php include '../Includes/db.php';

function instertoemployee()
{
    global $connection;
// assigining values from form to virables
    $username= (isset($_POST['username'])?  $_POST['username']:"");
    $firstname=(isset($_POST['firstname'])?  $_POST['firstname']:"");
    $middlename=(isset($_POST['middlename'])?  $_POST['middlename']:"");
    $lastname=(isset($_POST['lastname'])?  $_POST['lastname']:"");
    $course=(isset($_POST['course'])?  $_POST['course']:"");
    $gender=(isset($_POST['gender'])?  $_POST['gender']:"");
    $phone=(isset($_POST['phone'])?  $_POST['phone']:"");
    $email=(isset($_POST['email'])?  $_POST['email']:"");
    $password=(isset($_POST['password'])?  $_POST['password']:"");
    $repassword=(isset($_POST['repassword'])?  $_POST['repassword']:"");
    $address=(isset($_POST['address'])?  $_POST['address']:"");

// selecting Data from DB to compare value in form  and DB    
    // $sql1="SELECT * FROM Employee;";
    // $result1=mysqli_query($connection,$sql1);
    // while($row=mysqli_fetch_assoc($result1)){
    //     $db_email=$row['email'];
    //     $db_phone=$row['phone'];
    //     $db_username=$row['username'];
    //     if($email==$db_email || $phone==$db_phone || $username==$db_username){
    //         $x = "<h3 class='bg-danger' >Username or Email or Phone already exists</h3>";
    //         return $x;
    //     }
    // }
    $sql1="SELECT * FROM Employee WHERE (username='$username' OR email='$email' OR phone='$phone');";
    $result1=mysqli_query($connection,$sql1);
    $row=mysqli_num_rows($result1);
    if($row>0){
        return "Username or Email or Phone already exists";
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
        }else{
        $x2="Register Succesfully";
        return $x2;
            }    }
    else 
        return ("Password & Re-type Password Does not Match");

// else return ("<h3 class='bg-danger' >No field can be Empty</h3>");

}
?>
