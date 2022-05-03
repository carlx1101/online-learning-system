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

<!-- Script  below  -->

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
    <title>Blog</title>
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
    box-shadow: 0;
    position: relative;
    overflow: hidden;
    transform: scale(0.95);
    transition: box-shadow 0.5s, transform 0.5s;
    
}
.content:hover {
    transform:scale(0.98);
    box-shadow:5px 20px 30px rgba(0, 0, 0, 0.1);
}
.desc {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-align:justify;
}
.desc2 {
    text-align:justify;
}
.image{
    border-radius: 5px;
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
                    require "../layouts/logo.php"
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
                              <li class="breadcrumb-item"><a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page"><a href="blog.php" class="link">Blog</a></li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Blog</h1> 
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
                        
                        <div class="d-flex align-items-center justify-content-center rounded" style="background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url('../assets/images/home-bg.jpg'); background-position: center;background-size:cover; height: 350px; flex-direction:column;">
                            <h1 style="color:white;">Education Blog</h1>
                            <span>All Blog written by Tutor</span>
                        </div>
 

                        <div class="card">
                            <div class="card-body">    
                                                        
                                <div class="row">
                                    <div class="col">
                                        <div class="dropdown">
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

                                    <div class="col">
                                        <form method="post">
                                        <div class="input-group rounded">
                                            <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                            <button type="submit" name="searchBtn" class="btn btn-outline-primary">search</button>
                                        </div><br>
                                        </form>
                                    </div>

                                </div>

                                <?php
                                $searchKey = "";

                                if(isset($_POST['searchBtn'])){
                                    $searchKey = $_POST['search'];
                                }

                                $sql = "SELECT * FROM blog JOIN category ON blog.category_id=category.category_id WHERE title LIKE '%$searchKey%' ORDER BY title";
                                $records = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_array($records))
                                {
                                ?>
                                                            
                                <div class="d-flex justify-content-start">
                                    <div class='column <?php echo $row['name'] ?>'>
                                        <div class="card">
                                            <div class="content card-body row">
                                                <div class="col-sm-7">
                                                    <h4 class="title"><?php echo $row['title'] ?></h4>
                                                    <div class='desc mt-4'><?php echo $row['body'] ?></div>
                                                    <div class="text-start">
                                                        <button style="width:310px;" type="button" class="btn3 rounded-pill btn btn-primary mt-2" data-id="<?php echo $row['blog_id'] ?>">
                                                            View & Read Blog
                                                        </button>
                                                    </div>  
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="image2 col-sm-4 text-center">
                                                    <?php
                                                    echo '<img class="image" width="280" height="210" alt="img" src="data:image/png;base64,'.base64_encode($row['image']).'"/>';
                                                    ?>
                                                </div>                                                
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
            <div class="modal fade" id="firstModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role='dialog'>
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
            <div class="modal fade" id="secondModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role='dialog'>
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Blog</h5>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
        $(document).ready(function(){
            $('.btn2').keyup(function(){
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
    <script>
        $(document).ready(function () {
            $('.btn3').click(function(){
                var blogID = $(this).data('id');
                $.ajax({
                        url: 'view_blog.php',
                        type: 'post',
                        data: {blogID: blogID},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#secondModal').modal('show'); 
                        }
                    });
            });
        });
    </script>

</body>

</html>