<!-- Database connection below  -->
<?php
require "global/includes/connection.php";
?>  
<!-- Da tabase connection below  -->

<?php 



  

if(isset($_POST['signup']))
{
$username = $_POST['username'];
$password = MD5($_POST['password']);
$password_confirmation = MD5($_POST['password-confirmation']);
$email = $_POST['email'];
$user_type = $_POST['account_type'];
$created_at = date("Y/m/d h/i/sa");

// $sql = "INSERT INTO account (username, password, email, user_type, created_at ) VALUES ('$username','$password', '$email' ,'$user_type','$created_at')";
// $password_hashed = MD5($password);
$sql = "SELECT * FROM account WHERE username='$username'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if(mysqli_num_rows($result) > 0) {
   echo "<script>alert('The username is already exist')</script>";

} else if($password != $password_confirmation) {
   echo "<script>alert('The passward are not match')</script>";

} else {
    
   $signup = "INSERT INTO account (username, password, email, user_type, created_at ) VALUES ('$username','$password', '$email' ,'$user_type','$created_at')";
  
   if (!mysqli_query($conn,$signup))
   {
   echo "<script>alert('Failed : Record Not Added')</script>";

   } else {
   echo "<script>alert('Account Succesfully Registered !')
   window.location.href = 'login.php'
   </script>";
   }
   
}


 }





?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign In</title>

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

      
<div class="container form">
  <form method = "POST" >

        
        <div class="form-group mb-3 ">
            <label for="username" class="form-label ">Username</label>
            <input type="text" class="form-control" id="username" name = "username" style = "idth:500px;">
        </div>

        <div class="form-group mb-3 ">
            <label for="email" class="form-label ">Email</label>
            <input type="email" class="form-control" id="email" name = "email" style = "width:500px;">
        </div>
        
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name = "password" style = "width:500px;">
        </div>

        <div class="form-group mb-3">
            <label for="password-confirmation" class="form-label">Confirmation Password</label>
            <input type="password" class="form-control" id="password-confirmation" name = "password-confirmation" style = "width:500px;">
        </div>

        <div class="form-group mb-3">
        <label for="password-confirmation" class="form-label">Account Type</label>

        <select class="form-select" aria-label="Default select example" id = "account" name = "account_type">
        <option selected>Please Select</option>
        <option value="0">Student</option>
        <option value="1">Tutor</option>
      </select>
      </div>
        
      <a href = "login.php"  style = "text-decoration:none; font-size:15px;">Login  &nbsp;</a>

        <div style = "float:right;" class = "mb-3">
    
         <button type="submit" name= "signup" class="btn btn-primary">Sign Up</button>

        </div>
        </form>

        
</div>



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