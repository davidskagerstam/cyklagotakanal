<script>
function checkOut(){

        var em = document.forms["ins_flik"]["dayselect"].value;
        if (em == null || em == "" || em == 0) {
            $("#dayselect").css('border-color', 'red');
            return false;
        }else{$("#dayselect").css('border-color', 'lightgray');}
        var em = document.forms["ins_flik"]["date1"].value;
        if (em == null || em == "" || em == 0) {
            $("#date1").css('border-color', 'red');
            return false;
        }else{$("#date1").css('border-color', 'lightgray');}
        var em = document.forms["ins_flik"]["guestselect"].value;
        if (em == null || em == "" || em == 0) {
            $("#guestselect").css('border-color', 'red');
            return false;
        }else{$("#guestselect").css('border-color', 'lightgray');}
        var em = document.forms["ins_flik"]["cykelfom"].value;
        if (em == null || em == "" || em == 0) {
            $("#cykelfom").css('border-color', 'red');
            return false;
        }else{$("#cykelfom").css('border-color', 'lightgray');}
        var em = document.forms["ins_flik"]["cykeltom"].value;
        if (em == null || em == "" || em == 0) {
            $("#cykeltom").css('border-color', 'red');
            return false;
        }else{$("#cykeltom").css('border-color', 'lightgray');}
        var fn = document.forms["ins_flik"]["fname"].value;
        if (fn == null || fn == "") {
            $("#fname").css('border-color', 'red');
            return false;
        }else{$("#fname").css('border-color', 'lightgray');}
        var fn = document.forms["ins_flik"]["lname"].value;
        if (fn == null || fn == "") {
            $("#lname").css('border-color', 'red');
            return false;
        }else{$("#lname").css('border-color', 'lightgray');}
        var em = document.forms["ins_flik"]["email"].value;
        if (em == null || em == "" || em == 0) {
            $("#email").css('border-color', 'red');
            return false;
        }else{$("#email").css('border-color', 'lightgray');}
        
        
        
        return document.getElementById("ins_flik").submit();
        
    }
</script>

<?php
echo '<div class="field" id="ins_flik">
		<form action="insert.php" id="ins_flik" method="post">
		    <h2>Lägg in paket</h2>
		<label for="paket">Vilket paket? *</label><br />
		<select name="paket" onchange="paketSelect(this)">
		<option type="text" id="default" name="default" value="Specialpaket">**Special**</option>
		<option type="text" id="matpaket" name="matpaket" value="matpaket">Matpaket</option>
		<option type="text" id="ekopaket" name="ekopaket" value="ekopaket">Ekopaket</option>
		<option type="text" id="storpaket" name="storpaket" value="storpaket">Storturen</option>
		</select><br /> 
		<label class="dayselect">Antal nätter! (Vid Specialpaket och extranatt)</label><br />
		<select id="dayselect" class="dayselect" name="dagar" onchange="selectDays(this)" autofocus><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option  value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select><br />
		
		
		
		<label name="dubbelrum" class="dubbelrum">Antal dubbelrum</label><br />
        <select name="dubbelrum" class="dubbelrum"><option class="option" value="">---</option><option class="option" value="1">1</option><option class="option" value="2">2</option><option class="option" value="3">3</option><option class="option" value="4">4</option><option class="option" value="5">5</option></select><br />
        
        <label name="enkelrum" class="enkelrum">Antal enkelrum</label><br />
        <select name="enkelrum" class="enkelrum"><option class="option" value="">---</option><option class="option" value="1">1</option><option class="option" value="2">2</option><option class="option" value="3">3</option><option class="option" value="4">4</option><option class="option" value="5">5</option><option class="option" value="6">6</option><option class="option" value="7">7</option><option class="option" value="8">8</option><option class="option" value="9">9</option><option class="option" value="10">10</option></select><br />
		
	
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
        
        
        
        
        
        
        </div>
	
	
		<label for="datepicker">Välj startdag *</label><br />
        <input type="text" id="date1" name="date1" class="datepicker" min="2016-06-01" max="2016-08-31" readonly="true" value=""><br />
       <label for="guestselect">Välj antal gäster *</label><br />
        <select id="guestselect" class="guestselect" name="antal" onchange="selectLunch(this)"><option type="number" value="0"></option><option type="number" value="1">1</option><option type="number" value="2">2</option><option type="number" value="3">3</option><option type="number" value="4">4</option><option type="number" value="5">5</option><option type="number" value="6">6</option><option type="number" value="7">7</option><option type="number" value="8">8</option><option type="number" value="9">9</option><option type="number" value="10">10</option></select><br />
        
                <label for="datepicker">Cykel f.o.m. *</label><br />
        <input type="text" id="cykelfom" name="cykelfom" class="datepicker" readonly="true" value=""><br />
        <label for="datepicker">Cykel t.o.m. *</label><br />
        <input type="text" id="cykeltom" name="cykeltom" class="datepicker" readonly="true" value=""><br /><br />
        
        
        <label>Välj lunchpaket:</label><br />
        <label for="vego">Vegetarisk</label><br />
        <input type="number" min="0" max="20" name="vego" value=""><br />
        <label for="fisk">Vätternröding</label><br />
        <input type="number" min="0" max="20" name="fisk" value=""><br />
        <label for="kott">Kallskuret</label><br />
        <input type="number" min="0" max="20" name="kott" value=""><br /><br />
        
        
        <label for="pris_pp">Pris / person</label><br />
            <input  type="number" name="pris_pp" class="pris_pp" maxlength="50" size="30"><br />
            <label for="pris_2">Pris extra / natt</label><br />
            <input  type="number" name="pris_2" class="pris_2" style="width:30%;" maxlength="50" size="30" value="0"><br />
        <br />
        <br />

        <label for="first_name">Förnamn *</label><br />
            <input  type="text" name="first_name" id="fname" maxlength="50" size="30"><br />
        <label for="last_name">Efternamn *</label><br />
            <input  type="text" name="last_name" id="lname" maxlength="50" size="30"><br />
        <label for="email">Epost *</label><br />
            <input  type="text" name="email" id="email" maxlength="80" size="30"><br />
        <label for="telephone">Telefon</label><br />
            <input  type="text" name="telephone" maxlength="30" size="30"><br />
        <label for="comments">Övrig information</label><br />
            <textarea  name="comments" maxlength="1000" cols="27" rows="6"></textarea><br /><br />
        <input type="submit" name="submitpaket" onclick="return checkOut()" value="Bekräfta bokning"> 
        
		
		</form></div>';
        ?>