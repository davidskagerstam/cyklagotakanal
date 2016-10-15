$(document).ready(

  /* This is the function that will get executed after the DOM is fully loaded */
  
  //**** Start hÃ¤mta datum frÃ¥n datepicker och skapa table rows finns i dateProcess.php

function () {
    $( ".datepicker" ).datepicker({ 
    dateFormat: 'yy/mm/dd', 
    
    altField: "#alternate",
    showOn: "button",
                buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
                buttonImageOnly: true,
    
    
    onSelect: function(dateText, inst){
        var date = $(this).val();
        var d = new Date(date);
        var n = (d.getMonth() + 1);
        $('input[name="datepicker"]').attr('value', n);
    }       
    });
    
   
    $( ".selector" ).datepicker({ defaultDate: null });
    $(".numBikes").trigger("click");
  
            
  });

    var pris_pp;
    var pris;
    
    function paketSelect(sel){
        var paket = sel.value;
         
        
        if(paket == 'matpaket'){
            $('.dayone').css('display', 'inline');
         $(".dayone").val('Norrqvarn');
         $(".daytwo").val(0);
         $(".daythree").val(0);
            $(".dayfour").val(0);
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            $(".dayselect").val('1');
            $('.daytwo').css('display', 'none');
            $('.daythree').css('display', 'none');
            $('.dayfour').css('display', 'none');
            $('.dayfive').css('display', 'none');
            $('.daysix').css('display', 'none');
            $('.dayseven').css('display', 'none');
             $('.pris_pp').val('1690');
             pris_pp = 1690;
        }
        if(paket == 'ekopaket'){
            $('.dayone').css('display', 'inline');
         $(".dayone").val('Tåtorp');
         $(".daytwo").val(0);
         $(".daythree").val(0);
            $(".dayfour").val(0);
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            $(".dayselect").val('1');
            $('.daytwo').css('display', 'none');
            $('.daythree').css('display', 'none');
            $('.dayfour').css('display', 'none');
            $('.dayfive').css('display', 'none');
            $('.daysix').css('display', 'none');
            $('.dayseven').css('display', 'none');
            $('.pris_pp').val('1690');
            pris_pp = 1690;
        }
        if(paket == 'storpaket'){
            $('.dayone').css('display', 'inline');
            $('.daytwo').css('display', 'inline');
         $(".dayone").val('Tåtorp');
         $(".daytwo").val('Norrqvarn');
         $(".daythree").val(0);
            $(".dayfour").val(0);
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            $(".dayselect").val('2');
            $('.daythree').css('display', 'none');
            $('.dayfour').css('display', 'none');
            $('.dayfive').css('display', 'none');
            $('.daysix').css('display', 'none');
            $('.dayseven').css('display', 'none');
            $('.pris_pp').val('2990');
            pris_pp = 2990;
        }
         
    }
     function enkelSelect(sel){
        var enkelrum = sel.value;
       
        var pris;
        
        if(enkelrum == ""){
            
            pris = 0;
             $('.pris_2').val(pris);
        }
        if(enkelrum == 1){
            
            pris = 250;
             $('.pris_2').val(pris);
        }
        
        if(enkelrum == 2){
            pris = 500;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 3){
            pris = 750;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 4){
            pris = 1000;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 5){
            pris = 1250;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 6){
            pris = 1500;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 7){
            pris = 1750;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 8){
            pris = 2000;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 9){
            pris = 2250;
            $('.pris_2').val(pris);
        }
        if(enkelrum == 10){
            pris = 2500;
            $('.pris_2').val(pris);
        }
         
    }
    
    var dayvalue ="";
    
    function selectDays(sel){
        var dayvalue = sel.value;
            $('.dayone').css('display', 'none');
            $('.daytwo').css('display', 'none');
            $('.daythree').css('display', 'none');
            $('.dayfour').css('display', 'none');
            $('.dayfive').css('display', 'none');
            $('.daysix').css('display', 'none');
            $('.dayseven').css('display', 'none');

       
        
        if(dayvalue == 0){
            $('.dayone').css('display', 'none');
            $('.daytwo').css('display', 'none');
            $('.daythree').css('display', 'none');
            $('.dayfour').css('display', 'none');
            $('.dayfive').css('display', 'none');
            $('.daysix').css('display', 'none');
            $('.dayseven').css('display', 'none');
            
            $(".dayone").val(0);
            $(".daytwo").val(0);
            $(".daythree").val(0);
            $(".dayfour").val(0);
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            
            
            dayvalue = 0;
            
        }
        
        if (dayvalue == 1){
            $('.dayone').css('display', 'inline');
            $(".daytwo").val(0);
            $(".daythree").val(0);
            $(".dayfour").val(0);
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            dayvalue = 1;
        }
        if (dayvalue == 2){
            $('.dayone').css('display', 'inline');
            $('.daytwo').css('display', 'inline');
            $(".daythree").val(0);
            $(".dayfour").val(0);
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            dayvalue = 2;
        }
        if (dayvalue == 3){
            $('.dayone').css('display', 'inline');
            $('.daytwo').css('display', 'inline');
            $('.daythree').css('display', 'inline');
            $(".dayfour").val(0);
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            dayvalue = 3;
        }
        if (dayvalue == 4){
            $('.dayone').css('display', 'inline');
            $('.daytwo').css('display', 'inline');
            $('.daythree').css('display', 'inline');
            $('.dayfour').css('display', 'inline');
            $(".dayfive").val(0);
            $(".daysix").val(0);
            $(".dayseven").val(0);
            dayvalue = 4;
        }
        if (dayvalue == 5){
            $('.dayone').css('display', 'inline');
            $('.daytwo').css('display', 'inline');
            $('.daythree').css('display', 'inline');
            $('.dayfour').css('display', 'inline');
            $('.dayfive').css('display', 'inline');
            $(".daysix").val(0);
            $(".dayseven").val(0);
            dayvalue = 5;
        }
        if (dayvalue == 6){
            $('.dayone').css('display', 'inline');
            $('.daytwo').css('display', 'inline');
            $('.daythree').css('display', 'inline');
            $('.dayfour').css('display', 'inline');
            $('.dayfive').css('display', 'inline');
            $('.daysix').css('display', 'inline');
            $(".dayseven").val(0);
            dayvalue = 6;
        }
        if (dayvalue == 7){
            $('.dayone').css('display', 'inline');
            $('.daytwo').css('display', 'inline');
            $('.daythree').css('display', 'inline');
            $('.dayfour').css('display', 'inline');
            $('.dayfive').css('display', 'inline');
            $('.daysix').css('display', 'inline');
            $('.dayseven').css('display', 'inline');
            dayvalue = 7;
        }
    }
    
    $( document ).ready(function() {
    
        var toggle = false; 
       
        $('.close').click(function (){
        

            if (toggle == false) {
            
                $('.today').css('display', 'none');
                toggle = true;
            }
            else {
                $('.today').css('display', 'block');
                toggle = false;
            }
        
        
        })
    });
    
    
    
    

    
