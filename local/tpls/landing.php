<?php
/** 
*------------------------------------------------------------------------------
* @package       T3 Framework for Joomla!
*------------------------------------------------------------------------------
* @copyright     Copyright (C) 2004-2013 JoomlArt.com. All Rights Reserved.
* @license       GNU General Public License version 2 or later; see LICENSE.txt
* @authors       JoomlArt, JoomlaBamboo, (contribute to this project at github 
*                & Google group to become co-author)
* @Google group: https://groups.google.com/forum/#!forum/t3fw
* @Link:         http://t3-framework.org 
*------------------------------------------------------------------------------
*/
/* Landing page 



*/

defined('_JEXEC') or die;
$app = JFactory::getApplication();
$menu = $app->getMenu();
$anchorclass = $this->params->get('Anchor class');

?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class='<jdoc:include type="pageclass" />'>

<head>
<jdoc:include type="head" />
<?php $this->loadBlock('head') ?>
</head>
<body data-spy="scroll" data-target=".navbar">

<div class="t3-wrapper"> <!-- Need this wrapper for off-canvas menu. Remove if you don't use of-canvas -->


<?php $this->loadBlock('mainnav-land') ?>
 
<?php $this->loadBlock('spot-top') ?>
<?php $this->loadBlock('navhelper') ?>
<?php $this->loadBlock('spot-bottom') ?>
<?php $this->loadBlock('footer') ?>


</div>
 <?php 
 
 if ($this->params->get('back-to-top')==="1"): ?>
<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs hidden-sm affix-top">
 
  <button class="btn btn-primary" title="Ir Arriba"><i class="fa fa-angle-up"></i></button>
 
</div>
</div>
<script type="text/javascript">
 
 (function($) {
 
 // Back to top

 $('#back-to-top').on('click', function(){

	 $('html, body').animate({scrollTop: 0}, 500);

	 return false;

 });

})(jQuery);
 
</script>
 

<?php endif;

?>



<script type="text/javascript" src="<?php echo T3_TEMPLATE_URL ?>/js/easing.js"></script>
<script type="text/javascript" src="<?php echo T3_TEMPLATE_URL ?>/js/scripts.js"></script>

<script>


(function ($) {	



$('.nav li').click(function() {
	
	$(this).siblings('li').removeClass('active'); 
	$(this).addClass('active'); });

$(document).on('click', '.t3-mainnav a', function(event) {
        var $anchor = $(this);

        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
		}, 1250, 'easeInOutExpo');

       // event.preventDefault();
    });	
	
	
    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function(){ 
            $('.navbar-toggle:visible').click();
    });


})(jQuery);

</script>

</body>
</html>