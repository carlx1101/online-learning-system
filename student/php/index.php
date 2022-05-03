
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
    <title>Home</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/title_icon.png">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.1/sp-1.4.0/sl-1.3.4/sr-1.1.0/datatables.min.css"/>

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
                              <li class="breadcrumb-item"><a href="blog.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                          </nav>
                   
                    </div>
                    <div class="col-6">
                        <div class="text-end upgrade-btn">


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
                        <!-- <div class="card">
                            <div class="card-body">

                                    
                            </div>
                        </div> -->


                        <div class="d-flex align-items-center justify-content-center rounded" style="background-image:linear-gradient(rgba(0,0,0,0.10),rgba(0,0,0,0.10)),url('../assets/images/banner.png'); background-position: center;background-size:cover; height: 350px; flex-direction:column;">
                            <!-- <h1 style="color:white;"></h1> -->
                            <!-- <br><br>
                            <span>Banner description </span> -->
                        </div><br>
                        <br>
                        <div class="row">
                        <h2 class="pb-2 border-bottom">About Us </h2>
                        <div class="col-sm">
                        <br>
                        <p>
                            <br>
                            CodeSpace is an interactive E-learning management system that offers economical and high-quality online education, programming courses, and blog for learners of all ages. The online system is highly interactive and accessible to a variety of users and features. The primary objective or consequence is to deliver affordable high-quality programming contents, information, as well as a customizable learning environment, and to alter inconvenient old-fashioned learning methods.  
                        </p>

                        </div>
                        <div class="col-sm text-center">
                        <img src="../assets/images/navlogo.png" alt="" width =45%>
                        </div>
                
                    </div>

                    <div class="row">                        
  <div class="container px-4 py-4" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Features </h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        </div>
        <div>
       
          <img src="../assets/images/f1.jpg" class="rounded" width = 80% height = "80%">
          <br><br>
          <h2>Quality Content</h2>
          <p>CodeSpace provides high quality content and proffesional tutor from around the world. We ensure the best user learning experience are well delivered. We care about our user !!</p>
          <a href="https://link.springer.com/article/10.1007/s11704-019-9023-2" class="btn btn-primary">
          Learn

          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        </div>
        <div>
        <img src="../assets/images/f2.jpg" class="rounded" width = 80% height = "80%">
          <br><br>
          <h2>Cost Effective</h2>
          <p>New System reduce student’s physical expenses on transportation, operation, materials, and stationery by conducting lesson fully online.  </p>
          <a href="https://online.illinois.edu/articles/online-learning/item/2019/10/22/5-benefits-of-online-courses-vs.-a-traditional-classroom#:~:text=Taking%20online%20courses%20tends%20to,are%20often%20additional%20costs%20associated." class="btn btn-primary">
          Learn

          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        </div>
        <div>
        <img src="../assets/images/f3.jpg" class="rounded" width = 80% height = "80%">
          <br><br>
          <h2>Customization</h2>
          <p>With online learning, students can attend lectures at their chosen time and location, as well as using their own preferred learning tools and visualization. </p>
          <a href="https://www.talentlms.com/elearning/personalization-and-learning" class="btn btn-primary">
            Learn
          </a>
        </div>
      </div>
    </div>
  </div>



    <div class="row">
        <h2 class="pb-2 border-bottom">Organization </h2>
  
 <section class="team text-center py-5">
   <div class="container">
     <div class="header my-5">
       <h1>Meet our Team </h1>
       <p class="text-muted">Meet and Greet our Team Members</p>
     </div>
     <div class="row">

     <div class="col-md-6 col-lg-1">
         <!-- <div class="img-block mb-5">
           <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t4.jpg" class="img-fluid  img-thumbnail rounded-circle" alt="image1">
           <div class="content mt-2">
             <h4>Zain Knob</h4>
             <p class="text-muted">Mechanical Engineer</p>
           </div>
         </div> -->
       </div>

       <div class="col-md-6 col-lg-2">
         <div class="img-block mb-5">
         <img src="../assets/images/wz.jpeg" class="img-fluid  img-thumbnail rounded-circle" style = "height:130px !important; width:160px !important;" alt="image1">
           <div class="content mt-2">
             <h4>Wong Wei Zhangw</h4>
             <p class="text-muted">Project Manager </p>
           </div>
         </div>
       </div>
       <div class="col-md-6 col-lg-2 ">
         <div class="img-block mb-5">
           <img src="../assets/images/ls.jpg" class="img-fluid  img-thumbnail rounded-circle" style = "height:130px !important; width:160px !important;" alt="image1">
           <div class="content mt-2">
             <h4>Ng Li Sheng</h4>
             <p class="text-muted"> Junior Software Engineer</p>
           </div>
         </div>
       </div>
       <div class="col-md-6 col-lg-2">
         <div class="img-block mb-5">
         <img src="../assets/images/carl.jpg" class="img-fluid  img-thumbnail rounded-circle" style = "height:130px !important; width:160px !important;" alt="image1">
           <div class="content mt-2">
             <h4>Carl</h4>
             <p class="text-muted">Junior Software Engineer</p>
           </div>
         </div>
       </div>
       <div class="col-md-6 col-lg-2">
         <div class="img-block mb-5">
         <img src="../assets/images/kl.jpeg" class="img-fluid  img-thumbnail rounded-circle" style = "height:130px !important; width:160px !important;" alt="image1">
           <div class="content mt-2">
             <h4>Wu Ka Lok</h4>
             <p class="text-muted">Database Administrator</p>
           </div>
         </div>
       </div>

       <div class="col-md-6 col-lg-2">
         <div class="img-block mb-5">
         <img src="../assets/images/muhsin.jpeg" class="img-fluid  img-thumbnail rounded-circle" style = "height:130px !important; width:160px !important;" alt="image1">
           <div class="content mt-2">
             <h4>Muhsin Sultan</h4>
             <p class="text-muted">System Analyst & Tester</p>
           </div>
         </div>
       </div>

       <div class="col-md-6 col-lg-1">
         <!-- <div class="img-block mb-5">
           <img src="https://www.wrappixel.com/demos/ui-kit/wrapfngfbnzkit/assets/images/team/t4.jpg" class="img-fluid  img-thumbnail rounded-circle" alt="image1">
           <div class="content mt-2">
             <h4>Zain Knob</h4>
             <p class="text-muted">Mechanical Engineer</p>
           </div>
         </div> -->
       </div>
     </div>
   </div>
 </section>
 
 
<div class="row">
    
</div>

 <!-- credits: https://bootstrapcrew.com/snippets/team-members/ -->
    </div>
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.1/sp-1.4.0/sl-1.3.4/sr-1.1.0/datatables.min.js"></script>


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