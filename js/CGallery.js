 
(function($) {
 
 
    $(document).on('click', '#detail-gallery li a', function(event) {
        var targetImg = $(this).attr('href');
        console.log(targetImg);


        $('#gallery-main-image img').fadeTo(500,0.50, function() {

            $('#gallery-main-image img').addClass('loading-img');
            

            $('#gallery-main-image img').attr('src', targetImg).fadeTo(500,1);
        });
 event.preventDefault(); 
        
//$('#gallery-main-image img').fadeOut('slow').attr('src', targetImg).fadeIn('slow');
       
    });
    
 
})(jQuery);