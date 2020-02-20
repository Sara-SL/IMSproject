<?php
	session_start();
?>
<?php

if(isset($_POST['captchacode']) && $_POST['captchacode'] == $_SESSION['captcha_text']) {

	include 'connectDB.php';				

	// Get values from user input in html register.php 
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];


	// To avoid SQL Injection 
	$username = mysqli_real_escape_string($link, $username);
	$email = mysqli_real_escape_string($link, $email);
	$password = mysqli_real_escape_string($link, $password);

	// This will remove all the illegal characters from the email.
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	// Then we validate the email.
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
		// the email is valid
	}
	else { 
		$_SESSION['error'] = "$email is not a valid email address";
		header('Location: register.php');
	}
	
	// Check that email doesn't already exist 
	$query = "select * from users where email = '".$email."'";
	$rs = mysqli_query($link, $query);
	$numRows = mysqli_num_rows($rs);
	if(!$numRows == 0){
		$_SESSION['error'] = "This email already exist, try another or ask for a new password if you have forgot your old.";
		header('Location: register.php');
		}
	else {
		// Hash password 
		$options = array("cost"=>4);
		$hashPassword = password_hash($password, );

		// Add user 
		$query = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email', '$hashPassword')";
		mysqli_query($link, $query);

		include 'disconnectDB.php';

		header('Location: login.php');
	}
}
else {
	$_SESSION['error']= "The captcha code is wrong. Try again.";
	header('Location: register.php'); 
}

// Can also write query like this 
// $query = sprintf("INSERT INTO Users (username, email, password) VALUES ('%s', '%s', '%s')",
// 				mysql_real_escape_string($link, $username),
// 				mysql_real_escape_string($link, $email),
// 				mysql_real_escape_string($link, $hashPassword));
// mysqli_query($link, $query);

// // To avoid SQL Injection with PDO(can not get it to work yet)
// $query = $dbh->prepare("INSERT INTO Users (username, email, password) VALUES (':username', ':email', ':hashPassword')");
// $query->bindParam(':username', $username);
// $query->bindParam(':email', $email);
// $query->bindParam(':password', $hashPassword);
// $query->execute();
// mysqli_query($link, $query);

?>
