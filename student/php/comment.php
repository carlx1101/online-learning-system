<?php
require "../includes/connection.php";
require "../includes/start_session.php";

$blogID = $_POST['blogID'];
$accountID = $_SESSION['account_id'];
$username = $_SESSION['username'];

$commentDate = date("Y/m/d h/i/sa");

$comment = $_POST['comment'];


$sql = "INSERT INTO comment(comment_name, comment_text, blog_id, account_id, comment_date) VALUES ('$username', '$comment', '$blogID', '$accountID', '$commentDate')";

if(mysqli_query($conn, $sql)) {
    echo "<script>alert('Comment added')
    window.location.href = 'blog.php'
    </script>";
}
else{
    echo "<script>alert('Failed')
    window.location.href = 'blog.php'
    </script>";

}


?>
