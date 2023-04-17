<?php ob_start();?>
<?php include '../Includes/db.php';
include '../Includes/function.php';
include '../Includes/login.php';
if(isset($_POST['submit'])){
    switch($_POST['submit']) {
        case "employee-registration-form-submit":
            echo instertoemployee(); // Inserting data to Employee
            break;
        case "employee-login":
            echo Checklogin(); // checking for login Data
            break;
    }

}


?>