
<!-- Session scripts below   -->
<?php
require "../includes/start_session.php";
?>  
<!-- Session scripts above   -->

<!-- Database connection below  -->
<?php
require "../includes/connection.php";
?>  
<!-- Database connection below  -->

<?php
    if(isset($_POST['update']))
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $price  = $_POST['price'];        
        $image = $_FILES['banner']['tmp_name'];
        if (!empty($image))
        {
            // update the form with image 
            $img = file_get_contents($image);
            $sql = "UPDATE course SET title = '$title', body = '$description' ,price = '$price', category_id = '$category', banner = ? WHERE course_id = $_GET[id]";
            $stmt = mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,"s",$img);
            mysqli_stmt_execute($stmt);
            $check = mysqli_stmt_affected_rows($stmt);
        }

        else 
        {
            // update the form without image 

            $sql = "UPDATE course SET title = '$title', body = '$description' ,price = '$price', category_id = '$category' WHERE course_id = $_GET[id]";
            if (!mysqli_query($conn,$sql))
            {
                echo "<script>alert('Failed : Record Not Added')</script>";
            }
            else
            {
                echo "<script>alert('Record Has Been Updated')
                window.location.href = 'course.php'
                </script>";
            }
        }

        if ($check == 1)
        {

            echo "<script>alert('Record Has Been Updated')
            window.location.href = 'course.php'
            </script>";
        }
        else
        {
            echo "<script>alert('Failed : Record Not Update')</script>";
        }

    }
//   }
      
?>

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
    <title>Update Course</title>
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
                        <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li> -->
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
                              <li class="breadcrumb-item"><a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">My Course</li>
                              <li class="breadcrumb-item active" aria-current="page">Update Course</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Update Course</h1> 
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
                                <div class="container">
                                <?php
                                require "../includes/connection.php";

                                $id = intval($_GET['id']); //intval ??? Get the integer value of a variable
                                $result = mysqli_query($conn,"SELECT * FROM course WHERE course_id=$id");
                                while($row = mysqli_fetch_array($result))
                                {
                                ?>
                                <form method = "POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <h2>Course Submission Form</h2><br>
                                        <input type="hidden" name="id" value="<?php echo $row['course_id'] ?>">

                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name = "title" value="<?php echo $row['title'] ?>"> 
                                    </div> 
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name = "description" value="<?php echo $row['body'] ?>">
                                    </div> 
                                    

                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select multiple class="form-control" id="category"  name = "category"   require>
                                        <?php

                                        $sql = "SELECT * FROM category";
                                        $records = mysqli_query($conn, $sql);
                                        foreach ($records as $records) {
                                            echo  $row['category_id'] == $records["category_id"] ? '<option value="'.$records["category_id"].'"  selected >'.$records["name"].'</option>' :'<option value="'.$records["category_id"].'"   >'.$records["name"].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>    
                                    
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name = "price" value="<?php echo $row['price'] ?>" >
                                    </div>    

                                    <div class="mb-3">
                                    <label class="form-label" for="image">Banner (Current)</label><br>
                                    
                                    <?php
                                    $mysql_run=mysqli_query($conn, "SELECT * FROM course WHERE course_id = $id");
                                    while ($row=mysqli_fetch_assoc($mysql_run)) {
                                    echo '<div class = "d-flex" style="float:left; border:1px #000 solid; 
                                    padding-bottom:5px; margin: 5px;">';
                                    echo '<img src="data:image/jpg;base64,' . 
                                    base64_encode($row['banner']) . '" width="100px" 
                                    height="auto"/><br>';
                                    echo '</div>'; }
                                    ?>
                                    <input type="file" class="form-control" id="image" name = "banner" value="<?php echo $row['banner'] ?>" />
                                    
                               


                                    </div>

                                    <button type="submit" name = "update" class="btn btn-primary">Submit</button>
                                </form>
                                <?php
                                }
                                mysqli_close($conn);
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