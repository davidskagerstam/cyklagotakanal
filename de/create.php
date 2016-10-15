<?php
if(!isset($_POST['create_page'])){
    header("Location:../reservation/axxess.php");
}
?>
<!doctype html>
<html>
    <head>
                <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="/CSS/pagesprev.css" />
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   
   
     <script language="javascript" type="text/javascript">
        // Javascript för att infoga sidbrytning i paragraf1 
                function addtext1() {
                 var textValue = "<br /><br />";
                    //Get textArea HTML control 
                        var txtArea = document.getElementById("paragraf1");
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
	                
                };
        // Javascript för att infoga länk 
                var target = '<a target="';
                  var href = '" href="';  
                  var tar1 = "";
                  var ref1 = "";
                  var ltxt1 = "";
                  var textValue = "";
                  var linkform = "";
                // Javascript för att visa formuläret för att infoga länkar via linkbtn.click...
               function link(nbr){
                   linkform = (".form"+nbr);
                   var id = nbr.replace("link", "");
                   var linktext = ("linktext"+id);
                   
                    $(linkform).css("display", "inline");
                    
                        // Javascript som infogar markerad text i Länktext-fältet. 
                        var textComponent = document.getElementById('paragraf'+id);
                        var linktxt1;
                        // IE version
                        if (document.selection != undefined) {
                            textComponent.focus();
                            var sel = document.selection.createRange();
                            linktxt1 = sel.text;
                            document.getElementById("formlink"+id).linktext.value += linktxt1;
                        }
                        // Mozilla version
                        else if (textComponent.selectionStart != undefined) {
                            var startPos = textComponent.selectionStart;
                            var endPos = textComponent.selectionEnd;
                            linktxt1 = textComponent.value.substring(startPos, endPos)
                            document.getElementById("formlink"+id).linktext.value += linktxt1;
                        }
               };
               // Javascript för att dölja formuläret för att infoga länkar via avbrytbtn.click...
               function abortlink1(){
                    $('.formlink1').css("display", "none");
               };
               // Javascript för att infoga länk i paragraf1 
               function addlink1() {
                    tar1 = document.getElementById("tar1").value;
                    ref1 = document.getElementById("ref1").value+'">';
                    ltxt1 = document.getElementById("linktext1").value+'</a>'
                    textValue = target+tar1+href+ref1+ltxt1;
                    
                        //Get textArea HTML control 
                        var txtArea = document.getElementById("paragraf1");
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
                       
	                $('.formlink1').css("display", "none");   
                };
                
                
            
           
                
        // Javascript för att infoga sidbrytning i paragraf2 
                function addtext2() {
                 var textValue = "<br /><br />";
                    //Get textArea HTML control 
                        var txtArea = document.getElementById("paragraf2");
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
                };
                
                // Javascript för att infoga länk 
                var target = '<a target="';
                  var href = '" href="';  
                  var tar2 = "";
                  var ref2 = "";
                  var ltxt2 = "";
                  var textValue = "";
               
               // Javascript för att dölja formuläret för att infoga länkar via avbrytbtn.click...
               function abortlink2(){
                    $('.formlink2').css("display", "none");
               };
               // Javascript för att infoga länk i paragraf1 
               function addlink2() {
                    tar2 = document.getElementById("tar2").value;
                    ref2 = document.getElementById("ref2").value+'">';
                    ltxt2 = document.getElementById("linktext2").value+'</a>'
                    textValue = target+tar2+href+ref2+ltxt2;
                    
                        //Get textArea HTML control 
                        var txtArea = document.getElementById("paragraf2");
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
                       
	                $('.formlink2').css("display", "none");   
                };
                
        // Javascript för att infoga sidbrytning i paragraf3 
                function addtext3() {
                 var textValue = "<br /><br />";
                    //Get textArea HTML control 
                        var txtArea = document.getElementById("paragraf3");
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
                };
  
                // Javascript för att infoga länk 
                var target = '<a target="';
                  var href = '" href="';  
                  var tar3 = "";
                  var ref3 = "";
                  var ltxt3 = "";
                  var textValue = "";
               
               // Javascript för att dölja formuläret för att infoga länkar via avbrytbtn.click...
               function abortlink3(){
                    $('.formlink3').css("display", "none");
               };
               // Javascript för att infoga länk i paragraf1 
               function addlink3() {
                    tar3 = document.getElementById("tar3").value;
                    ref3 = document.getElementById("ref3").value+'">';
                    ltxt3 = document.getElementById("linktext3").value+'</a>'
                    textValue = target+tar3+href+ref3+ltxt3;
                    
                        //Get textArea HTML control 
                        var txtArea = document.getElementById("paragraf3");
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
	                $('.formlink3').css("display", "none");   
                };

                function titelFunc(val) {
                document.getElementById("preview_rubrik").innerHTML = val;
                };
                
                var paragraf1 = "";
                var img1 = "";
                var img1_2 = "";
                var img1_3 = "";
                function paragrafFunc(val) {
                document.getElementById("topic1p").innerHTML = val;
                paragraf1 = val;
                };
                
               
                function rubrikFunc(val) {
                document.getElementById("preview").innerHTML = "<div class="+"pagecontainer"+"><div class="+"topicwide"+" id="+"topicwide1"+"><h2>"+val+"</h2><p id="+"topic1p"+"></p>"+'<div id="slideshow1" style="margin-top:80px;"><div class="topicbilder" id="img1"></div><div class="topicbilder" id="img1_2"></div><div class="topicbilder" id="img1_3"></div></div></div></div>';
                document.getElementById("topic1p").innerHTML = paragraf1;
                document.getElementById("img1").innerHTML = img1;
                document.getElementById("img1_2").innerHTML = img1_2;
                document.getElementById("img1_3").innerHTML = img1_3;
                };
                
                var paragraf2 = "";
                var img2 = "";
                var img2_2 = "";
                var img2_3 = "";
                function paragrafFunc2(val) {
                document.getElementById("topic1p2").innerHTML = val;
                paragraf2 = val;
                };
                
                function rubrikFunc2(val) {
                document.getElementById("preview2").innerHTML = "<div class="+"pagecontainer"+"><div class="+"topicwide"+" id="+"topicwide2"+"><h2>"+val+"</h2><p id="+"topic1p2"+"></p>"+'<div id="slideshow2" style="margin-top:80px;"><div class="topicbilder" id="img2"></div><div class="topicbilder" id="img2_2"></div><div class="topicbilder" id="img2_3"></div></div></div></div>';
                document.getElementById("topic1p2").innerHTML = paragraf2;
                document.getElementById("img2").innerHTML = img2;
                document.getElementById("img2_2").innerHTML = img2_2;
                document.getElementById("img2_3").innerHTML = img2_3;
                };
                
                var paragraf3 = "";
                var img3 = "";
                var img3_2 = "";
                var img3_3 = "";
                function paragrafFunc3(val) {
                document.getElementById("topic1p3").innerHTML = val;
                paragraf3 = val;
                };
                
                function rubrikFunc3(val) {
                document.getElementById("preview3").innerHTML = "<div class="+"pagecontainer"+"><div class="+"topicwide"+" id="+"topicwide3"+"><h2>"+val+"</h2><p id="+"topic1p3"+"></p>"+'<div id="slideshow3" style="margin-top:80px;"><div class="topicbilder" id="img3"></div><div class="topicbilder" id="img3_2"></div><div class="topicbilder" id="img3_3"></div></div></div></div>';
                document.getElementById("topic1p3").innerHTML = paragraf3;
                document.getElementById("img3").innerHTML = img3;
                document.getElementById("img3_2").innerHTML = img3_2;
                document.getElementById("img3_3").innerHTML = img3_3;
                };
                
                // *VIKTIG* Lägger in bildens src i det gömda textfältet för respektive fil som sen används för att infoga bildens src i ins_wide.php 
                //Även javascript för att förhandsvisa bilder. (om bilden redan finns på servern.. behöver uppdateras...)
                
                function imgFunc(val, id) {

                    var file = val.replace(/^.*[\\\/]/, '../../Images/');
                    var src = '"'+file+'"';
                    var tag = '<img src='+src+'>';
                    var id = id;
	                document.getElementById('img_dir'+id).value = '<img src='+src+'>';
	                img1 = tag;
	                document.getElementById("img"+id).innerHTML = img1;
                    
                };
                
                
       </script>
    </head>
    <body>
        
