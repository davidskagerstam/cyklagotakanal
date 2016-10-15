        <?php
        $today = date("20y/m/d");
		$today1 = '2016/06/08';
		
        $search_sql3="SELECT * FROM conf_paket WHERE Startdag='$today'";
        $search_query3=mysql_query($search_sql3);
        if(mysql_num_rows($search_query3)!=0) {
        $search_rs3=mysql_fetch_assoc($search_query3);
        }
        	
		
        $search_sql4="SELECT * FROM confirms WHERE Startdag='$today'";
        $search_query4=mysql_query($search_sql4);
        if(mysql_num_rows($search_query4)!=0) {
        $search_rs4=mysql_fetch_assoc($search_query4);
        }
        ?>


Dagens bokningar (<?php echo "$today"?>)  <div id="today" class="field_flex"><h2>Paketbokningar</h2><br />
		
		<?php if(mysql_num_rows($search_query3)!=0) {
		    
		    
		    do { ?> 
		    <p>
		         Namn:
		    <?php echo $search_rs3['Namn'];?>
		    <br />Antal gäster:
		    <?php echo $search_rs3['Antal_gaster'];?>
		    <br />Startdag:
		    <?php echo $search_rs3['Startdag'];?>
		    <br />Cyklar f.o.m:
		    <?php echo $search_rs3['Cykelfom'];?>
		    <br />Cyklar t.o.m:
		    <?php echo $search_rs3['Cykeltom'];?>
		    
		    <br />Cykelnummer:
		    <?php echo $search_rs3['Cykelnummer'];?>
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
		    
		    <br /> Enkelrum:
		    <?php echo $search_rs3['Enkelrum'];?>
		    
		    <br /> Dubbelrum:
		    <?php echo $search_rs3['Dubbelrum'];?>
		    
		    <div class="resultat_extra_2">
		        Incheckning!  <br /><br />
		        Betalningsstatus: (<?php echo $search_rs3['Antal_gaster']*$search_rs3['Pris_pp'];?>kr)
		    </p>  
		        
		            <?php $pay = $search_rs3['betalat'];
		            $id = $search_rs3['ID'];
		            $bet = $search_rs3['betalat'];
		            if ($pay != 1){
		                echo '<div class="pay">Ej betalat!</div><br /><form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="submitbetal" value="betala"><br /><br />
		                <input  type="hidden" name="usr" value="'.$username.'"></form>';
		            }
		                
		            
		            else {
		                echo 'Har betalat! 
		                <form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="submitavbetal" value="Avmarkera!"><br /><br />
		                <input  type="hidden" name="usr" value="'.$username.'"></form>';
		            }
		            $incheck = $search_rs3['check_in'];
		            if ($incheck == 1){
		                echo 'Har checkat in!<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="ejincheck" value="Avmarkera!"><br /><br />
		                <input  type="hidden" name="usr" value="'.$username.'"></form>';
		                
		            }
		            else {
		                echo '<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="incheck" value="checka in!"><br /><br />
		                <input  type="hidden" name="usr" value="'.$username.'"></form>';
		            }
		            
		            $utcheck = $search_rs3['check_out'];
		            if ($utcheck == 1){
		               echo 'Har checkat ut!<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="ejutcheck" value="Avmarkera!"><br /><br />
		                <input  type="hidden" name="usr" value="'.$username.'"></form>';
		                
		            }
		            else {
		                echo '<form method="POST" target="_blank" action="update_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="utcheck" value="checka ut!"><br /><br />
		                <input  type="hidden" name="usr" value="'.$username.'"></form>';
		            }
		            
		            
		            echo '<form method="POST" target="" action="edit_booking.php">
		                <input type="hidden" name="id" value="'.$id.'">
		                <input type="submit" name="editpaket" value="Redigera!"><br /><br />
		                <input  type="hidden" name="usr" value="'.$username.'"></form>';
		            
		            ;?>
		            </div><br />---------------------------------<br /><br />
		    
		    <?php } while ($search_rs3=mysql_fetch_assoc($search_query3));
		}   else{
		    echo "Inget paket hittades!";
		}
		
		echo '</div> <br />';
		
		echo '<div id="today" class="field_flex"> <h2>Cykelbokningar</h2><br />';
		
		if(mysql_num_rows($search_query4)!=0) {
		    do { ?> 
		    <p> Namn:
		    <?php echo $search_rs4['Namn'];?>
		    <br />Antal gäster:
		    <?php echo $search_rs4['Antal_gaster'];?>
		    <br />Cyklar f.o.m:
		    <?php echo $search_rs4['Cykelfom'];?>
		    <br />Cyklar t.o.m:
		    <?php echo $search_rs4['Cykeltom'];?>
		    <br />Cykelnummer:
		    <?php echo $search_rs4['Cykelnummer'];?>
		    <br /> Telefon::
		    <?php echo $search_rs4['Telefon'];?>
		    <br /> Epost:
		    <?php echo $search_rs4['Epost'];?>
		    <br /> Övrig information:<br />
		    <?php echo $search_rs4['Info'];?>
		    
		    <br /> Lunchpaket:<br />
		    Vegetarisk:
		    <?php echo $search_rs4['vego'];?>
		    <br />
		    Fisk:
		    <?php echo $search_rs4['fisk'];?>
		    <br />
		    Kallskuret:
		    <?php echo $search_rs4['kott'];?>
		    </p><br />---------------------------------<br /><br />
		    
		    
		    
		    <?php } while ($search_rs4=mysql_fetch_assoc($search_query4));
		    
		}   else{
		    echo "Inget namn hittades!";
		}
		?>
		
		</div></div>