<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
	<body>
		<form action="check_login.php" method="POST" style="border:1px solid #ccc">
			<div>
				<h1>Login</h1>

				<hr>
				<label><b>Email:</b></label>
				<input type="text" placeholder="Enter Email" name="email" required><br><br>
				<label><b>Password:</b></label>
				<input type="password" placeholder="Enter password" name="password" required><br><br>

				<div>
<!-- 				 This link needs to be changed to a hompage where you are already logged in -->
					<button type="submit" formnovalidate formaction="index.php">Cancel</button>
					<button type="submit">Login</button>
				<br />
				<?php
					if (isset($_SESSION['error'])) {
   					 	$errormsg = $_SESSION['error'];
    					echo $errormsg;
   		 				unset($_SESSION['error']);
					}
				?>
				</div>

			</div>
		</form>
	</body>
</html>
