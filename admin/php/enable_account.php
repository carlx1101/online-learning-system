<?php


require "../includes/connection.php";



$sql = "UPDATE account SET account_status = 1 WHERE account_id ='$_GET[id]'";

 if (!mysqli_query($conn,$sql))
 {
     echo "<script>alert('Failed : Account Not Enable')</script>";
 }
 else
 {
     echo "<script>alert('Account Has Been Enable')
     window.location.href = 'accounts.php'
     </script>";
 }
?>
