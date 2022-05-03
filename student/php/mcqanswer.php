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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
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
<div class="container">
    <h1 class="my-4 text-center">Answer Sheet</h1>
    <div class="card">
        <div class="card-body mb-5">
            <div class="container">
            <?php
            require "../includes/connection.php";
            if(isset($_POST['submit']))
            {
                $sql = "SELECT * FROM quiz WHERE course_id= $courseID";
                $records = mysqli_query($conn, $sql);
                $a = 1;
                while($row = mysqli_fetch_array($records))
                {
                ?>
                    <div class="answer mb-5">
                        <?php
                        if($row['answer'] == 1)
                        {
                        ?>                      
                            <h4 class="mt-2"><?php echo $a?>. <?php echo $row['question'] ?></h4>
                            <div class="alert alert-success" role="alert">
                                A. <?php echo $row['choice1'] ?>
                                <i class="mdi mdi-check" style="font-size:15px; color:green;"></i>
                            </div>
                            <div class="">
                                B. <?php echo $row['choice2'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                C. <?php echo $row['choice3'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                D. <?php echo $row['choice4'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                        <?php
                        }
                        else if($row['answer'] == 2)
                        {
                        ?>
                            <h4 class="mt-2"><?php echo $a?>. <?php echo $row['question'] ?></h4>
                            <div class="alert alert-light" role="alert">
                                A. <?php echo $row['choice1'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                                </div>
                            <div class="alert alert-success" role="alert">
                                B. <?php echo $row['choice2'] ?>
                                <i class="mdi mdi-check" style="font-size:15px; color:green;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                C. <?php echo $row['choice3'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                D. <?php echo $row['choice4'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                        <?php
                        }
                        else if($row['answer'] == 3)
                        {
                        ?>
                            <h4 class="mt-2"><?php echo $a?>. <?php echo $row['question'] ?></h4>
                            <div class="alert alert-light" role="alert">
                                A. <?php echo $row['choice1'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                B. <?php echo $row['choice2'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-success" role="alert">
                                C. <?php echo $row['choice3'] ?>
                                <i class="mdi mdi-check" style="font-size:15px; color:green;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                D. <?php echo $row['choice4'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                        <?php
                        }
                        else
                        {
                        ?>
                            <h4 class="mt-2"><?php echo $a?>. <?php echo $row['question'] ?></h4>
                            <div class="alert alert-light" role="alert">
                                A. <?php echo $row['choice1'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                B. <?php echo $row['choice2'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-light" role="alert">
                                C. <?php echo $row['choice3'] ?>
                                <i class="mdi mdi-close" style="font-size:15px; color:red;"></i>
                            </div>
                            <div class="alert alert-success" role="alert">
                                D. <?php echo $row['choice4'] ?>
                                <i class="mdi mdi-check" style="font-size:15px; color:green;"></i>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                $a = $a + 1;
                }
            }
            ?>
            </div>
        </div>
    </div>
</div>
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

</body>
</html>