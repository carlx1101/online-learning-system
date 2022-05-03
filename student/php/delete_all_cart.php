<?php
session_start();
require "../includes/connection.php";

$accountID = $_SESSION['account_id'];
$sql = "DELETE FROM cart WHERE account_id = '$accountID'";

 if (!mysqli_query($conn,$sql))
 {
     echo "<script>alert('Failed : Course have not removed from cart')</script>";
 }
 else
 {
     echo "<script>alert('All course have been removed from cart')
     window.location.href = 'course.php'
     </script>";
 }