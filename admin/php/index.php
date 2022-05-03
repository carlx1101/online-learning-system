<?php
require "../includes/start_session.php";
require "../includes/connection.php";

// Get All Users Data For Chart 
// Finding Learner Account
$query = sprintf("SELECT COUNT(user_type) As number_learner FROM account WHERE user_type = 0; ");
$records=mysqli_query($conn,$query);

foreach($records as $row)
{
    $convert_int  = $row["number_learner"];
    $number_learner = (int)$convert_int;
}


// Finding Tutor  Account
$query = sprintf("SELECT COUNT(user_type) As number_tutor FROM account WHERE user_type = 1; ");
$records=mysqli_query($conn,$query);

foreach($records as $row)
{
    $convert_int  = $row["number_tutor"];
    $number_tutor = (int)$convert_int;
}

// Finding Administrator Account 
$query = sprintf("SELECT COUNT(user_type) As number_administrator FROM account WHERE user_type = 2; ");
$records=mysqli_query($conn,$query);

foreach($records as $row)
{
    $convert_int  = $row["number_administrator"];
    $number_administrator = (int)$convert_int;
}

// Finding SubAdministrator Account 
$query = sprintf("SELECT COUNT(user_type) As number_subadministrator FROM account WHERE user_type = 3; ");
$records=mysqli_query($conn,$query);

foreach($records as $row)
{
    $convert_int  = $row["number_subadministrator"];
    $number_subadministrator = (int)$convert_int;
}
// System Stats Bar 
// Top Sales  
$stmt = $conn->prepare("SELECT title, SUM(amount_paid) as SAP FROM payment_detail INNER JOIN course ON payment_detail.course_id=course.course_id GROUP BY title ORDER BY SAP DESC LIMIT 1;");
$stmt->execute();
$stmt->bind_result($top_sale,$sum_amount_paid);
$stmt->fetch();
$stmt->close();



// Highest Profit Per Unit 
$stmt = $conn->prepare("SELECT title, MAX(price) FROM course GROUP BY title ORDER BY MAX(price) DESC LIMIT 1;");

$stmt->execute();
$stmt->bind_result($high_profit, $max_price);
$stmt->fetch();
$stmt->close();


// Most Commented Blog 
$stmt = $conn->prepare("SELECT blog.title, COUNT(comment.comment_id) as NumOfComments FROM blog INNER JOIN comment ON blog.blog_id = comment.blog_id GROUP BY blog.title ORDER BY NumOfComments DESC LIMIT 1; ");

$stmt->execute();
$stmt->bind_result($blog_title, $number_comment);
$stmt->fetch();
$stmt->close();


// Sales Chart
$query = sprintf("SELECT IFNULL(c.sales, 0) as sales, c.Month FROM (SELECT a.sales, b.Month FROM (SELECT COUNT(payment_id) AS sales, MONTHNAME(date_purchased) AS Month FROM payment INNER JOIN payment_detail USING(payment_id) GROUP BY Month ORDER BY date_purchased) AS a RIGHT JOIN (SELECT 'January' as Month UNION SELECT 'February' UNION SELECT 'March' UNION SELECT 'April' UNION SELECT 'May' UNION SELECT 'June' UNION SELECT 'July' UNION SELECT 'August' UNION SELECT 'September' UNION SELECT 'October' UNION SELECT 'November' UNION SELECT 'December') AS b ON a.Month=b.Month) AS c;");
$records=mysqli_query($conn,$query);

$sales_data = array();
foreach($records as $row)
{
    $row=$row["sales"];
    $sales_data[]=$row;
}

// Finding Best Seller 


$stmt = $conn->prepare("SELECT title, COUNT(payment_id) AS num_sold FROM payment_detail INNER JOIN course USING (course_id) GROUP BY title ORDER BY num_sold DESC LIMIT 1;");

$stmt->execute();
$stmt->bind_result($course_title,$num_sold);
$stmt->fetch();
$stmt->close();

// Finding High Rating 
$stmt = $conn->prepare("SELECT course.title, AVG(review.review_rating) AS avg_rating FROM review INNER JOIN course USING (course_id) GROUP BY course.title ORDER BY avg_rating DESC LIMIT 1;");

