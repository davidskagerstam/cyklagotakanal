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


$tbl_insert = "SELECT * FROM `available` LIMIT 0, 30 ";


if(!isset($_POST['submitbetal'])xor($_POST['submitavbetal'])xor($_POST['incheck'])xor($_POST['ejincheck'])xor($_POST['utcheck'])xor($_POST['ejutcheck'])){
    header("Location:axxess.php");

}

    if(isset($_POST['submitbetal'])){
    $id = $_POST['id'];
    $sql = "UPDATE conf_paket SET betalat='1' WHERE ID=$id";
    

    if (mysqli_query($conn, $sql)) {
    echo "Du har uppdaterat paketet i databasen!
    
   ";
    }else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}    }
    
    if(isset($_POST['submitavbetal'])){
    $id = $_POST['id'];
    $sql = "UPDATE conf_paket SET betalat='0' WHERE ID=$id";
    

    if (mysqli_query($conn, $sql)) {
    echo "Du har uppdaterat paketet i databasen!
   ";
    }    }
    
    if(isset($_POST['incheck'])){
    $id = $_POST['id'];
    $sql = "UPDATE conf_paket SET check_in='1' WHERE ID=$id";
    

    if (mysqli_query($conn, $sql)) {
    echo "Du har uppdaterat paketet i databasen!
   ";
    }    }
    if(isset($_POST['ejincheck'])){
    $id = $_POST['id'];
    $sql = "UPDATE conf_paket SET check_in='0' WHERE ID=$id";
    

    if (mysqli_query($conn, $sql)) {
    echo "Du har uppdaterat paketet i databasen!
   ";
    }    }
    
    if(isset($_POST['utcheck'])){
    $id = $_POST['id'];
    $sql = "UPDATE conf_paket SET check_out='1' WHERE ID=$id";
    

    if (mysqli_query($conn, $sql)) {
    echo "Du har uppdaterat paketet i databasen!
   ";
    }    }
    if(isset($_POST['ejutcheck'])){
    $id = $_POST['id'];
    $sql = "UPDATE conf_paket SET check_out='0' WHERE ID=$id";
    

    if (mysqli_query($conn, $sql)) {
    echo "Du har uppdaterat paketet i databasen!
   ";
    }    }
     
        
    
    
 


mysqli_close($conn);


?>