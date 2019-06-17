<?php 
session_start();
$host="localhost";
$db="projedb";
$user="root";
$pass="Darkhack95";
$conn=@mysql_connect($host,$user,$pass) or die("Mysql Baglanamadi");
 
mysql_select_db($db,$conn) or die("Veritabanina Baglanilamadi");


if (isset($_SESSION['user']) and isset($_GET['user'])) {
	if (isset($_POST['text'])) {
		//boş mesaj kontrolü
		if ($_POST['text'] !="") {
		$sender_name = $_SESSION['user'];
		$receiver_name = $_GET['user'];
		$message = $_POST['text'];
		$q = "insert into mesajlasma_veritabani (sender_name,reciever_name,message_text) values ('".$sender_name."' , '".$receiver_name."','".$message."')";
	 $r = mysql_query($q,$conn);
	 if ($r) {
	 	    ?>
            <div class="grey-message">
            <a href="#"> ben </a>
            <p><?php echo $message ; ?> </p>
             </div>
                <?php 
	 }else{
	 	echo $q;
	 }
		}else
		{
			echo "Lütfen mesaj içeriğini doldurunuz..";
		}
	}
	else{
		echo "Text ile ilgili problem";
	}
}else
{
	echo "Lütfen giriş yapın ya da mesaj göndermek için kullanıcı seçin.. ";
}

 ?>