<?php
require "../includes/connection.php";
require "../includes/start_session.php";

$account_id = $_SESSION['account_id']; 
$blogID = $_POST['blogID'];
$accountID = $_SESSION['account_id'];

$sql = "SELECT * FROM blog JOIN account ON blog.account_id=account.account_id JOIN portfolio ON blog.account_id=portfolio.account_id WHERE blog_id='$blogID'";
$records = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($records))
{
?>
<div class="container">

    <div class="text-center">
        <?php
        echo '<img class="image"  width="400" height="300" alt="img" src="data:image/png;base64,'.base64_encode($row['image']).'"/>';
        ?>
    </div>
    <h3 class="title mt-3 text-center"><?php echo $row['title'] ?></h3>
    <p class="mt-4 fst-italic text-start" style="font-size:11px;">Created At: <?php echo $row['created_at']; ?></p>
    <hr>
    <p class='desc2'><?php echo $row['body']; ?></p>
    <hr>
    <div class="row">
        <div class="col">
            <p class="fst-italic text-start" style="font-size:11px;">Updated At: <?php echo $row['update_at']; ?></p>
        </div>
        <div class="col">
            <p class="fst-italic text-end" style="font-size:11px;">Posted By: <?php echo $row['username']; ?></p>
        </div>
    </div>

    <div class="mt-5 mb-5">
        <div class="card">
            <div class="p-3">
            <h6>
                <?php
                $accountID = $_SESSION['account_id'];
                $sql ="SELECT COUNT(comment_text) AS totalComment FROM comment WHERE blog_id = $blogID";
                $records = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($records);
                $count = $row['totalComment'];
                echo $count;
                ?>
            Comments
            </h6>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-1">
                        <?php
                            $sql = "SELECT * FROM account WHERE account_id = '$accountID'";
                            $records = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($records);
                   
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
                        <form method="POST" action="comment.php">
                            <input type="hidden" name="blogID" value="<?php echo $blogID ?>">

                            <div class="input"> 
                                <textarea type="text" class="form-control rounded" placeholder="Write your comment..." name="comment" id="exampleFormControlTextarea1" rows="3" required></textarea>        
                            </div>
                            <div class="text-end mt-2">
                                <button type="submit" class="btn btn-info" style="width:100px; color:white;">Publish</button>
                            </div>           
                        </form>
                    </div>
                </div>
            </div>

            <div class="comment container mt-4">
                <?php

                $sql = "SELECT * FROM comment JOIN blog ON comment.blog_id=blog.blog_id JOIN account ON account.account_id=comment.account_id WHERE blog.blog_id='$blogID'";
                $records = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($records))
                {
                ?>
                <div class="row">
                    <div class="col-sm-1">                       
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
                                <span class="ps-2" style="font-size:12px"><?php echo $row['comment_name'] ?></span>
                            </div>
                            <div class="col text-end">
                                <span class="ps-2" style="font-size:11px"><?php echo $row['comment_date'] ?></span>
                            </div>
                        </div>
                        <div class="ps-2 mb-4">
                            <p><?php echo $row['comment_text'] ?></p>
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
<?php
}
?>

