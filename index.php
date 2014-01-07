<!--
  - File Name: index.php
  - Program Description: home page (contains log-in)
  -->
<?php
	$root = "./";
	$pageTitle = "Login";
	
	session_start();
	if(isset($_SESSION['username'])) header("Location: HomePage/");
?>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<?php include $root."head.php"; ?>
	<body>
		<div id='centerArea'>
			<?php include $root."menu.php";?>
			
			<div id="loginDiv">
				<?php
					if(isset($_SESSION['message'])){
						if($_SESSION['message'] != ""){
							echo "<div>";
								echo $_SESSION['message'];
							echo "</div>";
						}
						unset($_SESSION['message']);
					}
				?>
			
				<form name="loginForm" method="post" action="LoginView.php">
					<h3 style="color:white;">LOG IN HERE:</h3>
					<label for="username">Username: </label><input type="text" name="username" id="username">
					<br/>
					<label for="psswrd">Password: </label><input type="password" name="psswrd" id="psswrd">
					<br/>
					<?php if(isset($_SESSION['invalidlogin'])) echo "<p class='fieldError'>Invalid username or password.</p>";else echo "<br/>";?>
					<input type="submit" name="submit" value="Login">
					<input type="reset" name="reset" value="Clear"><br />
					<a href="Registration/"><h3 style="color:white;">Want to register?</h3></a>
					<a href="./Password/"><h3 style="color:white;">Forgot Password?</h3></a>
				</form>
			</div>
		</div>
		<div id='about'>
		<!--a href='about/about.php'>About the Author</a><br/-->
		All Rights Reserved, 2013.<br/>
		</div>
	</body>
</html>
<?php
if(isset($_SESSION['invalidlogin'])) unset($_SESSION['invalidlogin']);
?>