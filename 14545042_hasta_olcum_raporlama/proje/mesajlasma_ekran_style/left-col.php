<div id="left-col-container">
<div style="cursor:pointer;" class="white-back" onclick="document.getElementById('new-message').style.display='block'" align="center">
<p >Yeni Mesaj</p>
</div>
<?php 
session_start();
$host="localhost";
$db="projedb";
$user="root";
$pass="Darkhack95";
$conn=@mysql_connect($host,$user,$pass) or die("Mysql Baglanamadi");
mysql_select_db($db,$conn) or die("Veritabanina Baglanilamadi");
$q = "select distinct reciever_name, sender_name from mesajlasma_veritabani where sender_name ='".$_SESSION['user']."' or reciever_name = '".$_SESSION['user']."' order by date_time desc";
$r = mysql_query($q,$conn);
if ($r) {
	if (mysql_num_rows($r)>0) {
		$counter = 0;
		$added_users = array();
		while($row=mysql_fetch_assoc($r)){
			$sender_name = $row['sender_name'];
			$reciever_name = $row['reciever_name'];
			if ($_SESSION['user']==$sender_name) {
				if (in_array($reciever_name, $added_users)) {
					
				}else{

					?>
				<div class="grey-back">
				<img src="images/hasta.png" class="image"/>
   				<?php echo
   				'<a href="?user ='.$reciever_name.'"> '.$reciever_name.' </a>'
   				 ; ?>
				</div>
					<?php 
					$added_users =array($counter => $reciever_name);
					$counter++;
				}
			}elseif ($_SESSION['user']==$reciever_name) {
				if (in_array($sender_name, $added_users)) {
					
				}else{

					?>

				<div class="grey-back">
				<img src="images/hasta.png" class="image"/>
  				<?php echo '
<a href="?user='.$sender_name.'"> '.$sender_name.' </a>'; ?>
				</div>
				<?php 
					$added_users =array($counter=>$sender_name);
					$counter++;
				}
			}
		}
	}else {
		echo "kullanıcı yok";
	}
}else{
	echo $q ;
}
?>
</div>