<?php


require "../includes/connection.php";

$sql = "DELETE FROM quiz WHERE quiz_id ='$_GET[quiz_id]'";

 if (!mysqli_query($conn,$sql))
 {
     echo "<script>alert('Failed : Record Not Deleted')</script>";
 }
 else
 {
     echo "<script>alert('Record Has Been Deleted')
     window.location.href = 'mcq.php?id=$_GET[cur_id]'
     </script>";
 }
?>
