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

    
        // $sections incleudes all of the container divs that relate to menu items.
        var $sections = $('.container');
        
        // The user scrolls
        $(window).scroll(function(){
          
          // currentScroll is the number of pixels the window has been scrolled
          var currentScroll = $(this).scrollTop();
          
          // $currentSection is somewhere to place the section we must be looking at
          var $currentSection
          
          // We check the position of each of the divs compared to the windows scroll positon
          $sections.each(function(){
            // divPosition is the position down the page in px of the current section we are testing      
            var divPosition = $(this).offset().top;
            
            // If the divPosition is less the the currentScroll position the div we are testing has moved above the window edge.
            // the -1 is so that it includes the div 1px before the div leave the top of the window.
            if( divPosition - 1 < currentScroll ){
              // We have either read the section or are currently reading the section so we'll call it our current section
              $currentSection = $(this);
              
              // If the next div has also been read or we are currently reading it we will overwrite this value again. This will leave us with the LAST div that passed.
            }
            
            // This is the bit of code that uses the currentSection as its source of ID
            var id = $currentSection.attr('id');
              $('a').removeClass('active');
              $("[href=#"+id+"]").parent('li').addClass('active');
            
          })
      
        });
    

})(jQuery); // End of use strict



