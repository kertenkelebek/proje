<!DOCTYPE html>
<html>
<head>
	<title>Hasta Anasayfa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Opsiyonel tema -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<!-- En son derlenmiş ve minimize edilmiş JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.yan{
			width:150px;
			height:150px;
			float:left;
			margin-left: 30px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="nav navbar-nav navbar-right">
				<a href="doktor_logout.php" class="navbar-brand"><strong>Güvenli Çıkış</strong></a>
			</div>
		</div>
		<div class="row">
			<form align="center">
				<img src="images/logo.jpg" height="200" width="250">
			</form>
			<br>
			<br>
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
		<div class="row" align="center">
			<div class="yan">
				<form action="hasta_olcum_gonder.php" id="
				send">
					<button class="btn btn-success">Ölçüm Gönder</button>	
				</form>
			</div>
			<div class="yan">
				<form action="mesajlasma_ekrani.php" id="message">
					<button class="btn btn-success">Mesajlaşma Ekranı</button>	
				</form>
			</div>
			<div class="yan">
				<form action="hasta_kullanici_islemleri.php" id="hasta_islem">
					<button class="btn btn-success">Kullanıcı İşlemleri</button>	
				</form>
			</div>
		</div>
		</div>
		<div class="col-md-3"></div>

	</body>
	</html>