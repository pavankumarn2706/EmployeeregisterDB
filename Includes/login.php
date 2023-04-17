<?php ob_start();
session_start();
include "./db.php";
// if(isset($_POST['login'])){
    function Checklogin(){
        global $connection;

    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username && $password){
        $username=mysqli_real_escape_string($connection,$username);
        $password=mysqli_real_escape_string($connection,$password);
        $query="SELECT * FROM Employee WHERE username='{$username}';";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result)){
            $employee_id=$row['employee_id'];
            $firstname=$row['firstname'];
            $middlename=$row['middlename'];
            $lastname=$row['lastname'];
            $course=$row['course'];
            $gender=$row['gender'];
            $phone=$row['phone'];
            $email=$row['email'];
            $db_password=$row['password'];
            $address=$row['address'];
            $db_username=$row['username'];
        }
        echo $row['email'];
        $hashFormat="$2y$10$";
        $salt="iamjayamakshay1115161718";
        $hash_and_salt=$hashFormat . $salt;
        $password=crypt($password,$hash_and_salt);
        if($password===$db_password){

            $_SESSION['employee_id']=$employee_id;
            $_SESSION['firstname']=$firstname;
            $_SESSION['middlename']=$middlename;
            $_SESSION['lastname']=$lastname;
            $_SESSION['course']=$course;
            $_SESSION['gender']=$gender;
            $_SESSION['phone']=$phone;
            $_SESSION['email']=$email;
            $_SESSION['address']=$address;
            $_SESSION['username']=$username;
            return "Login Successfully";
        }
        else return "Invalid Password";
    }
}
?>
