<html>
    <head>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="axxess.css" />
        

    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<script src="axxess.js"></script>
		</head>
		<body>
		    



<?php
$host = "cyklagotakanal.se.mysql";
$user = "cyklagotakanal_";
$password = "nvmTyjQU";
$db = "cyklagotakanal_";

mysql_connect($host, $user, $password);
mysql_select_db($db);

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
	$res = mysql_query($sql);
	if (mysql_num_rows($res) == 1){
		echo "Du är inloggad som $username!";
		
		
		
		$today = date("20y/m/d");
		$today1 = '2016/07/01';
		
        $search_sql3="SELECT * FROM conf_test WHERE Startdag='$today'";
        $search_query3=mysql_query($search_sql3);
        if(mysql_num_rows($search_query3)!=0) {
        $search_rs3=mysql_fetch_assoc($search_query3);
        }
        	
		
        $search_sql4="SELECT * FROM confirms WHERE reservationdate='$today'";
        $search_query4=mysql_query($search_sql4);
        if(mysql_num_rows($search_query4)!=0) {
        $search_rs4=mysql_fetch_assoc($search_query4);
        }
		
		
		echo '<button class="close">Idag!</button><div class="today">Dagens bokningar ('.$today.') <button class="close" style="width: 3%; height:3%;">X</button><div id="today" class="field_flex">';
		 if(mysql_num_rows($search_query3)!=0) {
		    do { ?> 
		    <p>
		        Namn:
		    <?php echo $search_rs3['Namn'];?>
		    <br />Antal gäster:
		    <?php echo $search_rs3['Antal_gaster'];?>
		    <br />Startdag:
		    <?php echo $search_rs3['Startdag'];?>
		    <br /> Paket:
		    <?php echo $search_rs3['Paketnamn'];?>
		    <br /> Telefon::
		    <?php echo $search_rs3['Telefon'];?>
		    <br /> Epost:
		    <?php echo $search_rs3['epost'];?>
		    <br /> Övrig information:<br />
		    <?php echo $search_rs3['Info'];?>
		    
		    <br /> Lunchpaket:<br />
		    Vegetarisk:
		    <?php echo $search_rs3['vego'];?>
		    <br />
		    Fisk:
		    <?php echo $search_rs3['fisk'];?>
		    <br />
		    Kallskuret:
		    <?php echo $search_rs3['kott'];?>
		    
		    
		    <br /> Boende dag 1:
		    <?php echo $search_rs3['Boende_dag_1'];?>
		    <br />Boende dag 2:
		    <?php echo $search_rs3['Boende_dag_2'];?>
		    <br /> Boende dag 3:
		    <?php echo $search_rs3['Boende_dag_3'];?>
		    <br />Boende dag 4:
		    <?php echo $search_rs3['Boende_dag_4'];?>
		    <br />Boende dag 5:
		    <?php echo $search_rs3['Boende_dag_5'];?>
		    <br />Boende dag 6:
		    <?php echo $search_rs3['Boende_dag_6'];?>
		    <br />Boende dag 7:
		    <?php echo $search_rs3['Boende_dag_7'];?>
		    
		   
		    </p> -----------------------------------------<br />
		    
		    
		    
		    <?php } while ($search_rs2=mysql_fetch_assoc($search_query2));
		}   else{
		    echo "Inget paket hittades!";
		}
		
		echo '</div>';
		
		echo '<div id="today" class="field_flex">';
		
		if(mysql_num_rows($search_query4)!=0) {
		    do { ?> 
		    <p> 
		        Namn:
		    <?php echo $search_rs4['person'];?>
		    <br />Datum:
		    <?php echo $search_rs4['reservationdate'];?>
		    <br />Antal cyklar:
		    <?php echo $search_rs4['numbikes'];?>
		    <br />Antal barnsadlar
		    <?php  echo $search_rs4['numbsadel'];?>
		    <br />Telefon:
		    <?php echo $search_rs4['telefon'];?> 
		    <br />
		    Epost:
		    <?php echo $search_rs4['epost'];?> 
		     <br />
		     Info:
		    <?php echo $search_rs4['info'];?> 
		    </p><br />
		    
		    
		    
		    <?php } while ($search_rs4=mysql_fetch_assoc($search_query4));
		    
		}   else{
		    echo "Inget namn hittades!";
		}
			echo '</div></div>';
    
		echo '<div class="container">
		
		<div class="field_high">
		<form action="insert_test.php" method="post" name="paketins">
		<h2>Lägg in paket</h2>
		<label for="paket">Vilket paket? *</label><br />
		<select name="paket" onchange="paketSelect(this)">
		<option type="text" value="">---</option>
		<option type="text" id="special" name="special" value="Specialpaket">**Special**</option>
		<option type="text" id="matpaket" name="matpaket" value="matpaket">Matpaket</option>
		<option type="text" id="ekopaket" name="ekopaket" value="ekopaket">Ekopaket</option>
		<option type="text" id="storpaket" name="storpaket" value="storpaket">Storturen</option>
		</select><br /> 
		<label name="days" class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" class="dayselect" name="dagar" onchange="selectDays(this)" autofocus><option type="number" value="0"></option><option type="number" value="1">1</option><option type="number" value="2">2</option><option type="number" value="3">3</option><option type="number" value="4">4</option><option type="number" value="5">5</option><option type="number" value="6">6</option><option type="number" value="7">7</option></select><br />
	
	<div class="days">
        <label name="dayone" class="dayone">Boende dag 1</label><br />
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
        
        
        
        
        <label name="lunchone" class="lunchone">Lunchpicknick gäst 1</label><br />
        <select name="lunchone" class="lunchone"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchtwo" class="lunchtwo">Lunchpicknick gäst 2</label><br />
        <select name="lunchtwo" class="lunchtwo"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchthree" class="lunchthree">Lunchpicknick gäst 3</label><br />
        <select name="lunchthree" class="lunchthree"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchfour" class="lunchfour">Lunchpicknick gäst 4</label><br />
        <select name="lunchfour" class="lunchfour"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchfive" class="lunchfive">Lunchpicknick gäst 5</label><br />
        <select name="lunchfive" class="lunchfive"><option class="option" value="">---</option><option class="option" value="">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchsix" class="lunchsix">Lunchpicknick gäst 6</label><br />
        <select name="lunchsix" class="lunchsix"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchseven" class="lunchseven">Lunchpicknick gäst 7</label><br />
        <select name="lunchseven" class="lunchseven"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="luncheight" class="luncheight">Lunchpicknick gäst 8</label><br />
        <select name="luncheight" class="luncheight"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchnine" class="lunchnine">Lunchpicknick gäst 9</label><br />
        <select name="lunchnine" class="lunchnine"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        <label name="lunchten" class="lunchten">Lunchpicknick gäst 10</label><br />
        <select name="lunchten" class="lunchten"><option class="option" value="">---</option><option class="option" value="Vegetarisk">Vegetarisk</option><option class="option" value="Fisk">Vätternröding</option><option class="option" value="Kallskuret">Kallskuret</option></select><br />
        
        
        
        
        
        </div>
	
	
		<label for="datepicker">Välj startdag *</label><br />
        <input type="text" id="date1" name="date1" class="datepicker" min="2016-06-01" max="2016-08-31" readonly="true" value=""><br />
        <label for="guestselect">Välj antal gäster *</label><br />
        <select id="guestselect" class="guestselect" name="antal" onchange="selectLunch(this)"><option type="number" value="0"></option><option type="number" value="1">1</option><option type="number" value="2">2</option><option type="number" value="3">3</option><option type="number" value="4">4</option><option type="number" value="5">5</option><option type="number" value="6">6</option><option type="number" value="7">7</option><option type="number" value="8">8</option><option type="number" value="9">9</option><option type="number" value="10">10</option></select><br />
        
        
    
       
        <br />
        <label for="first_name">Förnamn *</label><br />
            <input  type="text" name="first_name" maxlength="50" size="30"><br />
        <label for="last_name">Efternamn *</label><br />
            <input  type="text" name="last_name" maxlength="50" size="30"><br />
        <label for="email">Epost *</label><br />
            <input  type="text" name="email" maxlength="80" size="30"><br />
        <label for="telephone">Telefon</label><br />
            <input  type="text" name="telephone" maxlength="30" size="30"><br />
        <label for="comments">Övrig information</label><br />
            <textarea  name="comments" maxlength="1000" cols="27" rows="6"></textarea><br /><br />
        <input type="submit" name="submitpaket" value="Bekräfta bokning"> 
        
		
		</form></div>
		<div class="field">
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
		</form><br /></div>
		
		</div>
			<div class="container">
				<div class="field"></div><div class="field"></div></div>
		';
		
		
		
		
		exit();



	} else {
		echo "Inloggning misslyckades!";
		exit();
	}
}
	
?>






<div style="width:60%; margin-top:10%;">
<form method="POST" action="axxess_test.php" id="login" margin="0 auto" position="relative">
<p align = left> Användarnamn: <br /><input type ="text" name ="username">
<p align = left> Lösenord: <br /><input type ="password" name ="password"><br />
<br /><input type="submit" value="Logga in!"  name="submit" form="login">
</form><br /></div>
    
   
		
		
		
		

</body>
</html>

