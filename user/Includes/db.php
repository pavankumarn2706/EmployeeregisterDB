<?php
// function connection(){
$connection=mysqli_connect('localhost','root','','Task1');
if(!$connection){
    // echo 'connected';
    die('Connection faild');
}
?>