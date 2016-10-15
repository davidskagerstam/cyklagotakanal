var mq = window.matchMedia("(max-width: 800px)");

                     if (mq.matches) { 

$(document).ready(function() {
    Menu.setBindings();
    
});

var Menu = (function(){

        var setBindings = function () {

          var toggle = false;
          
    $(".menu_button").click(function (e) {
    
    if (toggle == false) {
        $(".content").transition({y: '355px'});
        $(".menu").css("z-index", "2");
        $(".menu_button").css("position", "fixed");
        $(".menu_button").transition({ rotate: '90deg' });

        
                    toggle = true;
                  
    }else{
        
        $(".content").transition({y: '0px'});
        $(".menu").css("z-index", "0");
        $(".menu_button").css("z-index", "5");
        $(".menu_button").css("position", "absolute");
        $(".menu_button").transition({ rotate: '0deg' });

                    
                    toggle = false;
    }
    
    });
 }

return {
    setBindings: setBindings
}
})(); }