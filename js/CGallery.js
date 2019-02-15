 
(function($) {

    $(document).ready(function(){
    var imageHeight = $('#main-image').height();
    var newHeight = imageHeight*.8;

    $('#main-image').css('height',newHeight);
    console.log('Load'+imageHeight);
    });

    $(window).resize(function() {
        var imageHeight = $('#main-image img').height();
        console.log('Resize'+imageHeight);
    
    });


    $(document).on('click', '.image-thumbnail a', function(event) {
        var targetImg = $(this).attr('href');
        console.log(targetImg);
        $('#main-image a img').fadeTo(500,0.50, function() {                    
        $('#main-image a img').attr('src', targetImg).fadeTo(500,1);
        
             });
        event.preventDefault();         
       
    });
    
 
})(jQuery);