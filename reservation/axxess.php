<?php
// Start the session
session_start();
?>
<html>
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
		
		echo '<div class="menu">
    
    
    <ul id="nav" class="nav">
    <li><button class="navbtn" id="idag_BTN"> <h3>Dagens bokningar</h3> </button></li>
   <li><button class="navbtn" id="ins_BTN"> <h3>Lägg in paket</h3> </button></li>
    <li><button class="navbtn" id="search_BTN"> <h3>Sök</h3> </button></li>
    <li><form method="POST" style="background:none; border: none; box-shadow:none; top: -10px;" action="../sv/create.php"><input type="submit" style=" height: 20px; width: 40px; padding: 2px;" id="create_page" name="create_page" value="CMS"></form></li>
    
    
    </ul></div>';
		
		
		
		echo '<div class="container"> <div class="field" id="idag_flik" style="visibility: visible;">';
		
		include 'idag_flik.php';
		include 'ins_flik.php';
		
			
			
    
		echo '
        
		<div class="field" id="search_flik">
		<form method="post" action="search_query.php" id="searchform">
		<h2>Sök</h2>
		Namn: <br />
		<input type="text" name="search"><br /><br />
		<input type="submit" name="submit" value="Sök"><br /><br />
		<input  type="hidden" name="usr" value="'.$username.'">
		</form><br /><br />
		<form method="post" action="search_query.php" id="searchform">
		<p>Datum: <br />
		<input type="text" id="datepicker" class="datepicker" name="search" value=""></p><br />
		<input type="submit" name="submit" value="Sök"><br />
		<input  type="hidden" name="usr" value="'.$username.'">
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
<form method="POST" action="axxess.php" id="login" margin="0 auto" position="relative">
<p align = left> Användarnamn: <br /><input type ="text" name ="username">
<p align = left> Lösenord: <br /><input type ="password" name ="password"><br />
<br /><input type="submit" value="Logga in!"  name="submit" form="login">
</form><br /></div>
    
   
		
		
		
		

</body>
</html>

