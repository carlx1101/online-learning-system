
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
    $id = $_SESSION['account_id'];
    $stmt = $conn->prepare("SELECT count(title) FROM course WHERE account_id = '$id'");
    $stmt->execute();
    $stmt->bind_result($course_counter);
    $stmt->fetch();
    $stmt->close();
    
    $stmt = $conn->prepare("SELECT count(title) FROM blog WHERE account_id = '$id'");
    $stmt->execute();
    $stmt->bind_result($blog_counter);
    $stmt->fetch();
    $stmt->close();


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
    <title>Education Portfolio</title>
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
                              <li class="breadcrumb-item"><a href="portfolio.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Education Porfolio</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Education Portfolio</h1> 
                        <small class="form-text text-danger">All information in this page will be display to the public ! <br>  Do not share your sensitive information !</small>

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
                 
                                $id = $_SESSION['account_id']; //intval — Get the integer value of a variable
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


                                </div> 
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br />
                                <button class="btn btn-circle btn-secondary" onclick="location.href='<?php echo $row['social_media1'] ?>'"><i class="fab fa-linkedin"></i></button>
                                <button class="btn btn-circle btn-secondary" onclick="location.href='<?php echo $row['social_media3'] ?>'"><i class="fab fa-github"></i></button>
                                <button class="btn btn-circle btn-secondary" onclick="location.href='<?php echo $row['social_media2'] ?>'"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    
                    mysqli_close($conn);
                    
                    ?>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <?php
                                require "../includes/connection.php";
                    
                                $id = $_SESSION['account_id']; //intval — Get the integer value of a variable
                                $result = mysqli_query($conn,"SELECT * FROM portfolio WHERE account_id=$id");
                                while($row = mysqli_fetch_array($result))
                                {
                                ?>

                                <form class="form-horizontal form-material mx-2" method = "POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['portfolio_id'] ?>">
    
                                <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" 
                                                class="form-control form-control-line" name = "name" value="<?php echo $row['name'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Position</label>
                                        <div class="col-md-12">
                                            <input type="text"
                                                class="form-control form-control-line" name = "position" value="<?php echo $row['position'] ?>">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" 
                                                class="form-control form-control-line" name="email"
                                                id="example-email" value="<?php echo $row['email'] ?>" >
                                        </div>
                                    </div>
  
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name = "phone" 
                                                class="form-control form-control-line" value="<?php echo $row['phone_number'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Bio</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name = "bio"  ><?php echo $row['bio'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Country</label>
                                        <div class="col-sm-12">
                                            <select class="form-select shadow-none form-control-line" name = "location">
                                                <option selected>Select a country</option>
                                                <option value="--">Not Specified</option>
                                                <option value="AF" <?php if ($row['location'] == "AF") { echo "selected"; } ?>>Afghanistan</option>
                                                <option value="AL" <?php if ($row['location'] == "AL") { echo "selected"; } ?>>Albania</option>
                                                <option value="DZ" <?php if ($row['location'] == "DZ") { echo "selected"; } ?>>Algeria</option>
                                                <option value="AS" <?php if ($row['location'] == "AS") { echo "selected"; } ?>>American Samoa</option>
                                                <option value="AD" <?php if ($row['location'] == "AD") { echo "selected"; } ?>>Andorra</option>
                                                <option value="AO" <?php if ($row['location'] == "AO") { echo "selected"; } ?>>Angola</option>
                                                <option value="AI" <?php if ($row['location'] == "AI") { echo "selected"; } ?>>Anguilla</option>
                                                <option value="AQ" <?php if ($row['location'] == "AQ") { echo "selected"; } ?>>Antarctica</option>
                                                <option value="AG" <?php if ($row['location'] == "AG") { echo "selected"; } ?>>Antigua and Barbuda</option>
                                                <option value="AR" <?php if ($row['location'] == "AR") { echo "selected"; } ?>>Argentina</option>
                                                <option value="AM" <?php if ($row['location'] == "AM") { echo "selected"; } ?>>Armenia</option>
                                                <option value="AW" <?php if ($row['location'] == "AW") { echo "selected"; } ?>>Aruba</option>
                                                <option value="AU" <?php if ($row['location'] == "AU") { echo "selected"; } ?>>Australia</option>
                                                <option value="AT" <?php if ($row['location'] == "AT") { echo "selected"; } ?>>Austria</option>
                                                <option value="AZ" <?php if ($row['location'] == "AZ") { echo "selected"; } ?>>Azerbaijan</option>
                                                <option value="BS" <?php if ($row['location'] == "BS") { echo "selected"; } ?>>Bahamas</option>
                                                <option value="BH" <?php if ($row['location'] == "BH") { echo "selected"; } ?>>Bahrain</option>
                                                <option value="BD" <?php if ($row['location'] == "BD") { echo "selected"; } ?>>Bangladesh</option>
                                                <option value="BB" <?php if ($row['location'] == "BB") { echo "selected"; } ?>>Barbados</option>
                                                <option value="BY" <?php if ($row['location'] == "BY") { echo "selected"; } ?>>Belarus</option>
                                                <option value="BE" <?php if ($row['location'] == "BE") { echo "selected"; } ?>>Belgium</option>
                                                <option value="BZ" <?php if ($row['location'] == "BZ") { echo "selected"; } ?>>Belize</option>
                                                <option value="BJ" <?php if ($row['location'] == "BJ") { echo "selected"; } ?>>Benin</option>
                                                <option value="BM" <?php if ($row['location'] == "BM") { echo "selected"; } ?>>Bermuda</option>
                                                <option value="BT" <?php if ($row['location'] == "BT") { echo "selected"; } ?>>Bhutan</option>
                                                <option value="BO" <?php if ($row['location'] == "BO") { echo "selected"; } ?>>Bolivia</option>
                                                <option value="BA" <?php if ($row['location'] == "BA") { echo "selected"; } ?>>Bosnia and Herzegowina</option>
                                                <option value="BW" <?php if ($row['location'] == "BW") { echo "selected"; } ?>>Botswana</option>
                                                <option value="BV" <?php if ($row['location'] == "BV") { echo "selected"; } ?>>Bouvet Island</option>
                                                <option value="BR" <?php if ($row['location'] == "BR") { echo "selected"; } ?>>Brazil</option>
                                                <option value="IO" <?php if ($row['location'] == "IO") { echo "selected"; } ?>>British Indian Ocean Territory</option>
                                                <option value="BN" <?php if ($row['location'] == "BN") { echo "selected"; } ?>>Brunei Darussalam</option>
                                                <option value="BG" <?php if ($row['location'] == "BG") { echo "selected"; } ?>>Bulgaria</option>
                                                <option value="BF" <?php if ($row['location'] == "BF") { echo "selected"; } ?>>Burkina Faso</option>
                                                <option value="BI" <?php if ($row['location'] == "BI") { echo "selected"; } ?>>Burundi</option>
                                                <option value="KH" <?php if ($row['location'] == "KH") { echo "selected"; } ?>>Cambodia</option>
                                                <option value="CM" <?php if ($row['location'] == "CM") { echo "selected"; } ?>>Cameroon</option>
                                                <option value="CA" <?php if ($row['location'] == "CA") { echo "selected"; } ?>>Canada</option>
                                                <option value="CV" <?php if ($row['location'] == "CV") { echo "selected"; } ?>>Cape Verde</option>
                                                <option value="KY" <?php if ($row['location'] == "KY") { echo "selected"; } ?>>Cayman Islands</option>
                                                <option value="CF" <?php if ($row['location'] == "CF") { echo "selected"; } ?>>Central African Republic</option>
                                                <option value="TD" <?php if ($row['location'] == "TD") { echo "selected"; } ?>>Chad</option>
                                                <option value="CL" <?php if ($row['location'] == "CL") { echo "selected"; } ?>>Chile</option>
                                                <option value="CN" <?php if ($row['location'] == "CN") { echo "selected"; } ?>>China</option>
                                                <option value="CX" <?php if ($row['location'] == "CX") { echo "selected"; } ?>>Christmas Island</option>
                                                <option value="CC" <?php if ($row['location'] == "CC") { echo "selected"; } ?>>Cocos (Keeling) Islands</option>
                                                <option value="CO" <?php if ($row['location'] == "CO") { echo "selected"; } ?>>Colombia</option>
                                                <option value="KM" <?php if ($row['location'] == "KM") { echo "selected"; } ?>>Comoros</option>
                                                <option value="CG" <?php if ($row['location'] == "CG") { echo "selected"; } ?>>Congo</option>
                                                <option value="CD" <?php if ($row['location'] == "CD") { echo "selected"; } ?>>Congo, the Democratic Republic of the</option>
                                                <option value="CK" <?php if ($row['location'] == "CK") { echo "selected"; } ?>>Cook Islands</option>
                                                <option value="CR" <?php if ($row['location'] == "CR") { echo "selected"; } ?>>Costa Rica</option>
                                                <option value="CI" <?php if ($row['location'] == "CI") { echo "selected"; } ?>>Cote d'Ivoire</option>
                                                <option value="HR" <?php if ($row['location'] == "HR") { echo "selected"; } ?>>Croatia (Hrvatska)</option>
                                                <option value="CU" <?php if ($row['location'] == "CU") { echo "selected"; } ?>>Cuba</option>
                                                <option value="CY" <?php if ($row['location'] == "CY") { echo "selected"; } ?>>Cyprus</option>
                                                <option value="CZ" <?php if ($row['location'] == "CZ") { echo "selected"; } ?>>Czech Republic</option>
                                                <option value="DK" <?php if ($row['location'] == "DK") { echo "selected"; } ?>>Denmark</option>
                                                <option value="DJ" <?php if ($row['location'] == "DJ") { echo "selected"; } ?>>Djibouti</option>
                                                <option value="DM" <?php if ($row['location'] == "DM") { echo "selected"; } ?>>Dominica</option>
                                                <option value="DO" <?php if ($row['location'] == "DO") { echo "selected"; } ?>>Dominican Republic</option>
                                                <option value="TP" <?php if ($row['location'] == "TP") { echo "selected"; } ?>>East Timor</option>
                                                <option value="EC" <?php if ($row['location'] == "EC") { echo "selected"; } ?>>Ecuador</option>
                                                <option value="EG" <?php if ($row['location'] == "EG") { echo "selected"; } ?>>Egypt</option>
                                                <option value="SV" <?php if ($row['location'] == "SV") { echo "selected"; } ?>>El Salvador</option>
                                                <option value="GQ" <?php if ($row['location'] == "GQ") { echo "selected"; } ?>>Equatorial Guinea</option>
                                                <option value="ER" <?php if ($row['location'] == "ER") { echo "selected"; } ?>>Eritrea</option>
                                                <option value="EE" <?php if ($row['location'] == "EE") { echo "selected"; } ?>>Estonia</option>
                                                <option value="ET" <?php if ($row['location'] == "ET") { echo "selected"; } ?>>Ethiopia</option>
                                                <option value="FK" <?php if ($row['location'] == "FK") { echo "selected"; } ?>>Falkland Islands (Malvinas)</option>
                                                <option value="FO" <?php if ($row['location'] == "FO") { echo "selected"; } ?>>Faroe Islands</option>
                                                <option value="FJ" <?php if ($row['location'] == "FJ") { echo "selected"; } ?>>Fiji</option>
                                                <option value="FI" <?php if ($row['location'] == "FI") { echo "selected"; } ?>>Finland</option>
                                                <option value="FR" <?php if ($row['location'] == "FR") { echo "selected"; } ?>>France</option>
                                                <option value="FX" <?php if ($row['location'] == "FX") { echo "selected"; } ?>>France, Metropolitan</option>
                                                <option value="GF" <?php if ($row['location'] == "GF") { echo "selected"; } ?>>French Guiana</option>
                                                <option value="PF" <?php if ($row['location'] == "PH") { echo "selected"; } ?>>French Polynesia</option>
                                                <option value="TF" <?php if ($row['location'] == "TF") { echo "selected"; } ?>>French Southern Territories</option>
                                                <option value="GA" <?php if ($row['location'] == "GA") { echo "selected"; } ?>>Gabon</option>
                                                <option value="GM" <?php if ($row['location'] == "GM") { echo "selected"; } ?>>Gambia</option>
                                                <option value="GE" <?php if ($row['location'] == "GE") { echo "selected"; } ?>>Georgia</option>
                                                <option value="DE" <?php if ($row['location'] == "DE") { echo "selected"; } ?>>Germany</option>
                                                <option value="GH" <?php if ($row['location'] == "GH") { echo "selected"; } ?>>Ghana</option>
                                                <option value="GI" <?php if ($row['location'] == "GI") { echo "selected"; } ?>>Gibraltar</option>
                                                <option value="GR" <?php if ($row['location'] == "GR") { echo "selected"; } ?>>Greece</option>
                                                <option value="GL" <?php if ($row['location'] == "GL") { echo "selected"; } ?>>Greenland</option>
                                                <option value="GD" <?php if ($row['location'] == "GD") { echo "selected"; } ?>>Grenada</option>
                                                <option value="GP" <?php if ($row['location'] == "GP") { echo "selected"; } ?>>Guadeloupe</option>
                                                <option value="GU" <?php if ($row['location'] == "GU") { echo "selected"; } ?>>Guam</option>
                                                <option value="GT" <?php if ($row['location'] == "GT") { echo "selected"; } ?>>Guatemala</option>
                                                <option value="GN" <?php if ($row['location'] == "GN") { echo "selected"; } ?>>Guinea</option>
                                                <option value="GW" <?php if ($row['location'] == "GW") { echo "selected"; } ?>>Guinea-Bissau</option>
                                                <option value="GY" <?php if ($row['location'] == "GY") { echo "selected"; } ?>>Guyana</option>
                                                <option value="HT" <?php if ($row['location'] == "HT") { echo "selected"; } ?>>Haiti</option>
                                                <option value="HM" <?php if ($row['location'] == "HM") { echo "selected"; } ?>>Heard and Mc Donald Islands</option>
                                                <option value="VA" <?php if ($row['location'] == "VA") { echo "selected"; } ?>>Holy See (Vatican City State)</option>
                                                <option value="HN" <?php if ($row['location'] == "HN") { echo "selected"; } ?>>Honduras</option>
                                                <option value="HK" <?php if ($row['location'] == "HK") { echo "selected"; } ?>>Hong Kong</option>
                                                <option value="HU" <?php if ($row['location'] == "HU") { echo "selected"; } ?>>Hungary</option>
                                                <option value="IS" <?php if ($row['location'] == "IS") { echo "selected"; } ?>>Iceland</option>
                                                <option value="IN" <?php if ($row['location'] == "IN") { echo "selected"; } ?>>India</option>
                                                <option value="ID" <?php if ($row['location'] == "ID") { echo "selected"; } ?>>Indonesia</option>
                                                <option value="IR" <?php if ($row['location'] == "IR") { echo "selected"; } ?>>Iran (Islamic Republic of)</option>
                                                <option value="IQ" <?php if ($row['location'] == "IQ") { echo "selected"; } ?>>Iraq</option>
                                                <option value="IE" <?php if ($row['location'] == "IE") { echo "selected"; } ?>>Ireland</option>
                                                <option value="IL" <?php if ($row['location'] == "IL") { echo "selected"; } ?>>Israel</option>
                                                <option value="IT" <?php if ($row['location'] == "IT") { echo "selected"; } ?>>Italy</option>
                                                <option value="JM" <?php if ($row['location'] == "JM") { echo "selected"; } ?>>Jamaica</option>
                                                <option value="JP" <?php if ($row['location'] == "JP") { echo "selected"; } ?>>Japan</option>
                                                <option value="JO" <?php if ($row['location'] == "JO") { echo "selected"; } ?>>Jordan</option>
                                                <option value="KZ" <?php if ($row['location'] == "KZ") { echo "selected"; } ?>>Kazakhstan</option>
                                                <option value="KE" <?php if ($row['location'] == "KE") { echo "selected"; } ?>>Kenya</option>
                                                <option value="KI" <?php if ($row['location'] == "KI") { echo "selected"; } ?>>Kiribati</option>
                                                <option value="KP" <?php if ($row['location'] == "KP") { echo "selected"; } ?>>Korea, Democratic People's Republic of</option>
                                                <option value="KR" <?php if ($row['location'] == "KR") { echo "selected"; } ?>>Korea, Republic of</option>
                                                <option value="KW" <?php if ($row['location'] == "KW") { echo "selected"; } ?>>Kuwait</option>
                                                <option value="KG" <?php if ($row['location'] == "KG") { echo "selected"; } ?>>Kyrgyzstan</option>
                                                <option value="LA" <?php if ($row['location'] == "LA") { echo "selected"; } ?>>Lao People's Democratic Republic</option>
                                                <option value="LV" <?php if ($row['location'] == "LV") { echo "selected"; } ?>>Latvia</option>
                                                <option value="LB" <?php if ($row['location'] == "LB") { echo "selected"; } ?>>Lebanon</option>
                                                <option value="LS" <?php if ($row['location'] == "LS") { echo "selected"; } ?>>Lesotho</option>
                                                <option value="LR" <?php if ($row['location'] == "LR") { echo "selected"; } ?>>Liberia</option>
                                                <option value="LY" <?php if ($row['location'] == "LY") { echo "selected"; } ?>>Libyan Arab Jamahiriya</option>
                                                <option value="LI" <?php if ($row['location'] == "LI") { echo "selected"; } ?>>Liechtenstein</option>
                                                <option value="LT" <?php if ($row['location'] == "LT") { echo "selected"; } ?>>Lithuania</option>
                                                <option value="LU" <?php if ($row['location'] == "LU") { echo "selected"; } ?>>Luxembourg</option>
                                                <option value="MO" <?php if ($row['location'] == "MO") { echo "selected"; } ?>>Macau</option>
                                                <option value="MK" <?php if ($row['location'] == "MK") { echo "selected"; } ?>>Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="MG" <?php if ($row['location'] == "MG") { echo "selected"; } ?>>Madagascar</option>
                                                <option value="MW" <?php if ($row['location'] == "MW") { echo "selected"; } ?>>Malawi</option>
                                                <option value="MY" <?php if ($row['location'] == "MY") { echo "selected"; } ?>>Malaysia</option>
                                                <option value="MV" <?php if ($row['location'] == "MV") { echo "selected"; } ?>>Maldives</option>
                                                <option value="ML" <?php if ($row['location'] == "ML") { echo "selected"; } ?>>Mali</option>
                                                <option value="MT" <?php if ($row['location'] == "MT") { echo "selected"; } ?>>Malta</option>
                                                <option value="MH" <?php if ($row['location'] == "MH") { echo "selected"; } ?>>Marshall Islands</option>
                                                <option value="MQ" <?php if ($row['location'] == "MQ") { echo "selected"; } ?>>Martinique</option>
                                                <option value="MR" <?php if ($row['location'] == "MR") { echo "selected"; } ?>>Mauritania</option>
                                                <option value="MU" <?php if ($row['location'] == "MU") { echo "selected"; } ?>>Mauritius</option>
                                                <option value="YT" <?php if ($row['location'] == "YT") { echo "selected"; } ?>>Mayotte</option>
                                                <option value="MX" <?php if ($row['location'] == "MX") { echo "selected"; } ?>>Mexico</option>
                                                <option value="FM" <?php if ($row['location'] == "FM") { echo "selected"; } ?>>Micronesia, Federated States of</option>
                                                <option value="MD" <?php if ($row['location'] == "MD") { echo "selected"; } ?>>Moldova, Republic of</option>
                                                <option value="MC" <?php if ($row['location'] == "MC") { echo "selected"; } ?>>Monaco</option>
                                                <option value="MN" <?php if ($row['location'] == "MN") { echo "selected"; } ?>>Mongolia</option>
                                                <option value="MS" <?php if ($row['location'] == "MS") { echo "selected"; } ?>>Montserrat</option>
                                                <option value="MA" <?php if ($row['location'] == "MA") { echo "selected"; } ?>>Morocco</option>
                                                <option value="MZ" <?php if ($row['location'] == "MZ") { echo "selected"; } ?>>Mozambique</option>
                                                <option value="MM" <?php if ($row['location'] == "MM") { echo "selected"; } ?>>Myanmar</option>
                                                <option value="NA" <?php if ($row['location'] == "NA") { echo "selected"; } ?>>Namibia</option>
                                                <option value="NR" <?php if ($row['location'] == "NR") { echo "selected"; } ?>>Nauru</option>
                                                <option value="NP" <?php if ($row['location'] == "NP") { echo "selected"; } ?>>Nepal</option>
                                                <option value="NL" <?php if ($row['location'] == "NL") { echo "selected"; } ?>>Netherlands</option>
                                                <option value="AN" <?php if ($row['location'] == "AN") { echo "selected"; } ?>>Netherlands Antilles</option>
                                                <option value="NC" <?php if ($row['location'] == "NC") { echo "selected"; } ?>>New Caledonia</option>
                                                <option value="NZ" <?php if ($row['location'] == "NZ") { echo "selected"; } ?>>New Zealand</option>
                                                <option value="NI" <?php if ($row['location'] == "NI") { echo "selected"; } ?>>Nicaragua</option>
                                                <option value="NE" <?php if ($row['location'] == "NE") { echo "selected"; } ?>>Niger</option>
                                                <option value="NG" <?php if ($row['location'] == "NG") { echo "selected"; } ?>>Nigeria</option>
                                                <option value="NU" <?php if ($row['location'] == "NU") { echo "selected"; } ?>>Niue</option>
                                                <option value="NF" <?php if ($row['location'] == "NF") { echo "selected"; } ?>>Norfolk Island</option>
                                                <option value="MP" <?php if ($row['location'] == "MP") { echo "selected"; } ?>>Northern Mariana Islands</option>
                                                <option value="NO" <?php if ($row['location'] == "NO") { echo "selected"; } ?>>Norway</option>
                                                <option value="OM" <?php if ($row['location'] == "OM") { echo "selected"; } ?>>Oman</option> 
                                                <option value="PK" <?php if ($row['location'] == "PK") { echo "selected"; } ?>>Pakistan</option>
                                                <option value="PW" <?php if ($row['location'] == "PW") { echo "selected"; } ?>>Palau</option>
                                                <option value="PA" <?php if ($row['location'] == "PA") { echo "selected"; } ?>>Panama</option>
                                                <option value="PG" <?php if ($row['location'] == "PG") { echo "selected"; } ?>>Papua New Guinea</option>
                                                <option value="PY" <?php if ($row['location'] == "PY") { echo "selected"; } ?>>Paraguay</option>
                                                <option value="PE" <?php if ($row['location'] == "PE") { echo "selected"; } ?>>Peru</option>
                                                <option value="PH" <?php if ($row['location'] == "PH") { echo "selected"; } ?>>Philippines</option>
                                                <option value="PN" <?php if ($row['location'] == "PN") { echo "selected"; } ?>>Pitcairn</option>
                                                <option value="PL" <?php if ($row['location'] == "PL") { echo "selected"; } ?>>Poland</option>
                                                <option value="PT" <?php if ($row['location'] == "PT") { echo "selected"; } ?>>Portugal</option>
                                                <option value="PR" <?php if ($row['location'] == "PR") { echo "selected"; } ?>>Puerto Rico</option>
                                                <option value="QA" <?php if ($row['location'] == "QA") { echo "selected"; } ?>>Qatar</option>
                                                <option value="RE" <?php if ($row['location'] == "RE") { echo "selected"; } ?>>Reunion</option>
                                                <option value="RO" <?php if ($row['location'] == "RO") { echo "selected"; } ?>>Romania</option>
                                                <option value="RU" <?php if ($row['location'] == "RU") { echo "selected"; } ?>>Russian Federation</option>
                                                <option value="RW" <?php if ($row['location'] == "RW") { echo "selected"; } ?>>Rwanda</option>
                                                <option value="KN" <?php if ($row['location'] == "KN") { echo "selected"; } ?><?php if ($row['location'] == "KN") { echo "selected"; } ?>>Saint Kitts and Nevis</option> 
                                                <option value="LC" <?php if ($row['location'] == "LC") { echo "selected"; } ?><?php if ($row['location'] == "LC") { echo "selected"; } ?>>Saint LUCIA</option>
                                                <option value="VC" <?php if ($row['location'] == "VC") { echo "selected"; } ?><?php if ($row['location'] == "VC") { echo "selected"; } ?>>Saint Vincent and the Grenadines</option>
                                                <option value="WS" <?php if ($row['location'] == "WS") { echo "selected"; } ?>>Samoa</option>
                                                <option value="SM"><?php if ($row['location'] == "SM") { echo "selected"; } ?>San Marino</option>
                                                <option value="ST"><?php if ($row['location'] == "ST") { echo "selected"; } ?>Sao Tome and Principe</option> 
                                                <option value="SA"><?php if ($row['location'] == "SA") { echo "selected"; } ?>Saudi Arabia</option>
                                                <option value="SN"><?php if ($row['location'] == "SN") { echo "selected"; } ?>Senegal</option>
                                                <option value="SC"><?php if ($row['location'] == "SC") { echo "selected"; } ?>Seychelles</option>
                                                <option value="SL"><?php if ($row['location'] == "SL") { echo "selected"; } ?>Sierra Leone</option>
                                                <option value="SG"><?php if ($row['location'] == "SG") { echo "selected"; } ?>Singapore</option>
                                                <option value="SK"><?php if ($row['location'] == "SK") { echo "selected"; } ?>Slovakia (Slovak Republic)</option>
                                                <option value="SI"><?php if ($row['location'] == "SI") { echo "selected"; } ?>Slovenia</option>
                                                <option value="SB"><?php if ($row['location'] == "SB") { echo "selected"; } ?>Solomon Islands</option>
                                                <option value="SO"><?php if ($row['location'] == "SO") { echo "selected"; } ?>Somalia</option>
                                                <option value="ZA"><?php if ($row['location'] == "ZA") { echo "selected"; } ?>South Africa</option>
                                                <option value="GS"><?php if ($row['location'] == "GS") { echo "selected"; } ?>South Georgia and the South Sandwich Islands</option>
                                                <option value="ES"><?php if ($row['location'] == "ES") { echo "selected"; } ?>Spain</option>
                                                <option value="LK"><?php if ($row['location'] == "LK") { echo "selected"; } ?>Sri Lanka</option>
                                                <option value="SH"><?php if ($row['location'] == "SH") { echo "selected"; } ?>St. Helena</option>
                                                <option value="PM"><?php if ($row['location'] == "PM") { echo "selected"; } ?>St. Pierre and Miquelon</option>
                                                <option value="SD"><?php if ($row['location'] == "SD") { echo "selected"; } ?>Sudan</option>
                                                <option value="SR"><?php if ($row['location'] == "SR") { echo "selected"; } ?>Suriname</option>
                                                <option value="SJ"><?php if ($row['location'] == "SJ") { echo "selected"; } ?>Svalbard and Jan Mayen Islands</option>
                                                <option value="SZ"><?php if ($row['location'] == "SZ") { echo "selected"; } ?>Swaziland</option>
                                                <option value="SE"><?php if ($row['location'] == "SE") { echo "selected"; } ?>Sweden</option>
                                                <option value="CH"><?php if ($row['location'] == "CH") { echo "selected"; } ?>Switzerland</option>
                                                <option value="SY"><?php if ($row['location'] == "SY") { echo "selected"; } ?>Syrian Arab Republic</option>
                                                <option value="TW"><?php if ($row['location'] == "TW") { echo "selected"; } ?>Taiwan, Province of China</option>
                                                <option value="TJ"><?php if ($row['location'] == "TJ") { echo "selected"; } ?>Tajikistan</option>
                                                <option value="TZ"><?php if ($row['location'] == "TZ") { echo "selected"; } ?>Tanzania, United Republic of</option>
                                                <option value="TH"><?php if ($row['location'] == "TH") { echo "selected"; } ?>Thailand</option>
                                                <option value="TG"><?php if ($row['location'] == "TG") { echo "selected"; } ?>Togo</option>
                                                <option value="TK"><?php if ($row['location'] == "TK") { echo "selected"; } ?>Tokelau</option>
                                                <option value="TO"><?php if ($row['location'] == "TO") { echo "selected"; } ?>Tonga</option>
                                                <option value="TT"><?php if ($row['location'] == "TT") { echo "selected"; } ?>Trinidad and Tobago</option>
                                                <option value="TN"><?php if ($row['location'] == "TN") { echo "selected"; } ?>Tunisia</option>
                                                <option value="TR"><?php if ($row['location'] == "TR") { echo "selected"; } ?>Turkey</option>
                                                <option value="TM"><?php if ($row['location'] == "TM") { echo "selected"; } ?>Turkmenistan</option>
                                                <option value="TC"><?php if ($row['location'] == "TC") { echo "selected"; } ?>Turks and Caicos Islands</option>
                                                <option value="TV"><?php if ($row['location'] == "TV") { echo "selected"; } ?>Tuvalu</option>
                                                <option value="UG"><?php if ($row['location'] == "UG") { echo "selected"; } ?>Uganda</option>
                                                <option value="UA"><?php if ($row['location'] == "UA") { echo "selected"; } ?>Ukraine</option>
                                                <option value="AE"><?php if ($row['location'] == "AE") { echo "selected"; } ?>United Arab Emirates</option>
                                                <option value="GB"><?php if ($row['location'] == "GB") { echo "selected"; } ?>United Kingdom</option>
                                                <option value="US" <?php if ($row['location'] == "US") { echo "selected"; } ?>>United States</option>
                                                <option value="UM"><?php if ($row['location'] == "UM") { echo "selected"; } ?>United States Minor Outlying Islands</option>
                                                <option value="UY"><?php if ($row['location'] == "UY") { echo "selected"; } ?>Uruguay</option>
                                                <option value="UZ"><?php if ($row['location'] == "UZ") { echo "selected"; } ?>Uzbekistan</option>
                                                <option value="VU"><?php if ($row['location'] == "VU") { echo "selected"; } ?>Vanuatu</option>
                                                <option value="VE"><?php if ($row['location'] == "VE") { echo "selected"; } ?>Venezuela</option>
                                                <option value="VN" <?php if ($row['location'] == "VN") { echo "selected"; } ?>>Viet Nam</option>
                                                <option value="VG" <?php if ($row['location'] == "VG") { echo "selected"; } ?>>Virgin Islands (British)</option>
                                                <option value="VI" <?php if ($row['location'] == "VI") { echo "selected"; } ?>>Virgin Islands (U.S.)</option>
                                                <option value="WF" <?php if ($row['location'] == "WF") { echo "selected"; } ?>>Wallis and Futuna Islands</option>
                                                <option value="EH" <?php if ($row['location'] == "EH") { echo "selected"; } ?>>Western Sahara</option>
                                                <option value="YE" <?php if ($row['location'] == "YE") { echo "selected"; } ?>>Yemen</option>
                                                <option value="YU" <?php if ($row['location'] == "YU") { echo "selected"; } ?>>Yugoslavia</option>
                                                <option value="ZM" <?php if ($row['location'] == "ZM") { echo "selected"; } ?>>Zambia</option>
                                                <option value="ZW" <?php if ($row['location'] == "ZW") { echo "selected"; } ?>>Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <label for="profile-pic" class="col-md-12">Profile Pic</label>
                                        <div class="col-md-12">
                                            <input type="file" 
                                                class="form-control form-control-line" name="profile"
                                                id="profile-pic">
                                        </div>
                                    </div>                                    
                                    

                                    <div class="form-group">
                                        <label class="col-md-12">Linkedin</label>
                                        <div class="col-md-12">
                                            <input type="link"
                                                class="form-control form-control-line" name = "social1" value="<?php echo $row['social_media1'] ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-12">Youtube</label>
                                        <div class="col-md-12">
                                            <input type="link"
                                                class="form-control form-control-line" name = "social2" value="<?php echo $row['social_media2'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Github</label>
                                        <div class="col-md-12">
                                            <input type="link"
                                                class="form-control form-control-line" name = "social3" value="<?php echo $row['social_media3'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type = "submit" name = "update" class="btn btn-success text-white">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
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