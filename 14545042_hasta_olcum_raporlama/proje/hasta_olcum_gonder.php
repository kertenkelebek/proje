<!DOCTYPE html>
<html>
<head>
    <title>Hasta Ölçüm Gönderme Ekranı</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
    <div align='right'>
        <a href='hasta_ana_ekran.php'>önceki sayfa</a>
    </div>
    <?php 
    include("ayar.php");
    session_start();
    ?>

    <br>
    <br>
    <div class="container">
        <div class="row" style="margin:auto;">
            <form action="" method="post">
                <table class="table">
                 <tr>
                    <td>Ölçüm Değeri </td>
                    <td><input type="text" name="olcum_deger" class="form-control"></td>
                </tr>
                <tr>
                    <td>Ölçüm Zamanı</td>
                    <td>              
                        <input type="radio" name="olcum_zamani" value="SABAH"/>SABAH
                        <br>

                        <input type="radio" name="olcum_zamani" value="OGLE"/>ÖĞLE
                        <br>
                        <input type="radio" name="olcum_zamani" value="AKSAM"/>AKŞAM
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary" value="Gönder"></td>
                </tr>
            </table>
        </form>

    </div>
    <div>
    </body>
    </html>
    <?php 
    if ($_POST) {
        $hasta_email = $_SESSION['user'];
        $sorgu=mysql_fetch_array(mysql_query("select * from hasta_kullanicilar where hasta_email = '".$hasta_email."'"));
        $hasta_id = $sorgu['hasta_id'];
        $hasta_ad = $sorgu['hasta_ad'];
        $hasta_soyad = $sorgu['hasta_soyad'];
        $sorumlu_doktor = $sorgu['sorumlu_doktor_email'];
        $olcum_zamani = $_POST['olcum_zamani'];
        $olcum_deger = $_POST['olcum_deger'];
        echo $sorumlu_doktor;

        if ($olcum_deger !="" and $olcum_zamani !="" ) {
            $ekle= "insert into hasta_rapor (hasta_id,hasta_ad,hasta_soyad,olcum_deger,sorumlu_doktor,olcum_zamani) values ('".$hasta_id."','".$hasta_ad."','".$hasta_soyad."','".$olcum_deger."','".$sorumlu_doktor."','".$olcum_zamani."')";
            $kayit=mysql_query($ekle,$conn);
        }
        if($kayit){

            echo "<div align='center'>
            <p> Ölçüm Değeri Başarılı Bir Şekilde Gönderildi</p>   
            </div>";


        }else{

            echo "<div align='center'>
            <p> Ölçüm Değeri Gönderimi Sırasında Bir Hata Oluştu... </p>   
            </div>";

        }

    }


    ?>