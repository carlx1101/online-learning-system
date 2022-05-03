<?php
require "../includes/connection.php";
require "../includes/start_session.php";
$accountID = $_SESSION['account_id'];
$courseID = $_GET['id'];
$categoryID = $_GET['cat_id'];
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
    <title>Submodule</title>
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
.review form{
    display:none;
}

input:checked ~ form{
    display:block;
}

.ratingStar input{
    display:none;
}

.ratingStar label{
    font-size: 30px;
    transition: all 0.2s ease;
    float: right;
}

.ratingStar input:not(:checked) ~ label:hover,
.ratingStar input:not(:checked) ~ label:hover ~ label{
    color: #fd4;
}

.ratingStar input:checked ~ label{
    color: #fd4;
}

#rating1:checked ~ h3:before {
    content: "Worse";
}

#rating2:checked ~ h3:before {
    content: "Bad";
}

#rating3:checked ~ h3:before{
    content: "Good";
}

#rating4:checked ~ h3:before{
    content: "Excellent";
}

#rating5:checked ~ h3:before{
    content: "Perfect";
}

#rating1:hover ~ h3:before {
    content: "Worse";
}

#rating2:hover ~ h3:before {
    content: "Bad";
}

#rating3:hover ~ h3:before{
    content: "Good";
}

#rating4:hover ~ h3:before{
    content: "Excellent";
}

#rating5:hover ~ h3:before{
    content: "Perfect";
}
</style>
<body>


