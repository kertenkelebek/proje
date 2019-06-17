<!DOCTYPE html>
<html>
<head>
	<title>Gelen Ölçümler</title>
	<style>
		<?php 
		include("ayar.php");
		require_once("doktor_ekran_style/doktor_ekran_style.php");
		?>
		a:link, a:visited {
			background-color: #f44336;
			color: white;
			padding: 14px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
		}

		a:hover, a:active {
			background-color: red;
		}
	</style>
</head>
<body>
	<?php 
	session_start();
	$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<div align='right'>
	<a href='$url'>önceki sayfa</a>
	</div>"; ?>
	<br>
	<br>

	<div class="container-fluid">
		<div class="row">
			<?php 
			$sorumlu_doktor = $_SESSION['user'];
			$q="select * from hasta_rapor where sorumlu_doktor='".$sorumlu_doktor."'";
			$results = mysql_query($q ,$conn); ?>
			<div id="listeleme" >
				<form align="center" id="listele">
					<table>
						<thead>
							<tr>
								<th>HASTA ID</th>
								<th>HASTA AD</th>
								<th>HASTA SOYAD</th>
								<th>ÖLÇÜM ZAMANI</th>
								<th>ÖLÇÜM TARİHİ</th>
							</tr>
						</thead>

						<?php while ($row = mysql_fetch_array($results)) { ?>
							<tr>
								<td><?php echo $row['hasta_id']; ?></td>
								<td><?php echo $row['hasta_ad']; ?></td>
								<td><?php echo $row['hasta_soyad']; ?></td>
								<td><?php echo $row['olcum_zamani']; ?></td>
								<td><?php echo $row['olcum_tarihi']; ?></td>
							</tr>
						<?php } ?>
					</table>

				</form>
			</div>

		</div>



	</div>

</body>
</html>