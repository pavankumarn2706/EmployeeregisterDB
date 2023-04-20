<?php include "../Includes/db.php";

session_start();
$emp_id =$_SESSION['employee_id'];
$prefix = "2706".$_POST['grandtotal'];
$random_number = uniqid($prefix);
if(isset($_POST)){
foreach($_POST['items'] as $key => $post){
    $item = $post;  
    $quantity = $_POST['quantities'][$key];
    $rate = $_POST['rates'][$key];
    $discount = $_POST['discounts'][$key];
    $total = $_POST['totals'][$key];
    $query = "INSERT INTO `calculater`(`id`, `grand_id`, `items`, `quantity`, `rate`, `discount`, `total`) VALUES (NULL,'$random_number','$item','$quantity','$rate','$discount','$total');";
    mysqli_query($connection,$query);
}
$query1 = "INSERT INTO `grandtotal`(`id`, `emp_id`, `grandtotal`) VALUES ('{$random_number}','{$emp_id}','{$_POST['grandtotal']}')";
mysqli_query($connection,$query1);
echo "Successfully";
}
else {
    echo "Error";
}
?>