<!--
  - File Name: index.php
  - Program Description: home page (contains log-in)
  -->
<?php
	$root = "./";
	$pageTitle = "Home";
	
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
			
				<form name="loginForm" method="post" action="LoginView.php" id="loginForm">
					<input type="text" name="username" id="username">
					<br/><input type="password" name="psswrd" id="psswrd">
					<br/>
					<?php if(isset($_SESSION['invalidlogin'])) echo "<p class='fieldError'>Invalid username or password.</p>";else echo "<br/>";?>
					<input type="submit" name="submit" value="Login">
					<a href="Registration/"><h3>Want to register?</h3></a>
					<a href="./Password/"><h3>Forgot<br />Password?</h3></a>
				</form>
			</div>
			<div id="welcome">
				<h3>UPLB Traffic Management System</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacinia felis quis nisi imperdiet viverra. Maecenas at sapien pharetra, vehicula mi ac, blandit erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare enim ultrices, malesuada nibh ut, sollicitudin odio. In scelerisque feugiat risus vel feugiat. Proin eu auctor sem, sed pulvinar neque. Nulla convallis tincidunt posuere. Integer eleifend auctor euismod. Cras blandit non risus quis pretium. Vivamus consectetur lorem leo, at suscipit dui facilisis eget. Vivamus vel urna eget lacus porta interdum non non arcu. Vestibulum porta ac odio ac fermentum. Sed molestie sem ut odio interdum luctus. Proin rhoncus viverra urna. Ut et lobortis tortor, vel dignissim nisl. </p>
		</div>
			<div class="clearboth"></div>
		<div id='about'>&nbsp;<br />&copy; 2013 by University of the Philippines Los Ba&ntilde;os.<br />All Rights Reserved.</div>
		</div>
	</body>
</html>
<?php
if(isset($_SESSION['invalidlogin'])) unset($_SESSION['invalidlogin']);
?>
