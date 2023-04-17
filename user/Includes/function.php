<?php ob_start();
session_start();?>
<?php include '../Includes/db.php';

function updatetoemp(){
    global $connection;
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $course=$_POST['course'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $sql1="SELECT * FROM Employee WHERE (username='$username' OR email='$email' OR phone='$phone') AND username <> '$username';";
    $result1=mysqli_query($connection,$sql1);
    $row=mysqli_num_rows($result1);
    $sql3="SELECT * FROM Employee WHERE username='$username';";
    $result3=mysqli_query($connection,$sql3);
    $row1=mysqli_fetch_assoc($result3);
    // $hashFormat="$2y$10$";
    // $salt="iusesomestrings25";
    // $hashFormat_and_salt= $hashFormat.$salt;
    // $password=crypt($password,$hashFormat_and_salt);
        $hashFormat="$2y$10$";
        $salt="iamjayamakshay1115161718";
        $hash_and_salt=$hashFormat . $salt;
        $password=crypt($password,$hash_and_salt);
    // echo $password;
    // print_r($row1);
    // exit();
    if($row>0){
        return "<h2 class='bg-danger'>Username or Email or Phone is already exits</h2>";
    }
    else if($password==$row1['password']){
            $sql2="UPDATE `Employee` SET `firstname`='{$firstname}',`middlename`='{$middlename}',`lastname`='{$lastname}',`course`='{$course}',`gender`='{$gender}',`phone`='{$phone}',`email`='{$email}',`password`='{$password}',`address`='{$address}',`username`='{$username}' WHERE employee_id='{$_SESSION['employee_id']}';";
            mysqli_query($connection,$sql2);
            header("Location:../user");
    }
    else return "<h2 class='bg-danger'>
    Invalid Password</h2>";

}
function view($arr){
    foreach($arr as $arr){
        echo "<tbody>
        <tr>
            <td>{$arr['attendance_id']}</td>
            <td>{$arr['attendance_employee_id']}</td>
            <td>{$arr['attendance_date']}</td> 
            <td>{$arr['attendance_status']}</td>"?>
            <td><?php echo $arr['checkin_time'];?></td>
            <?php echo 
           "<td>{$arr['checkout_time']}</td>
           <td>{$arr['employee_username']}</td>
        </tr>
    </tbody>";
}
}  

function array_a($array1,$array2){
    $diff = array();

foreach ($array1 as $a1) {
    $found = false;
    foreach ($array2 as $a2) {
        if ($a1['id'] == $a2['id']) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $diff[] = $a1;
    }
}
return $diff;
}
?>
