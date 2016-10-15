<?php



if (isset($_POST['cykelfom'])){

  



if (!isset($_POST['cykelfom'])&&($_POST['cykeltom'])&&($_POST['antal'])&&($_POST['first_name'])&&($_POST['last_name'])&&($_POST['email'])){
    header("Location:/sv/cyklar");
}
session_start();

$host = "cyklagotakanal.se.mysql";
$user = "cyklagotakanal_";
$password = "nvmTyjQU";
$db = "cyklagotakanal_";

$conn = mysqli_connect($host, $user, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

                // Tar fram Bokningsid för bokningen (yymmdd+01)
                $today = date("ymd"); 
                $Bokningsid = "";
                $Bokningsnummer = "";
                $bookningnbr = array();
                // Hämtar alla Bokningsid från databasen som har dagens datum som bokningsdatum.
                $sql = "SELECT Bokningsid FROM confirms WHERE Bokningsnummer='$today' UNION SELECT Bokningsid FROM conf_paket WHERE Bokningsnummer='$today'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while( $row = mysqli_fetch_row( $result)){
                        // Placerar alla Bokningsid i listor
                        $bookningnbr[] = $row;
                    }
                    // Smäler samman alla listor till en och samma lista.
                    foreach($bookningnbr as $k=>$v) {
                        $bookningnbr[$k] = $v[0];
                }
                
                // tar fram det högsta värdet i listan och adderar 1. Detta blir bokningsid
                $Bokningsid = max($bookningnbr)+1;
                
                    
                
                
                
                    
                }else{$Bokningsid = 1;}
                
                $Boknings_id = sprintf("%02d\n", $Bokningsid);
                $Bokningsnummer = $today+''.$Boknings_id.'';
                



$sql = "SELECT * FROM `confirm` LIMIT 0, 30 ";
$tbl_insert = "SELECT * FROM `cyklar` LIMIT 0, 30 ";





    $cykelfom = $_POST['cykelfom'];
    $cykeltom = $_POST['cykeltom'];

    $antal = $_POST['antal'];
    
    $sadel = $_POST['bsadel'];
    
    $pris = $_POST['pris'];
    
    $fname = $_POST['first_name'];
    
    $lname = $_POST['last_name'];
      
    $epost = $_POST['email']; 
 
    $tel = $_POST['telephone']; 
 
    $info = $_POST['comments']; 
    
    $vego = $_POST['vego'];
    $fisk = $_POST['fisk'];
    $kott = $_POST['kott'];
    
    
    
    
                
    
    
    
   
    /**
 * Returns every date between two dates as an array
 * @param string $startDate the start of the date range
 * @param string $endDate the end of the date range
 * @param string $format DateTime format, default is Y-m-d
 * @return array returns every date between $startDate and $endDate, formatted as "Y-m-d"
 */

   // Puts all dates between start and enddate in an array...
