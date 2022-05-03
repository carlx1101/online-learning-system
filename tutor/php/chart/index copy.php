<?php
require "../includes/start_session.php";
require "../includes/connection.php";


?>  

<!-- Dashboard 1 -->
<?php 
$account_id = $_SESSION['account_id'];

// $query = sprintf("SELECT COUNT(payment_id) AS sales, MONTHNAME(date_purchased) AS MonthName FROM payment GROUP BY MonthName  ORDER BY date_purchased;");
// $query = sprintf("SELECT COUNT(payment_id) AS sales, MONTHNAME(date_purchased) AS MonthName FROM payment WHERE account_id = '$account_id' GROUP BY MonthName ORDER BY date_purchased;");
$query = sprintf("SELECT IFNULL(c.sales, 0) as sales, c.Month FROM (SELECT a.sales, b.Month FROM (SELECT COUNT(payment_id) AS sales, MONTHNAME(date_purchased) AS Month FROM payment WHERE account_id=$account_id GROUP BY Month ORDER BY date_purchased) AS a RIGHT JOIN (SELECT 'January' as Month UNION SELECT 'February' UNION SELECT 'March' UNION SELECT 'April' UNION SELECT 'May' UNION SELECT 'June' UNION SELECT 'July' UNION SELECT 'August' UNION SELECT 'September' UNION SELECT 'October' UNION SELECT 'November' UNION SELECT 'December') AS b ON a.Month=b.Month) AS c;");
$records=mysqli_query($conn,$query);

$sales_data = array();
foreach($records as $row)
{
    $row=$row["sales"];
    $sales_data[]=$row;
}

// to display array 
// foreach( $sales_data as $var ) {
//     echo "$var";
// }

?>


