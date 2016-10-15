$(document).ready(function() {
	$('ul#lang_nav').hover(function () {
                $('ul#lang_nav').transition({x: '-100%'});
	            }, function(){
                $('ul#lang_nav').transition({x: '0%'});
        })

});