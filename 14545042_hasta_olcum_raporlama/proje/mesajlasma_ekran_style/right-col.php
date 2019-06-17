<?php 
include("ayar.php");
 ?>
<div id="right-col-container">
    <div id="messages-container">
        <?php 
        $no_messages = false;
        if (isset($_GET['user'])) {
          $_GET['user'] = $_GET['user'];
        }
        else
        {
          $q ="select sender_name, reciever_name from mesajlasma_veritabani where sender_name ='".$_SESSION['user']."' or reciever_name='".$_SESSION['user']."' order by date_time desc limit 1 ";
          $r = mysql_query($q,$conn);
          if ($r) {
           if (mysql_num_rows($r)>0) {
               while ($row = mysql_fetch_assoc($r)) {
                   $sender_name = $row['sender_name'];
                   $reciever_name = $row['reciever_name'];
                   if ($_SESSION['user']==$sender_name) {
                       $_GET['user']= $reciever_name;
                   }else
                   {
                    $_GET['user']= $sender_name;
                   }

               }
           }else
           {
            echo "Mesaj Yok ";
            $no_messages = true;
           }
            }else{
                echo $q;
            }  
        }
        if ($no_messages == false) {

        
        $q = "select * from mesajlasma_veritabani where sender_name ='".$_SESSION['user']."' and reciever_name='".$_GET['user']."' or sender_name='".$_GET['user']."' and reciever_name='".$_SESSION['user']."'";
        $r = mysql_query($q,$conn);
        if ($r) {
            while ($row = mysql_fetch_assoc($r)) {
               $sender_name = $row['sender_name'];
               $reciever_name = $row['reciever_name'];
               $message =$row['message_text'];
               //gönderici kontrolü
               if ($sender_name == $_SESSION['user']) {
                ?>
            <div class="grey-message">
            <a href="#"> ben </a>
            <p><?php echo $message ; ?> </p>
             </div>
                <?php 
                         
               }else
               {?>
             <div class="white-message"  >
             <a href="#"> <?php echo $sender_name ?> </a>
             <p><?php echo $message ?> </p>
             </div>
                <?php 
        
               }
            }
        }else
        {
            echo $q;
        }
        }
         ?>
    </div>
    <form method="post" id="message-form">
    <textarea class="textarea" id="message_text"></textarea></form>
</div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script>
    $(document).ready(function(event)
    {
$("#right-col-container").on('submit',"#message-form",function()
     {
        var message_text =$("#message_text").val(); 
        $.post("mesajlasma_ekran_style/sending_process.php?user=<?php echo $_GET['user']; ?>",{
            text:message_text,
        },
        function(data,status)
        {
        $("#message_text").val("");
        document.getElementById("#messages-container").innerHTML+=data;
        }
        );
     });


     $("#right-col-container").keypress(function(e){
        if (e.keyCode == 13 && !e.shiftKey){
            $("#message-form").submit();
        } 
     });   
    });    

    </script>