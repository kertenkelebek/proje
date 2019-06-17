<?php 
$host="localhost";
$db="projedb";
$user="root";
$pass="Darkhack95";
$conn=@mysql_connect($host,$user,$pass) or die("Mysql Baglanamadi");
 
mysql_select_db($db,$conn) or die("Veritabanina Baglanilamadi");
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		
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
  <title>Hasta Kayıt Güncelle</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<header>
</header>
<body>
<br>
   <?php 
    $hasta_id = $_GET['id'];
    $q ="select * from hasta_kullanicilar where hasta_id ='".$hasta_id."'";
   	$results=mysql_query($q,$conn);

?>
<?php 
 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<div align='right'>
<a href='$url'>önceki sayfa</a>
 </div>"; ?>
<br><br><br><br>
<div class="container">
<div class="row" style="margin:auto;" >
<!--<?php echo mysql_error(); ?>-->
<form action="" method="post">
    <table class="table">
        <?php while ($sonuc = mysql_fetch_array($results)) { ?>
        <tr>
            <td>Hasta Ad</td>
            <td><input type="text" name="hasta_ad" class="form-control" value="<?php echo $sonuc['hasta_ad'] ; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Hasta Soyad</td>
            <td><input type="text" name="hasta_soyad" class="form-control" value="<?php echo $sonuc['hasta_soyad'] ;  ?>"></td>
        </tr>
 <tr>
            <td>Hasta Cinsiyet</td>
            <td><input type="text" name="hasta_cinsiyet" class="form-control" value="<?php echo  $sonuc['hasta_cinsiyet'] ;  ?>"></td>
        </tr>
         <tr>
            <td>Hasta Email</td>
            <td><input type="text" name="hasta_email" class="form-control" value="<?php echo  $sonuc['hasta_email']  ;  ?>"></td>
        </tr>
         <tr>
            <td>Hasta Şifre</td>
            <td><input type="text" name="hasta_sifre" class="form-control" value="<?php echo  $sonuc['hasta_sifre'] ;  ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
        </tr>
    <?php } ?>
    </table>
</form>
</div>
<div>
<?php 

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.

    $hasta_ad = $_POST['hasta_ad']; // Post edilen değerleri değişkenlere aktarıyoruz
    $hasta_soyad = $_POST['hasta_soyad'];
    $hasta_cinsiyet = $_POST['hasta_cinsiyet'];
    $hasta_email = $_POST['hasta_email'];
    $hasta_sifre = $_POST['hasta_sifre'];
    if ($hasta_ad<>"" && $hasta_soyad<>"" && $hasta_cinsiyet<>"" && $hasta_email<>"" && $hasta_sifre<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        $query = "update hasta_kullanicilar set hasta_ad
         = '".$hasta_ad."', hasta_soyad = '".$hasta_soyad."', hasta_cinsiyet = '".$hasta_cinsiyet."' , hasta_email = '".$hasta_email."' , hasta_sifre = '".$hasta_sifre."' WHERE hasta_id ='".$hasta_id."'";
         $res = mysql_query($query,$conn);
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($res) 
        {
           echo "<div align='center'>
            <p> Kullanıcı Kaydı Başarı ile Güncellendi..</p>   
            </div>";
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {
           "<div align='center'>
            <p> Kullanıcı Kaydı Güncelleme Sırasında Hata Oluştu..</p>   
            </div>"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
            echo mysql_error();
        }
    }
}
?>
</body>
</html>