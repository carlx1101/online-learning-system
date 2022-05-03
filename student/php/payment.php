<!-- Session scripts below   -->
<?php
require "../includes/start_session.php";
?>
<!-- Session scripts above   -->

<!-- Database connection below  -->
<?php
require "../includes/connection.php";
$accountID = $_SESSION['account_id'];
?>
<!-- Database connection below  -->

<!-- Script below  -->

<!-- Script above  -->

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Payment</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/title_icon.png">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
        
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <?php
                        require '../layouts/profile_nav.php';
                        ?>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Payment</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Payment</h1> 
                    </div>
                    <div class="col-6">
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="row g-3">
                                    <div class="col-sm-5"> <span>View Total Amount of Course</span>
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div style="background: #F8F9FA;" class="card-header p-0" id="thirdHeading">
                                                    <h2 class="mb-0 text-center"> 
                                                        <button style="width:250px;" class="btn btn-light btn-block text-left collapsed p-3 rounded border-bottom-custom" type="button" data-toggle="collapse" data-target="#collaspeThree" aria-expanded="false" aria-controls="#collaspeThree">
                                                            <span class="me-2">Click to Review</span><i class="mdi mdi-chevron-double-down"></i>
                                                        </button> 
                                                    </h2>
                                                </div>
                                                <div id="collaspeThree" class="collapse" aria-labelledby="thirdHeading" data-parent="#accordionExample">
                                                    <div class="card-body"> 
                                                        <div class="table-responsive rounded">               
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="table-light">
                                                                        <th scope="col">Course Title</th>
                                                                        <th scope="col">Course Price (RM)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php

                                                                    $sql ="SELECT * FROM cart JOIN course ON cart.course_id=course.course_id WHERE cart.account_id = $accountID";
                                                                    $records = mysqli_query($conn, $sql);

                                                                    while($row = mysqli_fetch_array($records))
                                                                    {
                                                                    ?>
                                                                    <tr>
                                                                        <td scope='col'><?php echo $row['title'] ?></td>
                                                                        <td scope='col'>RM <?php echo $row['price'] ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    }       
                                                                    ?>
                                                                    <tr>
                                                                        <td scope='col'><h4>Course Total:</h4></td>
                                                                        <td scope='col'>
                                                                            <h4>
                                                                                <span>RM</span>
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
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>                      
                                            </div>
                                        </div>

                                        <div id="carouselDarkVariant" class="carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel"> 
                                            <span>View Course Banner</span><i class="mdi mdi-chevron-left"></i><i class="mdi mdi-chevron-right"></i>
                                            <div class="carousel-inner">                                 
                                                <?php
                                
                                                $sql ="SELECT * FROM cart JOIN course ON cart.course_id=course.course_id WHERE cart.account_id = $accountID";
                                                $records = mysqli_query($conn, $sql);
                                                $i = 1;
                                                while($row = mysqli_fetch_array($records))
                                                {                                              
                                                if($i == 1)
                                                {
                                                ?>
                                                <div class="carousel-item active">
                                                    <?php
                                                        echo '<img class="image" width="480" height="400" alt="img" src="data:image/png;base64,'.base64_encode($row['banner']).'"/>';
                                                    ?>
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <button type="button" class="btn btn-light btn-block text-left rounded-pill border-bottom-custom" style="width:300px;"><h5 style="color:darkblue;">Course <?php echo $i ?> :&emsp; <?php echo $row['title']?></h5></button>
                                                    </div>
                                                </div>
                                                <?php  
                                                }
                                                else
                                                {
                                                ?>
                                                <div class="carousel-item">
                                                    <?php
                                                        echo '<img class="image" width="480" height="400" alt="img" src="data:image/png;base64,'.base64_encode($row['banner']).'"/>';
                                                    ?>
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <button type="button" class="btn btn-light btn-block text-left rounded-pill border-bottom-custom" style="width:300px;"><h5 style="color:darkblue;">Course <?php echo $i ?> :&emsp; <?php echo $row['title']?></h5></button>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                $i = $i + 1;                                       
                                                }
                                                ?>                                                              
                                            </div>
                                            <button style="background:none; border:none;" class="carousel-control-prev" type="button" data-bs-target="#carouselDarkVariant" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button style="background:none; border:none;" class="carousel-control-next" type="button" data-bs-target="#carouselDarkVariant" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="row mt-5 text-center">
                                            <div class="col">
                                                <button style="width:230px;" class="btn btn-info btn-block text-left p-2 rounded-pill border-bottom-custom" type="button" disabled>                                                                                          
                                                    <span style="color:white;">Total Price</span>
                                                </button>
                                                <button style="width:230px;" class="btn btn-light btn-block text-left p-2 rounded-pill border-bottom-custom" type="button" data-toggle="collapse" data-target="#collaspeThree" aria-expanded="false" aria-controls="#collaspeThree">                                           
                                                    <span style="color:black;">RM
                                                        <?php
                                                            $sql ="SELECT SUM(course.price) AS totalPrice FROM cart JOIN course ON cart.course_id=course.course_id WHERE cart.account_id = $accountID";
                                                            $records = mysqli_query($conn, $sql);
                                                            $row = mysqli_fetch_array($records);
                                                            $sum = $row['totalPrice'];
                                                            echo $sum;
                                                        ?>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                    </div>

                                    <div class="col-sm-6"> <span>Select Payment Method</span>
                                        <div class="card">

                                            <div class="accordion" id="accordionExample">

                                                <form method="POST" action="create_payment.php">
                                                <div class="card">
                                                    <div style="background: #F8F9FA;" class="card-header p-0" id="firstHeading">
                                                        <h2 class="mb-0 text-center"> 
                                                            <button style="width:250px;" class="btn btn-light btn-block text-left collapsed p-3 rounded border-bottom-custom" type="button" data-toggle="collapse" data-target="#collaspeOne" aria-expanded="false" aria-controls="#collaspeOne">
                                                                <span class="me-2">Paypal</span><img src="https://i.imgur.com/7kQEsHU.png" width="30"> 
                                                            </button> 
                                                        </h2>
                                                    </div>

                                                    <div id="collaspeOne" class="collapse" aria-labelledby="firstHeading" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <span class="font-weight-normal card-text me-2">Payment Type</span><i class="fa fa-credit-card"></i>
                                                            <div class="input mb-3">
                                                                <select class="form-control rounded-pill" id="paymentType" name="paymentType" required>
                                                                    <option value="Paypal">Paypal</option>
                                                                </select>
                                                            </div>

                                                            <span class="font-weight-normal card-text me-2">Paypal Email</span><i class="mdi mdi-email"></i>
                                                            <div class="input">
                                                                <input type="text" name="paypalEmail" class="form-control rounded-pill" placeholder="Paypal Email" required> 
                                                            </div>                                                     
                                                            <div class="row">
                                                                <div class="text-center col my-3">
                                                                    <button type="button" onclick="window.location.href='course.php'" class="btn btn-danger mx-2" style="width:150px; color:white;">Cancel Payment</button>
                                                                    <button type="submit" name="paypalBtn" class="btn btn-info" style="width:150px; color:white;">Make Payment</button> 
                                                                </div>                                             
                                                            </div>
                                                        </div>
                                                    </div>                      
                                                </div>
                                                </form>
                                                
                                                <form method="POST" action="create_payment.php">
                                                <div class="card">
                                                    <div style="background: #F8F9FA;" class="card-header p-0" id="secondHeading">
                                                        <h2 class="mb-0 text-center"> 
                                                            <button style="width:300px;" class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collaspeTwo" aria-expanded="true" aria-controls="#collaspeTwo">
                                                                <span class="me-2">Credit/Debit Card </span><img src="https://i.imgur.com/2ISgYja.png" width="30"><img src="https://i.imgur.com/W1vtnOV.png" width="30"><img src="https://i.imgur.com/35tC99g.png" width="30"><img src="https://i.imgur.com/2ISgYja.png" width="30"> 
                                                            </button> 
                                                        </h2>                      
                                                    </div>

                                                    <div id="collaspeTwo" class="collapse show" aria-labelledby="secondHeading" data-parent="#accordionExample">

                                                        <div class="card-body payment-card-body">

                                                            <span class="font-weight-normal card-text me-2">Payment Type</span><i class="fa fa-credit-card"></i>
                                                            <div class="input mb-3">
                                                                <select class="form-control rounded-pill" id="paymentType" name="paymentType" required>
                                                                    <option value="Maybank">Maybank</option>
                                                                    <option value="Hong Leong">Hong Leong</option>
                                                                    <option value="Visa">Visa</option>
                                                                    <option value="MasterCard">MasterCard</option>
                                                                </select>
                                                            </div>

                                                            <span class="font-weight-normal card-text me-2">Card Number</span><i class="fa fa-credit-card"></i>
                                                            <div class="input"> 
                                                                <input type="text" name="cardNumber" class="form-control rounded-pill" placeholder="0000 0000 0000 0000" required> 
                                                            </div>

                                                            <div class="row mt-3 mb-3">
                                                                <div class="col-md-6"><span class="font-weight-normal card-text me-2">Expiry Date</span><i class="fa fa-calendar"></i>
                                                                    <div class="input">
                                                                        <input type="text" name="cardExpiry" class="form-control rounded-pill" placeholder="MM/YY" required> 
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"><span class="font-weight-normal card-text me-2">CVC/CVV</span><i class="fa fa-lock"></i>
                                                                    <div class="input">
                                                                        <input type="text" name="cardVerification" class="form-control rounded-pill" placeholder="000" required> 
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <i class="fa fa-lock"></i><span class="text-muted certificate-text ms-2">Your transaction is secured with ssl certificate</span>
                                                            <div class="row">
                                                                <div class="text-center col my-3">
                                                                    <button type="button" onclick="window.location.href='course.php'" class="btn btn-danger mx-2" style="width:150px; color:white;">Cancel Payment</button>                                                                  
                                                                    <button type="submit" name="cardBtn" class="btn btn-info" style="width:150px; color:white;">Make Payment</button>
                                                                </div>                                             
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div> 
                                                </form>                                              

                                            </div>                                           
                                        </div>
                                    </div>                               
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="firstModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"></div>
                    </div>
                </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <?php 
            require '../layouts/footer.php';
            ?>
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.btn1').click(function(){
                var courseID = $(this).data('id');
                $.ajax({
                        url: 'cart.php',
                        type: 'post',
                        data: {courseID: courseID},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#firstModal').modal('show'); 
                        }
                    });
            });
        });
    </script>
</body>

</html>