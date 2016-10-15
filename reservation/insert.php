<?php
if(!isset($_POST['submitpaket'])){
    header("Location:axxess.php");
}



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
                
                

$sql = "SELECT * FROM `conf_paket` LIMIT 0, 30 ";
$tbl_insert = "SELECT * FROM `cyklar` LIMIT 0, 30 ";





    $paket = $_POST['paket'];
    
    $dagar = $_POST['dagar'];

    $dag1 = $_POST['dayone']; 
    $dag2 = $_POST['daytwo']; 
    $dag3 = $_POST['daythree']; 
    $dag4 = $_POST['dayfour']; 
    $dag5 = $_POST['dayfive']; 
    $dag6 = $_POST['daysix']; 
    $dag7 = $_POST['dayseven']; 
    
    $enkel = $_POST['enkelrum']; 
    $dubbel = $_POST['dubbelrum'];
    
    $start = $_POST['date1'];
     
    $antal = $_POST['antal'];
    
    $cykelfom = $_POST['cykelfom'];
    
    $cykeltom = $_POST['cykeltom'];
    
    $pris_pp = $_POST['pris_pp'];
    
    $pris_2 = $_POST['pris_2'];
    
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
        echo 'Det finns '.$bike_check.' lediga cyklar.';
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
                
        
        
        $extrapris = $pris_2 * $dagar;
        
        
        $sql = "INSERT INTO conf_paket (Bokningsnummer, Bokningsid, Paketnamn, Dagar, Startdag, Cykelnummer, Cykelfom, Cykeltom, Boende_dag_1, Boende_dag_2, Boende_dag_3, Boende_dag_4, Boende_dag_5, Boende_dag_6, Boende_dag_7, Enkelrum, Dubbelrum, Antal_gaster, Barnsadlar, Namn, epost, Telefon, Info, vego, fisk, kott, Pris_pp, Pris_2) VALUES ('$today', '$Bokningsid', '$paket', '$dagar', '$start', '$booked', '$cykelfom', '$cykeltom', '$dag1', '$dag2', '$dag3', '$dag4', '$dag5', '$dag6', '$dag7', '$enkel', '$dubbel', '$antal', '$bantal', '$fname $lname', '$epost', '$tel', '$info', '$vego', '$fisk', '$kott', '$pris_pp', '$extrapris')";
       


            if (mysqli_query($conn, $sql)) {
                echo "Du har lagt in paketet i databasen med följande specifikationer: <br />
                $paket<br /> Datum: $start<br /> Cykelnummer: $booked<br />Natt 1: $dag1<br />Natt 2: $dag2<br />Natt 3: $dag3 <br />Natt 4: $dag4<br />Natt 5: $dag5<br />Natt 6: $dag6 <br />Natt 7: $dag7 <br />Enkelrum: $enkel <br /> Dubbelrum: $dubbel <br /> Namn: $fname $lname<br />Telefon: $tel<br />Övrig info: $info<br /> Vegolunch: $vego<br />Fisklunch: $fisk<br />Kallskuret: $kott $pris_2
                ";
    
    
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        
        
        

    mysqli_close($conn);
   
    }
    else {
        // Om antalet lediga cyklar är färre än antalet gäster visa antal lediga cyklar. 
        echo 'Endast '.$bike_check.' lediga cyklar!';
    }
    
 


?>