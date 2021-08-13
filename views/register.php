<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="public/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="register">
			<h1>Register</h1>
            <?php include('flash_messages.php')?>

			<form action="" method="post" autocomplete="off">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
                <label for="password_confirm">
                    <i class="fas fa-lock"></i>
                </label>
                <input type="password" name="password_confirm" placeholder="Password Conformation" id="password_confirm" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Register">
                <p>
                    <a href="login.php"> if you have an account</a>
                </p>
			</form>
		</div>
	</body>
</html>
