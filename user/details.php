<!-- Header -->
<?php include 'Includes/header.php';
session_start();?>
<link rel="stylesheet" href="css/style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Datepicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Datepicker JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<body>

<!-- Navigation -->
<div class="container">
<?php include 'Includes/navigation.php'?>
<form id="myForm2" action="Includes/insert.php" class="form-group" method="post">
    <h3 class="form-group">Education Details</h3>
    <span id="test"><?php echo "<h3>{$_SESSION["firstname"]}</h3>"?></span>
    <div class="sub">
<?php include 'Includes/db.php';
$emp_id=$_SESSION['employee_id'];
$sql3 = "SELECT * FROM Emp_education WHERE emp_id={$emp_id};";
$result3 = mysqli_query($connection,$sql3);
$numberofcount=mysqli_num_rows($result3);
if($numberofcount){
while($row=mysqli_fetch_assoc($result3)){
    $res[]=$row;    
}
foreach($res as $key => $re){
    echo "<div id='edu{$key}' class='well'>
    <div class='input-group' id='1'>
        <label for='text'>Degree:</label>
        <select name='degree[]' id='degree{$re['id']}'>
            <option value='{$re["degree"]}'>";?><?php echo $re["degree"]."</option>
            <option value=''>No Select</option>
            <option value='10th'>10th</option>
            <option value='+2'>+2</option>
            <option value='Bachelor's'>Bachelor's</option>
        </select>
    </div><br>
    <div class='input-group' id='2'>
        <label for='text'>Name Of Institution:</label>
        <input type='text' name='institution[]' id='institution{$re['id']}' value='{$re["institution"]}'>
    </div><br>
    <div class='input-group' id='3'>
        <label for='text'>Course:</label>
        <input type='text' name='course[]' id='course{$re['id']}' value ='{$re["course"]}'>
    </div><br>
    <div class='input-group' id='4'>
        <label for='date'>From Date:</label>
        <input class='fromDate' type='text' id='fromDate{$re['id']}' name='fromDate[]' value ='{$re["fromDate"]}'>
        <label for='date'> To Date:</label>
        <input class='toDate' type='text' id='toDate{$re['id']}' name='toDate[]' value ='{$re["toDate"]}'>
        <input class='present' type='checkbox' name='present'>
        <b>Present</b>
    </div>
    <input type='text' name='id[]' id='{$re['id']}' value='{$re["id"]}' hidden>
    <button id = 'pluse' class='btn btn-primary'>+</button>
    <button id = 'remove' class='btn btn-danger'>x</button>
</div>";
}
} else {
?>    
    <div id='edu0' class='well'>
    <div class='input-group' id='1'>
        <label for='text'>Degree:</label>
        <select name='degree[]' id='degree0'>
            <option value=''>No Select</option>
            <option value='10th'>10th</option>
            <option value='+2'>+2</option>
            <option value="Bachelor">Bachelor's</option>
        </select>
    </div><br>
    <div class='input-group' id='2'>
        <label for='text'>Name Of Institution:</label>
        <input type='text' name='institution[]' id='institution0' value=''>
    </div><br>
    <div class='input-group' id='3'>
        <label for='text'>Course:</label>
        <input type='text' name='course[]' id='course0' value =''>
    </div><br>
    <div class='input-group' id='4'>
        <label for='date'>From Date:</label>
        <input class='fromDate' type='text'id='fromDate0' name='fromDate[]' value =''>
        <label for='date'> To Date:</label>
        <input class='toDate' type='text' id='toDate0' name='toDate[]' value =''>
        <input class='present' type='checkbox' name='present'>
        <b>Present</b>
    </div>
    <input type='text' name='id[]' id='id0' value='"0"' hidden>
    <button id = 'pluse' class='btn btn-primary'>+</button>
    <!-- <button id = 'remove' class='btn btn-danger'>x</button> -->
</div>
    <?php } ?>
</div>
<input class="btn btn-info" type="submit" value="save" name="save1">
</form>
<form id="myForm3" action="Includes/insert.php" class="form-group" method="post">
<h3 class="form-group">Experience Details</h3>
<div class="sub1">
    <?php 
    $sql4 = "SELECT * FROM Emp_exp WHERE emp_id={$emp_id};";
    $result4 = mysqli_query($connection,$sql4);
    if(mysqli_num_rows($result4)){
    while($row1=mysqli_fetch_assoc($result4)){
        $res1[]=$row1;    
    }
    // print_r($res);
    // print_r($res1);

    foreach($res1 as $re1){
        // print_r($re1);
        echo "    <div id = 'exp0' class='well'>
        <div class='input-group' id='1'>
            <label for='text'>Role:</label>
            <input type='text' name='role[]' id='role' value='{$re1["role"]}'>
        </div><br>
        <div class='input-group' id='2'>
            <label for='text'>Company Name</label>
            <input type='text' name='companyName[]' id='companyName' value='{$re1["companyName"]}'>
        </div><br>
        <div class='input-group'id='3'>
            <label for='text'>Description:</label>
            <input type='text' name='description[]' id='description' value='{$re1["description"]}'>
        </div><br>
        <div class='input-group' id='4'>
            <label for='date'>From Date:</label>
            <input class='fromDate' type='text' id='fromDate' name='fromDate[]' value='{$re1["fromDate"]}'>
            <label for='date'> To Date:</label>
            <input class='toDate' type='text' id='toDate' name='toDate[]' value='{$re1["toDate"]}'>
            <input class='present' type='checkbox' name='present' id='present'>
            <b>Present</b>
        </div>
        <input type='text' name='id[]' id='hid' value='{$re1["id"]}' hidden>
        <button id = 'add' class='btn btn-primary1'>+</button>
        <button id ='delete' class='btn btn-danger'>x</button>
    </div>";

    }
} else {
    ?>
    <div id = "exp0" class="well">
        <div class="input-group" id="1">
            <label for="text">Role:</label>
            <input type="text" name="role[]" id="role">
        </div><br>
        <div class="input-group" id="2">
            <label for="text">Company Name</label>
            <input type="text" name="companyName[]" id="companyName">
        </div><br>
        <div class="input-group"id="3">
            <label for="text">Description:</label>
            <input type="text" name="description[]" id="description">
        </div><br>
        <div class="input-group" id="4">
            <label for="date">From Date:</label>
            <input class='fromDate' type="text" id="fromDate" name="fromDate[]">
            <label for="date"> To Date:</label>
            <input class='toDate' type="text" id="toDate" name="toDate[]">
            <input class="present" type="checkbox" name="present" id="present">
            <b>Present</b>
        </div>
        <input type="text" name="id[]" id="hid" value='12'hidden>
        <button id = "add" class="btn btn-primary1">+</button>
        <!-- <button id ="delete" class="btn btn-danger">x</button> -->
    </div>
<?php } ?>
</div>
    <input class="btn btn-info" type="submit" value="save" name="save2">
    </form>

<hr>
<?php //include 'Includes/footer.php';?>  
</form>
</div>
</div>
</div>
<!-- jQuery -->
<!-- <script src="js/jquery.js"></script> -->

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>  
<script src="js/clone.js"></script>
<!-- <script>
    $(document).ready(function(){
    $('.datepicker').datepicker
});
</script> -->
</html>
