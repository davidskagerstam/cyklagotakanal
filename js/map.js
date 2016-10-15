$(document).ready(function() {
   map.setBindings();
});




var map = (function(){

        var setBindings = function () {
			
			var toggle = false;

		
         

		$('.lineaction').click(function (e) {
            var popId = this.id.replace('LineBTN', '' ) + 'Pop';
            var popBTN = this.id.replace('LineBTN', '' ) + 'Pop button';
            var hoverId = this.id.replace('LineBTN', '' ) + 'Hover';
            var prevId = this.id.replace('LineBTN', '' ) + 'PREV';
            var nextId = this.id.replace('LineBTN', '' ) + 'NEXT';
            
                      
            
            if (toggle == false) {
            
            	$('.mappop button').css("visibility", "hidden");
            	$('.maphover').css("visibility", "hidden");
            	$('.mappop').css("visibility", "hidden");
                $('#' + popId).css("visibility", "visible");
                $('#' + popBTN).css("visibility", "visible");
                $('#' + hoverId).css("visibility", "visible");
                
                 toggle = true;
                                  
                
        }


            else {
            $('.mappop button').css("visibility", "hidden");
               $('.mappop').css("visibility", "hidden");
                $('#' + popId).css("visibility", "visible");
                $('#' + popBTN).css("visibility", "visible");
                
                $('#' + hoverId).css("visibility", "hidden");
                $('.map img').trigger("click");
                
                toggle = false;   
            }

        })


		$('.mapaction').click(function (e) {
            var popId = this.id.replace('BTN', '' ) + 'Pop';
            var popBTN = this.id.replace('BTN', '' ) + 'Pop button';
            var hoverId = this.id.replace('BTN', '' ) + 'Hover';
            var prevId = this.id.replace('BTN', '' ) + 'PREV';
            var nextId = this.id.replace('BTN', '' ) + 'NEXT';
            var lineId = this.id.replace('BTN', '' ) + 'Line h4';
            
                      
            
            if (toggle == false) {
            
            	$('.mappop button').css("visibility", "hidden");
            	$('.maphover').css("visibility", "hidden");
            	$('.mappop').css("visibility", "hidden");
            	
            	$('.linehover h4').css("text-shadow", "0px 0px 0px");
            	
                $('#' + popId).css("visibility", "visible");
                $('#' + popBTN).css("visibility", "visible");
                $('#' + hoverId).css("visibility", "visible");
                
                $('#' + lineId).css("text-shadow", "0px 5px 10px");
               
                 toggle = true;
                                  
                
        }


            else {
            $('.mappop button').css("visibility", "hidden");
               $('.mappop').css("visibility", "hidden");
                $('#' + popId).css("visibility", "visible");
                $('#' + popBTN).css("visibility", "visible");
                
                $('#' + hoverId).css("visibility", "hidden");
                $('.map img').trigger("click");
                
                toggle = false;   
            }

        })
        
        
        $('.PREV').click(function (e) {
            
            var prevBTN = this.id.replace('PREV', '' ) + 'BTN';
            var prevPop = this.id.replace('PREV', '' ) + 'Pop button';
            
            if (toggle == false) {
            
            $('#' + prevBTN).trigger("click");
            
            
                        
            toggle = false;        
                           
                
        }


            else {
               
                toggle = false;   
            }

        })


		$('.NEXT').click(function (e) {
            var nextBTN = this.id.replace('NEXT', '' ) + 'BTN';
            var nextPop = this.id.replace('NEXT', '' ) + 'Pop button';
            
            if (toggle == false) {
            $('#' + nextBTN).trigger("click");
            
            
                toggle = false;                   
                
        }


            else {
              
                toggle = false;   
            }

        })
        
        $('.mapaction').hover(function (e) {
            var hoverId = this.id.replace('BTN', '' ) + 'Hover';
            
            if (toggle == false) {
            $('.maphover').css("visibility", "hidden");
                $('#' + hoverId).css("visibility", "visible");
              
                toggle = false;                   
        
        }
        
        else {
            
            
           $('#' + hoverId).css("visibility", "visible");
              
                
                toggle = false; 
            
            }

                 
        })
        
        
		}



return {
    setBindings: setBindings
}
})();