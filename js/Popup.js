$(document).ready(function() {
   Pop.setBindings();
});


var Pop = (function(){


var toggle = '';

       var setBindings = function () {

           

        $('.popup').click(function (e) {
            var popId = this.name.replace('BTN', '' ) + 'Pop';
            
            
            
            
            if (toggle == false) {

                $('#' + popId).css("z-index", "7");
                $('#' + popId).css("visibility", "visible");
                $('.popoverflow').css("visibility", "visible");
                $('.popoverflow').css("overflow", "hidden");
                $('body').css("overflow", "hidden");
                
                
                
                
                toggle = true; 
                return false;
                
                               
        }


            else {
                
                $('#' + popId).css("visibility", "hidden");
                $('.popoverflow').css("visibility", "hidden");
                $('body').css("overflow", "visible");
                toggle = true;
                return false;
            }

        })
        
        $('.close').click(function (e) {
            
            
                $('.popup').trigger("click");
                toggle = false;
                return false;
         
        
        })
        
        $('.popoverflow').click(function (e) {
            
            
                $('.popup').trigger("click");
                toggle = false;
         
        
        })
           
       $(document).keydown(function(e) {        
    if (e.keyCode == 27) {
        toggle = true; 
        $('.popup').trigger("click");
                toggle = false;
    }
});
       
       
       
       }
       



return {
    setBindings: setBindings
}
})();