<?php 
include("ayar.php");
if ($_GET) 
{
$hasta_id = $_GET['id'];
// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
 $q ="delete from hasta_kullanicilar where hasta_id ='".$hasta_id."'";
 $results=mysql_query($q,$conn);
 echo mysql_error();
if ($results) 
{
    header("location:doktor_ana_ekran.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}

?>