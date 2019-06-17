<?php 
session_start();
if (isset($_SESSION['user']))
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset=“UTF-8”>
		<meta name=“viewport” content=“width=device-width, initial-scale=1”>
		<title>Mesajlasma Ekrani</title>
		<style>
			<?php 
			require_once("mesajlasma_ekran_style/mesajlasma_style.php"); ?>

		</style>
	</head>
	<body>
		<?php require_once("mesajlasma_ekran_style/new_message.php");  ?>
		<div id="container">
			<div id="menu">
				<?php
				$email_kontrol =false;
				$user_email = $_SESSION["user"];
				$hasta_varmi = mysql_query("select * from hasta_kullanicilar where hasta_email = '".$user_email."'");
				if (mysql_affected_rows()) {
					$email_kontrol = true;
					echo "<div align='right'>
					<a href='hasta_ana_ekran.php'>önceki sayfa</a>
					</div>";
				}else{
					echo "<div align='right'>
					<a href='doktor_ana_ekran.php'>önceki sayfa</a>
					</div>";
				}

				echo $_SESSION["user"];
				?>
			</div>	
			<div id="left-col">	
				<?php require_once("mesajlasma_ekran_style/left-col.php") ?>
			</div>
			<div id="right-col">
				<?php require_once("mesajlasma_ekran_style/right-col.php");   ?>
			</div>

		</div>
	</body>
	</html>
<?php }?>

