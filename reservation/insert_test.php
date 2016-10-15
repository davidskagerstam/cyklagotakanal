<?php
include ("connect.php");

$sql = "SELECT * FROM `conf_test` LIMIT 0, 30 ";
$sql2 = "SELECT * FROM `available` LIMIT 0, 30 ";
$antal = "";
$id = "";

if(!isset($_POST['submitpaket'])){
    header("Location:axxess_test.php");
}


    $paket = $_POST['paket'];

    $dag1 = $_POST['dayone']; 
   
    $dag2 = $_POST['daytwo']; 
    
    $dag3 = $_POST['daythree']; 
     
    $dag4 = $_POST['dayfour']; 
      
    $dag5 = $_POST['dayfive']; 
       
    $dag6 = $_POST['daysix']; 
        
    $dag7 = $_POST['dayseven']; 
    
    $start = $_POST['date1'];
     
    $antal = $_POST['antal'];
    
    $fname = $_POST['first_name'];
    
    $lname = $_POST['last_name'];
    
    $epost = $_POST['email']; 
 
    $tel = $_POST['telephone']; 
 
    $info = $_POST['comments']; 
    
    $lunch1 = $_POST['lunchone'];
    $lunch2 = $_POST['lunchtwo'];
    $lunch3 = $_POST['lunchthree'];
    $lunch4 = $_POST['lunchfour'];
    $lunch5 = $_POST['lunchfive'];
    $lunch6 = $_POST['lunchsix'];
    $lunch7 = $_POST['lunchseven'];
    $lunch8 = $_POST['luncheight'];
    $lunch9 = $_POST['lunchnine'];
    $lunch10 = $_POST['lunchten'];
    
    $a = array( $lunch1,  $lunch2,  $lunch3,  $lunch4,  $lunch5,  $lunch6,  $lunch7,  $lunch8,  $lunch9,  $lunch10);
    $counts = array_count_values($a);
    $vego = $counts['Vegetarisk'];
    $fisk = $counts['Fisk'];
    $kott = $counts['Kallskuret'];
    
    
        $dagar = $_POST['dagar'];
        
        $cyklar = 10-$antal;
        
        $dagar2 = date('Y/m/d', strtotime($start. ' + 1 days'));
        $dagar3 = date('Y/m/d', strtotime($start. ' + 2 days'));
        $dagar4 = date('Y/m/d', strtotime($start. ' + 3 days'));
        $dagar5 = date('Y/m/d', strtotime($start. ' + 4 days'));
        $dagar6 = date('Y/m/d', strtotime($start. ' + 5 days'));
        $dagar7 = date('Y/m/d', strtotime($start. ' + 6 days'));
        $dagar8 = date('Y/m/d', strtotime($start. ' + 7 days'));
        $dagar9 = date('Y/m/d', strtotime($start. ' + 8 days'));
        $dagar10 = date('Y/m/d', strtotime($start. ' + 9 days'));
    

$sql = "INSERT INTO conf_test (Paketnamn, Startdag, Boende_dag_1, Boende_dag_2, Boende_dag_3, Boende_dag_4, Boende_dag_5, Boende_dag_6, Boende_dag_7, Antal_gaster, Barnsadlar, Namn, epost, Telefon, Info, vego, fisk, kott) VALUES ('$paket', '$start', '$dag1', '$dag2', '$dag3', '$dag4', '$dag5', '$dag6', '$dag7', '$antal', '$bantal', '$fname $lname', '$epost', '$tel', '$info', '$vego', '$fisk', '$kott' )";
       
        


 
    if ($dagar == 1) {
        // Query for dates with bikes available
        $sql = "SELECT 'avail' FROM available WHERE availdate='$start' LIMIT 1";
        $query = mysqli_query($connect, $sql2) or die (mysqli_error($connect));
        // Loop and get all the data
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
    	// Assign table data to variables
    	$id = $row['avail'];
    	$newavail = $antal-$id;
            $sql = "INSERT INTO available (availdate, avail, bavail, price, bprice) 
			   VALUES ('$start', '$cyklar', 2, '200', '50') ON DUPLICATE KEY UPDATE avail = $newavail";
        }
    }
	

        
        
        
        
      

if (mysqli_query($connect, $sql)) {
    echo "Du har lagt in paketet i databasen med följande specifikationer: <br />
    $paket<br /> Datum: $start<br />Natt 1: $dag1<br />Natt 2: $dag2<br />Natt 3: $dag3 <br />Natt 4: $dag4<br />Natt 5: $dag5<br />Natt 6: $dag6 <br />Natt 7: $dag7 <br />Telefon: $tel<br />Övrig info: $info<br /> Vegolunch: $vego<br />Fisklunch: $fisk<br />Kallskuret: $kott $newavail";
    
    
    
     
        
    
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}



?>