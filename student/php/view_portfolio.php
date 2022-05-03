
<!-- Session scripts below   -->
<?php
require "../includes/start_session.php";
?>  
<!-- Session scripts above   -->

<!-- Database connection below  -->
<?php
require "../includes/connection.php";
?>  
<!-- Database connection above  -->

<!-- PHP script below  -->

<?php
    
    $id = $_GET['account_id']; //intval — Get the integer value of a variable


    $stmt = $conn->prepare("SELECT count(name)  FROM portfolio WHERE account_id = '$id'  ");
    $stmt->execute();
    $stmt->bind_result($course_counter);
    $stmt->fetch();
    $stmt->close();
    
    $stmt = $conn->prepare("SELECT count(title) FROM blog WHERE account_id = '$id'");
    $stmt->execute();
    $stmt->bind_result($blog_counter);
    $stmt->fetch();
    $stmt->close();
    

    

    // Below code arent using in this page, it is for update 
    if(isset($_POST['update']))
    {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bio = $_POST['bio'];
        $location = $_POST['location'];
        $social1 = $_POST['social1'];
        $social2 = $_POST['social2'];
        $social3 = $_POST['social3'];

        $image = $_FILES['profile']['tmp_name'];
        
        if (!empty($image))
        {
            $img = file_get_contents($image);
            $sql = "UPDATE portfolio SET name = '$name', position = '$position',email = '$email', phone_number = '$phone', bio = '$bio', location = '$location',social_media1= '$social1',social_media2= '$social2',social_media3= '$social3',profile_picture = ? WHERE account_id = $id";
            $stmt = mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,"s",$img);
            mysqli_stmt_execute($stmt);
            $check = mysqli_stmt_affected_rows($stmt);


            if ($check == 1)
            {

                echo "<script>alert('Record Has Been Updated')
                window.location.href = 'portfolio.php'
                </script>";
            }
            else
            {
                echo "<script>alert('Failed : Record Not Updated with image')</script>";

            }
        }

        else 
        {
        $sql = "UPDATE portfolio SET 
        name = '$name', 
        position = '$position',
        email = '$email', 
        phone_number = '$phone', 
        bio = '$bio', 
        location = '$location',
        social_media1= '$social1',
        social_media2= '$social2',
        social_media3= '$social3'
        WHERE account_id = $id
        ";

        if (!mysqli_query($conn,$sql))
        {
            echo "<script>alert('Failed : Record Not Updated without image')</script>";
        }
        else
        {
            echo "<script>alert('Record Has Been Updated')
            window.location.href = 'portfolio.php'
            </script>";
        }

        
        }

        


    }

      
?>
<!-- PHP script above   -->

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
    <title>Portfolio</title>
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

<style>
    .blog-body {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
        }

    .course-body {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
        }
