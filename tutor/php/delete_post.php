<?php


require "../includes/connection.php";



$sql = "DELETE FROM blog WHERE blog_id ='$_GET[id]'";

 if (!mysqli_query($conn,$sql))
 {
     echo "<script>alert('Failed : Record Not Deleted')</script>";
 }
 else
 {
     echo "<script>alert('Record Has Been Deleted')
     window.location.href = 'blog.php'
     </script>";
 }
?>
