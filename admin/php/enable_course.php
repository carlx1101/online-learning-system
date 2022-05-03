<?php


require "../includes/connection.php";



$sql = "UPDATE course SET status = 1 WHERE course_id ='$_GET[id]'";

 if (!mysqli_query($conn,$sql))
 {
     echo "<script>alert('Failed : Course Not Enable')</script>";
 }
 else
 {
     echo "<script>alert('Course Has Been Enable')
     window.location.href = 'courses.php'
     </script>";
 }
?>
