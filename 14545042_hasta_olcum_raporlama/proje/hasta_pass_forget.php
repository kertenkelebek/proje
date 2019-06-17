<?php 
 
include("ayar.php");
ob_start();
session_start();
$kadi = $_POST['kadi'];
$sorumlu_doktor_email = $_POST['doktor_email'];
 if (isset($_POST['forget'])) {
     if ($kadi !="" && $sorumlu_doktor_email !="") {
		$ekle= "insert into sifre_unutan_hasta_kullanicilar( hasta_email,sorumlu_doktor_email) values ('".$kadi."','".$sorumlu_doktor_email."')";

			$kayit=mysql_query($ekle,$conn);
			echo mysql_error();
				if ($kayit) {
				header("location:index.php");	
							
							}	
else{
	echo $kayit ;
}
}
}


?>