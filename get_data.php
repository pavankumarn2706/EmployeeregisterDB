<?php include "Includes/db.php";
if(isset($_POST["query"])){
    $text = $_POST['query'];
    $query = "SELECT email FROM Employee WHERE email LIKE '%$text%';";
    $res=mysqli_query($connection,$query);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            echo "<a href='#' class='list-group-item list-group-item-action'>{$row['email']}</a>";
        }
    }
    else{
        "<a href='#' class='list-group-item list-group-item-action'>No Records</a>";
    }
}
?>