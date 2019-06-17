<!DOCTYPE html>
<html>
<head> 
  	<title>Yeni Hasta Ekleme</title>
	<style>
#yeni_kayit {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#yeni_kayit td, #yeni_kayit th {
  border: 1px solid #ddd;
  padding: 8px;
}

#yeni_kayit tr:nth-child(even){background-color: #f2f2f2;}

#yeni_kayit tr:hover {background-color: #ddd;}

#yeni_kayit th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#yeni_kayit  input[type=text] {
  background-color: #4CAF50;
  color: white;
}
#yeni_kayit input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
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
<div class="container-fluid">
<div class="row">
  <div align='right'>
<a href='doktor_ana_ekran.php'>önceki sayfa</a>
 </div>
<form align="center" action="yeni_hasta_ekle.php" method="post">
        <table cellspacing="5" cellpadding="5" id="yeni_kayit">
<caption>Yeni Hasta Ekleme</caption>
<tbody>
            <tr>
                <td>Hasta Adı</td>
                <td><input type="text" name="hasta_ad"/></td>
            </tr>
            <tr>
                <td>Hasta Soyadı</td>
                <td><input type="text" name="hasta_soyad"/></td>
            </tr>
            <tr>
              <td>Hasta Cinsiyet</td>
              <td>

<input type="radio" name="hasta_cinsiyet" value="bay"/>BAY
<input type="radio" name="hasta_cinsiyet" value="bayan"/>BAYAN


              </td>
            </tr>
            <tr>
                <td>Hasta E-mail</td>
                <td><input type="email" name="hasta_email"/></td>
            </tr>
            <tr>
                <td>Hasta Şifre</td>
                <td><input type="text" name="hasta_sifre"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="kaydet" value="Kayıt Ekle" /></td>
            </tr>
       </tbody>
        </table>
    </form>

    </div>
</div>

            
</body>
</html>