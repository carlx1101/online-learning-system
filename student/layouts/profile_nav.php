<?php

$sql = "SELECT * FROM course";
$records = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($records))
?>
<button class="btn1 mt-2 waves-effect waves-dark" style="background:none; border:none; " data-id="<?php echo $row['course_id'] ?>">
    <i class="mdi mdi-cart-outline" style="font-size:25px; color:blue;"></i>
        <span style="color:blue;">
            <?php

            $accountID = $_SESSION['account_id'];
            $sql ="SELECT COUNT(cart.course_id) AS totalCart FROM cart WHERE account_id = $accountID";
            $records = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($records);
            $count = $row['totalCart'];
            echo $count;

            ?>
        </span>
</button>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

<!-- <img src="../assets/images/users/profile.png" alt="user" class="rounded-circle" width="31"> -->
<?php
    $id = $_SESSION['account_id'];

    $sql = "SELECT * FROM account WHERE  profile_picture IS NULL OR profile_picture = ''";
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
            echo '<img src="../assets/images/student.png" alt="user" width="31px" height="31px" class="rounded-circle"/>';
        }
    }
?>
</a>

<ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-outline m-r-5 m-l-5"></i>
        Profile</a>
    <a class="dropdown-item" href="transaction.php"><i class="mdi mdi-equal-box m-r-5 m-l-5"></i>
        Transaction History</a>
    <a class="dropdown-item" href="mycourse.php"><i class="mdi mdi-book-multiple m-r-5 m-l-5"></i>
        My Course</a>
    <a class="dropdown-item" href="logout.php" style = "color:red;"><i class="mdi mdi-logout-variant m-r-5 m-l-5"></i>
        Logout</a>
</ul>
</li>