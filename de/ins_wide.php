         
         
         <?php 
         

        // Variabel innehåller den nya sidans titel. 
        $newpage = "";
        
        // START Nya sidan med layouten topicwide läggs upp på servern.
        if (isset($_POST["titel"])) {
        $newpage = $_POST["titel"];
                 
        // Om namnet på den nya sidan INTE redan existerar...
        if (file_exists($newpage) == 0){
            
            if(isset($_FILES['filename1']['name'][3]))
            {
            echo "Du försöker ladda upp fler än tre bilder / rubrik. <br />";
            die("Max antal är tre!");
            }  
         
             // Ladda upp eventuell bildfil.
        if ($_POST["filename1"] !== 0){
            $total = count($_FILES['filename1']['name']);
            for($i=0; $i<$total; $i++) {
            $target_dir = "../Images/";
            $target_file = $target_dir . basename($_FILES["filename1"]["name"][$i]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
            // Check if image file is a actual image or fake image
            if (isset($_POST["filename1"])) {
            $check = getimagesize($_FILES["filename1"]["tmp_name"][$i]);
            if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }
        if (file_exists($target_file)) {
            echo "Sorry, en bild med samma namn finns redan på servern. www.cyklagotakanal.se/$target_file <br />";
            $uploadOk = 0;
        }    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Filen blev inte uppladdad.";
            die();
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["filename1"]["tmp_name"][$i], $target_file)) {
            echo "The file ". basename( $_FILES["filename1"]["name"][$i]). " has been uploaded.";
            } else {
                
            echo "Sorry, there was an error uploading your file.";
            
            }
        }
        }
        }
        
            
            
            
            mkdir("$newpage");
        // Kopiera från mallen till den nya sidan i den nya sidans mapp. 
        copy("mall.php", "$newpage/index.php");

        // Skapar .txt som innehåller sidans titel.
        $titel = fopen("$newpage/titel.txt", "x+") or die("Unable to open file!");
        $txt = $_POST["titel"];
        fwrite($titel, $txt);
        fclose("$titel");
        
        // Skapar .txt som innehåller sidans första rubrik.
        $rubrik = fopen("$newpage/topic1_h2.txt", "w+") or die("Unable to open file!");
        $txt = $_POST["rubrik"];
        fwrite($rubrik, $txt);
        fclose("$rubrik");
        
        // Skapar .txt som innehåller sidans första stycke.
        $paragraf = fopen("$newpage/topic1_p.txt", "w+") or die("Unable to open file!");
        $par = json_encode($_POST["paragraf"]);
        $txt = preg_replace( '/(\r\n)|\n|\r/', '<br />', $par);
        
        fwrite($paragraf, $txt);
        fclose("$paragraf");
     
        $img = fopen("$newpage/img1.txt", "w+") or die("Unable to open file!");
        $img1 = $_POST["img_dir1"];
        $img2 = $_POST["img_dir1_2"];
        $img3 = $_POST["img_dir1_3"];
        $txt = '<div id="slideshow1" style="margin-top:80px;"><div class="topicbilder" id="img1">'.$img1.'</div><div class="topicbilder" id="img1_2">'.$img2.'</div><div class="topicbilder" id="img1_3">'.$img3.'</div></div>';
        fwrite($img, $txt);
        fclose("$img");
        
       
        
        
        $rubrik2 = fopen("$newpage/topic2_h2.txt", "w+") or die("Unable to open file!");
        $txt = $_POST["rubrik2"];
        fwrite($rubrik2, $txt);
        fclose("$rubrik2");
        
        $paragraf2 = fopen("$newpage/topic2_p.txt", "w+") or die("Unable to open file!");
        $txt = $_POST["paragraf2"];
        fwrite($paragraf2, $txt);
        fclose("$paragraf2");
        
        $rubrik3 = fopen("$newpage/topic3_h2.txt", "w+") or die("Unable to open file!");
        $txt = $_POST["rubrik3"];
        fwrite($rubrik3, $txt);
        fclose("$rubrik3");
        
        $paragraf3 = fopen("$newpage/topic3_p.txt", "w+") or die("Unable to open file!");
        $txt = $_POST["paragraf3"];
        fwrite($paragraf3, $txt);
        fclose("$paragraf3");
        
        
        
        if ($_POST["rubrik"] != ""){
            copy("top1.txt", "$newpage/topic1.txt");
        }
        if ($_POST["rubrik2"] != ""){
            copy("top2.txt", "$newpage/topic2.txt");
        }
        if ($_POST["rubrik3"] != ""){
            copy("top3.txt", "$newpage/topic3.txt");
            
            
        }
        }else{
            echo 'Sidan finns redan! Ändra titel och försök igen...';
        }
        }
       

        ?>