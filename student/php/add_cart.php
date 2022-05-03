<?php
session_start();
require "../includes/connection.php";
if(!isset($_SESSION['account_id'])) {
  
} 
else 
{
  $accountID = $_SESSION['account_id'];
  $courseID = $_GET['id'];

  $sql1 = "SELECT * FROM cart WHERE course_id = $courseID AND account_id = $accountID";
  $result_check = mysqli_query($conn, $sql1);

  if(mysqli_num_rows($result_check) == 1) 
  {
    echo "<script>alert('Course already added into cart')
    window.location.href = 'course.php'
    </script>";

  } 
  else 
  {

    $sql2 = "INSERT INTO cart (account_id, course_id) VALUES ('$accountID', '$courseID')";

    if(mysqli_query($conn, $sql2)) {
      echo "<script>alert('Cart added')
      window.location.href = 'course.php'
      </script>";
    }
  }
}
