$(document).ready(function() {
    Topic.setBindings();
});

var Topic = (function(){

        var setBindings = function () {

           var toggle = false;

		
	$('.topic').hover(function (e) {
		
            if (toggle == false) {
                $('#' + this.id).css("box-shadow", "1px 2px 3px");
                toggle = true;               
        }


            else {
            
            $('.topic').css("box-shadow", "0px 0px 0px");
                toggle = false; 
            
            }

        })


$('.topic').click(function (e) {
		
            if (toggle == true) {
                $('.topic').css("box-shadow", "0px 0px 0px");
                toggle = true;               
        }


            

        })



       }



return {
    setBindings: setBindings
}
})();