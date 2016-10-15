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
$tbl_insert = "SELECT * FROM `available` LIMIT 0, 30 ";


if(!isset($_POST['abruptpaket'])){
    header("Location:axxess.php");
}

    $id = $_POST['id'];

    

$sql = "INSERT INTO conf_delete (Paketnamn, Startdag, Boende_dag_1, Boende_dag_2, Boende_dag_3, Boende_dag_4, Boende_dag_5, Boende_dag_6, Boende_dag_7, Enkelrum, Dubbelrum, Antal_gaster, Barnsadlar, Namn, epost, Telefon, Info, vego, fisk, kott, lunch1,  lunch2,  lunch3,  lunch4,  lunch5,  lunch6,  lunch7,  lunch8,  lunch9,  lunch10) VALUES ('$paket', '$start', '$dag1', '$dag2', '$dag3', '$dag4', '$dag5', '$dag6', '$dag7', '$enkel', '$dubbel', '$antal', '$bantal', '$fname $lname', '$epost', '$tel', '$info', '$vego', '$fisk', '$kott', '$lunch1', '$lunch2', '$lunch3', '$lunch4', '$lunch5', '$lunch6', '$lunch7', '$lunch8', '$lunch9', '$lunch10')";
       
        
       
        
      

if (mysqli_query($conn, $sql)) {
    echo "Du har lagt in paketet i databasen med följande specifikationer: <br />
    $paket<br /> Datum: $start<br />Natt 1: $dag1<br />Natt 2: $dag2<br />Natt 3: $dag3 <br />Natt 4: $dag4<br />Natt 5: $dag5<br />Natt 6: $dag6 <br />Natt 7: $dag7 <br />Enkelrum: $enkel <br /> Dubbelrum: $dubbel <br /> Namn: $fname $lname<br />Telefon: $tel<br />Övrig info: $info<br /> Vegolunch: $vego<br />Fisklunch: $fisk<br />Kallskuret: $kott 
   ";
    
    
    
     
        
    
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>