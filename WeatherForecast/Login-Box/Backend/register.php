<?php 

require_once("config.php");

error_reporting(0);

session_start();

if (isset($_SESSION['userId'])) {
    header("Location:./login.php");
}

if (isset($_POST['submitSign'])) {
	$username = $_POST['userId'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM registerform WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO registerform (User, Email, Pass)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>