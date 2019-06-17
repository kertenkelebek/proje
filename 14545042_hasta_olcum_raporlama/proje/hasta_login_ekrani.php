<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login </title>

  <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  
<div class="wrap">
<form action="hasta_login.php" method="post">
		<input type="email" name="kadi" placeholder="Kullanici adi" required>
		<div class="bar">
		<br>

		</div>
		<input type="password"  name="sifre" placeholder="Sifre" required>
	<br>
	<input type="submit" value="Giris">
	</form>
	<form action="hasta_sifre_unutma_ekrani.php" method="post">
		<br><br>
	<button name="hasta_forget_pass.php">Şifremi Unuttum </button>	


	</form>
	</div>

  <script src="js/index.js"></script>

</body>

</html>