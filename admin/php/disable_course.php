<?php


require "../includes/connection.php";



$sql = "UPDATE course SET status = 0 WHERE course_id ='$_GET[id]'";

 if (!mysqli_query($conn,$sql))
 {
     echo "<script>alert('Failed : Record Not Deleted')</script>";
 }
 else
 {
     echo "<script>alert('Course Has Been Disabled')
     window.location.href = 'courses.php'
     </script>";
 }
?>
