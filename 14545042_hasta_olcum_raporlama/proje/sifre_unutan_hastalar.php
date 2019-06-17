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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Şifre Unutan Hastalar</title>
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
  <br>
<?php 
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<div align='right'>
<a href='$url'>önceki sayfa</a>
 </div>"; 
  $sorumlu_doktor = $_SESSION['user'];
  $q="select hasta_email from sifre_unutan_hasta_kullanicilar where sorumlu_doktor_email='".$sorumlu_doktor."'";
  $results = mysql_query($q ,$conn); 

  ?>
  <br>
  <br>
  
<div class="container">
<div class="row" style="margin:auto;">
    <table class="table">
        <?php while ($sonuc = mysql_fetch_array($results)) { ?>
        <tr>
            <td>Hasta Kullanıcı Email</td>
            <td><input type="text" id="hasta_email" name="hasta_email" class="form-control" value="<?php echo $sonuc['hasta_email'] ; ?>">
            </td>
        </tr>

    <?php } ?>
    </table>


</div>
<div>

</body>
</html>
<script src="js/jquery-3.4.1.min.js"></script>
<script>
  
document.getElementById("hasta_email").disabled = true;

</script>