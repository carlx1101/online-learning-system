<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

    <!-- <img src="../assets/images/users/profile.png" alt="user" class="rounded-circle" width="31"> -->
    <?php
        
$id = $_SESSION['account_id'];

        $sql = "SELECT * FROM account WHERE  profile_picture IS NULL OR profile_picture = '';";
    

        if (mysqli_query($conn,$sql))
        {
            $stmt = $conn->prepare("SELECT profile_picture FROM account WHERE account_id = '$id'");
            $stmt->execute();
            $stmt->bind_result($profile_picture);
            $stmt->fetch();
            $stmt->close();
            if($profile_picture > 0)
            {
                echo '<img src="data:image/jpg;base64,' . base64_encode($profile_picture) . '"  alt="user" width="31px" height="31px" class="rounded-circle" />';
            }
            else
            {
                echo '<img src="../assets/images/admin.png" alt="user" width="31px" height="31px" class="rounded-circle"/>';
            }
        }
        

        
        ?>
    
</a>
<ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

    <a class="dropdown-item" href="logout.php" style = "color:red;"><i class="mdi mdi-logout-variant m-r-5 m-l-5"></i>
        Logout</a>
</ul>
</li>

