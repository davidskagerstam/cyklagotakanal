<?php	
    if (isset($_POST['update'])) {
        $posted_glob_value = array();
        for ($a = 1; $a <= 10; $a++){
            
            $page = $_POST['page'];
            if ($page !== "start"){
                $block = (glob("sv/$page/*$a.txt"));
            }else{
                $block = (glob("sv/*$a.txt"));
            }
            
                if ($block == false) continue; 
                foreach ($posted_glob_value as $postedvalue){
                    if (!isset($_POST[''.$postedvalue.''])){
                    header("location: login.php");
                    }
                }
                
            foreach($block as $value) {
                
                $postedvalue = str_replace("sv/", "", $value);
                $postedvalue = str_replace("$page/", "", $postedvalue);
                $postedvalue = str_replace(".txt", "", $postedvalue);
                
                $skip = '_main_'; 
                if (strpos($value, $skip) !== false) continue;
                if (isset($_POST[$postedvalue])){
                    
                    array_push($posted_glob_value, $postedvalue);
                    if ($page !== "start"){
                        $value = str_replace("", "", $value);
                    }
                    
                    $myfile = fopen($value, "w") or die("Unable to open file!");
                    $txt = $_POST[$postedvalue];
                    fwrite($myfile, $txt); 
                    fclose($myfile);
                    
                }
            }
        }
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        
        if (!empty($posted_glob_value)) {
            echo '
            <form method="POST" id="tillbaks" style="display:block;" action="update.php">
            <input type="text" form="tillbaks" name ="username" value="'.$username.'" hidden>
            <input type="text" form="tillbaks" name ="password" value="'.$pass.'" hidden>
            <input type="text" form="tillbaks" name ="tillbaks" hidden>
            <input type="submit" form="tillbaks" name="tillbaks" value="Åter till redigering!"></form>';
        }
        die('Du har uppdaterat hemsidan <script>document.forms["tillbaks"].submit()</script>');
    }
        
    ?>

