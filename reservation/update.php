<?php
   $host = "cyklagotakanal.se.mysql";
$user = "cyklagotakanal_";
$password = "nvmTyjQU";
$db = "cyklagotakanal_";

$conn = mysqli_connect($host, $user, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `conf_paket` LIMIT 0, 30 ";
$sql2 = "SELECT * FROM `conf_delete` LIMIT 0, 30 ";
$tbl_insert = "SELECT * FROM `cyklar` LIMIT 0, 30 ";


if(!isset($_POST['date1'])xor($_POST['delpaket'])){
    header("Location:axxess.php");
}

    $id = $_POST['id'];
    
    $paket = $_POST['paket'];
    
    $dagar = $_POST['dagar'];
    
    $originaldagar = $_POST['dagar2'];
    
    $originalcykelnummer = $_POST['cykelnummer'];

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
    
    $originalstart = $_POST['date2'];
    
    $cykelfom = $_POST['cykelfom'];
    $cykeltom = $_POST['cykeltom'];
    
    $originalcykelfom = $_POST['originalcykelfom'];
    $originalcykeltom = $_POST['originalcykeltom'];
    
    $antal = $_POST['antal'];
    
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
    $unique_form_number = $_POST['unique_form_number'];
    
     $extrapris = $pris_2 * $dagar;
     
    
if (isset($_POST['date1'])){

    
        
        
                         /**
 * Returns every date between two dates as an array
 * @param string $startDate the start of the date range
 * @param string $endDate the end of the date range
 * @param string $format DateTime format, default is Y-m-d
 * @return array returns every date between $startDate and $endDate, formatted as "Y-m-d"
 */
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
    // Lista över datumen från ursprungligt startdatum och slutdatum. 
    $originaldates = ( dateRange( $originalcykelfom, $originalcykeltom) );
    $originalbike = explode(", ", $originalcykelnummer);
    $originalbike = array_filter($originalbike);
    
    
    foreach ($originaldates as $date){
                // Uppdatera cyklar i databasen och gör dem tillgängliga
                foreach ($originalbike as $x => $x_avail){
                    // sql uppdaterar cyklar
                     $sql3 = "UPDATE cyklar SET $x_avail=1 WHERE Datum='$date'";
                        if ($conn->query($sql3) === TRUE) {
                        } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->error;
                        }
                }
            }

                   /**
 * Returns every date between two dates as an array
 * @param string $startDate the start of the date range
 * @param string $endDate the end of the date range
 * @param string $format DateTime format, default is Y-m-d
 * @return array returns every date between $startDate and $endDate, formatted as "Y-m-d"
 */

  // Puts all dates between start and enddate in an array...
function dateRange2( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {
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
    $newdates = ( dateRange2( $cykelfom, $cykeltom) );

    
    // Skapar en rad för de dagar som ännu inte finns i databasen.
    foreach($newdates as $x => $x_value) {
        $sql4 = "INSERT INTO cyklar (Datum, Cykel_1, Cykel_2, Cykel_3, Cykel_4, Cykel_5, Cykel_6, Cykel_7, Cykel_8, Cykel_9, Cykel_10, Cykel_11, Cykel_12, Cykel_13, Cykel_14, Cykel_15, Cykel_16, Cykel_17, Cykel_18, Cykel_19, Cykel_20) VALUES ('$x_value', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1') ON DUPLICATE KEY UPDATE Datum='$x_value'";
            if ($conn->query($sql4) === TRUE) {
            } else {
            echo "Error: " . $sql4 . "<br>" . $conn->error;
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
            foreach($newdates as $x => $x_value) {
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
            foreach ($newdates as $date){
                // Variabel håller hur många cyklar som har bokats vid datumet
                $i = 0;
                // Uppdatera cyklar
                foreach ($avail_bikes as $x => $x_avail){
                    // Om variabel $i inte matchar antal gäster...
                    if ($i != $antal){
                        // sql uppdaterar cyklar
                        $sql3 = "UPDATE cyklar SET $x_avail=0 WHERE Datum='$date'";
                        // Placerar alla bokade cyklar i $booked_bikes.
                        array_push($booked_bikes,$x_avail);
                        if ($conn->query($sql3) === TRUE) {
                        } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->error;
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
                
                
    }else {
        // Om antalet lediga cyklar är färre än antalet gäster visa antal lediga cyklar. 
    foreach ($originaldates as $date){
                // Uppdatera originalcyklar i databasen och gör dem ej tillgängliga
                foreach ($originalbike as $x => $x_avail){
                    // sql uppdaterar cyklar
                     $sql3 = "UPDATE cyklar SET $x_avail=0 WHERE Datum='$date'";
                        if ($conn->query($sql3) === TRUE) {
                        } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->error;
                        }
                }
            }
            
        echo 'Endast '.$bike_check.' lediga cyklar!';
        die();
        
    }

      
        
        
$sql = "UPDATE conf_paket SET Paketnamn='$paket', Startdag='$start', Cykelnummer='$booked', Cykelfom='$cykelfom', Cykeltom='$cykeltom', Boende_dag_1='$dag1', Boende_dag_2='$dag2', Boende_dag_3='$dag3', Boende_dag_4='$dag4', Boende_dag_5='$dag5', Boende_dag_6='$dag6', Boende_dag_7='$dag7', Enkelrum='$enkel', Dubbelrum='$dubbel', Antal_gaster='$antal', Barnsadlar='$bantal', Namn='$fname $lname', epost='$epost', Telefon='$tel', Info='$info', vego='$vego', fisk='$fisk', kott='$kott', Pris_pp='$pris_pp', Pris_2='$extrapris' WHERE ID='$id'";
       
        
       
        
      

if (mysqli_query($conn, $sql)) {
    echo "Du har lagt in paketet i databasen med följande specifikationer: <br />
    $paket<br /> Datum: $start<br />Natt 1: $dag1<br />Natt 2: $dag2<br />Natt 3: $dag3 <br />Natt 4: $dag4<br />Natt 5: $dag5<br />Natt 6: $dag6 <br />Natt 7: $dag7 <br />Enkelrum: $enkel <br /> Dubbelrum: $dubbel <br /> Namn: $fname $lname<br />Telefon: $tel<br />Övrig info: $info<br /> Vegolunch: $vego<br />Fisklunch: $fisk<br />Kallskuret: $kott
   ";
    
}


    

 
     }
     

 if (isset($_POST['delpaket'])){   
     $sql = "INSERT INTO conf_delete SELECT * FROM conf_paket WHERE ID='$id'";
     
     if (mysqli_query($conn, $sql)) {
         
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
    // Lista över datumen från ursprungligt startdatum och slutdatum. 
    $originaldates = ( dateRange( $cykelfom, $cykeltom) );
    $originalbike = explode(", ", $originalcykelnummer);
    $originalbike = array_filter($originalbike);
         
         foreach ($originaldates as $date){
                // Uppdatera cyklar i databasen och gör dem tillgängliga
                foreach ($originalbike as $x => $x_avail){
                    // sql uppdaterar cyklar
                     $sql3 = "UPDATE cyklar SET $x_avail=1 WHERE Datum='$date'";
                        if ($conn->query($sql3) === TRUE) {
                        } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->error;
                        }
                }
            }
    
    $sql2 = "DELETE FROM conf_paket WHERE ID='$id'";
    if (mysqli_query($conn, $sql2)) {
    echo "Du har raderat paketet i databasen!$id";
    }
    
}   
 }
 
    
     

mysqli_close($conn);


?>