<div>
        
       <!--<form name="edit" id="edit" action="conf.php" method="POST">
            <lable>Titel</lable><br />
            <input type="text" name="titel" value=""><br />
            <lable>Rubrik</lable><br />
            <input type="text" name="rubrik" value=""><br />
            <lable>Text</lable><br />
            <textarea cols="27" rows="6" name="paragraf"></textarea><br />
            <input type="button" name="brytnbtn" onclick="addtext1()" value="Radbrytning">
            <input type="file" name="filename" ><br /><br />
            
            <lable>Rubrik 2</lable><br />
            <input type="text" name="rubrik2" value=""><br />
            <lable>Text</lable><br />
            <textarea cols="27" rows="6" name="paragraf2"></textarea><br />
            <input type="button" name="brytnbtn" onclick="addtext2()" value="Radbrytning">
            <input type="file" name="filename" ><br /><br />
            
            <lable>Rubrik 3</lable><br />
            <input type="text" name="rubrik3" value=""><br />
            <lable>Text</lable><br />
            <textarea cols="27" rows="6" name="paragraf3"></textarea><br />
            <input type="button" name="brytnbtn" onclick="addtext3()" value="Radbrytning">
            <input type="file" name="filename" ><br />
            <input type="submit" value="submit" form="edit"></form>
            
            
            -->
        <form name="formtype" id="formtype" style="margin: 40px;">
            <!-- Dropdownlista för att välja vilken sida som ska redigeras -->
            <label>Välj paket att ändra!</label>
            <select name="edit_form" onchange"editFunc(this)"><option>Ny sida</option>
            <?php
           // Identifierar alla existerande sidor... 
            $a = (glob("*",GLOB_ONLYDIR));
            foreach ($a as $value) {
            echo '<option value="'.$value.'">'.$value.'</option>';
            }
            ?> </select><br /><br />
            </form>
            <label style="margin-left: 40px;">Layout</label><br />
            <button class="layoutbtn" style="margin-left: 40px;" onclick="$('#wideform').css('display','block'); $('.layoutbtn').attr('disabled','true');">wide</button>
            <button class="layoutbtn" style="margin-left: 40px;" onclick="$('#sidokolumnform').css('display','block'); $('.layoutbtn').attr('disabled','true');">sidokolumn</button>

