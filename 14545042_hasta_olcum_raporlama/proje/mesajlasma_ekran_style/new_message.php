	<?php 
include("ayar.php");
	 ?>
	<div id="new-message">
		<p class="m-header">Yeni Mesaj</p>
		<p class="m-body">
			<form align="center" method="post">
			<input type="text" list="user" onkeyup="check_in_db()" class="message-input" name="username"
			id="username" placeholder="Kullanıcı Adı Giriniz ">
			<datalist id="user"></datalist>
			<br><br>
			<textarea class="message-input" name="message" placeholder="Mesajınızı Yazınız.."></textarea>
			<br><br>
			<input type="submit" name="send" id="send" value="Gönder">
			<button onclick="document.getElementById('new-message').style.display='none'">İptal</button>
			</form>
		</p>	
		<p class="m-footer"> _______________________________________________________ </p>	
	</div>
	<?php 
	
if (isset($_POST['send'])) {
	$sender_name = $_SESSION['user'];
	$reciever_name = $_POST['username'];
	$message = $_POST['message'];
	$q = "insert into mesajlasma_veritabani (sender_name,reciever_name,message_text) values ('".$sender_name."' , '".$reciever_name."','".$message."')";
	 $r = mysql_query($q,$conn);
	 if ($r) {
	 	echo "mesaj gönderildi";
	 	header("location:mesajlasma_ekrani.php?user=".$reciever_name);
	 }else{
	 	echo $q;
	 }
}
 ?>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script>
		document.getElementById("send").disabled=true;
	function check_in_db()
	{
		var username = document.getElementById("username").value;
		$.post("mesajlasma_ekran_style/check_in_db.php",
			{
				user:username
			},
			function(data,status)
			{
			
			if (data=='<option value="no user">') {
				document.getElementById("send").disabled=true;
			}else{
				document.getElementById("send").disabled=false;
			}
			document.getElementById('user').innerHTML = data;

			}
			);
	}	
	</script>