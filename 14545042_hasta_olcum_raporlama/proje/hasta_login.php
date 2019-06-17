<?php 
 
include("ayar.php");
ob_start();
session_start();
 
$kadi = $_POST['kadi'];
$sifre = $_POST['sifre'];
 
$sql_check = mysql_query("select * from hasta_kullanicilar where hasta_email='".$kadi."' and hasta_sifre
='".$sifre."' ") or die(mysql_error());
 
if(mysql_num_rows($sql_check))  {
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    header("Location:hasta_ana_ekran.php");
}
else {
    if($kadi=="" or $sifre=="") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}
 
ob_end_flush();
?>