<!-- Formulär för att lägga in nya sidor med i wide-format. (max tre rubriker) -->
        <form name="wideform" id="wideform" style="margin: 40px; display:none;" action="ins_wide.php" method="POST" enctype="multipart/form-data">
            
            <lable>Titel</lable><br />
            <input type="text" name="titel" id="titel" oninput="titelFunc(this.value)" value=""><br /><br />

            <lable>Rubrik</lable><br />
            <input type="text" name="rubrik" oninput="rubrikFunc(this.value)" value=""><br />
            <lable>Text (html/css)</lable><br />
            <textarea cols="27" rows="6" name="paragraf" id="paragraf1" oninput="paragrafFunc(this.value)"></textarea><br />
            <input type='button' name="brytnbtn" onclick="addtext1()" value="Radbrytning">
            <input type='button' name="linkbtn" id="link1" onclick="link(this.id)" value="Infoga länk"><br />
            
            <textarea cols="27" hidden rows="6" name="img_dir1" id="img_dir1" ></textarea>
            <textarea cols="27" hidden rows="6" name="img_dir1_2" id="img_dir1_2"></textarea>
            <textarea cols="27" hidden rows="6" name="img_dir1_3" id="img_dir1_3"></textarea>
            <input type="file" name="filename1[]" id="1" multiple="multiple" onchange="imgFunc(this.value, this.id)" value="0"><br />
            <input type="file" name="filename1_2" id="1_2" onchange="imgFunc(this.value, this.id)" value="0"><br />
            <input type="file" name="filename1_3" id="1_3" onchange="imgFunc(this.value, this.id)" value="0"><br /><br />
            
            <lable>Rubrik 2</lable><br />
            <input type="text" name="rubrik2" oninput="rubrikFunc2(this.value)" value=""><br />
            <lable>Text (html/css)</lable><br />
            <textarea cols="27" rows="6" name="paragraf2" id="paragraf2" oninput="paragrafFunc2(this.value)"></textarea><br />
            <input type='button' name="brytnbtn" onclick="addtext2()" value="Radbrytning">
            <input type='button' name="linkbtn" id="link2" onclick="link(this.id)" value="Infoga länk"><br />
            
            <textarea cols="27" hidden rows="6" name="img_dir2" id="img_dir2" ></textarea>
            <textarea cols="27" hidden rows="6" name="img_dir2_2" id="img_dir2_2"></textarea>
            <textarea cols="27" hidden rows="6" name="img_dir2_3" id="img_dir2_3"></textarea>
            <input type="file" name="filename2" id="2" onchange="imgFunc(this.value, this.id)" value="0"><br />
            <input type="file" name="filename2_2"  id="2_2" onchange="imgFunc(this.value, this.id)" value="0"><br />
            <input type="file" name="filename2_3" id="2_3" onchange="imgFunc(this.value, this.id)" value="0"><br /><br />
            
            <lable>Rubrik 3</lable><br />
            <input type="text" name="rubrik3" oninput="rubrikFunc3(this.value)" value=""><br />
            <lable>Text (html/css)</lable><br />
            <textarea cols="27" rows="6" name="paragraf3" id="paragraf3" oninput="paragrafFunc3(this.value)"></textarea><br />
            <input type='button' name="brytnbtn" onclick="addtext3()" value="Radbrytning">
            <input type='button' name="linkbtn" id="link3" onclick="link(this.id)" value="Infoga länk"><br />
            
            <textarea cols="27" hidden rows="6" name="img_dir3" id="img_dir3" ></textarea>
            <textarea cols="27" hidden rows="6" name="img_dir3_2" id="img_dir3_2"></textarea>
            <textarea cols="27" hidden rows="6" name="img_dir3_3" id="img_dir3_3"></textarea>
            <input type="file" name="filename3" id="3" onchange="imgFunc(this.value, this.id)" value="0"><br />
            <input type="file" name="filename3_2" id="3_2" onchange="imgFunc(this.value, this.id)" value="0"><br />
            <input type="file" name="filename3_3" id="3_3" onchange="imgFunc(this.value, this.id)" value="0"><br />
            <input type="submit" value="submit" form="wideform">
        </form>
                <div class="formlink1" style="padding: 20px; width:200px; height: 150px; position: absolute; top:150px; left:50px; display:none; background:white; border:1px solid black; border-radius:5px;">
                <form name="formlink1" id="formlink1" onsubmit="return false;">
                <lable>Öppnas i:</lable><br />
                <select name="tar1" id="tar1"><option value="_blank">Nytt fönster</option><option value="">Samma fönster</option></select><br />
                <lable>Url:</lable><br />
                <input type="url" name="ref1" id="ref1"><br />
                <lable>Länktext:</lable><br />
                <input type="text" name="linktext" id="linktext1" value=""><br />
                <input type="submit" onclick="addlink1()" value="Infoga länk"><input type="button" onclick="abortlink1()" value="Avbryt"><br />
                </form></div>
                <div class="formlink2" style="padding: 20px; width:200px; height: 150px; position: absolute; top:350px; left:50px; display:none; background:white; border:1px solid black; border-radius:5px;">
                <form name="formlink2" id="formlink2" onsubmit="return false;">
                <lable>Öppnas i:</lable><br />
                <select name="tar2" id="tar2"><option value="_blank">Nytt fönster</option><option value="">Samma fönster</option></select><br />
                <lable>Url:</lable><br />
                <input type="url" name="ref2" id="ref2"><br />
                <lable>Länktext:</lable><br />
                <input type="text" name="linktext" id="linktext2" value=""><br />
                <input type="submit" onclick="addlink2()" value="Infoga länk"><input type="button" onclick="abortlink2()" value="Avbryt"><br />
                </form></div>
                 <div class="formlink3" style="padding: 20px; width:200px; height: 150px; position: absolute; top:550px; left:50px; display:none; background:white; border:1px solid black; border-radius:5px;">
                <form name="formlink3" id="formlink3" onsubmit="return false;">
                <lable>Öppnas i:</lable><br />
                <select name="tar3" id="tar3"><option value="_blank">Nytt fönster</option><option value="">Samma fönster</option></select><br />
                <lable>Url:</lable><br />
                <input type="url" name="ref3" id="ref3"><br />
                <lable>Länktext:</lable><br />
                <input type="text" name="linktext" id="linktext3" value=""><br />
                <input type="submit" onclick="addlink3()" value="Infoga länk"><input type="button" onclick="abortlink3()" value="Avbryt"><br />
                </form></div>
<!-- Slut på formulär för att lägga in nya sidor med i wide-format. (max tre rubriker) -->

                
</div>
 <div style="left:300px; width:1200px; height:800px; top:40px; padding:10px; border:1px solid black; border-bottom: none; position: absolute;">
    <?php include ("header.php");?>
     <?php include ("mallprev.php");?>
    <div style="margin-top: -320px;" id="preview"></div>
    <div style="margin-top: 10px;" id="preview2"></div>
    <div style="margin-top: 10px;" id="preview3"></div>
    
 </div>
 
            
    </body>
</html>

