<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">               
                <table class="table">
                    <thead>
                        <tr class="table-primary">
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price (RM)</th>
                        <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        require "../includes/connection.php";

                        $accountID = $_SESSION['account_id'];
                        $sql ="SELECT * FROM cart JOIN course ON cart.course_id=course.course_id WHERE cart.account_id = $accountID";
                        $records = mysqli_query($conn, $sql);
                        $i = 1;
                        while($row = mysqli_fetch_array($records))
                        {
                        ?>
                        <tr>
                            <td scope='col'><?php echo $i ?></td>
                            <td scope='col'>
                                <?php 
                                    echo '<img class="image" width="230" height="210" alt="img" src="data:image/png;base64,'.base64_encode($row['banner']).'"/>';
                                ?>
                            </td>
                            <td scope='col'><?php echo $row['title'] ?></td>
                            <td class="desc2" scope='col'><?php echo $row['body'] ?></td>
                            <td scope='col'>RM <?php echo $row['price'] ?></td>
                            <td scope='col'><a href="delete_cart.php?id=<?php echo $row['course_id'] ?>"><i class='mdi mdi-delete' style='color:red;'></i></a></td>    
                        </tr>
                        <?php
                        $i = $i + 1;
                        }       
                        ?>
                        <tr>
                            <td colspan="5"><h4 class="text-end">Total Amount</h4></td>
                            <td>
                                <h4>
                                    <i class='mdi mdi-cash-usd'></i><span class="ms-2">RM</span>
                                    <?php
                                    $sql ="SELECT SUM(course.price) AS totalPrice FROM cart JOIN course ON cart.course_id=course.course_id WHERE cart.account_id = $accountID";
                                    $records = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($records);
                                    $sum = $row['totalPrice'];
                                    echo $sum;
                                    ?>
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="button" class="btn btn-info" onclick="window.location.href= 'course.php'" style="width:180px; color:white;"><i class='mdi mdi-undo-variant' style='color:white;'></i><span class="ms-2">Back to course</span></button></td>
                            <td class="text-end" colspan="3"><button type="button" class="btn btn-warning" onclick="window.location.href= 'delete_all_cart.php'" style="width:180px; color:white; background:red;"><i class='mdi mdi-delete' style='color:white;'></i><span class="ms-2">Clear All</span></button></td>
                            <?php
                                $sql ="SELECT COUNT(cart.course_id) AS totalCart FROM cart WHERE account_id = $accountID";
                                $records = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($records);
                                $count = $row['totalCart'];
                            if(($count) == 0)
                            {
                                echo "<script>alert('Please add course into cart before access it')
                                window.location.href = 'course.php'
                                </script>";
                            }
                            ?>
                            <td class="text-start" colspan="3"><button type="button" class="btn btn-info" onclick="window.location.href='payment.php'" style="width:180px; color:white;"><i class='mdi mdi-checkbox-marked-circle-outline' style='color:white;'></i><span class="ms-2">Proceed Checkout</span></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>