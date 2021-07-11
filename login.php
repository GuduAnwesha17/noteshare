<?php
session_start();
include 'connection.php';

if(isset($_POST["signin"])) {
	$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
	$pass = htmlspecialchars($_POST["password"], ENT_QUOTES);
	$hashedpass =  md5($pass);

	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		if ($hashedpass == $row["password"]) {
			$_SESSION['email'] =  $email;
			$_SESSION['message'] = "You are logged in.";
			$_SESSION['alert_bg'] = 'alert-success';
			header("location:index.php?login=success");
			exit();
		} else {
			$_SESSION['message'] = "Incorrect password!";
			$_SESSION['alert_bg'] = 'alert-warning';
			header("location:index.php?error=incorrect-password");
			exit();
		}
	} else{
		$_SESSION['message'] = "No user found!";
		$_SESSION['alert_bg'] = 'alert-danger';
		header("location:index.php?error=invalid-email");
		exit();
	}
}

header("location:index.php?access-denied");
?>