<?php
 
if(isset($_POST['email'])) {
 
    
 
     $Today = date('y/m/d');
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "boka@cyklagotakanal.se";
 
    $email_subject = "Bokningsdatum: '.$Today.'";
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Something went wrong. ";
 
        echo "The following information needs to be corrected: <br /><br />";
 
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
 
    $error_message .= 'State your correct email adress, please.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'Fill in you first name, please.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'Fill in you surname, please.<br />';
 
  }
     
  
  
  if(strlen($datepicker) < 7) {
 
    $error_message .= 'Chose a date for you booking, please.<br />';

  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
 if ($antal != $enkelrum+($dubbelrum*2)+($tre_rum*3)+($fyr_rum*4)){
      echo "Something went wrong. ";
 
        echo "Please correct the following sections in the form:<br /><br />";
 
        echo 'Please make sure that the booked number of single and twin bed rooms matches the amount of guests.<br /><br />';
 
        echo "Please complete the form.<br /><br />";
         
     }else{
 
 
    $email_message = "You have booked the following:\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Date: ".clean_string($datepicker)."\n";
    
    $email_message .= "Number of guests: ".clean_string($antal)."\n";
    
    $email_message .= "Single bedroom: ".clean_string($enkelrum)."\n";
    
    $email_message .= "Twin bedroom: ".clean_string($dubbelrum)."\n";
    
    $email_message .= "Triple bedroom: ".clean_string($tre_rum)."\n";
    
    $email_message .= "Quadruple bedroom: ".clean_string($fyr_rum)."\n";
    
    $email_message .= "Vegetarian: ".clean_string($vego)."\n";
    
    $email_message .= "Char: ".clean_string($fisk)."\n";
    
    $email_message .= "Cold Cuts: ".clean_string($kott)."\n";
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Surname: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Phone number: ".clean_string($telephone)."\n";
 
    $email_message .= "Additional Information: ".clean_string($comments)."\n";
    
    $email_message .= "Tour Package: ".clean_string($hidden)."\n";
 
     
 
     
 
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

    <title>Biking along the «Göta Canal»</title>
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
    
 <h2>Thank you for your booking request!</h2>
 <p>
As soon as we have received and processed your booking request, we will send a confirmation to your e-mail address.<br /> 
In that confirmation you will find your booking ID and some practical information about your trip.</p>
 
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
