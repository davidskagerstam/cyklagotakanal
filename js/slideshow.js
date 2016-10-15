var mq = window.matchMedia( "(max-width: 800px)" );

if (mq.matches) {

$(document).ready(function() {
   Slideshow.setBindings();
});


var Slideshow = (function(){
    $("#slideshow > div:gt(0)").hide();

    setInterval(function() { 
    $('#slideshow > div:first')
        .fadeOut(1500)
        .next()
        .fadeIn(1500)
        .end()
        .appendTo('#slideshow');
    },  5000);
    
    
    $("#slideshow1 > div:gt(0)").hide();

    setInterval(function() { 
    $('#slideshow1 > div:first')
        .fadeOut(1500)
        .next()
        .fadeIn(1500)
        .end()
        .appendTo('#slideshow1');
    },  5000);
    
    
    $("#slideshow2 > div:gt(0)").hide();

    setInterval(function() { 
    $('#slideshow2 > div:first')
        .fadeOut(1500)
        .next()
        .fadeIn(1500)
        .end()
        .appendTo('#slideshow2');
    },  5000);
    
    
    $("#slideshow3 > div:gt(0)").hide();

    setInterval(function() { 
    $('#slideshow3 > div:first')
        .fadeOut(1500)
        .next()
        .fadeIn(1500)
        .end()
        .appendTo('#slideshow3');
    },  5000);



return {
    setBindings: setBindings
}
})();
}