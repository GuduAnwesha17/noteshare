<?php
session_start();
include 'connection.php';

    

    
   


if(isset($_SESSION['email'])) {
  header("location: index.php?access-denied");
}

if(isset($_POST['submit'])){
  $fn = htmlspecialchars($_POST["fname"], ENT_QUOTES);
  $ln = htmlspecialchars($_POST["lname"], ENT_QUOTES);
  $email = htmlspecialchars($_POST["email"], ENT_QUOTES);
  $pass = htmlspecialchars($_POST["password"], ENT_QUOTES);
  $cpass = htmlspecialchars($_POST["confirmpassword"], ENT_QUOTES);

  if($pass == $cpass){
    $hashpassword = md5($pass);
    $check_email = "select * from user where email='$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
      $_SESSION['errormessage'] = "Signup failed: Email exists!";
      $_SESSION['alert_bg'] = 'alert-warning';
      header("location: index.php?error=email_exist");
      exit();
    } else {
      $query = "INSERT INTO users(firstname,lastname,email,password) VALUES ('$fn', '$ln', '$email', '$hashpassword')";
      $data = mysqli_query( $conn,$query);

      if($data) {
        $_SESSION['message'] = "Signup succesfull";
        $_SESSION['alert_bg'] = 'alert-success';
        $_SESSION['email'] = $email;
        header("location: index.php?status=signup-success");
        exit();
      } else {
        $_SESSION['message'] = "Unable to submit data.";
        $_SESSION['alert_bg'] = 'alert-warning';
        header("location: index.php?error=signup-failed");
        exit();
      }
    }
  } else {
    $_SESSION['message'] = "Confirm password did not matched.";
    $_SESSION['alert_bg'] = 'alert-danger';
    header("location: index.php?error=password-mismatched");
    exit();
  }
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="signup.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>signup</title>
</head>
<body>
  <main class=" d-flex justify-content-between align-items-center">
    <div class="container p-5">
       
      <div class="row shadow-lg rows ">
        <div class="col-md-5 col-12 order-md-1 order-2 image ">
          <div class="signup_image">
            <img class="img-fluid" src="images/autnetication.svg">
          </div>
        </div>
        <div class="col-md-7 col-12  order-md-2 order-1 form p-5" >
          <div class="signup_container">
            <h2 class="mb-3">Signup</h2>
            <form action="signup.php" method="post">
              <div class="form-group">
                <label for="InputFname">First Name</label>
                <input type="text" class="form-control form-control-sm  " id="InputFname" aria-describedby="emailHelp" name="fname">
              </div>
              <div class="form-group">
                <label for="InputLname">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="InputLname" aria-describedby="emailHelp" name="lname">
              </div>
              <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" class="form-control form-control-sm" id="InputEmail" aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password" class="form-control form-control-sm" id="InputPassword1" name="password">
              </div>
              <div class="form-group">
                <label for="InputPassword2">Confirm Password</label>
                <input type="password" class="form-control form-control-sm" id="InputPassword2" name="confirmpassword">
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
