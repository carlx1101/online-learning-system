<?php 
require "connection.php";
if(isset($_POST['reset']))
{
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password-confirmation'];

    if (empty($password) || empty($password_confirm))
    {
        " validation failed";
        exit();
    }
    else if ($password != $password_confirm)
    {
        echo "password not match";
        exit();

    }
    
    $cur_date = date("U");
    $sql = "SELECT * FROM password_reset WHERE reset_selector = ? AND token_expiry >= ? ";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
      // STMT failed error message 
      echo "Something When Wrong, Please  Try Again Later";
      exit();
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "s", $selector);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_resul($stmt);
      if (!$row = mysqli_fetch_assoc($result))
      {
            echo "please resubmit the request";
            exit();

      }
      else
      {
          $binary_token = hex2bin($validator);
          $check_token = password_verify($binary_token, $row['reset_token']);

          if ($check_token == false)
          {
            echo "please resubmit the request";

          } 
          else if ($check_token === true)
          {
              $token_email = $row['reset_email'];

              $sql = "SELECT * FROM  account WHERE email = ?;";
              $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                // STMT failed error message 
                echo "Something When Wrong, Please  Try Again Later";
                exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, 's', $token_email);
                    mysqli_stmt_execute($stmt);
                    if (!$row = mysqli_fetch_assoc($result))
                    {
                          echo "error";
                          exit();
              
                    }
                    else

                    {
                        $sql = "UPDATE account SET password = ? WHERE email = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                        // STMT failed error message 
                        echo "Something When Wrong, Please  Try Again Later";
                        exit();
                        }
                        else
                        {
                            $new_password_hased = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, 'ss',$new_password_hased, $token_email);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM password_reset WHERE reset_email= ?";

                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql))
                            {
                            // STMT failed error message 
                            echo "Something When Wrong, Please  Try Again Later";
                            exit();
                            }
                            else
                            {
                                mysqli_stmt_bind_param($stmt, 's', $token_email);
                                mysqli_stmt_execute($stmt);
                                // header("Location: ../../login.php");
                            }
                        }
                    }
                }
          }
      }
    }
}

?>