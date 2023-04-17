<?php ob_start();
 session_start();?>
<?php include '../Includes/db.php';
$emp_id=$_SESSION['employee_id'];
$query2 = "SELECT * FROM Emp_exp WHERE emp_id={$emp_id};";
$result2 = mysqli_query($connection,$query2);
while($row3=mysqli_fetch_assoc($result2)){
    $res1[]=$row3;    
}
$newArray = array();
foreach ($_POST["role"] as $key => $value) {
    $newArray[] = array(
        "role" => (isset($_POST["role"][$key]) ? $_POST["role"][$key]:""),
        "companyName" => (isset($_POST["companyName"][$key])? $_POST["companyName"][$key]:""),
        "description" => (isset($_POST["description"][$key])? $_POST["description"][$key] : ""),
        "fromDate" => (isset($_POST["fromDate"][$key]) ? $_POST["fromDate"][$key] : ""),
        "toDate" => (isset($_POST["toDate"][$key])? $_POST["toDate"][$key]:""),
        "emp_id" => (isset($emp_id) ? $emp_id : ""),
        "id" => (isset($_POST["id"][$key]) ? $_POST["id"][$key] :"")
    );
}
if(mysqli_num_rows($result2) == 0){
    foreach($newArray as $data){
        $role=$data['role'];
        $companyName=$data['companyName'];
        $description=$data['description'];
        $fromDate=$data['fromDate'];
        $toDate=$data['toDate'];
        $query3 ="INSERT INTO `Emp_exp`(`role`, `companyName`, `description`, `fromDate`, `toDate`, `emp_id`, `id`) VALUES ('{$role}','{$companyName}','{$description}','{$fromDate}','{$toDate}','{$emp_id}',NULL);";
        mysqli_query($connection,$query3);
}
echo "Inserted Successfully";
}
else {
if(count($newArray)){
    $delete=A_B($res1,$newArray);
    $insert=A_B($newArray,$res1);
    $update=A_B($newArray,$insert);
    if(isset($delete)){
    foreach($delete as $del){
        $query3 = "DELETE FROM `Emp_exp` WHERE `id`='{$del['id']}';";
        mysqli_query($connection,$query3);
    }
}
if(isset($update)){
    foreach($update as $up){
        $sql6 = "UPDATE `Emp_exp` SET `role`='{$up['role']}',`companyName`='{$up['companyName']}',`description`='{$up['description']}',`fromDate`='{$up['fromDate']}',`toDate`='{$up['toDate']}',`emp_id`='{$emp_id}' WHERE `id`='{$up['id']}';";
        mysqli_query($connection,$sql6);
    }
}
if(isset($insert)){
    foreach($insert as $data){
        $role=$data['role'];
        $companyName=$data['companyName'];
        $description=$data['description'];
        $fromDate=$data['fromDate'];
        $toDate=$data['toDate'];
        $query4 ="INSERT INTO `Emp_exp`(`role`, `companyName`, `description`, `fromDate`, `toDate`, `emp_id`, `id`) VALUES ('{$role}','{$companyName}','{$description}','{$fromDate}','{$toDate}','{$emp_id}',NULL);";
        mysqli_query($connection,$query4);
}
}
    echo "Update Successfully";
}
else {
    if(isset($res1)){
        foreach($res1 as $re){
    $sql5 = "DELETE FROM `Emp_exp` WHERE `id`='{$re['id']}';";
    $result5 = mysqli_query($connection,$sql5);   
}
}
}
}

function A_B($array1,$array2){
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