<?php 
// dashboard 2 (pie chart) proportion of category of its course 
// $query = sprintf("SELECT COUNT(payment_id) AS sales, MONTHNAME(date_purchased) AS MonthName FROM payment GROUP BY MonthName  ORDER BY date_purchased;");
$query = sprintf("SELECT ca.name AS category_name, COUNT(co.course_id) AS course_name FROM category ca, course co, account ac WHERE ca.category_id=co.category_id AND co.account_id=ac.account_id AND ac.account_id=$account_id GROUP BY ca.name;
");
$records=mysqli_query($conn,$query);

$category_name = array();
$course_name = array();
foreach($records as $row)
{
    $row1=$row["category_name"];
    $row2=$row["course_name"];
    $category_data[]=$row1;
    $course_data[]=$row2;
}

?>


<?php
// dashboard 3 (bar chart) nOf course and blog 

// to find blog 
$query = sprintf("SELECT COUNT(blog.id) AS number_blog FROM blog INNER JOIN account ac ON blog.account_id=ac.account_id WHERE ac.account_id=$account_id; ");
$records=mysqli_query($conn,$query);

foreach($records as $row)
{
    $convert_int  = $row["number_blog"];
    $num_blog = (int)$convert_int;
}

// to find course 
$query = sprintf("SELECT COUNT(co.course_id) AS number_course FROM course co INNER JOIN account ac ON co.account_id=ac.account_id WHERE ac.account_id=$account_id;
");
$records=mysqli_query($conn,$query);

foreach($records as $row)
{
    $convert_int  = $row["number_course"];
    $num_course = (int)$convert_int;

}




?>




<?php 

// $query = sprintf("SELECT COUNT(course) AS cou, MONTHNAME(date_purchased) AS MonthName FROM payment WHERE account_id = '$account_id' GROUP BY MonthName ORDER BY date_purchased;");
// $records=mysqli_query($conn,$query);

// $sales_data = array();
// foreach($records as $row)
// {
//     $row=$row["sales"];
//     $sales_data[]=$row;
// }


?>


<?php 

// dasboard 2 stats

$account_id= $_SESSION['account_id'];

// top sale 
$stmt = $conn->prepare("SELECT title, SUM(amount_paid) as SAP FROM payment_detail INNER JOIN course ON payment_detail.course_id=course.course_id WHERE account_id = '$account_id' GROUP BY title ORDER BY SAP DESC LIMIT 1;");
$stmt->execute();
$stmt->bind_result($top_sale,$sum_amount_paid);
$stmt->fetch();
$stmt->close();


// best seller 

// $stmt = $conn->prepare("SELECT COUNT(course_id) AS `value_occurrence` 
// FROM
// payment_detail

// GROUP BY 
// course_id
// ORDER BY 
// `value_occurrence` DESC

// LIMIT 1;");


$stmt = $conn->prepare("SELECT course_id, course.title
FROM
payment_detail

JOIN course USING (course_id)

WHERE 
course.account_id = '$account_id'

GROUP BY 
course_id


ORDER BY 
count(*) DESC



LIMIT 1;");


// $stmt = $conn->prepare("SELECT course_id
// FROM
// payment_detail


// GROUP BY 
// course_id

// ORDER BY 
// count(*) DESC

// LIMIT 1;");
$stmt->execute();
$stmt->bind_result($var,$best_seller);
$stmt->fetch();
$stmt->close();








// top budget 
$stmt = $conn->prepare("SELECT title, MAX(price) FROM course GROUP BY title ");

$stmt->execute();
$stmt->bind_result($top_budget, $max_price);
$stmt->fetch();
$stmt->close();

?>


<?php 

$stmt = $conn->prepare("SELECT course_id, course.title, course.banner, price
FROM
payment_detail

JOIN course USING (course_id)

WHERE 
course.account_id = '$account_id'

GROUP BY 
course_id


ORDER BY 
count(*) DESC

LIMIT 5;");

$stmt->execute();
$stmt->bind_result($curse_id,$best_sellerN,$banner, $price);
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
    <title>CodeSpace</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
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
                                    <h6 style = "color:gray; font-weight :bold;">Analytics of Sales growth </h6>
                                    <canvas id="sales_growth"  height="210">
                                        
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Montly Stats</h4>
                                <h6 class="card-subtitle">Average sales</h6>
                                <div class="mt-5 pb-3 d-flex align-items-center">
                                    <span class="btn btn-primary btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-cart-outline fs-4" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Top Sales</h5>
                                        <span class="text-muted fs-6"><?=$top_sale?></span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-warning btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-star-circle fs-4" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Best Seller</h5>
                                        <span class="text-muted fs-6"><?=$best_seller?></span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div> 
                                    <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-info btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-diamond fs-4 text-white" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Highest Rating</h5>
                                        <span class="text-muted fs-6"><?=$top_budget?></span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+15%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-success btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-comment-multiple-outline text-white fs-4" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Most Commented</h5>
                                        <span class="text-muted fs-6">Ample Admin</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>


                                <div class="pt-3 d-flex align-items-center">
                                    <span class="btn btn-danger btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-content-duplicate fs-4 text-white" ></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Most Popular</h5>
                                        <span class="text-muted fs-6">Nirav Joshi</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+90%</span>
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
                                <h6 style = "color:gray; font-weight :bold;">Propotion of course type </h6>

                                    <canvas id="category"  height="210">

                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                <h6 style = "color:gray; font-weight :bold;">Number of Couses and Blogs </h6>

                                    <canvas id="courseVsBlog"  height="300">

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
                                           
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><a
                                                                class="btn btn-circle d-flex btn-purple text-white">AA</a>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16"><?=$best_sellerN?></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label class="badge bg-purple">React</label>
                                                </td>
                                                <td><?=$price?></td>
                                                <td>356</td>
                                                <td>
                                                    <h5 class="m-b-0">$2850.06</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Comments</h4>
                            </div>
                            <div class="comment-widgets scrollable">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="../assets/images/users/1.jpg" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">James Anderson</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                            and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">April 14, 2021</span> <span
                                                class="badge bg-primary">Pending</span> <span
                                                class="action-icons">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="../assets/images/users/4.jpg" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">Michael Jorden</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                            and type setting industry. </span>
                                        <div class="comment-footer ">
                                            <span class="text-muted float-end">April 14, 2021</span>
                                            <span class="badge bg-success">Approved</span>
                                            <span class="action-icons active">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)"><i class="icon-close"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="../assets/images/users/5.jpg" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Johnathan Doeting</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                            and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">April 14, 2021</span>
                                            <span class="badge bg-danger">Rejected</span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Temp Guide</h4>
                                <div class="d-flex align-items-center flex-row m-t-30">
                                    <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                                        <span>73<sup>°</sup></span></div>
                                    <div class="m-l-10">
                                        <h3 class="m-b-0">Saturday</h3><small>Ahmedabad, India</small>
                                    </div>
                                </div>
                                <table class="table no-border mini-table m-t-20">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">Wind</td>
                                            <td class="font-medium">ESE 17 mph</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Humidity</td>
                                            <td class="font-medium">83%</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Pressure</td>
                                            <td class="font-medium">28.56 in</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Cloud Cover</td>
                                            <td class="font-medium">78%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="row list-style-none text-center m-t-30">
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                        <span class="d-block text-muted">09:30</span>
                                        <h3 class="m-t-5">70<sup>°</sup></h3>
                                    </li>
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                                        <span class="d-block text-muted">11:30</span>
                                        <h3 class="m-t-5">72<sup>°</sup></h3>
                                    </li>
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                                        <span class="d-block text-muted">13:30</span>
                                        <h3 class="m-t-5">75<sup>°</sup></h3>
                                    </li>
                                    <li class="col-3">
                                        <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                                        <span class="d-block text-muted">15:30</span>
                                        <h3 class="m-t-5">76<sup>°</sup></h3>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
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
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>



    
    <script>
// dashboard 1
const sales_2022 = <?php echo json_encode($sales_data);?>;

// dashboard 2 
const category_data = <?php echo json_encode($category_data);?>;
const course_data = <?php echo json_encode($course_data);?>;


// dashboard 3 
const blog_data = <?php echo $num_blog;?>;
const num_course_data = <?php echo $num_course;?>;




new Chart(document.getElementById("sales_growth"), {
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
        data: [5, 5, 5, 2, 2,1, 5,2,1,2,4,2],
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



// Bar chart
new Chart(document.getElementById("courseVsBlog"), {
    type: 'bar',
    data: {
      labels: ["Course", "Education Blog"],
      datasets: [
        {
          label: "Disable",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [num_course_data,blog_data]
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
    </script>
</body>


</html>