</style>
</head>

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
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                      <?php 
                            require '../layouts/profile_nav.php';
                        ?>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
       

        <?php
        require '../layouts/nav.php';
        ?>


        <!-- ============================================================== -->
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
                              <li class="breadcrumb-item"><a href="portfolio.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Tutor Porfolio</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Tutor Informations and Activities</h1> 
                        <!-- <small class="form-text text-danger">All information in this page will be display to the public ! <br>  Do not share your sensitive information !</small> -->

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
                <!-- Row -->
                <?php
                 
                                $id = $_GET['account_id']; //intval — Get the integer value of a variable
                                $result = mysqli_query($conn,"SELECT * FROM portfolio WHERE account_id=$id");
                                while($row = mysqli_fetch_array($result))
                                {

                                    
                                ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> 
                                    <?php
                                    echo '<img src="data:image/jpg;base64,'.base64_encode($row['profile_picture']) . '" class="rounded-circle" width="150"/>';
                               
                                    ?>

                                    <h4 class="card-title m-t-10"><?php echo $row['name'] ?></h4>
                                    <h5 class="card-subtitle"><?php echo $row['position'] ?></h5>
                                    <p style = "font-size:13px;" > <?php echo $row['bio'] ?></p>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-people"></i>
                                            <small class="text-muted">Course </small><br>

                                                <font class="font-medium"><?=$course_counter?></font>
                                            </a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-picture"></i>
                                            <small class="text-muted">Blog </small><br>

                                                <font class="font-medium"><?=$blog_counter?></font>
                                            </a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> 
                                <small class="text-muted">Email address </small>
                                <h6><?php echo $row['email'] ?></h6> 
                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $row['phone_number'] ?></h6> 
                                <small class="text-muted p-t-30 db">Location</small>
                                <h6><?php echo $row['location'] ?></h6>
                                <div class="map-box">
                                    <iframe
                                    src="https://maps.google.it/maps?q=<?php echo $row['location']; ?>&output=embed" width="100%" height="150" frameborder="0" style="border:0"
                                        allowfullscreen></iframe><br><br>


                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br />
                                <button class="btn btn-circle btn-secondary" onclick="location.href='<?php echo $row['social_media1'] ?>'"><i class="fab fa-linkedin"></i></button>
                                <button class="btn btn-circle btn-secondary" onclick="location.href='<?php echo $row['social_media2'] ?>'"><i class="fab fa-github"></i></button>
                                <button class="btn btn-circle btn-secondary" onclick="location.href='<?php echo $row['social_media3'] ?>'"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">


                                <h2>Published Courses</h2>
                                
                                <?php             
                                $id = $_GET['account_id']; //intval — Get the integer value of a variable
                                $result = mysqli_query($conn,"SELECT * FROM course WHERE account_id=$id LIMIT 5");
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>   

                        <div class="d-flex flex-row comment-row m-t-0">
                                  
                                  <!-- <img src="../assets/images/users/1.jpg" alt="user" width="50"
                                      class="rounded-circle"> -->

                                      <?php 

                                          echo '<img src="data:image/jpg;base64,'.base64_encode($row['banner']) . '" class="rounded-circle" width="50"/>';

                                      ?>          
                          
                             
                              <div class="comment-text w-150">
                                  <h4 class="font-medium"><?php echo $row['title']?></h4>
                             
                                  <div class="comment-footer">
                                      <span class="text-muted float-end"><?php echo $row['created_at']?></span> 
                                      <!-- <span class="badge bg-primary">Pending</span>  -->
                                         
                                  </div>
                              </div>
                          </div><br>
                                               
                        <?php 
                                    }
                        ?>
                            </div>
                        </div>
                                
              



                        <div class="card">
                            <div class="card-body">
                                <h3>Educational Blog Post</h3><br><br>

                                    <?php             
                                $id = $_GET['account_id']; //intval — Get the integer value of a variable
                                $result = mysqli_query($conn,"SELECT * FROM blog WHERE account_id=$id LIMIT 5");
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>    
                                    <div class="d-flex flex-row comment-row m-t-0">
                                  
                                        <!-- <img src="../assets/images/users/1.jpg" alt="user" width="50"
                                            class="rounded-circle"> -->

                                            <?php 

                                                echo '<img src="data:image/jpg;base64,'.base64_encode($row['image']) . '" class="rounded-circle" width="50"/>';

                                            ?>          
                                
                                   
                                    <div class="comment-text w-150">
                                        <h4 class="font-medium"><?php echo $row['title']?></h4>
                                   
                                        <div class="comment-footer">
                                            <span class="text-muted float-end"><?php echo $row['update_at']?></span> 
                                            <!-- <span class="badge bg-primary">Pending</span>  -->
                                               
                                        </div>
                                    </div>
                                </div><br>

                                <?php
                                        
                                    }
                                }
                                    mysqli_close($conn);
                                    
                                    ?>

                            </div>
                        </div>
                    </div>

                    

                                    
                    <!-- Column -->
                </div>
                <!-- Row -->
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
</body>

</html>