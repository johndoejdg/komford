// JavaScript Document

/*

Author - WPTitans
Description - Main file for Javascript stuff for the theme. Powered by jQuery.

Index :-

1. Global Preloader
2. Global rountines
3. Code to be executed before DOM loads
4. Main Code

*/






jQuery(document).ready(function($) {
      // 1) Всплывают при наведении курсора:
      $('.icons').tooltip({
        trigger: "hover",
        selector: "a[data-toggle=tooltip]"
      })
	 })
	
 

  

 <!--
        $(window).load(function(){
        var touch 	= $('#touch-menu');
	var menu 	= $('.menu');
 
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
			
			
			
           
        });







