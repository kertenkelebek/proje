
<?php 
 
include("ayar.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
	?>
<!DOCTYPE html>
<html>
<head>
<style>
<?php 
require_once("doktor_ekran_style/doktor_ekran_style.php");
 ?>
</style>
<title>Doktor Ekranı</title>
	<!-- En son derlenmiş ve minimize edilmiş CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Opsiyonel tema -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<!-- En son derlenmiş ve minimize edilmiş JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<div class="row">


<div class="yan">
	<form action="yeni_hasta_ekleme_ekrani.php" id="kayit">
	<button class="btn btn-success">Kayıt Ekle</button>	
	</form>
</div>

	<div class="yan">
	<form action="mesajlasma_ekrani.php" id="message">
	<button class="btn btn-success">Mesajlasma Ekranı</button>

	</form>	
	</div>
	<div class="yan">
	<form action="gelen_olcum.php" id="olcum">
	<button class="btn btn-success">Gelen Ölçümler</button>	
	</form>
</div>
	<div class="yan">
	<form action="sifre_unutan_hastalar.php" id="unutma">
	<button class="btn btn-success">Şifre Unutan Hasta Kullanıcılar</button>	
	</form>
</div>
	<div class="yan">
	<form action="doktor_kullanici_islemleri.php" id="doktor_islem">
	<button class="btn btn-success">Kullanıcı İşlemleri</button>	
	</form>
</div>
</div>
<br>
<br>

<div class="row">	

	






	<?php 
	$sorumlu_doktor = $_SESSION['user'];
	$q="select * from hasta_kullanicilar where sorumlu_doktor_email='".$sorumlu_doktor."'";
	$results = mysql_query($q ,$conn); ?>
<div id="listeleme" >
	<form align="center" id="listele">
		<table>
	<thead>
		<tr>
			<th>HASTA ID</th>
			<th>HASTA AD</th>
			<th>HASTA SOYAD</th>
			<th>HASTA CINSIYET</th>
			<th>HASTA E-MAIL</th>
			<th>HASTA SIFRE</th>
			<th colspan="2">ISLEM</th>
		</tr>
	</thead>
	
	<?php while ($row = mysql_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['hasta_id']; ?></td>
			<td><?php echo $row['hasta_ad']; ?></td>
			<td><?php echo $row['hasta_soyad']; ?></td>
			<td><?php echo $row['hasta_cinsiyet']; ?></td>
			<td><?php echo $row['hasta_email']; ?></td>
			<td><?php echo $row['hasta_sifre']; ?></td>
			<td>
			<a href="hasta_kayit_guncelle.php?id=<?php echo $row['hasta_id']; ?>" class="edit_btn">Güncelle</a>
			</td>
			<td>
				<a href="hasta_kayit_sil.php?id=<?php echo $row['hasta_id']; ?>" class="del_btn">Sil</a>
			</td>
		</tr>
	<?php } ?>
</table>

	</form>
</div>

</div>	
<div class="col-md-3" id="duyuru">
	


</div>

</div>

</div>
</body>
</html>
<?php } ?>