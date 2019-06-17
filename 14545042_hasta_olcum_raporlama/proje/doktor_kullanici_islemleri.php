<?php 
session_start();
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
  <title>Doktor Kayıt Güncelle</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<header>
</header>
<body>
    <br>
    <?php 
 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<div align='right'>
<a href='$url'>önceki sayfa</a>
 </div>"; ?>
   <?php 
    $doktor_email = $_SESSION['user'];
    $q ="select * from doktor_kullanicilar where doktor_email ='".$doktor_email."'";
   	$results=mysql_query($q,$conn);
?>
<br><br><br><br>
<div class="container">
<div class="row" style="margin:auto;">
<form action="" method="post">
    <table class="table">
        <?php while ($sonuc = mysql_fetch_array($results)) { ?>
        <tr>
            <td>Doktor Ad</td>
            <td><input type="text" name="doktor_ad" class="form-control" value="<?php echo $sonuc['doktor_ad'] ; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Doktor Soyad</td>
            <td><input type="text" name="doktor_soyad" class="form-control" value="<?php echo $sonuc['doktor_soyad'] ;  ?>"></td>
        </tr>
         <tr>
            <td>Doktor Email</td>
            <td><input type="text" name="doktor_email" class="form-control" value="<?php echo  $sonuc['doktor_email']  ;  ?>"></td>
        </tr>
         <tr>
            <td>Doktor Şifre</td>
            <td><input type="text" name="doktor_sifre" class="form-control" value="<?php echo  $sonuc['doktor_sifre'] ;  ?>"></td>
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

    $doktor_ad = $_POST['doktor_ad']; // Post edilen değerleri değişkenlere aktarıyoruz
    $doktor_soyad = $_POST['doktor_soyad'];
    $doktor_email = $_POST['doktor_email'];
    $doktor_sifre = $_POST['doktor_sifre'];
    if ($doktor_ad<>"" && $doktor_soyad<>"" &&  $doktor_email<>"" && $doktor_sifre<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        $query = "update doktor_kullanicilar set doktor_ad
         = '".$doktor_ad."', doktor_soyad = '".$doktor_soyad."', doktor_email = '".$doktor_email."' , doktor_sifre = '".$doktor_sifre."' WHERE doktor_email ='".$doktor_email."'";
         $res = mysql_query($query,$conn);
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($res) 
        {
            header("location:doktor_ana_ekran.php"); 
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {
            echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
            echo mysql_error();
        }
    }
}
?>
</body>
</html>