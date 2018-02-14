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
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class='<jdoc:include type="pageclass" />'>

<head>
<jdoc:include type="head" />
<?php $this->loadBlock('head') ?>
</head>

<body>

<div class="t3-wrapper"> <!-- Need this wrapper for off-canvas menu. Remove if you don't use of-canvas -->
<div class="containerall main-wrapper">

 
 
  <?php $this->loadBlock('mainnav-land') ?>
 


<?php $this->loadBlock('navhelper') ?>
<?php $this->loadBlock('slider') ?>
<?php $this->loadBlock('slider-box') ?>
<?php $this->loadBlock('spotlight-1') ?>
<?php $this->loadBlock('spotlight-2') ?>
<?php $this->loadBlock('spotlight-3') ?>
<?php $this->loadBlock('home') ?>
<?php $this->loadBlock('home-full') ?>
<?php	$this->loadBlock('mainbody-content-left');?>


<?php $this->loadBlock('spotlight-4') ?>
<?php $this->loadBlock('spotlight-5') ?>
<?php $this->loadBlock('spotlight-6') ?>
<?php $this->loadBlock('footer') ?>

</div>
 <?php if ($this->params->get('back-to-top')==="1"): ?>
<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs hidden-sm affix-top">
 
  <button class="btn btn-primary" title="Ir Arriba"><i class="fa fa-angle-up"></i></button>
 
</div>
<script type="text/javascript">
 
(function($) {
 
	// Back to top
 
	$('#back-to-top').on('click', function(){
 
		$("html, body").animate({scrollTop: 0}, 500);
 
		return false;
 
	});
 
})(jQuery);
 
</script>
 

<?php endif;?>

<?php if ($this->params->get('headertype')=="sticky"){ ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
	jQuery(window).scroll(function () {	 

   	if(jQuery(document).scrollTop() > 0){
	 jQuery('.t3-mainnav').addClass('navbar-fixed-top');	 
	jQuery('.logo-small-top').show();   
	
    }
	
   else{
	
      jQuery('.t3-mainnav').removeClass('navbar-fixed-top');
	  jQuery('.logo-small-top').hide();	  
    } 
 
 
  }); // END STICKY NAV
  
});

</script>
<?php } ?>
<script>
(function ($) {
    $(document).ready(function(){
    
   $('.owl-item .spacer').matchHeight();
      });
    
     
	})(jQuery); 
	</script>
</body>
</html>