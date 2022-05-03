<?php


require "../includes/connection.php";



$sql = "UPDATE account SET account_status = 0 WHERE account_id ='$_GET[id]'";

 if (!mysqli_query($conn,$sql))
 {
     echo "<script>alert('Failed : Record Not Deleted')</script>";
 }
 else
 {
     echo "<script>alert('Account Has Been Disabled')
     window.location.href = 'accounts.php'
     </script>";
 }
?>