$stmt->execute();
$stmt->bind_result($hr_course_title,$avg_rating);
$stmt->fetch();
$stmt->close();



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
    <title>Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/title_icon.png">
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                            class="mdi mdi-menu"></i></a>
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
                              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1> 
                    </div>
                    <!-- <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div> -->
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
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <!-- All user chart -->
                                    <canvas id = "sales" height = 210 >

                                    </canvas>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Highlights </h4>
                                <h6 class="card-subtitle">Statistic</h6>
                                <div class="mt-5 pb-3 d-flex align-items-center">
                                    <span class="btn btn-primary btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-cart-outline fs-4" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Top Sales</h5>
                                        <span class="text-muted fs-6"><?=$top_sale?></span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">Earned RM<?=$sum_amount_paid?></span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-warning btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-star-circle fs-4" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Best Seller</h5>
                                        <span class="text-muted fs-6"><?=$course_title?></span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted"><?=$num_sold?> Sold</span>
                                    </div>
                                </div> 
                                    <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-info btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-diamond fs-4 text-white" ></i>
                                    </span>
                                    <div class="ms-3">
                                    <h5 class="mb-0 fw-bold">Highest Profit</h5>

                                        <span class="text-muted fs-6"><?=$high_profit?></span>
                                    </div>
                                    <div class="ms-auto">
                                    <span class="badge bg-light text-muted">RM <?=$max_price?> Per Unit</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-success btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-comment-multiple-outline text-white fs-4" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Most Commented</h5>
                                        <span class="text-muted fs-6"><?=$blog_title?></span>
                                    </div>
                                    <div class="ms-auto">
                                    <span class="badge bg-light text-muted"><?=$number_comment?> Commented</span>
                                    </div>
                                </div>


                                <div class="pt-3 d-flex align-items-center">
                                    <span class="btn btn-danger btn-circle d-flex align-items-center">
                                    <i class="mdi mdi-thumb-up-outline fs-4 text-white" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Highest Rating</h5>
                                        <span class="text-muted fs-6"><?=$hr_course_title?></span>
                                    </div>
                                    <div class="ms-auto">
                                    <span class="badge bg-light text-muted"><?=$avg_rating?> Stars Rating</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <canvas id="propotion"  height="210">

                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <canvas id="users"  height="300">

                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Top Selling Course</h4>
                                        <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                                    </div>
                                    <!-- <div class="ms-auto">
                                        <div class="dl">
                                            <select class="form-select shadow-none">
                                                <option value="0" selected>Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Products</th>
                                                <th class="border-top-0">Technology</th>
                                                <th class="border-top-0">Price</th>
                                                <th class="border-top-0">Sales</th>
                                                <th class="border-top-0">Earnings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        <?php 
                                 
                                 $result = mysqli_query($conn,"SELECT *, SUM(amount_paid) AS SAP, COUNT(amount_paid) AS CAP FROM payment_detail INNER JOIN course ON payment_detail.course_id=course.course_id JOIN category USING(category_id) GROUP BY title ORDER BY SAP DESC LIMIT 5;");
                                 
                                 while($row = mysqli_fetch_array($result))
                                 {   
                                 
                                 ?>
                                 <tr>
                                     <td>
                                         <div class="d-flex align-items-center">
                                             <!-- <div class="m-r-10"><a
                                             </div> -->
                                                     <!-- class="btn btn-circle d-flex btn-purple text-white"></a> -->
                                             <div class="">
                                                 <h4 class="m-b-0 font-16"><?php echo $row['title'] ?></h4>
                                             </div>
                                         </div>
                                     </td>
                                     <td>
                                         <label class="badge bg-purple"><?php echo $row['name'] ?></label>
                                     </td>
                                     <td><?php echo $row['price'] ?></td>
                                     <td><?php echo $row['CAP'] ?></td>
                                     <td>
                                         <h5 class="m-b-0"><?php echo $row['price'] * $row['CAP']  ?></h5>
                                     </td>
                                 </tr>
                                 <?php 
                                 }
                                 mysqli_close($conn);
                                 ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                                 
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
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>






<script>





// Bar Chart - Showing All Users, Learner, Tutor, Administrator 
const learner_data = <?php echo $number_learner;?>;
const tutor_data = <?php echo $number_tutor;?>;
const administrator_data = <?php echo $number_administrator;?>;
const subadministrator_data = <?php echo $number_subadministrator;?>;

new Chart(document.getElementById("users"), {
    type: 'bar',
    data: {
      labels: ["Learner", "Tutor", "Administrator"],
      datasets: [
        {
          label: "Disable",
          backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(255, 159, 64, 0.2)','rgba(75, 192, 192, 0.2)'],
          borderColor: ['rgb(255, 99, 132)', 'rgba(255, 159, 64)','rgba(75, 192, 192)'],
          data: [learner_data, tutor_data, administrator_data]
        }

      ]
    },

    
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});



// Pie Chart - Showing Proposition Of All Users, Learners, Tutors, Administrators In The System
new Chart(document.getElementById("propotion"), {
    type: 'pie',
    data: {
      labels: ["Learner","Tutor", "Administrator", "Subadministrator"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#B8F3FF", "#edbbfd","#3cba9f","rgba(255, 99, 132, 0.2)"],
        data: [learner_data, tutor_data, administrator_data, subadministrator_data]

      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});

// Line Chart - Showing System's Sales, Transaction and  Profit 
const sales_2022 = <?php echo json_encode($sales_data);?>;
console.log(sales_2022);

new Chart(document.getElementById("sales"), {
  type: 'line',
  data: {
    labels:  [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
          'July',
          'August',
          'September',
          'October',
          'November',
          'December'
        ],
    datasets: [{ 
        data: [1, 2, 5, 6, 9,10, 13,14,16,18,21,23],
        label: 'Sales 2021',
        backgroundColor: ['rgb(255, 99, 132)'],
        borderColor: ['rgb(255, 99, 132)',],
        fill: false
      }, { 
        data: sales_2022 ,
        label: 'Sales 2022',
        backgroundColor: ['rgb(255, 99, 132)','blue'],
        borderColor: ['rgb(255, 99, 132)','blue'],
        fill: false
      }, 
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Sales Chart'
    },
  }
});





new Chart(document.getElementById("category"), {
    type: 'pie',
    data: {
      labels: category_data,
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#B8F3FF", "#edbbfd","#3cba9f","#e8c3b9","#c45850"],
        data: course_data,
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});






</script>

    </script>
</body>

</html>