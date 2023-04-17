<?php ob_start();?>
<?php session_start();
$_SESSION['employee_id']=null;
$_SESSION['firstname']=null;
$_SESSION['middlename']=null;
$_SESSION['lastname']=null;
$_SESSION['course']=null;
$_SESSION['gender']=null;
$_SESSION['phone']=null;
$_SESSION['email']=null;
$_SESSION['address']=null;
$_SESSION['username']=null;
header("Location:../index.php");
?>