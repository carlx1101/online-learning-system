<?php
require "../includes/connection.php";

$paymentID = $_POST['paymentID'];

$sql = "SELECT * FROM payment JOIN account ON payment.account_id=account.account_id WHERE payment_id='$paymentID'";
$records = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($records))
{
?>
<div class="container">
    <h5 class="ms-3">Payment Date</h5>
    <div class="ms-3">
        <span><?php echo $row['date_purchased']?></span>
    </div>

        <?php
        if($row['payment_type'] == 'Paypal')
        {
        ?>
        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>
                            <div class="py-2"><h5>Payment Type</h5><?php echo $row['payment_type']?></span></div>
                        </td>
                        <td>
                            <div class="py-2"><h5>Paypal Email</h5><span><?php echo $row['paypal_email']?></span></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php  
        }
        else
        {
        ?>
        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>
                            <div class="py-2"><h5>Payment Type</h5><?php echo $row['payment_type']?></span></div>
                        </td>
                        <td>
                            <div class="py-2"><h5>Card Number</h5><span><?php echo $row['card_number']?></span></div>
                        </td>
                        <td>
                            <div class="py-2"><h5>Card Expire Date</h5><span><?php echo $row['card_expiry']?></span></div>
                        </td>
                        <td>
                            <div class="py-2"><h5>CVC/CCV</h5><span><?php echo $row['card_verification']?></span></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>   
        <?php        
        }
        ?>    
<?php
}
?>  
    <div class="product border-bottom mt-5 border-top table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr class="table-light">
                    <td>Purchased Course</td>
                    <td>Course Title</td>
                    <td>Course Price</td>
                </tr>
            </thead>
            <?php
            $sql2 = "SELECT * FROM payment_detail JOIN course ON payment_detail.course_id=course.course_id WHERE payment_id='$paymentID'";
            $records2 = mysqli_query($conn, $sql2);
            while($row = mysqli_fetch_array($records2))
            {
            ?>   
            <tbody>
                <tr>
                    <td width="30%"> <?php echo '<img class="image" width="90" height="60" alt="img" src="data:image/png;base64,'.base64_encode($row['banner']).'"/>'; ?></td>
                    <td width="40%"> <span class="font-weight-bold"><?php echo $row['title'] ?></span></td>
                    <td width="30%">
                        <div class="text-right"><span class="font-weight-bold"><?php echo $row['price'] ?></span></div>
                    </td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
        <div class="product border-bottom mt-5 border-top table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td width="70%" class="table-light ps-5">
                            <h5>Total Price</h5>
                        </td>
                        <td width="30%" class=""> 
                            <span>         
                            <?php
                            $sql3 ="SELECT SUM(amount_paid) AS totalPrice FROM payment_detail WHERE payment_id=$paymentID";
                            $records3 = mysqli_query($conn, $sql3);
                            $row = mysqli_fetch_array($records3);
                            $sum = $row['totalPrice'];
                            echo $sum;
                            ?>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

