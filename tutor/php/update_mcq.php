
<!-- Session scripts below   -->
<?php
require "../includes/start_session.php";
?>  
<!-- Session scripts above   -->

<!-- Database connection below  -->
<?php
require "../includes/connection.php";
?>  
<!-- Da tabase connection below  -->

<!-- PHP script below   -->


<?php

    $account_id= $_SESSION['account_id'];
    $course_id = $_GET['cur_id'];
    if(isset($_POST['submit']))
    {
        $question = $_POST['question'];
        $first_choice = $_POST['first'];
        $second_choice = $_POST['second'];
        $third_choice = $_POST['third'];
        $last_choice = $_POST['last'];
        $answer = $_POST['answer'];
        

        $sql = "UPDATE quiz SET question = '$question', choice1 = '$first_choice' ,choice2 = '$second_choice', choice3 = '$third_choice',choice4 = '$last_choice', answer = '$answer' WHERE quiz_id = $_GET[quiz_id]";

        if (!mysqli_query($conn,$sql))
        {
        echo "<script>alert('Failed : Record Not updated')</script>";
        } 
        else {
        echo "<script>alert('Record Updated !')
        window.location.href = 'mcq.php?id=$course_id'
        </script>";
        }
        
    }
//   }
      
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
    <title>Update Quiz</title>
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

    <!-- ckeditor cdn -->
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

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
                              <li class="breadcrumb-item"><a href="blog.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">My MCQ</li>
                              <li class="breadcrumb-item active" aria-current="page">Update MCQ</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Update MCQ</h1> 
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
                                    $quiz_id = intval($_GET['quiz_id']); //intval — Get the integer value of a variable
                                    $result = mysqli_query($conn,"SELECT * FROM quiz WHERE quiz_id=$quiz_id");
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                    <form method = "POST" enctype="multipart/form-data" >
                                    <input type="hidden" name="id" value="<?php echo $row['quiz_id'] ?>">

                                        <div class="mb-3">
                                            <h2>Post Submission Form</h2><br>
                                            <label for="title" class="form-label">Question</label>
                                            <input type="text" class="form-control" id="title" name = "question" value="<?php echo $row['question'] ?>"  >
                                        </div>

                                        <div class="mb-3">
                                            <label for="title" class="form-label">First Choice</label>
                                            <input type="text" class="form-control" id="title" name = "first" value="<?php echo $row['choice1'] ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Second Choice</label>
                                            <input type="text" class="form-control" id="title" name = "second" value="<?php echo $row['choice2'] ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Third Choice</label>
                                            <input type="text" class="form-control" id="title" name = "third" value="<?php echo $row['choice3'] ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Last Choice</label>
                                            <input type="text" class="form-control" id="title" name = "last" value="<?php echo $row['choice4'] ?>" >
                                        </div>

                                        <div class="mb-3">
                                        <label for="title" class="form-label">Answer</label>
                                        <select class="form-select" aria-label="Default select example" name = "answer">
                                            <option selected>Select</option>
                                            <?php 

                                            if ($row['answer'] == 1)
                                            {
                                                echo "<option value='1' selected>First Choice</option>";
                                                echo "<option value='2' >Second Choice</option>";
                                                echo "<option value='3' >Third Choice</option>";
                                                echo "<option value='4' >Last Choice</option>";
                                            }
                                            else if ($row['answer'] ==2)
                                            {
                                                echo "<option value='1' >First Choice</option>";
                                                echo "<option value='2' selected >Second Choice</option>";
                                                echo "<option value='3' >Third Choice</option>";
                                                echo "<option value='4' >Last Choice</option>";
                                            }
                                            else if ($row['answer'] == 3)
                                            {
                                                echo "<option value='1' >First Choice</option>";
                                                echo "<option value='2' >Second Choice</option>";
                                                echo "<option value='3' selected >Third Choice</option>";
                                                echo "<option value='4' >Last Choice</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='1' selected>First Choice</option>";
                                                echo "<option value='2' >Second Choice</option>";
                                                echo "<option value='3' >Third Choice</option>";
                                                echo "<option value='4' selected>Last Choice</option>";

                                            }
                                            ?>
                                            </select>
                                        </div>

                                      

                                        <button type="submit" name = "submit" class="btn btn-primary">Update</button>
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


                

                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                <form method = "POST" enctype="multipart/form-data" >
                                <h2>Post Submission CSV</h2><br>

                                    <div class="mb-3">
                                        <label class="form-label" for="image">CSV File</label>
                                        <input type="file" class="form-control" id="file" name = "banner"  />
                                    </div>

                                    <button type="submit" name = "csv" class="btn btn-primary">Submit</button>
                                        
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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