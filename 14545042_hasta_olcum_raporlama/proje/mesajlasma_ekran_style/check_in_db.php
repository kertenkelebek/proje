<?php
$host="localhost";
$db="projedb";
$user="root";
$pass="Darkhack95";
$conn=@mysql_connect($host,$user,$pass) or die("Mysql Baglanamadi");
 
mysql_select_db($db,$conn) or die("Veritabanina Baglanilamadi");
$kullanici= $_POST['user'];
if (isset($_POST['user'])) {
	$query="select doktor_ad from doktor_kullanicilar where kullanici_adi='".$kullanici."'";
	$r=mysql_query($query,$conn);
	if ($r) {
	if (mysql_num_rows($r)>0) {
		while ($row=mysql_fetch_assoc($r)) {
		$user_name = $row['kullanici_adi'];
		echo '<option value="'.$user_name.'">';
		}
	}
	else{
		echo '<option value="no user">';
	}
	}else
	{
	
	}
}
 ?>