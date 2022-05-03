
<?php
require "../includes/start_session.php";
require "../includes/connection.php";
$accountID = $_SESSION['account_id'];

if (isset($_POST['cardBtn'])) 
{
    $datePurchased = date("Y/m/d h/i/sa");

    $sql1 = "SELECT * FROM cart WHERE account_id = $accountID";
    $record1 = mysqli_query($conn, $sql1);
    $paymentType = $_POST['paymentType'];
    $cardNumber = $_POST['cardNumber'];
    $cardExpiry = $_POST['cardExpiry'];
    $cardVerification = $_POST['cardVerification'];

    $sqlInsert1 = "INSERT INTO payment (account_id, date_purchased , payment_type, card_number, card_expiry, card_verification) VALUES ('$accountID', '$datePurchased', '$paymentType', '$cardNumber', '$cardExpiry', '$cardVerification')";
    mysqli_query($conn, $sqlInsert1);

    $record2 = mysqli_query($conn, 'SELECT LAST_INSERT_ID()'); //get the id of previous insert
    $row2 = mysqli_fetch_array($record2);

    $sql2 ="SELECT * FROM cart JOIN course ON cart.course_id=course.course_id WHERE cart.account_id = $accountID";
    $record3 = mysqli_query($conn, $sql2);
    $row3 = mysqli_fetch_array($record3);


    while($row1 = mysqli_fetch_array($record1))
    {
        $sqlInsert2 = "INSERT INTO payment_detail (payment_id, course_id, amount_paid) VALUES (".$row2['0'].", ".$row1['course_id'].", ".$row3['price'].")";    
        mysqli_query($conn, $sqlInsert2);
    }
    
    if(mysqli_affected_rows($conn) <= 0)
    {
        echo "<script>alert('Payment fail')
        window.location.href = 'course.php'
        </script>";
    }
    else
    {
        $sqlDelete = "DELETE FROM cart WHERE account_id = $accountID"; 
        mysqli_query($conn, $sqlDelete);

        echo "<script>alert('Done Payment')
        window.location.href = 'course.php'
        </script>";

    }
}
?>

<?php
if (isset($_POST['paypalBtn'])) 
{

    $datePurchased = date("Y/m/d h/i/sa");

    $sql1 = "SELECT * FROM cart WHERE account_id = $accountID";
    $record1 = mysqli_query($conn, $sql1);
    $paymentType = $_POST['paymentType'];
    $paypalEmail = $_POST['paypalEmail'];

    $sqlInsert1 = "INSERT INTO payment (account_id, date_purchased, payment_type, paypal_email) VALUES ('$accountID', '$datePurchased', '$paymentType', '$paypalEmail')";
    mysqli_query($conn, $sqlInsert1);

    $record2 = mysqli_query($conn, 'SELECT LAST_INSERT_ID()'); //get the id of previous insert
    $row2 = mysqli_fetch_array($record2);

    $sql2 ="SELECT * FROM cart JOIN course ON cart.course_id=course.course_id WHERE cart.account_id = $accountID";
    $record3 = mysqli_query($conn, $sql2);
    $row3 = mysqli_fetch_array($record3);


    while($row1 = mysqli_fetch_array($record1))
    {
        $sqlInsert2 = "INSERT INTO payment_detail (payment_id, course_id, amount_paid) VALUES (".$row2['0'].", ".$row1['course_id'].", ".$row3['price'].")";    
        mysqli_query($conn, $sqlInsert2);
    }
    
    if(mysqli_affected_rows($conn) <= 0)
    {
        echo "<script>alert('Payment fail')
        window.location.href = 'course.php'
        </script>";
    }
    else
    {
        $sqlDelete = "DELETE FROM cart WHERE account_id = $accountID"; 
        mysqli_query($conn, $sqlDelete);

        echo "<script>alert('Done Payment')
        window.location.href = 'course.php'
        </script>";
    }
}
?>