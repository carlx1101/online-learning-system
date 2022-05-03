
<!-- Database connection below  -->
<?php
require "global/includes/connection.php";
?>  
<!-- Da tabase connection above  -->

<!-- Token script  -->
<?php 
if (isset($_POST["send"]))
{
  // 2 token, avoid bruteforce 
  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "http://localhost/sdp/password_reset_form.php?selector=".$selector."&validator=".bin2hex($token);
  // creating token-expire 
  $token_expires = date("U") + 1800;

  
  $recovery_email = $_POST['email'];

  // Delete existing token at database of specific user 
  $sql = "DELETE FROM password_reset WHERE reset_email = ?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    // STMT failed error message 
    echo "Something When Wrong, Please  Try Again Later";
    exit();
  }
  else
  {
    mysqli_stmt_bind_param($stmt, "s", $recovery_email);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO password_reset (reset_email, reset_selector, reset_token, token_expiry) VALUES (?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    // STMT failed error message 
    echo "Something When Wrong, Please  Try Again Later";
    exit();
  }
  else
  {
    $encrypted_token  = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $recovery_email, $selector, $encrypted_token, $token_expires);
    mysqli_stmt_execute($stmt);
  }
  mysqli_stmt_close($stmt);
  // mysqli_close();

  $email_to = $recovery_email;
  $subject = 'CodeSpace password recovery email';
  $message = '<p>Hi i am Carl, im here to assist your with the password recovery.To reset a new password, please click on the link below to proceed! !<br>This is system message, Dont not reply !!<br>Thanks, Regard</p>';
  $message .=  '<a href = "' . $url . '">'.$url.'</a></p>';

  $headers =  'MIME-Version: 1.0' . "\r\n"; 
  $headers .= 'From: Carl - Development Team of CodeSpace <carlyip36@gmail.com>' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
  mail($email_to, $subject, $message, $headers);
  header("Location: password_reset.php?reset=success");

}

?>