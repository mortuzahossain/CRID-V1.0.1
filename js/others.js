jQuery(document).ready(function($){
  var preloader = $('.preloader');
  $(window).load(function(){
    preloader.remove();
  });
});

lightbox.option({
  'resizeDuration': 200,
  'wrapAround': true
});