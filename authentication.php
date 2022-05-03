<?php
        session_start();
        require "global/includes/connection.php";


        if ($stmt = $conn->prepare('SELECT account_id, password, user_type, account_status FROM account WHERE username = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc)
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($account_id, $password, $user_type, $account_status );
                $stmt->fetch();

                if(MD5($_POST['password']) === $password && $account_status == 1) {
            
                    session_regenerate_id();
                    $_SESSION['authenticated'] = TRUE;
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['account_id'] = $account_id;
                    $_SESSION['user_type'] = $user_type;
                    
                    switch ($user_type) {
                        case 0:
         
                    
                            echo "<script>alert('Login as Learner !')
                            window.location.href = 'student/php/index.php'
                            </script>";
                          break;
                          
                        case 1:
                            echo "<script>alert('Login as Tutor !')
                            window.location.href = 'tutor/php/index.php'
                            </script>";

                        break;

                        case 2:
                    
                            echo "<script>alert('Login as Administrator !')
                            window.location.href = 'admin/php/index.php'
                            </script>";

                        break;

                        case 3:
                    
                            echo "<script>alert('Login as Administrator !')
                            window.location.href = 'admin/php/index.php'
                            </script>";

                        break;

                        
                        default:
                          echo "No account found";
                      }
                    
                    
                    
                    // window.location.href = 'reader_home.php'
                } else {
                    // Incorrect password
                    echo "<script>alert('Incorret Username or Password')
                    window.location.href = 'login.php'
                    </script>";
                }
            } else {
                // Incorrect username
                echo "<script>alert('Incorret Username or Password')
                window.location.href = 'login.php'
                </script>";
            }
            $stmt->close();
        }
        ?>
