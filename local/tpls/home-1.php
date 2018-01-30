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


defined('_JEXEC') or die;
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"
	  class='<jdoc:include type="pageclass" />'>

<head>
	<jdoc:include type="head" />
	<?php $this->loadBlock('head') ?>
</head>

<body>

<div class="t3-wrapper"> <!-- Need this wrapper for off-canvas menu. Remove if you don't use of-canvas -->

  <?php $this->loadBlock('header-sticky') ?>

  <?php $this->loadBlock('mainnav') ?>
    <?php $this->loadBlock('spotlight-1') ?>
	<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
if ($menu->getActive() != $menu->getDefault()) {
	 $this->loadBlock('mainbody-content-left') ;
}
?>
<jdoc:include type="modules" name="full-width" style="fullSpot" />
<jdoc:include type="modules" name="spot-1" style="spot" />


  <jdoc:include type="modules" name="full-width2" style="fullSpot" />
<jdoc:include type="modules" name="spot-2" style="spot" />
  <?php $this->loadBlock('spotlight-2') ?>

  <jdoc:include type="modules" name="full-width3" style="fullSpot" />
<jdoc:include type="modules" name="spot-3" style="spot" />
<jdoc:include type="modules" name="spot-4" style="spot" />
<jdoc:include type="modules" name="spot-5" style="spot" />
<jdoc:include type="modules" name="spot-6" style="spot" />
  <?php $this->loadBlock('spotlight-3') ?>
  
  <?php $this->loadBlock('navhelper') ?>
<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs hidden-sm affix-top">
 
  <button class="btn btn-primary" title="Ir Arriba"><i class="fa fa-angle-up"></i></button>
 
</div>
  <?php $this->loadBlock('footer') ?>
<?php include('scripts.php') ?>

</div>

</body>

</html>