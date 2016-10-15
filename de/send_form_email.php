<?php
 
if(isset($_POST['email'])) {
 
    
 
     $Today = date('y/m/d');
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "boka@cyklagotakanal.se";
 
    $email_subject = "Bokningsdatum: '.$Today.'";
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Tyvärr är något fel i formuläret. ";
 
        echo "Nedanstående delar av formuläret behöver rättas till.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Gå tillbaka och fyll i kvarvarande uppgifter.<br /><br />";
 
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
 
    $error_message .= 'Vänligen fyll i en korrekt epost-adress.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'Vänligen fyll i förnamn.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'Vänligen fyll i efternamn.<br />';
 
  }
     $string_exp = "/^[0-9]$/";
 
  if(!preg_match($string_exp,$antal)) {
 
    $error_message .= 'Vänligen fyll i antal gäster.<br />';
 
  }
  
  
  if(strlen($datepicker) < 1) {
 
    $error_message .= 'Vänligen fyll i ett datum för bokningen.<br />';

  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
if ($antal != $enkelrum+($dubbelrum*2)){
      echo "Tyvärr är något fel i formuläret. ";
 
        echo "Nedanstående delar av formuläret behöver rättas till.<br /><br />";
 
        echo 'Vänligen ändra antal enkel- respektive dubbelrum så det matchar antal gäster!';
 
        echo "Gå tillbaka och fyll i kvarvarande uppgifter.<br /><br />";
         
     }else{
 
 
    $email_message = "Här följer bokningen.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Startdag: ".clean_string($datepicker)."\n";
    
    $email_message .= "Antal gäster: ".clean_string($antal)."\n";
    
    $email_message .= "Enkelrum: ".clean_string($enkelrum)."\n";
    
    $email_message .= "Dubbelrum: ".clean_string($dubbelrum)."\n";
    
    $email_message .= "Vegetariskt: ".clean_string($vego)."\n";
    
    $email_message .= "Vätternröding: ".clean_string($fisk)."\n";
    
    $email_message .= "Kallskuret: ".clean_string($kott)."\n";
 
    $email_message .= "Förnamn: ".clean_string($first_name)."\n";
 
    $email_message .= "Efternamn: ".clean_string($last_name)."\n";
 
    $email_message .= "Epost: ".clean_string($email_from)."\n";
 
    $email_message .= "Telefon: ".clean_string($telephone)."\n";
 
    $email_message .= "Övrig information: ".clean_string($comments)."\n";
    
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

        <link rel="stylesheet" href="../CSS/pages.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <title>Cykla Göta Kanal</title>
    </head>
<body>
<header>
<div class="popoverflow">
 </div>
    <div class="menu">
    
    
    <ul id="nav" class="nav">
    <a href="index.html"> <li><h3>Hem</h3></li> </a>
    <a href="paket.php"> <li><h3>Paket</h3></li> </a>
    <a href="cyklar.html"> <li><h3>Cyklar</h3></li> </a>
    <a href="besok.html"> <li><h3>Besökskarta</h3></li> </a>
    
    </ul>
     
     <!--   
     <ul id="lang_nav" class="slide">

	
        <li><a href="../sv/besok.html">
        <img src="../Images/Sweden.png"  width="100%"></a>
        	<ul>
                <li>  <a href="../en/besok.html">
        	<img src="../Images/United_Kingdom.png" width="100%"></a>
                </li>
            <ul>
                <li> <a href="../de/besok.html">
        	<img src="../Images/Germany.png" width="100%"></a>
				</li>
            </ul>
            </ul>
        </li>
    </ul>
    -->
    
    
    
    
   </div>
   
      
      
</header>

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
    
 <h2>Tack för din bokningsförfrågan!</h2>
 <p>
När vi tagit emot och behandlat din förfrågan, skickar vi en bokningsbekräftelse till dig via e-post. <br /> 
Här får du också bokningsnummer och mer praktisk information om din resa. </p>
 
 </div>
 </div>
 <div class="footer">
     <div class="footericon">
    
    <img src="/Images/train.png" alt="Ta tåget!" width="30%" >
    <h3>Ta tåget till Göta kanal!</h3><br /><br /><p>Vi rekomenderar att åka tåg till oss,</p><br /><p>snabbt, enkelt och klimatsmart!</p><br /><br /><p>Stockholm - Töreboda (ca. 2h 30min)</p><br /><p>Göteborg - Töreboda (ca. 1h 40min)
    </p><br /><p>Töreboda station - Café Visthuset </p><br /><p>ca. fem min. promenad.</p>
    
    </div>
    <div class="footericon">
    
    <img src="/Images/free.png" alt="Gratis WIFI" width="30%" >
    <h3>Gratis WIFI!</h3><br /><br /><p>Vi erbjuder gratis internet till</p><br /><p>alla våra gäster!</p><br /><br /><p>På utvalda platser längs vägen.</p><br /><p>De anläggningar i våra paket som har wifi
    </p><br /><p>är markerade med symbolen: </p><div class="iconimg"><img src="/Images/free.png" alt="Gratis WIFI" width="10%"></div>
    </div>
    <div class="footericon">
    
    <img src="/Images/free.png" alt="Gratis WIFI" width="30%" style="display:none;">
    
    </div>


  <div class="footertopic">

                <p>Kontakt:
                <br />Telefon: 0506 - 77 75 50<br /><a href="mailto:info@cyklagotakanal.se">e-post</a><br /><br />
                Kanalvägen 2, Töreboda<br />
                    <a href="/sv/paket"> <br />Klicka här för att boka paket! </a> <a href="/sv/cyklar"> <br />Klicka här för att boka cykel!</a></p>
            </div>

            <div class="footertopic">
                <img src="/Images/Partner.jpg" alt="Officiell partner Göta kanal" width="30%" >
            </div>

            <div class="footertopic2">

                <p>Göta kanal är Sveriges största byggnadsverk. 
                Cykla sida vid sida med båtarna som glider sakta 
                fram över sveriges blå band. Bo på våra trevliga 
                vandrarhem och hotell vid vattenkanten. Ät gott på 
                restauranger och caféer längs med kanalen. </p>
            </div>

</div>
 </div>
 </div>
 
 

        
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
