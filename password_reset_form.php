<!-- Database connection below  -->
<?php
require "global/includes/connection.php";
?>  
<!-- Da tabase connection below  -->

<?php 

// if (isset($_GET['error'] ) == "emptyInput")
// {
//   echo "<div class='alert alert-danger' role='alert'>";
//   echo "Password Cannot Be Empty or Not Match";
//   echo "</div>";
// } 


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Reset Form </title>

    <style>
      .field 
      {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .form 
      {
        display: flex;
  justify-content: center;
  align-items: center;
  min-height: 10vh;
      }



    </style>
  </head>
  <body>


    <!-- <div class="container">
        
  
    <nav class="navbar navbar-light ">
    <div class="container-fluid">
        <span class="navbar-brand mb-2 h1">Code Space</span>
    </div>
    </nav>  
</div> -->



<br><br>

<img src="global/images/logo/navlogo.png" class="rounded mx-auto d-block" alt="logo" width = 200px >



        <?php 

            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if (empty($selector))
            {
                echo "vallidation failed";
            }
            else if (empty($validator))
            {
              echo "vallidation failed";
        

            }
            else 
            {
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
                {
                    ?>
                        <?php 
                        
                        
                        if (isset($_GET['error'] ) == "emptyInput")
                        {
                          echo "<div class='alert alert-danger container' role='alert' style = 'width:500px;'>";
                          echo "Password Cannot Be Empty or Not Match";
                          echo "</div>";
                        } 

                        ?>
                        <div class="container form">

                        <form method = "POST" action = "process_reset.php" >
                                <input type="hidden" name = "selector" value = <?php echo $selector?>>
                                <input type="hidden" name = "validator" value = <?php echo $validator?>>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="password" name = "password" style = "width:500px;">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password-confirmation" class="form-label">New Confirmation Password</label>
                                    <input type="password" class="form-control" id="password-confirmation" name = "password-confirmation" style = "width:500px;">
                                </div>
                                
                            <br>
                                <div style = "float:right;" class = "mb-3">
                                <button type="submit" name= "reset" class="btn btn-primary">Reset</button>

                                </div>
                                </form>

                        </div>

                    <?php
                }
                
                

                
            }
        ?>

<!-- <div class="container form">
  <form method = "POST" >

        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name = "password" style = "width:500px;">
        </div>

        <div class="form-group mb-3">
            <label for="password-confirmation" class="form-label">Confirmation Password</label>
            <input type="password" class="form-control" id="password-confirmation" name = "password-confirmation" style = "width:500px;">
        </div>
        
      <br>
        <div style = "float:right;" class = "mb-3">
         <button type="submit" name= "reset" class="btn btn-primary">Reset</button>

        </div>
        </form>

        
</div> -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>