<html>
    <head>
        <link rel="stylesheet" href="form.css" />
        <link rel="stylesheet" href="/CSS/pagesprev.css" />

    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script language="javascript" type="text/javascript">
	
            function editFunc(val) {
                $('form').css("display", "none");
                $('#formtype').css("display", "block");
                $('#' + val).css("display", "block");
                $('.formlink').css("display", "none");
                
            }
            // Javascript för att infoga länk 
                var target = '<a target="';
                  var href = '" href="';  
                  var tar = "";
                  var ref = "";
                  var ltxt = "";
                  var textValue = "";
                  var linkform = "";
                  var id;
                // Javascript för att visa formuläret för att infoga länkar via linkbtn.click...
               function link(nbr){
                   
                   id = nbr.replace("link", "");
                   var linktext = ("linktext"+id);
                   

                    $('#formlink').css("display", "inline");
                    $('.formlink').css("display", "inline");
                    
                        // Javascript som infogar markerad text i Länktext-fältet. 
                        var textComponent = document.getElementById('index'+id);
                        var linktxt;
                        // IE version
                        if (document.selection != undefined) {
                            textComponent.focus();
                            var sel = document.selection.createRange();
                            linktxt = sel.text;
                            document.getElementById("formlink").linktext.value = linktxt;
                        }
                        // Mozilla version
                        else if (textComponent.selectionStart != undefined) {
                            var startPos = textComponent.selectionStart;
                            var endPos = textComponent.selectionEnd;
                            linktxt = textComponent.value.substring(startPos, endPos)
                            document.getElementById("formlink").linktext.value = linktxt;
                        }
               };
               // Javascript för att dölja formuläret för att infoga länkar via avbrytbtn.click...
               function abortlink(){
                    $('.formlink').css("display", "none");
               };
               // Javascript för att infoga länk i paragraf1 
               function addlink() {
                    tar = document.getElementById("tar").value;
                    ref = document.getElementById("ref").value+'">';
                    ltxt = document.getElementById("linktext").value+'</a>'
                    textValue = target+tar+href+ref+ltxt;
                    
                        //Get textArea HTML control 
                        var txtArea = document.getElementById('index'+id);
                        //IE
                        if (document.selection) {
                            txtArea.focus();
                            var sel = document.selection.createRange();
                            sel.text = textValue;
                            return;
                        }
                        //Firefox, chrome, mozilla
                        else if (txtArea.selectionStart || txtArea.selectionStart == '0') {
                            var startPos = txtArea.selectionStart;
                            var endPos = txtArea.selectionEnd;
                            var scrollTop = txtArea.scrollTop;
                            txtArea.value = txtArea.value.substring(0, startPos) + textValue + txtArea.value.substring(endPos, txtArea.value.length);
                            txtArea.focus();
                            txtArea.selectionStart = startPos + textValue.length;
                            txtArea.selectionEnd = startPos + textValue.length;
                        }
                        else {
                            txtArea.value += textArea.value;
                            txtArea.focus();
                        }
                       
	                $('.formlink').css("display", "none");   
                };
                var links = new Array();
        window.addEventListener('mouseover',function(e){
            
            var str = e.target.value;
            var patt1 = /<a /g;
            var patt2 = /a>/g;
            var patt3 = /">/g;
            var patt4 = /a>/g;
            
                
            while ((patt1.test(str)==true)&&(patt2.test(str)==true)&&(patt3.test(str)==true)&&(patt4.test(str)==true)) {

                var startPos = patt1.lastIndex - 3;
                var endPos = patt2.lastIndex;
                var textstartPos = patt3.lastIndex;
                var textendPos = patt4.lastIndex - 4;
                
                function setInputSelectionPush(input, startPos, endPos) {
                    input.focus();
                    if (typeof input.selectionStart != "undefined") {
                        input.selectionStart = startPos;
                        input.selectionEnd = endPos;
                        selecting = input.value.substring(startPos, endPos);
                        links.push(selecting);
                    } else if (document.selection && document.selection.createRange) {
                        // IE branch
                        input.select();
                        var range = document.selection.createRange();
                        range.collapse(true);
                        range.moveEnd("character", endPos);
                        range.moveStart("character", startPos);
                        range.select();
                    }
                    
                    
                }
                function setInputSelection(input, start, end) {
                    input.focus();
                    if (typeof input.selectionStart != "undefined") {
                        input.selectionStart = start;
                        input.selectionEnd = end;
                        input.value = input.value.substring(0, startPos)+"<l>"+input.value.substring(start, end)+"</l>"+input.value.substring(endPos, input.value.length);
                        
                    } else if (document.selection && document.selection.createRange) {
                        // IE branch
                        input.select();
                        var range = document.selection.createRange();
                        range.collapse(true);
                        range.moveEnd("character", end);
                        range.moveStart("character", start);
                        range.select();
                    }
                    
                    
                }
                
                //setInputSelectionPush(e.target, startPos, endPos);
                //setInputSelection(e.target, textstartPos, textendPos);
                console.log(links)
            }
            
            
        });
        
        function link_reformat(){
            var str = document.getElementsByTagName('textarea').value;
            var patt1 = /<link> /g;
            var patt2 = /link>/g;
            
            
                
            while ((patt1.test(str)==true)&&(patt2.test(str)==true)) {

                var startPos = patt1.lastIndex - 3;
                var endPos = patt2.lastIndex;
                var textstartPos = patt3.lastIndex;
                var textendPos = patt4.lastIndex - 4;
                
                function setInputSelectionPush(input, startPos, endPos) {
                    input.focus();
                    if (typeof input.selectionStart != "undefined") {
                        input.selectionStart = startPos;
                        input.selectionEnd = endPos;
                        selecting = input.value.substring(startPos, endPos);
                        links.push(selecting);
                    } else if (document.selection && document.selection.createRange) {
                        // IE branch
                        input.select();
                        var range = document.selection.createRange();
                        range.collapse(true);
                        range.moveEnd("character", endPos);
                        range.moveStart("character", startPos);
                        range.select();
                    }
                    
                    
                }
                function setInputSelection(input, start, end) {
                    input.focus();
                    if (typeof input.selectionStart != "undefined") {
                        input.selectionStart = start;
                        input.selectionEnd = end;
                        input.value = input.value.substring(0, startPos)+"<l>"+input.value.substring(start, end)+"</l>"+input.value.substring(endPos, input.value.length);
                        
                    } else if (document.selection && document.selection.createRange) {
                        // IE branch
                        input.select();
                        var range = document.selection.createRange();
                        range.collapse(true);
                        range.moveEnd("character", end);
                        range.moveStart("character", start);
                        range.select();
                    }
                    
                    
                }
            }
        }
        
        // Förhindrar att formuläret submittas när man trycker enter.
        window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName === 'INPUT' && e.target.type !== 'textarea'){e.preventDefault();return false;}}},true);
        
        
        
        
        </script>
		</head>
		<body>

    <?php
    $host = "cyklagotakanal.se.mysql";
    $user = "cyklagotakanal_";
    $password = "nvmTyjQU";
    $db = "cyklagotakanal_";

    $conn = mysqli_connect($host, $user, $password, $db);
    

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$pass."' LIMIT 1";
	$res = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($res) == 1){
		echo "Du är inloggad som $username! <br /><br />";
		if (isset($_POST['tillbaks'])){
		    echo 'Du har uppdaterat sidan!<br /><br />';
		}
		
	
	
	    echo '
	    <form name="formtype" id="formtype" style="margin: 40px; display: block;">
            <!-- Dropdownlista för att välja vilken sida som ska redigeras -->
            <label>Välj sida att redigera!</label>
            <select name="edit_form" id="edit_form" onchange="editFunc(this.value)"><option>Välj sida!</option><option value="header">Header</option><option value="footer">Footer</option><option value="start">Start</option>';
           // Identifierar alla existerande sidor... 
            $a = (glob("sv/*",GLOB_ONLYDIR));
            foreach ($a as $value) {
                $value = str_replace("sv/", "", $value);
            echo '<option value="'.$value.'">'.$value.'</option>';
            }
            echo '</select><br /><br />
            </form>
    ';
    $pages = (glob("sv/*",GLOB_ONLYDIR));
    $pages = str_replace("sv/", "", $pages);
    array_push($pages, 'footer', 'header', 'start');
    foreach ($pages as $page) {
        echo '<form id="'.$page.'" method="POST" action="update.php" style="margin: 40px; display: none;">';
        for ($a = 1; $a <= 10; $a++){
            echo'
            <label id="label_'.$a.'">Listning '.$a.'</label><br />
            ';
            if ($page !== 'start'){
            $block = (glob("sv/$page/*$a.txt"));
                if ($block == false) {
                    echo '<style type="text/css">
                    #label_'.$a.' {
                    display: none;
                    } </style>';
                }
            } else {
            $block = (glob("sv/*$a.txt"));
                if ($block == false) {
                    echo '<style type="text/css">
                    #label_'.$a.' {
                    display: none;
                    } </style>';
                }
            }
            foreach($block as $value) {
                $postedvalue = str_replace("sv/", "", $value);
                $postedvalue = str_replace("$page/", "", $postedvalue);
                $postedvalue = str_replace(".txt", "", $postedvalue);
                
                $displayedvalue = str_replace("sv/", "", $value);
                $displayedvalue = str_replace("$page/", "", $displayedvalue);
                $displayedvalue = str_replace("_h2_$a.txt", " rubrik", $displayedvalue);
                $displayedvalue = str_replace("_h1_$a.txt", " rubrik", $displayedvalue);
                $displayedvalue = str_replace("_p_$a.txt", " stycke", $displayedvalue);
                $displayedvalue = str_replace("_img_$a.txt", " bild", $displayedvalue);
                $displayedvalue = str_replace("_link_$a.txt", " länk", $displayedvalue);
                
                $skip = '_main_'; 
                if (strpos($value, $skip) !== false) continue;
                
                $p = '_p_';
                if (strpos($value, $p) !== false) { 
                    echo '
                    <label>'.$displayedvalue.'</label><br />
                    <textarea name="'.$postedvalue.'" id="'.$page.'1" style="bgcolor:white;">'; $myfile = fopen("$value", "r") or die("Unable to open file!");
                    echo fread($myfile,filesize("$value")); 
                    fclose($myfile);
        
                    echo '</textarea>
                    <textarea type="text" readonly style="border:none;">';
                    $myfile = fopen("$value", "r") or die("Unable to open file!");
                    echo fread($myfile,filesize("$value"));
                    fclose($myfile);
                    echo '</textarea><br /><br />';
                
                continue;
                }
                
                echo '
                <label>'.$displayedvalue.'</label><br />
                <input type="text" name="'.$postedvalue.'"onkey style="bgcolor:white;" value="'; $myfile = fopen("$value", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("$value")); 
                fclose($myfile);
        
                echo '">
                <input type="text" readonly style="border:none;" value="';
                $myfile = fopen("$value", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("$value"));
                fclose($myfile);
                echo '"><br /><br />
                ';
            }
        }
        echo '
        <input type="text" name ="page" hidden value="'.$page.'">
        <input type="text" name ="username" hidden value="'.$username.'">
        <input type="text" name ="pass" hidden value="'.$pass.'">
        <input type="text" name ="update" hidden>
        <input type="submit" form ="'.$page.'" onclick="link_reformat()" value="Spara!">
        </form> ';
        
        
    }
    
    
    
    
    

    
		



	} else {
		echo "Inloggning misslyckades!";
		exit();
	}
}
	
?>



</body>
</html>






