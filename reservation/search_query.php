<?php
   $host = "cyklagotakanal.se.mysql";
$user = "cyklagotakanal_";
$password = "nvmTyjQU";
$db = "cyklagotakanal_";

mysql_connect($host, $user, $password);
mysql_select_db($db);

if(!isset($_POST['search'])xor($_POST['tillbaks'])){
    header("Location:axxess.php");
}


$search_sql="SELECT * FROM confirms WHERE Namn LIKE '%".$_POST['search']."%' OR Startdag LIKE '%".$_POST['search']."%' ";
$search_query=mysql_query($search_sql);
if(mysql_num_rows($search_query)!=0) {
$search_rs=mysql_fetch_assoc($search_query);
}

$search_sql2="SELECT * FROM conf_paket WHERE Namn LIKE '%".$_POST['search']."%' OR Startdag LIKE '%".$_POST['search']."%' ";
$search_query2=mysql_query($search_sql2);
if(mysql_num_rows($search_query2)!=0) {
$search_rs2=mysql_fetch_assoc($search_query2);
}
    

       
     $username = $_POST['usr'];   

?>




<html>
    <body>
        <head>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
     <link rel="stylesheet" href="axxess.css" />
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="axxess.js"></script>
	<script src="Popup.js"></script>
		</head>
		<div class="menu">
    
    
    <ul id="nav" class="nav">
    <li><button class="navbtn" id="idag_BTN"> <h3>Dagens bokningar</h3> </button></li>
   <li><button class="navbtn" id="ins_BTN"> <h3>Lägg in paket</h3> </button></li>
    <li><button class="navbtn" id="search_BTN"> <h3>Sök</h3> </button></li>
    
    
    </ul></div>
    
    <div class="container" style="top: 60px;">
		<div class="field" id="idag_flik">
		    
		    <?php include 'idag_flik.php';?>
            <?php include 'ins_flik.php';?>
		
		
	
		
        <div class="field" id="search_flik" style="visibility: visible;">
		<form method="post" action="search_query.php" id="searchform">
		    <h2>Sök</h2>
		Namn: <br />
		<input type="text" name="search"><br /><br />
		<input type="submit" name="submit" value="Sök"><br /><br />
		</form><br /><br />
		<form method="post" action="search_query.php" id="searchform">
		<p>Datum: <br />
		<input type="text" id="datepicker" class="datepicker" name="search" value=""></p><br />
		<input type="submit" name="submit" value="Sök"><br />
		</form><br />
		
       <div class="field_flex" id="search_flik" style="border: none;"><h2>Resultat Paket</h2>
		<?php if(mysql_num_rows($search_query2)!=0) {
		    
		    $pay = $search_query2['betalat'];
		    $incheck = $search_query2['check_in'];
		    $utcheck = $search_query2['check_out'];
		    $PRIS = $search_rs2['Antal_gaster']*$search_rs2['Pris_pp'];
		    
		    do { ?> <div class="resultat">
		    <p>
		        Namn:
		    <?php echo $search_rs2['Namn'];?>
		    <br />Antal gäster:
		    <?php echo $search_rs2['Antal_gaster'];?>
		    <br />Startdag:
		    <?php echo $search_rs2['Startdag'];?>
		    <br />Cyklar:
		    <?php echo $search_rs2['Cykelnummer'];?>
		    <br /> Paket:
		    <?php echo $search_rs2['Paketnamn'];?>
		    <br /> Telefon::
		    <?php echo $search_rs2['Telefon'];?>
		    <br /> Epost:
		    <?php echo $search_rs2['epost'];?>
		    <br /> Övrig information:<br />
		    <?php echo $search_rs2['Info'];?>
		    
		    <br /> Lunchpaket:<br />
		    Vegetarisk:
		    <?php echo $search_rs2['vego'];?>
		    <br />
		    Fisk:
		    <?php echo $search_rs2['fisk'];?>
		    <br />
		    Kallskuret:
		    <?php echo $search_rs2['kott'];?>
		    
		    
		    <br /> Boende dag 1:
		    <?php echo $search_rs2['Boende_dag_1'];?>
		    <br />Boende dag 2:
		    <?php echo $search_rs2['Boende_dag_2'];?>
		    <br /> Boende dag 3:
		    <?php echo $search_rs2['Boende_dag_3'];?>
		    <br />Boende dag 4:
		    <?php echo $search_rs2['Boende_dag_4'];?>
		    <br />Boende dag 5:
		    <?php echo $search_rs2['Boende_dag_5'];?>
		    <br />Boende dag 6:
		    <?php echo $search_rs2['Boende_dag_6'];?>
		    <br />Boende dag 7:
		    <?php echo $search_rs2['Boende_dag_7'];?>
		    
		    <br /> Enkelrum:
		    <?php echo $search_rs2['Enkelrum'];?>
		    
		    <br /> Dubbelrum:
		    <?php echo $search_rs2['Dubbelrum'];?>
		    
		   
		   
		   
		        <div class="resultat_extra">
		        Incheckning!  <br /><br />
		        Betalningsstatus: (<?php echo $search_rs2['Antal_gaster']*$search_rs2['Pris_pp']+$search_rs2['Pris_2'];?>kr)
		    </p>  
		        
		            <?php $pay = $search_rs2['betalat'];
		            $id = $search_rs2['ID'];
		            $bet = $search_rs2['betalat'];
		            if ($pay != 1){
		                echo '<div class="pay">Ej betalat!</div><br /><form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="submitbetal" value="betala"><br /><br /></form>';
		            }
		                
		            
		            else {
		                echo 'Har betalat! 
		                <form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="submitavbetal" value="Avmarkera!"><br /><br /></form>';
		            }
		            $incheck = $search_rs2['check_in'];
		            if ($incheck == 1){
		                echo 'Har checkat in!<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="ejincheck" value="Avmarkera!"><br /><br /></form>';
		                
		            }
		            else {
		                echo '<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="incheck" value="checka in!"><br /><br /></form>';
		            }
		            
		            $utcheck = $search_rs2['check_out'];
		            if ($utcheck == 1){
		               echo 'Har checkat ut!<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="ejutcheck" value="Avmarkera!"><br /><br /></form>';
		                
		            }
		            else {
		                echo '<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="utcheck" value="checka ut!"><br /><br /></form>';
		            }
		            
		            
		            echo '<form method="POST" target="" action="edit_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="editpaket" value="Redigera!"><br /><br /></form>';
		            
		            ;?>
		            </div>
		    
		    
		    
		    </div><br />
		    
		    
		    
		    <?php } while ($search_rs2=mysql_fetch_assoc($search_query2));
		}   else{
		    echo "Inget namn hittades!";
		}
		?></div>
				        <div class="field_flex" style="border: none;"><h2>Resultat Cyklar</h2>
		<?php if(mysql_num_rows($search_query)!=0) {
		    do { ?> <div class="resultat">
		    <p>
		        Namn:
		    <?php echo $search_rs['Namn'];?>
		    <br />Antal gäster:
		    <?php echo $search_rs['Antal_gaster'];?>
		    <br />Cyklar:
		    <?php echo $search_rs['Cykelnummer'];?>
		    <br />Startdag:
		    <?php echo $search_rs['Startdag'];?>
		    <br /> Telefon::
		    <?php echo $search_rs['Telefon'];?>
		    <br /> Epost:
		    <?php echo $search_rs['epost'];?>
		    <br /> Övrig information:<br />
		    <?php echo $search_rs['Info'];?>
		    
		    <br /> Lunchpaket:<br />
		    Vegetarisk:
		    <?php echo $search_rs['vego'];?>
		    <br />
		    Fisk:
		    <?php echo $search_rs['fisk'];?>
		    <br />
		    Kallskuret:
		    <?php echo $search_rs['kott'];?>
		    </p></div><br />
		    
		    
		    
		    <?php } while ($search_rs=mysql_fetch_assoc($search_query));
		    
		}   else{
		    echo "Inget namn hittades!";
		}
		?></div></div>

		</div>

		
		</body>
		</html>