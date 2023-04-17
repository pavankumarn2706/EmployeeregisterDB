<?php ob_start();
 session_start();?>
<?php include '../Includes/db.php';
$emp_id=$_SESSION['employee_id'];
$sql3 = "SELECT * FROM Emp_education WHERE emp_id={$emp_id};";
$result3 = mysqli_query($connection,$sql3);
while($row=mysqli_fetch_assoc($result3)){
    $res[]=$row;    
}
$newData = array();
foreach ($_POST['id'] as $key => $value) {
    $newData[$key] = array(
        'id' => (isset($value)) ? $value : "",
        'degree' => (isset($_POST['degree'][$key])) ? $_POST['degree'][$key] : "",
        'institution' => (isset($_POST['institution'][$key])) ? $_POST['institution'][$key] : "",
        'course' => (isset($_POST['course'][$key])) ? $_POST['course'][$key] : "",
        'fromDate' => (isset($_POST['fromDate'][$key])) ? $_POST['fromDate'][$key] : "",
        'toDate' => (isset($_POST['toDate'][$key]) ? $_POST['toDate'][$key] : ""),
        'emp_id' => $emp_id
    );
}

if(mysqli_num_rows($result3) == 0){
    foreach($newData as $data){
        $degree=$data['degree'];
        $institution=$data['institution'];
        $course=$data['course'];
        $from=$data['fromDate'];
        $to=$data['toDate'];
        $query = "INSERT INTO `Emp_education` (`id`, `degree`, `institution`, `course`, `fromDate`, `toDate`, `emp_id`) VALUES (NULL, '{$degree}', '{$institution}', '{$course}', '{$from}', '{$to}', '{$emp_id}');";
        mysqli_query($connection,$query);
}
echo "Inserted Successfully";
} 
else {
if(count($newData)){
    $delete=A_B($res,$newData);
    $insert=A_B($newData,$res);
    $update=A_B($newData,$insert);
    if(isset($delete)){
    foreach($delete as $del){
        $sql5 = "DELETE FROM `Emp_education` WHERE `id`='{$del['id']}';";
        $result5 = mysqli_query($connection,$sql5);
    }
}
if(isset($update)){
    foreach($update as $up){
        $sql6 = "UPDATE `Emp_education` SET `degree`='{$up['degree']}',`institution`='{$up['institution']}',`course`='{$up['course']}',`fromDate`='{$up['fromDate']}',`toDate`='{$up['toDate']}',`emp_id`='{$emp_id}' WHERE `id`='{$up['id']}';";
        $result6 = mysqli_query($connection,$sql6);
    }
}
if(isset($insert)){
    foreach($insert as $data){
        $degree=$data['degree'];
        $institution=$data['institution'];
        $course=$data['course'];
        $from=$data['fromDate'];
        $to=$data['toDate'];
        $query = "INSERT INTO `Emp_education` (`id`, `degree`, `institution`, `course`, `fromDate`, `toDate`, `emp_id`) VALUES (NULL, '{$degree}', '{$institution}', '{$course}', '{$from}', '{$to}', '{$emp_id}');";
        mysqli_query($connection,$query);
}
}
    echo "Update Successfully";
}
else {
    if(isset($res)){
        foreach($res as $re){
    $sql5 = "DELETE FROM `Emp_education` WHERE `id`='{$re['id']}';";
    $result5 = mysqli_query($connection,$sql5);   
    echo "Updated Successfully";
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