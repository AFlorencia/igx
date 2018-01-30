<script type="text/javascript">

  jQuery(document).ready(function() {

  jQuery(window).scroll(function () {
  
  //if(jQuery(window).width()>769){
   	if(jQuery(document).scrollTop() > 0){
	 jQuery('#t3-mainnav').addClass('navbar-fixed-top');
	 
jQuery('.logo-small-top').show();   
// }

jQuery('.navbar-header .small-site-slogan').css('display','block') ;
	
    }
	
   else{
	
      jQuery('#t3-mainnav').removeClass('navbar-fixed-top');
	  jQuery('.logo-small-top').hide();
	  jQuery('.navbar-header .small-site-slogan').hide() ;
    }
 
 
 
  });
  
});

 jQuery(window).scroll(function () {
	 
  //if(jQuery(window).width()>769){
   	if(jQuery(document).scrollTop() > 0){
	 jQuery('.nav-sticky').addClass('navbar-fixed-top');
	 
jQuery('.logo-small-top').show();   
// }

jQuery('.navbar-header .small-site-slogan').css('display','block') ;
	
    }
	
   else{
	
      jQuery('.nav-sticky').removeClass('navbar-fixed-top');
	  jQuery('.logo-small-top').hide();
	  
    }
 
 
 
  }); // END STICKY NAV
  
});

(function($) {
 
	// Back to top
 
	jQuery('#back-to-top').on('click', function(){
 
		jQuery("html, body").animate({scrollTop: 0}, 500);
 
		return false;
 
	});
 
})(jQuery);


</script>
