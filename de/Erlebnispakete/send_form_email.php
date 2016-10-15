<?php
 
if(isset($_POST['email'])) {
 
    
 
     $Today = date('y/m/d');
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "boka@cyklagotakanal.se";
 
    $email_subject = "Bokningsdatum: '.$Today.'";
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Leider ist beim schicken des Formulars ein Fehler aufgetreten. ";
 
        echo "Bitte korrigieren Sie folgende Punkte:<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Gehen Sie auf die vorhergehende Seite und vervollständigen oder korrigieren Sie das Formular.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['datepicker']) ||
    
        !isset($_POST['antal']) ||
    
        !isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
        
        !isset($_POST['hidden']) ||
 
        !isset($_POST['comments'])) {
 
        died('Det verkar vara något fel på formuläret.');       
 
    }
 
    $datepicker = $_POST['datepicker']; // required
     
    $antal = $_POST['antal']; // required
    
    $enkelrum = $_POST['enkelrum']; // not required
    
    $dubbelrum = $_POST['dubbelrum']; // not required
    
    $tre_rum = $_POST['tre_rum']; // not required
    
    $fyr_rum = $_POST['fyr_rum']; // not required
     
    $vego = $_POST['vego']; // not required
      
    $fisk = $_POST['fisk']; // not required
       
    $kott = $_POST['kott']; // not required
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
    
    $hidden = $_POST['hidden']; // required
 
    
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'Geben Sie bitte Ihre korrekte und vollständige E-Mailadresse an.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'Geben Sie bitte Ihren Vornamen an.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'Geben Sie bitte Ihren Nachnamen an.<br />';
 
  }
     
  
  
  if(strlen($datepicker) < 7) {
 
    $error_message .= 'Wählen Sie bitte einen Anreisetag.<br />';

  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
 if ($antal != $enkelrum+($dubbelrum*2)+($tre_rum*3)+($fyr_rum*4)){
      echo "Leider ist beim schicken des Formulars ein Fehler aufgetreten. ";
 
        echo "Bitte korrigieren Sie folgende Punkte:<br /><br />";
 
        echo 'Ändern Sie bitte die Anzahl der Zimmer, so dass diese mit der Anzahl der teilnemhmenden Personen übereinstimmt.<br /><br />';
 
        echo "Gehen Sie auf die vorhergehende Seite und vervollständigen oder korrigieren Sie das Formular.<br /><br />";
         
     }else{
 
 
    $email_message = "Sie haben folgendes gebucht:\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Anreisetag: ".clean_string($datepicker)."\n";
    
    $email_message .= "Anzahl Personen: ".clean_string($antal)."\n";
    
    $email_message .= "Einzelzimmer: ".clean_string($enkelrum)."\n";
    
    $email_message .= "Doppelzimmer: ".clean_string($dubbelrum)."\n";
    
    $email_message .= "Dreibettzimmer: ".clean_string($tre_rum)."\n";
    
    $email_message .= "Viebettzimmer: ".clean_string($fyr_rum)."\n";
    
    $email_message .= "Vegetarisch: ".clean_string($vego)."\n";
    
    $email_message .= "Saibling: ".clean_string($fisk)."\n";
    
    $email_message .= "Aufschnitt: ".clean_string($kott)."\n";
 
    $email_message .= "Vorname: ".clean_string($first_name)."\n";
 
    $email_message .= "nachname: ".clean_string($last_name)."\n";
 
    $email_message .= "E-Mail: ".clean_string($email_from)."\n";
 
    $email_message .= "Telefon: ".clean_string($telephone)."\n";
 
    $email_message .= "Weitere Informationen: ".clean_string($comments)."\n";
    
    $email_message .= "Paket: ".clean_string($hidden)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
<!-- include your own success html here -->
<html lang="sv">
<head>
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=1,
    minimum-scale=1.0, maximum-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <link rel="stylesheet" href="/CSS/pages.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <title>Mit dem Fahrrad am Götakanal entlang</title>
    </head>
<body>
<?php include ("../header.php");
?>

<div class="content">
<div class="contentbackground">


<div class="topiccontainer" style=" margin-top: 65px;">
     <div id="slideshow">
      <div class="topic">       
    <img src="../Images/Diana.jpg" class="logga" >
   		</div>
        <div class="topic">
     <img src="../Images/logotyp.png" class="logga" >         
 	</div>
        <div class="topic"> 
      <img src="../Images/Top1.jpg" class="logga" >
        </div>
        </div>

</div>
     
<div class="pagecontainer">


    <div class="topic2" >       
    
 <h2>Vielen Dank für Ihre Buchung!</h2>
 <p>
Sobald wir Ihre Buchungsanfrage erhalten und bearbeitet haben, schicken wir Ihnen eine Buchungsbestätigung via E-Mail. <br /> 
In der Bestätigung steht Ihre Buchungsnummer und ein paar praktische Informationen für Ihre Reise. </p>
 
 </div>
 </div>
<?php 
    include ("../footer.php");
    ?>
 </div>
 </div>
 
 <?php 
    include ("../kanpanj.php");
    ?>

        
        <script src="../js/jquery.min.js"></script>
<script src="../js/jquery.transit.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="../js/lang_slide.js"></script>
<script src="../js/menu.js"></script>
<script src="../js/Popup.js"></script>
<script src="../js/map.js"></script>
<script src="../js/topic.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../reservation/reservations.js"></script>

</body>
</html>


 
 
<?php
 }
 
}
 
?>
