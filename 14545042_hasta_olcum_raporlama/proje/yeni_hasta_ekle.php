<!DOCTYPE html>
<html>
<head>
    <title>Ekleme Sonuç Ekranı</title>
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
</head>
<body>

</body>
</html>
<?php
session_start();
    include("ayar.php");
    $hasta_email_kontrol = false;
        if(isset($_POST['kaydet'])){
            $hasta_ad = $_POST["hasta_ad"];
            $hasta_soyad = $_POST["hasta_soyad"];
            $hasta_cinsiyet = $_POST["hasta_cinsiyet"];
            $hasta_email = $_POST["hasta_email"];
            $hasta_sifre = $_POST["hasta_sifre"];
            $sorumlu_doktor_email = $_SESSION['user'];
             $varmi = mysql_query("select * from hasta_kullanicilar where hasta_email = '".$hasta_email."'");
             if (mysql_affected_rows()) {
              $hasta_email_kontrol = true;
             }else{
            if ($hasta_ad !="" and $hasta_soyad !="" and $hasta_cinsiyet !="" and $hasta_email !="" and $hasta_sifre !=""  ) {
                $ekle= "insert into hasta_kullanicilar (hasta_ad,hasta_soyad,hasta_cinsiyet,hasta_email,hasta_sifre,sorumlu_doktor_email) values ('".$hasta_ad."','".$hasta_soyad."','".$hasta_cinsiyet."','".$hasta_email."','".$hasta_sifre."','".$sorumlu_doktor_email."')";
            $kayit=mysql_query($ekle,$conn);
            }
            }
            
if($kayit){
     $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<div align='right'>
<a href='$url'>önceki sayfa</a>
 </div>";
 echo "<div align='center'>
                 <p> Hasta Kaydı Başarılı Bir Şekilde Eklendi </p>   
                 </div>";


}else{
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<div align='right'>
<a href='$url'>önceki sayfa</a>
 </div>";
echo "<div align='center'>
                 <p> Kayıt Sırasında Bir Hata Oluştu... </p>   
                 </div>";
if ($hasta_email_kontrol==true) {
echo "<div align='center'>
                 <p> Farklı Bir E-mail İle Kayıt Yapınız.. </p>   
                 </div>";
}

 }
}
?>