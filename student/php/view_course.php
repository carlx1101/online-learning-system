<?php
require "../includes/connection.php";
require "../includes/start_session.php";

$accountID = $_SESSION['account_id'];
$courseID = $_POST['courseID'];


$sql = "SELECT * FROM course JOIN account ON course.account_id = account.account_id JOIN portfolio ON course.account_id=portfolio.account_id WHERE course_id='$courseID'";
$records = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($records))
{
?>
<div class="m-5">
    <div class="container">
        <input type="hidden" name="courseID" value="<?php echo $courseID ?>">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5">
                <div class="text-center">
                <?php
                echo '<img class="image"  width="340" height="270" alt="img" src="data:image/png;base64,'.base64_encode($row['banner']).'"/>';
                ?>
                </div>
            </div>
            <div class="col-sm-4">
                <h3 class="title mt-3 text-start"><?php echo $row['title'] ?></h3>
                <p class='desc2'><?php echo $row['body'] ?></p>
                <a href="view_portfolio.php?account_id=<?php echo $row['account_id'] ?>"><?php echo $row['username'] ?></a>
  
                <div class="col mt-5">
                <button type="button" class="btn btn-info" style="width:100px; color:white;" onclick="window.location.href= 'add_cart.php?id= <?php echo $row['course_id'] ?>'">Add Cart</button>
                </div>
            </div>
        </div>
        
        <div class="mt-5 mb-5">
            <div class="card">
                <?php
                $sql = "SELECT CAST(AVG(review_rating)AS DECIMAL(10,1)) AS overallRating FROM review WHERE course_id =$courseID";
                $records = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($records);
                $count = $row['overallRating'];
                ?>
                <div class="mt-3 ps-3 mb-2">
                    <h3>
                    <?php
                    echo $count;
                    if($count == '5')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                    <?php
                    }
                    else if($count > '4' && $count < '5')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star-half' style='color:#fd4'></i>
                    <?php
                    }
                    else if($count == '4')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                    <?php
                    }
                    else if($count > '3' && $count < '4')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star-half' style='color:#fd4'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                    <?php
                    }
                    else if($count == '3')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                    <?php
                    }
                    else if($count > '2' && $count < '3')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star-half' style='color:#fd4'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                    <?php
                    }
                    else if($count == '2')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                    <?php
                    }
                    else if($count > '1' && $count < '2')
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star-half' style='color:#fd4'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                    <?php
                    }
                    else
                    {
                    ?>
                        <i class='mdi mdi-star' style='color:#fd4;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                        <i class='mdi mdi-star' style='color:lightgrey;'></i>
                    <?php
                    }
                    ?>
                    </h3>
                </div>

                <div class="p-3">
                    <h6>
                    <?php
                        $sql ="SELECT COUNT(review_content) AS totalReview FROM review WHERE course_id = $courseID";
                        $records = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($records);
                        $count = $row['totalReview'];
                        echo $count;
                    ?>
                    Review & Rating
                    </h6>
                </div>
                
                <div class="container">
                    <div class="comment container mt-4">
                        <?php
                        $sql = "SELECT * FROM review JOIN account ON account.account_id=review.account_id WHERE course_id='$courseID'";
                        $records = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($records))
                        {
                        ?>
                            <div class="row">
                                <div class="col-sm-1 text-end mt-1">
                                <?php
                                    if($row['profile_picture'] > 0)
                                    {
                                        echo '<img src="data:image/jpg;base64,' . base64_encode($row['profile_picture']) . '"  alt="user" width="45px" height="45px" class="rounded-circle" />';
                                    }
                                    else
                                    {
                                        echo '<img src="../assets/images/student.png" alt="user" width="45px" height="45px" class="rounded-circle"/>';
                                    }
                                ?>                       
                                </div>
                                <div class="col-sm-11">
                                    <div class="row">
                                        <div class="col text-start">
                                            <span class="ps-2" style="font-size:12px"><?php echo $row['review_name'] ?></span>
                                        </div>
                                        <div class="col text-end">
                                            <span class="ps-2" style="font-size:11px"><?php echo $row['review_date'] ?></span>
                                        </div>
                                    </div>
                                    <div class="ps-2 mb-4">
                                        <p><?php echo $row['review_content'] ?></p>
                                        <?php
                                        if($row['review_rating'] == '5')
                                        {
                                        ?>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                        <?php
                                        }
                                        else if($row['review_rating'] == '4')
                                        {
                                        ?>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                        <?php
                                        }
                                        else if($row['review_rating'] == '3')
                                        {
                                        ?>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                        <?php
                                        }
                                        else if($row['review_rating'] == '2')
                                        {
                                        ?>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <i class='mdi mdi-star' style='color:#fd4;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                            <i class='mdi mdi-star' style='color:lightgrey;'></i>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<?php
}
?>
