<?php
  require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGIN - School Mgnt System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="text-center pt-100 pb-20">
    <img class="img-responsive logo_img" src="img/logo.jpg">
  </div>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <h2 class="logo_h2 text-center">Login</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="user">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <!-- <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div> -->
    <button type="submit" name="submit" class="btn btn-success form-control">Submit</button>
  </form>
  </div>
  <div class="col-md-4"></div>
  
</div>
</div>

</body>
</html>

<?php
  if (isset($_POST["submit"]))
  {
     $user = mysqli_real_escape_string($con, $_POST['user']);
     $password = mysqli_real_escape_string($con, $_POST['password']);

     $sql = "SELECT * FROM login WHERE username = '$user' AND password = '$password'";
     $result = mysqli_query($con, $sql);

     if (mysqli_num_rows($result) > 0)
     {
       echo '
        <script language="javascript">
          alert("Login Successful!");
          window.location.href="index.php";
        </script>
      ';
      // header('location: index.php');
     }
     else
     {
      echo '
        <script language="javascript">
          alert("Invalid Login!");
          
        </script>
      ';
      
     }
  }
?>