function dateRange( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {
	$dates = array();
	$current = strtotime( $first );
	$last = strtotime( $last );
	while( $current <= $last ) {
		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}
	return $dates;
}   
    
    // Lista över datumen från startdatum och slutdatum. 
    $dates = ( dateRange( $cykelfom, $cykeltom) );
    
    
    
    // Skapar en rad för de dagar som ännu inte finns i databasen.
    foreach($dates as $x => $x_value) {
        $sql = "INSERT INTO cyklar (Datum, Cykel_1, Cykel_2, Cykel_3, Cykel_4, Cykel_5, Cykel_6, Cykel_7, Cykel_8, Cykel_9, Cykel_10, Cykel_11, Cykel_12, Cykel_13, Cykel_14, Cykel_15, Cykel_16, Cykel_17, Cykel_18, Cykel_19, Cykel_20) VALUES ('$x_value', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1') ON DUPLICATE KEY UPDATE Datum='$x_value'";
            if ($conn->query($sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
    // lista över alla cyklar att kontrollera mot databasen.
    $bikes = array("Cykel_1", "Cykel_2", "Cykel_3", "Cykel_4", "Cykel_5", "Cykel_6", "Cykel_7", "Cykel_8", "Cykel_9", "Cykel_10", "Cykel_11", "Cykel_12", "Cykel_13", "Cykel_14", "Cykel_15", "Cykel_16", "Cykel_17", "Cykel_18", "Cykel_19", "Cykel_20");
    $unavail_bikes = array();
    $avail_bikes = array();
    $booked_bikes = array();
    $booked = "";
    $booked_sad = "";
    // variabel som räknar antal tillgängliga cyklar under perioden.
    $bike_check = 0;
        foreach($bikes as $bike){
            foreach($dates as $x => $x_value) {
                // Hämtar tillgänglighet på alla cyklar valda datum från databasen.
                $check = "SELECT * FROM cyklar WHERE Datum='$x_value'";
                $query = mysqli_query($conn, $check) or die (mysqli_error($conn));
                $quick_check = mysqli_num_rows($check);
                    
                    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                    $cykel = $row[''.$bike.''];
                        // Om en cykel har värdet 0 (ej tillgänglig) läggs den till i listan $unavail_bikes
                        if ($cykel == 0) {
                            array_push($unavail_bikes, $bike);
                        }
                    // placerar all data i lista
                    $arr_dates[$x_value] = $cykel;
                    }
                }
            // Kontrollerar om värdet 0 (ej tillgänglig) finns i listan.
            if (in_array(0, $arr_dates)) {
            } 
            // Addera 1 till variabel med antal lediga cyklar.
            else{
                $bike_check += 1;
            }  
        }
    // Ifall en cykel har värdet 0 fler än en dag under perioden får den flera rader i listan $unavail_bikes. 
    // Radera dubletter från listan $unavail_bikes.
    $unavail_bikes = array_unique($unavail_bikes);
        // Jämför listan över alla cyklar med listan över ej tillgängliga cyklar och listar alla tillgängliga cyklar i $avail_bikes
        function getavail($a,$b) {
            if ($a===$b) {
                return 0;
            }
            return ($a>$b)?1:-1;
        }   $avail_bikes=array_udiff($bikes,$unavail_bikes, "getavail");
        // Kolla om antalet lediga cyklar är mer eller lika med antal gäster.
    if ($bike_check >= $antal){
        
            // Uppdaterar tillgängligheten på cyklar alla datum i bokningen
            foreach ($dates as $date){
                // Variabel håller hur många cyklar som har bokats vid datumet
                $i = 0;
                // Uppdatera cyklar
                foreach ($avail_bikes as $x => $x_avail){
                    // Om variabel $i inte matchar antal gäster...
                    if ($i != $antal){
                        // sql uppdaterar cyklar
                        $sql = "UPDATE cyklar SET $x_avail=0 WHERE Datum='$date'";
                        // Placerar alla bokade cyklar i $booked_bikes.
                        array_push($booked_bikes,$x_avail);
                        if ($conn->query($sql) === TRUE) {
                        } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        // Antal bokade cyklar ökar med 1. 
                        $i++;
                    }
                }
            }
            // Tar bort duplicerade värden i listan för bokningar.
            $booked_bikes = array_unique($booked_bikes);
            // Formaterar $booked_bikes för att infoga i db tabell conf_paket.
            foreach ($booked_bikes as $x => $x_value) {
            $booked .= "$x_value, ";
            }
                
                // Sätter in data i confirms som håller alla cykelbokningar.
                $sql = "INSERT INTO confirms (Bokningsnummer, Bokningsid, Dagar, Startdag, Cykelfom, Cykeltom, Cykelnummer, Sadelnummer, Antal_gaster, Barnsadlar, Namn, epost, Telefon, Info, vego, fisk, kott, Pris) VALUES ('$today', '$Bokningsid', '$dates', '$cykelfom', '$cykelfom', '$cykeltom', '$booked', '$booked_sad', '$antal', '$sadel', '$fname $lname', '$epost', '$tel', '$info', '$vego', '$fisk', '$kott', '$pris')";
                if (mysqli_query($conn, $sql)) {
                    
                    $_SESSION["today"] = $today;
                    $_SESSION["Bokningsid"] = $Bokningsid;
                    $_SESSION["dates"] = $dates;
                    $_SESSION["cykelfom"] = $cykelfom;
                    $_SESSION["cykeltom"] = $cykeltom;
                    $_SESSION["booked"] = $booked;
                    $_SESSION["booked_sad"] = $booked_sad;
                    $_SESSION["antal"] = $antal;
                    $_SESSION["sadel"] = $sadel;
                    $_SESSION["fname"] = $fname;
                    $_SESSION["lname"] = $lname;
                    $_SESSION["epost"] = $epost;
                    $_SESSION["tel"] = $tel;
                    $_SESSION["info"] = $info;
                    $_SESSION["vego"] = $vego;
                    $_SESSION["fisk"] = $fisk;
                    $_SESSION["kott"] = $kott;
                    $_SESSION["pris"] = $pris;
                    $_SESSION["Bokningsnummer"] = $Bokningsnummer;
                    
                    
                    
                     // mailar till gästen
                    $email_from = "boka@cyklagotakanal.se";
                    
                    $email_to = "$epost";
 
                    $email_subject = "Booking ID: $Bokningsnummer";
                    
                    $email_message = "You have booked the following: \r\n\r\nBooking ID: $Bokningsnummer \r\n
                     Name: $fname $lname \r\n Phone: $tel\r\nEmail: $epost \r\nAdditional Information: $info \r\n Date: $cykelfom - $cykeltom \r\n Number of bikes: $antal \r\n Vegetarian Picnic: $vego \r\n Picnic Fish: $fisk \r\n Picnic Cold Cuts: $kott 
                     \r\n\r\n
                     Please state your booking ID ($Bokningsnummer) if contacting us, so that we ca help you in the best way possible.";
 
                    $headers = 'From: '.$email_from."\r\n".
 
                    'Reply-To: '.$email_from."\r\n" .
 
                    'X-Mailer: PHP/' . phpversion();
 
                    @mail($email_to, $email_subject, $email_message, $headers);
                    
                    
                    
                    // Kopia till oss
                    $email_from = "$epost";
                    
                    $email_to = "boka@cyklagotakanal.se";
 
                    $email_subject = "Bokningsnummer: $Bokningsnummer";
                    
                    $email_message = "Du har genomfört bokningen med följande specifikationer: \r\n\r\nBokningsnummer: $Bokningsnummer \r\n
                     Namn: $fname $lname \r\n Telefon: $tel\r\nEpost: $epost \r\nÖvrig info: $info \r\n Datum: $cykelfom - $cykeltom \r\n Antal cyklar: $antal \r\n Vegolunch: $vego \r\n Fisklunch: $fisk \r\n Kallskuret: $kott 
                     \r\n\r\n
                     Vänligen ange ditt bokningsnummer ($Bokningsnummer) vid kontakt med oss så vi kan hjälpa dig på bästa sätt.";
 
                    $headers = 'From: '.$email_from."\r\n".
 
                    'Reply-To: '.$email_from."\r\n" .
 
                    'X-Mailer: PHP/' . phpversion();
 
                    @mail($email_to, $email_subject, $email_message, $headers);
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    header("Location:/sv/cyklar/bokning");
                    die("Please wait ...");
                    
                    echo '
                    <!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=1,
    minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="description" content="The «Göta Canal» is Sweden’s largest building. Ride your bike alongside with the boats that glide over the blue ribbon of Sweden. Live at cosy hostels and hotels right at the waterfront. Eat well at restaurants and cafés next to the canal."> 
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

    <title>Biking along the «Göta Canal» - Booking</title>
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
   <img src="/Images/Diana.jpg" alt="The boat «Diana» in Töreboda" class="logga" >
   		</div>
        <div class="topic">
     <img src="/Images/logotyp.png" alt="Logo Cykla Göta kanal" class="logga" >         
 	</div>
        <div class="topic"> 
      <img src="/Images/Top1.jpg" alt="Bikes next to the canal" class="logga" >
        </div>
        </div>

</div>
     
<div class="pagecontainer">


    <div class="topicwide" >       
    	
    	<h2>Thank you for your booking!</h2>
    	<p> You have booked the following: <br />Booking ID: '.$Bokningsnummer.'<br />
                     Namne: '.$fname.' '.$lname.'<br />Phone: '.$tel.'<br />Email: '.$epost.'<br />Additional Information: '.$info.'<br /> Date: '.$cykelfom.' - '.$cykeltom.' <br /> Number of Bikes: '.$antal.' <br /> Vegetarian Picnic: '.$vego.'<br />Picnic Fish: '.$fisk.'<br />Picnic Cold Cuts: '.$kott.' 
                     </p>
                     <p>Please state your booking ID ($Bokningsnummer) if contacting us, so that we ca help you in the best way possible. </p>
                     <p> Welcome!</P>
    	     	
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
                   
                    
                    
                    
                    
                    
                    
                
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        

    mysqli_close($conn);
   die();
    }
    else {
        // Om antalet lediga cyklar är färre än antalet gäster visa antal lediga cyklar. 
        
        echo '
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=1,
    minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="description" content="The «Göta Canal» is Sweden’s largest building. Ride your bike alongside with the boats that glide over the blue ribbon of Sweden. Live at cosy hostels and hotels right at the waterfront. Eat well at restaurants and cafés next to the canal."> 
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

    <title>Biking along the «Göta Canal» - Booking</title>
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
   <img src="/Images/Diana.jpg" alt="The boat «Diana» in Töreboda" class="logga" >
   		</div>
        <div class="topic">
     <img src="/Images/logotyp.png" alt="Logo Cykla Göta kanal" class="logga" >         
 	</div>
        <div class="topic"> 
      <img src="/Images/Top1.jpg" alt="Bikes next to the canal" class="logga" >
        </div>
        </div>

</div>
     
<div class="pagecontainer">


    <div class="topicwide" >       
    	
    	<h2>We are sorry!</h2>
    	<p>We only have '.$bike_check.' available bicycles on the day you have selected! <br /> Please change your booking or contact us at +46 (0)506 - 77 75 50 for assistance.</p>
    	     	
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
   
echo'
           
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
</html>';
die();
    }
    
}

header("Location:/sv/cyklar");
?>





	<script>
	$( document ).ready(function() {
	    $('.page_two').fadeOut('fast');
	});
	    
	var startdag = "";
	var slutdag = "";
	
    var dagar = "";
    var antal = "";
    var vego = 0;
    var fisk = 0;
    var kott = 0;
    var lunch = 0;
    var sadel = "";

    var cykelPris = "";
    var lunchPris = "";
    var sadelPris = "";
    var total = "";
	
    $(function() {
        $( "#from" ).datepicker({
            dateFormat: 'yy/mm/dd',
            minDate: new Date (2016, 6 - 1, 01),
            maxDate: new Date (2016, 8 - 1, 31),
            firstDay: 1,
            
                
            onSelect: function(a, b) {
                var diff = $(this).datepicker("getDate") - new Date(slutdag);
                diff = Math.floor(diff / (1000 * 60 * 60 * 24) * -1) + 1;
                var value = diff;
                dagar = value;
                cykelPris = antal*100*dagar+100*antal;
                lunchPris = lunch*85; 
                sadelPris = sadel*50
                total = lunchPris + cykelPris + sadelPris;
                $('#pris').val(total); 
                $('#pris_1').val("Pris: " +total+" kr");
                $('#pris_2').val("Pris: " +total+" kr"); 
                
                
                
            },
      
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
                startdag = selectedDate;
                $('#dagar').val("Datum: " +startdag+" - "+slutdag); 
            }
        });
        $( "#to" ).datepicker({
            dateFormat: 'yy/mm/dd',
            minDate: new Date (2016, 6 - 1, 01),
            maxDate: new Date (2016, 8 - 1, 31),
            firstDay: 1,
            
                
            onSelect: function(a, b) {
                var diff = new Date(startdag) - $(this).datepicker("getDate");
                diff = Math.floor(diff / (1000 * 60 * 60 * 24) * -1) + 1;
                var value = diff;
                dagar = value;
                cykelPris = antal*100*dagar+100*antal;
                lunchPris = lunch*85;
                sadelPris = sadel*50*dagar;
                total = lunchPris + cykelPris + sadelPris;
                $('#pris').val(total); 
                $('#pris_1').val("Pris: " +total+" kr");
                $('#pris_2').val("Pris: " +total+" kr"); 
                
                
            },
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                slutdag = selectedDate;
                $('#dagar').val("Datum: "+startdag+" - "+slutdag); 
            }
        });
    });


    function cykelAntal(sel){
        antal = sel.value;
        minDate: new Date (2016, 6 - 1, 1),
        cykelPris = antal*100*dagar+100*antal;
        total = lunchPris + cykelPris + sadelPris;
        $('#pris').val(total); 
        $('#pris_1').val("Pris: " +total+" kr");
        $('#pris_2').val("Pris: " +total+" kr"); 
        $('#lunch').val("Antal luncher: "+lunch); 
        $('#cyklar').val("Antal cyklar: "+antal); 
        
    }
    
    function cykelBsadel(sel){
        sadel = sel.value;
       
        sadelPris = sadel*50*dagar;
        total = lunchPris + cykelPris + sadelPris;
        $('#pris').val(total); 
        $('#pris_1').val("Pris: " +total+" kr");
        $('#pris_2').val("Pris: " +total+" kr"); 
        $('#lunch').val("Antal luncher: "+lunch); 
        $('#cyklar').val("Antal cyklar: "+antal); 
        $('#bsadel').val("Antal barnsadlar: "+sadel);
    }
    
    function lunchAntal(sel){
        var value = sel.value;
        var name = sel.id;
        var val;
        
        if (name == "vego"){
            val = parseInt(value);
            vego = val;
            lunch = kott+fisk+vego;
        }
        if (name == "fisk"){
            val = parseInt(value);
            fisk = val;
            lunch = vego+fisk+kott;
        }
        if (name == "kott"){
            val = parseInt(value);
            kott = val;
            lunch = kott+fisk+vego;
        }
        
        $('#lunch').val("Antal luncher: " + lunch); 
        lunchPris = lunch*85; 
        total = lunchPris + cykelPris + sadelPris;
        $('#pris').val(total); 
        $('#pris_1').val("Pris: " +total+" kr");
        $('#pris_2').val("Pris: " +total+" kr"); 
    }
    
    function nextPage (){
        
        
        
        var from = document.forms["bike_ins"]["from"].value;
        if (from == null || from == "") {
            $("#from").css('border-color', 'red');
            return false;
        }
        var to = document.forms["bike_ins"]["to"].value;
        if (to == null || to == "") {
            $("#to").css('border-color', 'red');
            return false;
        }
        var ckl = document.forms["bike_ins"]["ckl"].value;
        if (ckl == null || ckl == "" || ckl == 0) {
            $("#ckl").css('border-color', 'red');
            return false;
        }
        
        
        $('.page_one').fadeOut('slow');
        $('.page_two').fadeIn('slow');
    }
    
    function prevPage (){
        
        $('.page_two').fadeOut('slow');
        $('.page_one').fadeIn('slow');
    }
    
    function checkOut (){
        
        
        
        var fn = document.forms["bike_ins"]["fname"].value;
        if (fn == null || fn == "") {
            $("#fname").css('border-color', 'red');
            return false;
        }else{$("#fname").css('border-color', 'lightgray');}
        var ln = document.forms["bike_ins"]["lname"].value;
        if (ln == null || ln == "") {
            $("#lname").css('border-color', 'red');
            return false;
        }else{$("#lname").css('border-color', 'lightgray');}
        var em = document.forms["bike_ins"]["email"].value;
        if (em == null || em == "" || em == 0) {
            return false;
        }else{$("#email").css('border-color', 'lightgray');}
        
        return document.getElementById("bike_ins").submit();
        
    }
    
    
    
    
    </script>








<?php
 

echo '<div class="field" style="visibility: visible;">
		<form action="booking_bike.php" method="post" name="bike_ins" id="bike_ins">
		
		
		<h2 class="page_one">Rent a Bike!</h2>
        <div class="page_one">
        
        <label for="datepicker">From *</label><br />
        <input type="text" name="cykelfom" id="from" readonly="true" value=""><br />
        <label for="datepicker">Until *</label><br />
        <input type="text" name="cykeltom" id="to" readonly="true" value=""><br />
      
        <label>Number of 28" bikes</label><br />
        <select name="antal" id="ckl" onchange="cykelAntal(this)" value=""><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select>
        <label>(If you would like to rent kidsbikes, child seats and/or bike trailers, please state this under «additional information» on the next page.)</label><br /><br />
        <br />
        
        
        <label>Filled picnic basket (optional)</label><br />
        <label>Vegetarian</label><br />
        <select name="vego" id="vego" onchange="lunchAntal(this)"><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><br />
        <label>Char</label><br />
        <select name="fisk" id="fisk" onchange="lunchAntal(this)"><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><br />
        <label>Cold Cuts</label><br />
        <select name="kott" id="kott" onchange="lunchAntal(this)"><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><br />
            <br />
            <label for="pris1"></label><br />
            <input type="text" name="pris_1" id="pris_1" class="pris_1" maxlength="50" size="30" readonly style="border: none; background-color: inherit; font-size: 2em; height: 100px; margin-top:-30px; margin-bottom:-30px;" value="0"><input type="hidden" name="pris" id="pris" class="pris" value="0"><br />
            <br />
            
            <input type="button" name="next" onclick="nextPage()" value="Continue!"> 
            </div>
        
        <div class="page_two">
        <h2 style="top:-35px;">Send booking request!</h2><input type="button" name="next" onclick="prevPage()" style="position:absolute; width:30px; height:20px; right:0%; top:-30px; padding:0px;" value="<<"> 
        <input type="text" name="dagar" id="dagar" class="dagar" maxlength="50" size="30" readonly style="border: none; background-color: inherit; font-size: 1em; height: 50px; margin-bottom:-20px;" value="">
        <input type="text" name="cyklar" id="cyklar" class="cyklar" maxlength="50" size="30" readonly style="border: none; background-color: inherit; font-size: 1em; height: 50px; margin-bottom:-20px;" value="">
        
            <input type="text" name="lunch" id="lunch" class="lunch" maxlength="50" size="30" readonly style="border: none; background-color: inherit; font-size: 1em; height: 50px; margin-bottom:-20px;" value="">
            <input type="text" name="pris_2" id="pris_2" class="pris_2" maxlength="50" size="30" readonly style="border: none; background-color: inherit; font-size: 1em; height: 50px; margin: 0px;" value="0">
            
            
        <label for="first_name">First name *</label><br />
            <input  type="text" id="fname" name="first_name" maxlength="50" size="30"><br />
        <label for="last_name">Surname *</label><br />
            <input  type="text" id="lname" name="last_name" maxlength="50" size="30"><br />
        <label for="email">Email *</label><br />
            <input  type="text" id="email" name="email" maxlength="80" size="30"><br />
        <label for="telephone">Phone</label><br />
            <input  type="text" name="telephone" maxlength="30" size="30"><br />
        <label for="comments">Additional Information (Allergies, Campaign Codes, etc)</label><br />
            <textarea  name="comments" maxlength="1000" cols="27" rows="6"></textarea><br /><br />
        <input type="submit" name="submitbike" onclick="return checkOut()" value="Confirm Booking"> 
        </div></form>';
        ?>
        
        
