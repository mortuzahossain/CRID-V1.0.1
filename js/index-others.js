jQuery(document).ready(function($){
'use strict';
    jQuery('body').backstretch([
        "images/bg/bg1.jpg",
        "images/bg/bg2.jpg"
    ], {duration: 5000, fade: 500, centeredY: true });
    var preloader = $('.preloader');
    $(window).load(function(){
        preloader.remove();
    });
});

$('#main-slider .carousel-content').flexVerticalCenter({ cssAttribute: 'padding-top' });