<div class="container mt-4">
<button type="button" class="btn btn-primary" onclick="window.location.href='mycourse.php';" style = "margin-bottom:25px;" >Return</button>
    <div class="card mt-1">
  
        <div class="card-body">

            <h3>Lesson</h3>
            <div class="accordion" id="accordionExample">
                <?php
                require "../includes/connection.php";

                $sql = "SELECT * FROM topic WHERE course_id= $courseID";
                $records = mysqli_query($conn, $sql);
                $i = 1;
                $a = 1;
                $b = 0;
                while($row = mysqli_fetch_array($records))
                {
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $a ?>">
                        <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
                            <strong>
                                <?php echo $i ?>
                                <?php
                                if($i == 1) 
                                {
                                    echo " .Introduction";
                                }
                                else
                                {
                                    echo " .Chapter $b";
                                }
                                ?>
                                (<?php echo $row['title'] ?>)
                            </strong>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $a ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $a ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mx-3 embed-responsive embed-responsive-16by9 text-center">
                                <iframe class="embed responsive item" width="80%" height="500" src="<?php echo $row['video_link']?>" allowfullscreen></iframe>
                            </div>
                            <h3 class="mx-3 mt-2"><?php echo $row['title'] ?></h3>
                            <hr>
                            <div class="desc2 m-3">
                                <strong>&emsp;&emsp;<?php echo $row['description'] ?></strong>
                            </div>
                            <hr>
                            <div class="m-3">
                                <span class="border-bottom">Resource Link</span>
                                <div class="">
                                    <strong><?php echo $row['resource_link'] ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i = $i + 1;
                $a = $a + 1;
                $b = $b + 1;
                }
                ?>
            
                <h3 class="mt-4">Assesment</h3>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFirst">
                    <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFirst" aria-expanded="false" aria-controls="collapseFirst">
                            <strong>
                                MCQ
                            </strong>
                    </button>
                    </h2>
                    <div id="collapseFirst" class="accordion-collapse collapse" aria-labelledby="headingFirst" data-bs-parent="#accordionExample">
                        <div class="accordion-body"> 
                            <?php
                            $sql = "SELECT * FROM quiz WHERE course_id= $courseID";
                            $records = mysqli_query($conn, $sql);
                            $i = 1;
                            while($row = mysqli_fetch_array($records))
                            {
                            ?> 
                            <h4 class="mx-3 mt-4"><?php echo $i ?>. <?php echo $row['question'] ?></h4>
                            <div class="ansInput ms-3">
                                <input required type="radio" name="choice <?php echo $i ?>" id="choice1" value="1">
                                <label for="choice1">A. <?php echo $row['choice1'] ?></label>
                                <br>
                                <input required type="radio" name="choice <?php echo $i ?>" id="choice2" value="2">
                                <label for="choice2">B. <?php echo $row['choice2'] ?></label>
                                <br>
                                <input required type="radio" name="choice <?php echo $i ?>" id="choice3" value="3">
                                <label for="choice3">C. <?php echo $row['choice3'] ?></label>
                                <br>
                                <input required type="radio" name="choice <?php echo $i ?>" id="choice4" value="4">
                                <label for="choice4">D. <?php echo $row['choice4'] ?></label>
                                <br> 
                            </div>                                          
                            <?php
                            $i = $i + 1;
                            }
                            ?>
                            <div class="container text-end mb-5">
                                <button class="btn btn-primary rounded-pill" type="submit" style="width:150px;" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Check Answer</button>  
                            </div>
                        </div>
                    </div>
                </div>

                

                

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" disabled>
                            <strong class="me-2">
                                Answer Sheet
                                <i class="mdi mdi-lock"></i>
                            </strong>
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php
                            $sql = "SELECT * FROM quiz WHERE course_id = $courseID";
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
                                        <div class="alert alert-danger" role="alert">
                                            B. <?php echo $row['choice2'] ?>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            C. <?php echo $row['choice3'] ?>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            D. <?php echo $row['choice4'] ?>
                                        </div>
                                    <?php
                                    }
                                    else if($row['answer'] == 2)
                                    {
                                    ?>
                                        <h4 class="mt-2"><?php echo $a?>. <?php echo $row['question'] ?></h4>
                                        <div class="alert alert-danger" role="alert">
                                            A. <?php echo $row['choice1'] ?>
                                            </div>
                                        <div class="alert alert-success" role="alert">
                                            B. <?php echo $row['choice2'] ?>
                                            <i class="mdi mdi-check" style="font-size:15px; color:green;"></i>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            C. <?php echo $row['choice3'] ?>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            D. <?php echo $row['choice4'] ?>
                                        </div>
                                    <?php
                                    }
                                    else if($row['answer'] == 3)
                                    {
                                    ?>
                                        <h4 class="mt-2"><?php echo $a?>. <?php echo $row['question'] ?></h4>
                                        <div class="alert alert-danger" role="alert">
                                            A. <?php echo $row['choice1'] ?>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            B. <?php echo $row['choice2'] ?>
                                        </div>
                                        <div class="alert alert-success" role="alert">
                                            C. <?php echo $row['choice3'] ?>
                                            <i class="mdi mdi-check" style="font-size:15px; color:green;"></i>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            D. <?php echo $row['choice4'] ?>
                                        </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <h4 class="mt-2"><?php echo $a?>. <?php echo $row['question'] ?></h4>
                                        <div class="alert alert-danger" role="alert">
                                            A. <?php echo $row['choice1'] ?>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            B. <?php echo $row['choice2'] ?>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            C. <?php echo $row['choice3'] ?>
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
                            ?>
                        </div>
                        <div class="container text-end mb-5">
                            <button class="btn btn-primary rounded-pill"  style="width:200px;" data-bs-toggle="collapse" data-bs-target="#collapseFirst" aria-expanded="false" aria-controls="collapseFirst">Back to Assesment</button>                  
                        </div>
                    </div>
                    <h3 class="mt-4">Editor</h3>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong class="me-2">
                                Editor
                            </strong>
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <?php
                            $sql = "SELECT * FROM course WHERE category_id = $categoryID";
                            $records = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($records);
                            if($row['category_id'] == 1)
                            {
                            ?>
                            <embed src="https://www.jdoodle.com/python3-programming-online/" width="1200" height="1000">
                            <?php
                            }
                            else if($row['category_id'] == 2)
                            {
                            ?>
                            <embed src="https://www.jdoodle.com/online-java-compiler/" width="1200" height="1000">
                            <?php
                            }
                            else if($row['category_id'] == 3)
                            {
                            ?>
                            <embed src="https://www.jdoodle.com/html-css-javascript-online-editor/" width="1200" height="1000">
                            <?php
                            }

                            else if($row['category_id'] == 4)
                            {
                            ?>
                            <embed src="https://www.jdoodle.com/php-online-editor/" width="1200" height="1000">
                            <?php
                            }

                            else if($row['category_id'] == 5)
                            {
                            ?>
                            <embed src="https://www.jdoodle.com/html-css-javascript-online-editor/" width="1200" height="1000">
                            <?php
                            }
                            else
                            {
                            ?>
                            <embed src="https://www.jdoodle.com/online-java-compiler/" width="1200" height="1000">
                            <?php
                            }                               
                        ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div
    >
    <?php
    if(isset($_POST['reviewSubmit']))
    {   
        $reviewRating = $_POST['reviewRating'];
        $reviewContent = $_POST['reviewContent'];
        $reviewName = $_SESSION['username'];
        $reviewDate = date("Y/m/d h/i/sa");
        $sql = "INSERT INTO review(course_id, account_id, review_name, review_content, review_rating, review_date) VALUES ('$courseID', '$accountID', '$reviewName', '$reviewContent', '$reviewRating', '$reviewDate')";

        if(mysqli_query($conn, $sql))
        {
            echo "<script>alert('Record Has Been Updated')

            </script>";
        }
        else
        {
            echo "<script>alert('Record Not Updated')
            window.location.href = 'course.php'
            </script>";
        }             
    }

    if(isset($_POST['update']))
    {
        $reviewRating = $_POST['reviewRating'];
        $reviewContent = $_POST['reviewContent'];
        $reviewDate = date("Y/m/d h/i/sa");
        $sql = "UPDATE review SET review_content = '$reviewContent' ,review_rating = '$reviewRating', review_date = '$reviewDate' WHERE course_id = '$courseID' AND account_id ='$accountID'";
        if(mysqli_query($conn, $sql))
        {
            echo "<script>alert('Record Has Been Updated')
            </script>";
        }
        else
        {
            echo "<script>alert('Record Not Updated')
            window.location.href = 'course.php'
            </script>";
        }      
    }
    ?>  
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM review WHERE account_id='$accountID' AND course_id='$courseID'";
            $result = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($result) > 0)
            {
            ?>
            <div class="col-sm-1">
                <?php
                    $sql = "SELECT * FROM account WHERE account_id = '$accountID'";
                    $records = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($records);
                    echo '<img src="data:image/jpg;base64,' . base64_encode($row['profile_picture']) . '"  alt="user" width="45px" height="45px" class="rounded-circle" />';
                ?>                       
            </div>
            <div class="col-sm-11">
                <form method="POST">
                    <div class="input"> 
                        <textarea type="text" class="form-control rounded" placeholder="Update Review..." name="reviewContent" id="exampleFormControlTextarea1" rows="3" required></textarea>        
                    </div>   
                    <div class="review d-flex justify-content-start">                     
                        <div class="ratingStar">
                            <input type="radio" name="reviewRating" id="rating5" value="5">
                            <label for="rating5" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating4" value="4">
                            <label for="rating4" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating3" value="3">
                            <label for="rating3" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating2" value="2">
                            <label for="rating2" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating1" value="1">
                            <label for="rating1" class="mdi mdi-star-outline"></label>
                            <h3></h3>                       
                        </div>
                    </div>
                    <div class="btn text-end mt-2">
                        <button type="submit" name="update" class="btn btn-info" style="width:100px; color:white;">Done</button>
                    </div> 
                </form>
            </div>
            <?php
            }
            else
            {
            ?>
            <div class="col-sm-1">
                <?php
                    $sql = "SELECT * FROM account WHERE account_id = '$accountID'";
                    $records = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($records);
    
                        if($row['profile_picture'] > 0)
                        {
                            echo '<img src="data:image/jpg;base64,' . base64_encode($row['profile_picture']) . '"  alt="user" width="45px" height="45px" class="rounded-circle" />';
                        }
                        else
                        {
                            echo '<img src="../assets/images/student.png" alt="user" width="45px" height="45px" class="rounded-circle"/>';
                        }
                    
                ?>                       
            </div>
            <div class="col-sm-11">
                <form method="POST">
                    <div class="input"> 
                        <textarea type="text" class="form-control rounded" placeholder="Provide Review..." name="reviewContent" id="exampleFormControlTextarea1" rows="3" required></textarea>        
                    </div>   
                    <div class="review d-flex justify-content-start">                     
                        <div class="ratingStar">
                            <input type="radio" name="reviewRating" id="rating5" value="5">
                            <label for="rating5" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating4" value="4">
                            <label for="rating4" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating3" value="3">
                            <label for="rating3" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating2" value="2">
                            <label for="rating2" class="mdi mdi-star-outline"></label>
                            <input type="radio" name="reviewRating" id="rating1" value="1">
                            <label for="rating1" class="mdi mdi-star-outline"></label>
                            <h3></h3>                       
                        </div>
                    </div>
                    <div class="btn text-end mt-2">
                        <button type="submit" name="reviewSubmit" class="btn btn-info" style="width:100px; color:white;">Publish</button>
                    </div> 
                </form>
            </div>
            <?php
            }
            ?>
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