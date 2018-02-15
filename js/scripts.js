// Freelancer Theme JavaScript

(function($) {
    "use strict"; // Start of use strict

    
    $(document).on('click', 't3.mainnav a', function(event) {
        var $anchor = $(this);
        $(this).parent('li').addClass('active');
      $('.t3-mainnav li').not( $(this).parent('li') ).removeClass('active');
     

        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 70)
        }, 1250, 'linear');
        event.preventDefault();
    });

   

    $('body').scrollspy({
      target: '.nav',
    offset: 70
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function(){ 
            $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
   /* $('.nav').affix({
        offset: {
            top: 100
        }
    })*/

    
 
    

})(jQuery); // End of use strict



