<!-- Header -->
<?php include 'Includes/header.php';
session_start();?>

<body>


<!DOCTYPE html>
<html>
<head>
<title>Employee Attendance</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			padding: 20px;
		}
		form {
			background-color: #fff;
			border-radius: 5px;
			padding: 20px;
		}
		label {
			display: inline-block;
			margin-bottom: 10px;
		}
		input[type="text"], input[type="date"], input[type="number"] {
			display: block;
			margin-bottom: 10px;
			padding: 5px;
			border-radius: 3px;
			border: 1px solid #ccc;
			width: 100%;
			box-sizing: border-box;
			font-size: 16px;
			font-family: Arial, sans-serif;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
			font-family: Arial, sans-serif;
			margin-top: 10px;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
    <!-- Navigation -->
<div class="container">
<?php include 'Includes/navigation.php'?><br>

<!-- employee attendance -->

	<h1>Employee Attendance</h1>
	<?php include "Includes/db.php";
	
	// select query to display user details from db

    $sql5="SELECT * FROM Employee WHERE employee_id='{$_SESSION['employee_id']}';";
    $result5=mysqli_query($connection,$sql5);
    $row3 = mysqli_fetch_assoc($result5);
    ?>
    
	<!-- checking for submit in post method -->
	<?php if(isset($_POST['submit'])){

// assigin the varible from form using post method

        $username=$_POST['employee_name'];
        $attendance_status=$_POST['status'];
        $checkin_time=$_POST['checkin_time'];
        $checkout_time=$_POST['checkout_time'];
        $date=date('y-m-d');

		// checking the for not repeat the attendance_status in db
        $sql8="SELECT * FROM Attendance WHERE employee_username='{$username}' AND attendance_date='$date';";
        $result8=mysqli_query($connection,$sql8);
        $row4=mysqli_num_rows($result8);
		if($row4!=0){
            echo "<h1 class='bg-danger' >Attendence Already Marked</h1>";
        }
		else
		{
			// insert the attendance
        $sql7="INSERT INTO `Attendance`(`attendance_id`, `attendance_employee_id`, `attendance_date`, `attendance_status`, `checkin_time`, `checkout_time`, `employee_username`) VALUES (NULL,'{$_SESSION['employee_id']}','$date','{$attendance_status}','{$checkin_time}','{$checkout_time}','{$username}');";
        $result7=mysqli_query($connection,$sql7);
        if($result7){
            echo "<h1 class='bg-success' >Attendence Marked</h1>";
        }
    }
    }
    ?>
    
    <form action="attendance.php" method="post">
		<label for="employee_name">Employee Name</label>
		<input type="text" id="employee_name" name="employee_name" value="<?php echo $row3['username']?>" readonly required>

		<!-- <label for="date">Date</label>
		<input type="date" id="date" name="date" required> -->

		<label for="status">Status:</label><br>
        <select name="status" id="status" required onchange="toggleTimeInputs()">
            <option value="">Select</option>
            <option value="fullday">Full-Day</option>
            <option value="halfday">Half-Day</option>
            <option value="leave">Leave</option>
        </select><br><br>

        <div id="timeInputs" style="display:none;">
			<label for="checkin_time">Checkin Time:</label><br>
			<input type="time" id="checkin_time" name="checkin_time" step="900" ><br>

			<label for="checkout_time">Checkout Time:</label><br>
			<input type="time" id="checkout_time" name="checkout_time" step="900" ><br>
		</div>

        <input class='btn btn-primary' type="submit" value="Submit" name="submit"/>
	</form>

	<script>
		function toggleTimeInputs() {
			const status = document.getElementById('status').value;
			const timeInputs = document.getElementById('timeInputs');
			if (status === 'fullday' || status==='halfday') {
				timeInputs.style.display = 'block';
			} else {
				timeInputs.style.display = 'none';
			}
		}
	</script>
	</form>
</body>
</html>
