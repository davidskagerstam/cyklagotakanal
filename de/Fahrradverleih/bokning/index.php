<?php 
session_start();
if($_SESSION["Bokningsnummer"] == ""){
    header('Location: ../');
}
echo '
                    <!DOCTYPE html>
<html lang="sv">
<head>
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=1,
    minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="description" content="Göta kanal är Sveriges största byggnadsverk. Cykla sida vid sida med båtarna som glider sakta fram över sveriges blå band. Ät gott på restauranger och caféer längs med kanalen."> 
    <meta name="keyword" content="Cykla längs Göta kanal
Paket Göta kanal
Ekologisk semester
cykel göta kanal
göta kanal paket
cykling göta kanal
dagstur göta kanal
göta kanal resor
göta kanal cykel
boende göta kanal
göta kanal dagstur
göta kanal cykelpaket
cykelsemester göta kanal
cykelkarta göta kanal
göta kanal töreboda
töreboda göta kanal
tåtorp göta kanal
lyrestad göta kanal
norrqvarn göta kanal
norrkvarn göta kanal
cykla göta kanal
cykla längs göta kanal
cykla vid göta kanal
göta kanal cykla
cykla utmed göta kanal
cykla på göta kanal
cykla efter göta kanal
cykla göta kanal med barn
cykeluthyrning töreboda
göta kanal sjötorp töreboda
göta kanal">

        <link rel="stylesheet" href="/CSS/pages.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <title>Cykla Göta Kanal - Bokning</title>
    </head>
<body>

';
 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/sv/header.php";
   include_once($path);
    

echo '


<div class="content">
<div class="contentbackground">


<div class="topiccontainer" style=" margin-top: 70px;">
     <div id="slideshow">
      <div class="topic">       
   <img src="/Images/Diana.jpg" alt="Diana i Töreboda" class="logga" >
   		</div>
        <div class="topic">
     <img src="/Images/logotyp.png" alt="Cykla Göta kanal" class="logga" >         
 	</div>
        <div class="topic"> 
      <img src="/Images/Top1.jpg" alt="Cyklar vid kanalen" class="logga" >
        </div>
        </div>

</div>
     
<div class="pagecontainer">


    <div class="topicwide" >       
    	
    	<h2>Tack för din bokning!</h2>
    	<p> Du har genomfört bokningen med följande specifikationer: <br />Bokningsnummer: '.$_SESSION["Bokningsnummer"].'<br />
                     Namn: '.$_SESSION["fname"].' '.$_SESSION["lname"].'<br />Telefon: '.$_SESSION["tel"].'<br />Epost: '.$_SESSION["epost"].'<br />Övrig info: '.$_SESSION["$info"].'<br /> Datum: '.$_SESSION["cykelfom"].' - '.$_SESSION["cykeltom"].' <br /> Antal cyklar: '.$_SESSION["antal"].' <br /> Vegolunch: '.$_SESSION["vego"].'<br />Fisklunch: '.$_SESSION["fisk"].'<br />Kallskuret: '.$_SESSION["kott"].' 
                     </p>
                     <p>Vänligen ange ditt bokningsnummer ('.$_SESSION["Bokningsnummer"].') vid kontakt med oss så vi kan hjälpa dig på bästa sätt. </p>
                     <p> Välkommen!</P>
    	     	
    </div>
    

    </div>


    ';
 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/sv/footer.php";
   include_once($path);
    

echo '  





</div>
</div>

';
 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/sv/kampanj.php";
   include_once($path);
    

echo '

           
    </div>
            
        </div>
           </div>
        
        
        <script src="/js/jquery.min.js"></script>
<script src="/js/jquery.transit.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="/js/lang_slide.js"></script>
<script src="/js/menu.js"></script>
<script src="/js/Popup.js"></script>
<script src="/js/map.js"></script>
<script src="/js/topic.js"></script>
<script src="/js/slideshow.js"></script>
<script src="/js/date.js"></script>

</body>
</html>
';

session_unset();

?>