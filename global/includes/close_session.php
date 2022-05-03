<?php
session_start();
session_destroy();
echo "<script>alert('Success : Logout Success')
window.location.href = ''
</script>";

?>
