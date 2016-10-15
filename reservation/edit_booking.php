 <?php
 
if(!isset($_POST['editpaket'])){
    header("Location:axxess.php");

}?>


<html>
    <head>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="axxess.css" />
        

    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<script src="axxess.js"></script>
	<script language="JavaScript" type="text/javascript">
function checkDelete(){
    
    return confirm('Vill du radera bokningen?');
}
</script>
<script>
function goBack() {
    window.history.back();
}
</script>
<script>
$(document).ready(function(e) {
    var $input = $('#refresh');

    $input.val() == 'yes' ? location.reload(true) : $input.val('yes');
});
</script>
<script>
function checkOut(){
        
        
        var em = document.forms["paket_update_form"]["dayselect"].value;
        if (em == null || em == "" || em == 0) {
            $("#dayselect").css('border-color', 'red');
            return false;
        }else{$("#dayselect").css('border-color', 'lightgray');}
        var fn = document.forms["paket_update_form"]["fname"].value;
        if (fn == null || fn == "") {
            $("#fname").css('border-color', 'red');
            return false;
        }else{$("#fname").css('border-color', 'lightgray');}
        var em = document.forms["paket_update_form"]["email"].value;
        if (em == null || em == "" || em == 0) {
            $("#email").css('border-color', 'red');
            return false;
        }else{$("#email").css('border-color', 'lightgray');}
        var em = document.forms["paket_update_form"]["date1"].value;
        if (em == null || em == "" || em == 0) {
            $("#date1").css('border-color', 'red');
            return false;
        }else{$("#date1").css('border-color', 'lightgray');}
        var em = document.forms["paket_update_form"]["guestselect"].value;
        if (em == null || em == "" || em == 0) {
            $("#guestselect").css('border-color', 'red');
            return false;
        }else{$("#guestselect").css('border-color', 'lightgray');}
        var em = document.forms["paket_update_form"]["cykelfom"].value;
        if (em == null || em == "" || em == 0) {
            $("#cykelfom").css('border-color', 'red');
            return false;
        }else{$("#cykelfom").css('border-color', 'lightgray');}
        var em = document.forms["paket_update_form"]["cykeltom"].value;
        if (em == null || em == "" || em == 0) {
            $("#cykeltom").css('border-color', 'red');
            return false;
        }else{$("#cykeltom").css('border-color', 'lightgray');}
        
        return document.getElementById("paket_update_form").submit();
        
    }
