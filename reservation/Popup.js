$(document).ready(function() {
   Pop.setBindings();
});


var Pop = (function(){


var toggle = '';

       var setBindings = function () {

           

        $('.navbtn').click(function (e) {
            var popId = this.id.replace('BTN', '' ) + 'flik';
            
            
            
            
            if (toggle == false) {

                $('.field').css("visibility", "hidden");
                $('#' + popId).css("visibility", "visible");

                toggle = false; 
                
                
                               
        }


            else {
                
                $('#' + popId).css("visibility", "visible");
                $('.field').css("visibility", "hidden");
                
                toggle = true;
            }

        });
       
       
       
       }
       



return {
    setBindings: setBindings
}
})();