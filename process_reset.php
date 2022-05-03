<?php 

require "global/includes/connection.php";
if(isset($_POST['reset']))
{
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password-confirmation'];

    if (empty($password) || empty($password_confirm))
    {
        header("Location: password_reset_form.php?error=emptyInput&selector=$_POST[selector]&validator=$_POST[validator]");
        exit();
    }
    else if  ($password != $password_confirm)
    {
        header("Location: password_reset_form.php?error=passwordNotSame&selector=$_POST[selector]&validator=$_POST[validator]");
        exit();
    }
    $cur_date = date("U");

    $sql = "SELECT * FROM password_reset WHERE reset_selector = ? AND token_expiry >= ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        // STMT failed error message 
        echo "Something When Wrong";
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $cur_date);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result))
        {
            echo "Try resubmit the request 1 !";
            echo $selector;
            exit();
        }
        else 
        {
            // converting hexa valitator to bin
            $binary_token = hex2bin($validator);
            // return t/f 
            $check_token = password_verify($binary_token, $row['reset_token']);

            if ($check_token === false)
            {
                echo "Try resubmit the request !";
                exit();
            }
            //  elif to avoid string error 
            else if ($check_token === true)
            {
                // indentify the email 
                $token_email = $row['reset_email'];
                $sql = "SELECT * FROM account WHERE email = ?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    
                    echo "Email not found";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, 's', $token_email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result))
                    {
                        echo "There was an error";
                        exit();

                    }
                    else 
                    {
                        $sql = "UPDATE account SET password = ? WHERE email = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                            
                            echo "There was an error";
                            exit();
                        }
                        else
                        {
                            $new_password_hashed = MD5($password);

                            mysqli_stmt_bind_param($stmt, 'ss', $new_password_hashed, $token_email);
                            mysqli_stmt_execute($stmt);
                            $sql = "DELETE FROM password_reset WHERE reset_email= ?";

                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql))
                            {
                            echo "Something When Wrong, Please  Try Again Later";
                            exit();
                            }
                            else
                            {
                                mysqli_stmt_bind_param($stmt, 's', $token_email);
                                mysqli_stmt_execute($stmt);
                                header("Location: login.php?suc=passwordUpdated");
                            }
                        }
                    }
                }

            }
            
        }


    }

}
else
{
    header("Location: login.php");
}


?>