</script>

		</head>
		<body>
		
		<?php




    if(isset($_POST['editpaket'])){
    $id = $_POST['id'];
    
    
    
$host = "cyklagotakanal.se.mysql";
$user = "cyklagotakanal_";
$password = "nvmTyjQU";
$db = "cyklagotakanal_";

$conn = mysqli_connect($host, $user, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $sql = "SELECT * FROM conf_paket WHERE ID=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $namn = $row['Namn'];
    $antal = $row['Antal_gaster'];
    $bokningsnummer = $row['Bokningsnummer'];
    $bokningsid = $row['Bokningsid'];
    $start = $row['Startdag'];
    $originalstart = $row['Startdag'];
    $paket = $row['Paketnamn'];
    $dagar = $row['Dagar'];
    $originaldagar = $row['Dagar'];
    $cykelnummer = $row['Cykelnummer'];
    $cykelfom = $row['Cykelfom'];
    $cykeltom = $row['Cykeltom'];
    $originalcykelfom = $row['Cykelfom'];
    $originalcykeltom = $row['Cykeltom'];
    $tel = $row['Telefon'];
    $epost = $row['epost'];
    $info = $row['Info'];
    $vego = $row['vego'];
    $fisk = $row['fisk'];
    $kott = $row['kott'];
    $dag1 = $row['Boende_dag_1'];
    $dag2 = $row['Boende_dag_2'];
    $dag3 = $row['Boende_dag_3'];
    $dag4 = $row['Boende_dag_4'];
    $dag5 = $row['Boende_dag_5'];
    $dag6 = $row['Boende_dag_6'];
    $dag7 = $row['Boende_dag_7'];
    $dubbel = $row['Dubbelrum'];
    $enkel = $row['Enkelrum'];
    $pris_pp = $row['Pris_pp'];
    $pris_2 = $row['Pris_2'];
		
    $extrapris = $pris_2 / $dagar;


  
    	
		    
    
    
    
    
    echo '<div class="container">
		
	<div class="field_high">
		<form id="paket_update_form" action="update.php" method="post">';
		
		
		 $unique_form_number = mt_rand();
		 $unique_form_number_sql = "INSERT INTO form_identify (Unique_number) VALUES ('$unique_form_number')";
		 if ($conn->query($unique_form_number_sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
		 echo '
		<input type="hidden" name="unique_form_number" value="'.$unique_form_number.'">
		
		
		    <h2>Uppdatera paket med bokningsnummer: '.$bokningsnummer.''; printf("%02d\n", $bokningsid); echo '</h2>';

		    
		    if($paket == ""){
		echo '<label for="paket">Vilket paket? *</label><br />
		<select name="paket" onchange="paketSelect(this)">
		<option type="text" id="default" name="default" selected value="Specialpaket">**Special**</option>
		<option type="text" id="matpaket" name="matpaket" value="matpaket">Matpaket</option>
		<option type="text" id="ekopaket" name="ekopaket" value="ekopaket">Ekopaket</option>
		<option type="text" id="storpaket" name="storpaket" value="storpaket">Storturen</option>
		</select><br /> ';
		    }
		    if($paket == "matpaket"){
		echo '<label for="paket">Vilket paket? *</label><br />
		<select name="paket" onchange="paketSelect(this)">
		<option type="text" id="default" name="default" value="Specialpaket">**Special**</option>
		<option type="text" id="matpaket" name="matpaket" selected value="matpaket">Matpaket</option>
		<option type="text" id="ekopaket" name="ekopaket" value="ekopaket">Ekopaket</option>
		<option type="text" id="storpaket" name="storpaket" selected value="storpaket">Storturen</option>
		</select><br /> ';
		    }
		    if($paket == "ekopaket"){
		echo '<label for="paket">Vilket paket? *</label><br />
		<select name="paket" onchange="paketSelect(this)">
		<option type="text" id="default" name="default" value="Specialpaket">**Special**</option>
		<option type="text" id="matpaket" name="matpaket" value="matpaket">Matpaket</option>
		<option type="text" id="ekopaket" name="ekopaket" selected value="ekopaket">Ekopaket</option>
		<option type="text" id="storpaket" name="storpaket" value="storpaket">Storturen</option>
		</select><br /> ';
		    }
		    if($paket == "storpaket"){
		echo '<label for="paket">Vilket paket? *</label><br />
		<select name="paket" onchange="paketSelect(this)">
		<option type="text" id="default" name="default" value="Specialpaket">**Special**</option>
		<option type="text" id="matpaket" name="matpaket" value="matpaket">Matpaket</option>
		<option type="text" id="ekopaket" name="ekopaket" value="ekopaket">Ekopaket</option>
		<option type="text" id="storpaket" name="storpaket" selected value="storpaket">Storturen</option>
		</select><br /> ';
		    }
		    
		    
		     if($dagar == "0"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option class="option" selected value="0">---</option><option  class="option" value="1">1</option><option class="option" value="2">2</option><option class="option" value="3">3</option><option class="option" value="4">4</option><option class="option" value="5">5</option><option class="option" value="6">6</option><option class="option" value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" name="dagar" class="dayone">Boende dag 1</label><br />
        <select name="dayone" class="dayone"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree">Boende dag 3</label><br />
        <select name="daythree" class="daythree"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix">Boende dag 6</label><br />
        <select name="daysix" class="daysix"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
		
		';}
		   		    if($dagar == "1"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option value="0">---</option><option selected value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" class="dayone" style="display: inline;">Boende dag 1</label><br />
        <select name="dayone" class="dayone" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag1 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag1 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag1 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree">Boende dag 3</label><br />
        <select name="daythree" class="daythree"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix">Boende dag 6</label><br />
        <select name="daysix" class="daysix"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
		
		';}
		    if($dagar == "2"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option value="0"></option><option value="1">1</option><option selected value="2">2</option><option value="3">3</option><option  value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" class="dayone" style="display: inline;">Boende dag 1</label><br />
        <select name="dayone" class="dayone" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag1 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag1 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag1 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo" style="display: inline;">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag2 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag2 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag2 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree">Boende dag 3</label><br />
        <select name="daythree" class="daythree"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix">Boende dag 6</label><br />
        <select name="daysix" class="daysix"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
		
		';}
		    if($dagar == "3"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option value="0"></option><option value="1">1</option><option value="2">2</option><option selected value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" class="dayone" style="display: inline;">Boende dag 1</label><br />
        <select name="dayone" class="dayone" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag1 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag1 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag1 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo" style="display: inline;">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag2 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag2 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag2 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree" style="display: inline;">Boende dag 3</label><br />
        <select name="daythree" class="daythree style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag3 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag3 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag3 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix">Boende dag 6</label><br />
        <select name="daysix" class="daysix"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
		';}
            if($dagar == "4"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option selected value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" class="dayone" style="display: inline;">Boende dag 1</label><br />
        <select name="dayone" class="dayone" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag1 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag1 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag1 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo" style="display: inline;">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag2 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag2 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag2 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree" style="display: inline;">Boende dag 3</label><br />
        <select name="daythree" class="daythree" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag3 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag3 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag3 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour" style="display: inline;">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag4 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag4 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag4 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix">Boende dag 6</label><br />
        <select name="daysix" class="daysix"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        ';}
            if($dagar == "5"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option selected value="5">5</option><option value="6">6</option><option value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" class="dayone" style="display: inline;">Boende dag 1</label><br />
        <select name="dayone" class="dayone" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag1 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag1 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag1 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo" style="display: inline;">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag2 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag2 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag2 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree" style="display: inline;">Boende dag 3</label><br />
        <select name="daythree" class="daythree style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag3 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag3 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag3 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour" style="display: inline;">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag4 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag4 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag4 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive" style="display: inline;">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag5 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag5 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag5 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix">Boende dag 6</label><br />
        <select name="daysix" class="daysix"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        ';}
		    if($dagar == "6"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option selected value="6">6</option><option value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" class="dayone" style="display: inline;">Boende dag 1</label><br />
        <select name="dayone" class="dayone" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag1 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag1 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag1 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo" style="display: inline;">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag2 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag2 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag2 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree" style="display: inline;">Boende dag 3</label><br />
        <select name="daythree" class="daythree style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag3 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag3 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag3 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour" style="display: inline;">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag4 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag4 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag4 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive" style="display: inline;">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag5 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag5 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag5 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix" style="display: inline;">Boende dag 6</label><br />
        <select name="daysix" class="daysix" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag6 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag6 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag6 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven"><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        ';}
		    if($dagar == "7"){
echo '<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" name="dagar" class="dayselect" onchange="selectDays(this)" autofocus><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option selected value="7">7</option></select><br />
		<div class="days">
        <label name="dayone" class="dayone" style="display: inline;">Boende dag 1</label><br />
        <select name="dayone" class="dayone" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag1 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag1 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag1 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daytwo" class="daytwo" style="display: inline;">Boende dag 2</label><br />
        <select name="daytwo" class="daytwo" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag2 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag2 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag2 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="daythree" class="daythree" style="display: inline;">Boende dag 3</label><br />
        <select name="daythree" class="daythree style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag3 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag3 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag3 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfour" class="dayfour" style="display: inline;">Boende dag 4</label><br />
        <select name="dayfour" class="dayfour" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag4 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag4 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag4 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayfive" class="dayfive" style="display: inline;">Boende dag 5</label><br />
        <select name="dayfive" class="dayfive" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag5 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag5 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag5 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option><option class="option" value="">---</option><option class="option" value="Norrqvarn">Norrqvarn</option><option class="option" value="Tåtorp">Tåtorp</option><option class="option" value="Öhmans">Öhmans</option></select><br />
        <label name="daysix" class="daysix" style="display: inline;">Boende dag 6</label><br />
        <select name="daysix" class="daysix" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag6 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag6 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag6 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        <label name="dayseven" class="dayseven">Boende dag 7</label><br />
        <select name="dayseven" class="dayseven" style="display: inline;"><option class="option" value="">---</option><option class="option"';if($dag7 == "Norrqvarn"){echo 'selected';}echo ' value="Norrqvarn">Norrqvarn</option><option class="option"';if($dag7 == "Tåtorp"){echo 'selected';}echo ' value="Tåtorp">Tåtorp</option><option class="option"';if($dag7 == "Öhmans"){echo 'selected';}echo ' value="Öhmans">Öhmans</option></select><br />
        ';}
		
		
	
echo '
        
       
       <input type="hidden" id="refresh" value="no">
       <input type="hidden" id="dagar2" name="dagar2" value="'.$originaldagar.'">
       <input type="hidden" id="cykelnummer" name="cykelnummer" readonly="true" value="'.$cykelnummer.'">
       
        
        </div>
        
	    <label name="dubbelrum" class="dubbelrum">Antal dubbelrum</label><br />
        <select name="dubbelrum" class="dubbelrum"><option class="option" value="">---</option><option class="option" ';if($dubbel == "1"){echo 'selected';}echo ' value="1">1</option><option class="option" ';if($dubbel == "2"){echo 'selected';}echo ' value="2">2</option><option class="option" ';if($dubbel == "3"){echo 'selected';}echo ' value="3">3</option><option class="option" ';if($dubbel == "4"){echo 'selected';}echo ' value="4">4</option><option class="option" ';if($dubbel == "5"){echo 'selected';}echo ' value="5">5</option></select><br />
        
        <label name="enkelrum" class="enkelrum">Antal enkelrum</label><br />
        <select name="enkelrum" onchange="enkelSelect(this)" class="enkelrum"><option class="option" value="">---</option><option class="option" ';if($enkel == "1"){echo 'selected';}echo ' value="1">1</option><option class="option" ';if($enkel == "2"){echo 'selected';}echo ' value="2">2</option><option class="option" ';if($enkel == "3"){echo 'selected';}echo ' value="3">3</option><option class="option" ';if($enkel == "4"){echo 'selected';}echo ' value="4">4</option><option class="option" ';if($enkel == "5"){echo 'selected';}echo ' value="5">5</option><option class="option" ';if($enkel == "6"){echo 'selected';}echo ' value="6">6</option><option class="option" ';if($enkel == "7"){echo 'selected';}echo ' value="7">7</option><option class="option" ';if($enkel == "8"){echo 'selected';}echo ' value="8">8</option><option class="option" ';if($enkel == "9"){echo 'selected';}echo ' value="9">9</option><option class="option" ';if($enkel == "10"){echo 'selected';}echo ' value="10">10</option></select><br />
		
	
		<label for="datepicker">Välj startdag *</label><br />
        <input type="text" id="date1" name="date1" class="datepicker" min="2016-06-01" max="2016-08-31" readonly="true" value="'.$start.'"><br />
       <input type="hidden" id="date2" name="date2" value="'.$originalstart.'">
       <input type="hidden" id="originalcykelfom" name="originalcykelfom" value="'.$originalcykelfom.'">
       <input type="hidden" id="originalcykeltom" name="originalcykeltom" value="'.$originalcykeltom.'">
       
       
       <label for="guestselect">Välj antal gäster *</label><br />
        <select id="guestselect" class="guestselect" name="antal" onchange="selectLunch(this)"><option class="option" value="">---</option><option class="option" ';if($antal == "1"){echo 'selected';}echo ' value="1">1</option><option class="option" ';if($antal == "2"){echo 'selected';}echo ' value="2">2</option><option class="option" ';if($antal == "3"){echo 'selected';}echo ' value="3">3</option><option class="option" ';if($antal == "4"){echo 'selected';}echo ' value="4">4</option><option class="option" ';if($antal == "5"){echo 'selected';}echo ' value="5">5</option><option type="number" ';if($antal == "6"){echo 'selected';}echo ' value="6">6</option><option type="number" ';if($antal == "7"){echo 'selected';}echo ' value="7">7</option><option class="option" ';if($antal == "8"){echo 'selected';}echo ' value="8">8</option><option class="option" ';if($antal == "9"){echo 'selected';}echo ' value="9">9</option><option class="option" ';if($antal == "10"){echo 'selected';}echo ' value="10">10</option></select><br />
        
        <label>Välj lunchpaket:</label><br />
        <label for="vego">Vegetarisk</label><br />
        <input type="number" min="0" max="20" name="vego" value="'.$vego.'"><br />
        <label for="fisk">Vätternröding</label><br />
        <input type="number" min="0" max="20" name="fisk" value="'.$fisk.'"><br />
        <label for="kott">Kallskuret</label><br />
        <input type="number" min="0" max="20" name="kott" value="'.$kott.'"><br /><br />
        
        <label for="datepicker">Cykel f.o.m. *</label><br />
        <input type="text" id="cykelfom" name="cykelfom" class="datepicker" readonly="true" value="'.$cykelfom.'"><br />
        <label for="datepicker">Cykel t.o.m. *</label><br />
        <input type="text" id="cykeltom" name="cykeltom" class="datepicker" readonly="true" value="'.$cykeltom.'"><br />
        
        
        <label for="pris_pp">Pris / person</label><br />
            <input  type="number" name="pris_pp" class="pris_pp" value="'.$pris_pp.'" maxlength="50" size="30"><br />
            <label for="pris_2">Pris extra / natt</label><br />
            <input  type="number" name="pris_2" class="pris_2" style="width:30%;" maxlength="50" size="30" value="'.$extrapris.'"><br />
        <br />

        <label for="first_name">Namn *</label><br />
            <input  type="text" name="first_name" id="fname" value="'.$namn.'" maxlength="50" size="30"><br />
        <label for="email">Epost *</label><br />
            <input  type="text" name="email" id="email" value="'.$epost.'" maxlength="80" size="30"><br />
        <label for="telephone">Telefon</label><br />
            <input  type="text" name="telephone" id="tel" value="'.$tel.'" maxlength="30" size="30"><br />
        <label for="comments">Övrig information</label><br />
            <textarea  name="comments" value="" id="info" maxlength="1000" cols="27" rows="6">'.$info.'</textarea><br /><br />
            <input type="hidden" name="id" value="'.$id.'">
            
        <input type="submit" name="updatepaket" onclick="return checkOut()" value="Uppdatera bokning"> <br /><br /><button name="tillbaks" value="Avbryt!" onclick="goBack(tillbaks)">Avbryt</button>  <br /><input style="background:red; color:black;" type="submit" name="delpaket" onclick="return checkDelete()" value="Radera bokning!"><br /> 
        
		</form> </div></div>
    ';
    }
    
   
   
   
    
        
    
    
 


mysqli_close($conn);


?>
</body>
</html>
