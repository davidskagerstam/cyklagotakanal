$(document).ready(function() {
    Date.setBindings();
    
});

var Date = (function(){


    $( ".datepicker" ).datepicker({ 
    dateFormat: 'yy/mm/dd', 
  
    
    minDate: new Date(2016, 6 - 1, 01), 
    maxDate: new Date (2016, 8 - 1, 31),
    firstDay: 1,
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
   
  
  return {
    setBindings: setBindings
}
})();