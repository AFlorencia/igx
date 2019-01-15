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

 <?php  if($this->params->get('preload')==1){ ?>
 <style>
div#preloader {
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: <?php echo $this->params->get('preloadcolor'); ?>;
    position: absolute;
    background: <?php echo $this->params->get('preloadbgcolor'); ?>;
    z-index: 99999;
    top: 0;
}
.svg-path{
}
@media(max-width: 480px){
    #preloader svg{
 
    overflow: visible;
    transform: scale(0.5);
}
}
.preloadme {
  
}
body.loading {
    padding: 0;
    overflow: hidden;
}
.svg-icon {
	-webkit-animation: rotate-center 1.2s linear infinite both;
	        animation: rotate-center 1.2s linear infinite both;
}
@-webkit-keyframes rotate-center {
  0% {
    -webkit-transform: rotate(0);
            transform: rotate(0);
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@keyframes rotate-center {
  0% {
    -webkit-transform: rotate(0);
            transform: rotate(0);
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
<?php
 if($this->params->get('preloadcss')==1){ 
//echo '<style>';
echo $this->params->get('preloadcss');
//echo '</style>';
 }
 ?>

</style>
<? } ?>

</head>
<body data-spy="scroll" data-target=".navbar" class="loading">
 <?php  if ($this->params->get('preload')==1){ ?>
<div id="preloader">
  <?php $this->loadBlock('preload'); ?>
</div>
 <?php } ?>
<div class="t3-wrapper"> <!-- Need this wrapper for off-canvas menu. Remove if you don't use of-canvas -->

<?php $this->loadBlock('mainnav-land') ?>
 
<?php $this->loadBlock('spot-top') ?>
<?php $this->loadBlock('navhelper') ?>
<?php $this->loadBlock('spot-bottom') ?>
<?php	$this->loadBlock('mainbody-content-left');?>
<?php $this->loadBlock('footer') ?>

</div>
<?php
$delay = $this->params->get('preloadtime') - 100;
if ($this->params->get('preload')==="1"){ 
  
  
  ?>
<script type="text/javascript">
jQuery(window).on('load', function() { // makes sure the whole site is loaded 
  
  jQuery('#preloader').delay(<?php echo $delay; ?>).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  jQuery('body').delay(<?php echo $this->params->get('preloadtime'); ?>).css({'overflow':'visible'});
 

  jQuery('.preloadme').fadeIn();
  jQuery('body').removeClass('loading');
 
});
</script>
<?php } ?>
 <?php  if ($this->params->get('back-to-top')=="1") { ?>
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
<?php  } ?>

<script>

(function ($) {	

$('.nav li').click(function() {
	
	$(this).siblings('li').removeClass('active'); 
	$(this).addClass('active'); });
$(document).on('click', '.t3-mainnav a, .f-item a', function(event) {
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
<?php 
$doc = JFactory::getDocument();
if($this->params->get('easing')==1){
	$doc->addScript (T3_TEMPLATE_URL.'/js/easing.js');
}
if($this->params->get('aos')==1){
	$doc->addScript (T3_TEMPLATE_URL.'/js/aos.js');
	echo'<script>';
echo 'AOS.init();';
echo '</script>';
	}
?>
</body>
</html>
