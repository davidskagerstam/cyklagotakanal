<?php
 
if(isset($_POST['email'])) {
 
    
 
     $Today = date('y/m/d');
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "boka@cyklagotakanal.se";
 
    $email_subject = "Bokningsdatum: '.$Today.'";
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Something went wrong! ";
 
        echo "The following parts of the form need to be correted.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please complete the form.<br /><br />";
 
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
 
        died('Something went wrong.');       
 
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
 
    $error_message .= 'State your correct email adress, please.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'Fill in your first name, please.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'Fill in your surname, please.<br />';
 
  }
     $string_exp = "/^[0-9]$/";
 
  if(!preg_match($string_exp,$antal)) {
 
    $error_message .= 'Please choose number of guests.<br />';
 
  }
  
  
  if(strlen($datepicker) < 1) {
 
    $error_message .= 'Please choose a date.<br />';

  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
if ($antal != $enkelrum+($dubbelrum*2)){
      echo "Something went wrong. ";
 
        echo "The following needs to be corrected.<br /><br />";
 
        echo 'Please correct number of single and twin bedrooms so that they match the number of guests.';
 
        echo "Please complete the form.<br /><br />";
         
     }else{
 
 
    $email_message = "You have booked the following:\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Date (First day): ".clean_string($datepicker)."\n";
    
    $email_message .= "Number of guests: ".clean_string($antal)."\n";
    
    $email_message .= "Single bedroom: ".clean_string($enkelrum)."\n";
    
    $email_message .= "Twin bedroom: ".clean_string($dubbelrum)."\n";
    
    $email_message .= "Vegetarian: ".clean_string($vego)."\n";
    
    $email_message .= "Char: ".clean_string($fisk)."\n";
    
    $email_message .= "Cold Cuts: ".clean_string($kott)."\n";
 
    $email_message .= "First name: ".clean_string($first_name)."\n";
 
    $email_message .= "Surname: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Phone number: ".clean_string($telephone)."\n";
 
    $email_message .= "Additional information: ".clean_string($comments)."\n";
    
    $email_message .= "Tour package: ".clean_string($hidden)."\n";
 
     
 
     
 
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

    <title>Biking along the «Göta Canal»</title>
    </head>
<body>
<header>
<div class="popoverflow">
 </div>
    <div class="menu">
    
    
    <ul id="nav" class="nav">
    <a href="/en/index.html"> <li><h3>Home</h3></li> </a>
    <a href="/en/paket.php"> <li><h3>Tour packages</h3></li> </a>
    <a href="/en/cyklar.html"> <li><h3>Rent a Bike</h3></li> </a>
    <a href="/en/besok.html"> <li><h3>Visitor's Map</h3></li> </a>
    
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
    
 <h2>Thank you for your booking request!</h2>
 <p>
As soon as we have received and processed your booking request, we will send a confirmation to your e-mail address.<br /> 
In this e-mail you will also receive your booking number and some practical informations about your trip. </p>
 
 </div>
 </div>
 <div class="footer">
     <div class="footericon">
    
    <img src="/Images/train.png" alt="Ta tåget!" width="40%" >
    <h3>Take the train to «Göta Canal»</h3><br /><br /><p>We recommend to take the tain!</p><br /><p>A quick, simple and eco-friendly <br>way to travel!</p><br /><br /><p>Stockholm - Töreboda (ca. 2h 30min)</p><br /><p>Gothenburg - Töreboda (ca. 1h 40min)
    </p><br /><p>Töreboda train station - Café «Visthuset» </p><br /><p>- 5 min by foot</p>
    
    </div>
    
     <div class="footericon" align="center">
    
    <img src="/Images/free.png" alt="Gratis WIFI" width="40%" >
    <h3>Free WIFI!</h3><br /><br /><p>We offer free WiFi for all our guests.</p><br /><br /><p>Chosen spots along the way also offering </p><br><p>free WiFi are marked with this symbol:</p><div class="iconimg" align="center"><img src="/Images/free.png" alt="Gratis WIFI" width="10%"></div>
    </div>
    
    <div class="footericon_no">
    
    <a href="http://www.kammarkollegiet.se/travel-guarantee/sv/search?query=cafe%20visthuset&user_lang=sv" target="_blank"><img src="/Images/resegaranti.png" alt="Vi har ställt resegaranti!" width="40%" style=" margin-top: 10px;"></a>
    
    </div>
    
  <div class="footertopic">

                <p>Contact:
                <br />Phone: <a href="tel:0506777550">+46 (0)506 - 77 75 50</a><br /><a href="mailto:info@cyklagotakanal.se">info@cyklagotakanal.se</a><br /><br />
                Kanalvägen 2, Töreboda, Sweden<br />
                    <a href="/sv/paket"> <br />You can book a tour here. </a> <a href="/sv/cyklar"> <br />Rent a bike here.</a></p>
            </div>

            <div class="footertopic">
                <img src="/Images/Partner.jpg" alt="Officiell partner Göta kanal" width="30%" >
            </div>

            <div class="footertopic2">

                <p>The «Göta Canal» is Sweden’s largest building. Ride your bike alongside with the boats that glide over the blue ribbon of Sweden. Live at cosy hostels and hotels right at the waterfront. Eat well at restaurants and cafés next to the canal.</p>
            </div>

</div>
</div>
</div></a>

 
    
    
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
