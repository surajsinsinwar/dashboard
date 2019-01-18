<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<nav>
			<a href="#">
				<img src="" alt="logo">
			</a>
				<div>
					<form action="includes/login.inc.php" method="post">
						<!-- login details -->
						<input type="text" name="mailuid" placeholder="Username/E-mail....">
						<input type="password" name=pwd placeholder="Password....">
						<button type="submit" name="login-submit">Login</button>
					</form>
					<a href="signup.php">SignUp</a>
					<form action="includes/logout.inc.php" method="post" >
						<button type="submit" name="logout-submit">logout</button>
					</form>
					 
				</div>	
		</nav>
	</header>

</body>
</html>