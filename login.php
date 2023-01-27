<?php
include "../lib/session.php";
session::init();

?>
<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php
$db = new Database();
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$username = mysqli_real_escape_string($db->link, $username);
				$password = mysqli_real_escape_string($db->link, $password);
				$query = "select * from admin where email='$username' and password='$password'";
				$result = $db->select($query);
				if ($result != false) {
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if ($row > 0) {
						session::set("login", true);
						session::set("username", $value["email"]);
						session::set("userId", $value["id"]);
						// echo "skdj";
						header("Location:index.php");
					} else {
						echo "<span style='color:red;font-size:18px;'>No result found</span>";
					}
				} else {
					echo "<span style='color:red;font-size:18px;'>username and password not match</span>";
				}
			}
			?>
			<form action="login.php" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required="" name="username" />
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="password" />
				</div>
				<div>
					<input type="submit" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#">Eida kono Kotha 😜</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>