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

<!-- Script above -->

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
    <title>My Course</title>
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
.content {
  border: 2px solid #f2f2ff;
  float: left;
  background-color:  #fafaff;
  box-shadow: 0;
  position: relative;
  overflow: hidden;
  transform: scale(0.95);
  transition: box-shadow 0.5s, transform 0.5s;
  border-radius:10px;
  max-width: 300px;
}
.content:hover {
  transform:scale(1);
  box-shadow:5px 20px 30px rgba(0, 0, 0, 0.1);
}
.desc {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-align:justify;
}
.desc2{
    text-align: justify;
}

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
       <?php 
require '../layouts/logo.php';
?>

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

        <?php
        require '../layouts/nav.php';
        ?>

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
                              <li class="breadcrumb-item active" aria-current="page"><a href="mycourse.php" class="link">My Course</a></li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">My Course</h1> 
                    </div>
                    
                    <div class="col-6">
                        <div class="row">
                            <div class="col mt-5">
                                <div class="dropdown" style = "text-align:end;">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort By Category
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="btn2" data-filter="all"><a class="dropdown-item">All</a></li>
                                        <?php

                                        $sql = "SELECT name FROM category";
                                        $records = mysqli_query($conn, $sql);
                                        
                                        while($row = mysqli_fetch_array($records))
                                        {
                                        ?>                                   
                                        <li class="btn2" data-filter="<?php echo $row['name'] ?>"><a class="dropdown-item"><?php echo $row['name'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>                               
                                </div>
                            </div>
                            <div class="col mt-5">
                                <form method="post">
                                <div class="input-group rounded">
                                    <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="submit" name="searchBtn" class="btn btn-outline-primary">search</button>
                                </div><br>
                                </form>
                            </div>
                        </div>
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

                                <div class="body"> 
                                    <?php
                                    $searchKey = "";

                                    if(isset($_POST['searchBtn'])){
                                        $searchKey = $_POST['search'];
                                    }

                                    $sql = "SELECT * FROM course JOIN category ON course.category_id=category.category_id WHERE course.title LIKE '%$searchKey%' AND (course.course_id IN (SELECT payment_detail.course_id FROM payment INNER JOIN payment_detail ON payment.payment_id=payment_detail.payment_id WHERE account_id=$accountID)) ORDER BY title";
                                    $records = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_array($records))
                                    {
                                    ?>
                                    <div class='column <?php echo $row['name'] ?>'>
                                        <div class="content mt-4 mx-4 ms-5">
                                            <div class="card-body">
                                                <?php
                                                echo '<img class="image" width="230" height="210" alt="img" src="data:image/png;base64,'.base64_encode($row['banner']).'"/>';
                                                ?>
                                                <h5 class="card-title"><?php echo $row['title'] ?></h5>
                                                <p class="desc card-text"><?php echo $row['body'] ?></p>
                                                <div class="col">
                                                    <button type="button" onclick="window.location.href='submodule.php?id=<?php echo $row['course_id'] ?>&cat_id=<?php echo $row['category_id'] ?>'" class="btn3 btn btn-info ms-2" style="width:200px; color:white;">Learn</button>
                                                </div>                                           
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
            <!-- START MODAL -->
            <div class="modal fade" id="firstModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">My Cart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="secondModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <!-- END MODAL -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.js"></script>
    <script>
        $(document).ready(function(){
            $('.btn2').click(function(){
                const category = $(this).attr('data-filter');
                if (category == 'all') 
                {
                    $('.column').show('500');
                }
                else
                {
                    $('.column').not('.'+category).hide('500');
                    $('.column').filter('.'+category).show('500');
                }
            })
        })
    </script>
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