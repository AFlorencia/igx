<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$class = ' first';
$lang	= JFactory::getLanguage();
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.framework');
$cols = $this->params->get('cols');
$i = 0;
if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) :
?>

<div class="grid-box <?php echo $this->parent->alias; ?>">
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		
		?>	
		<?php  $total = count($this->items[$this->parent->id]); ?>
		<?php //	if ($i%$cols==0) echo '<div class="row">'; ?>
	
	
			<div class="grid-item item">

		<div class="category-item<?php echo $class; ?> item_<?php echo $i; ?>">
		<?php $class = ''; ?>
	
			<?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>



			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language)); ?>" class="img-link">
<?php

if (@getimagesize(JURI::base().$item->getParams()->get('image'))) {
$img_path = $item->getParams()->get('image');
}else{
    $img_path = 'images/no-image.png';
}




$thimage = new JImage($img_path);
$thimage->setThumbnailGenerate(false);
$scale_method = JImage::SCALE_INSIDE;
$img_XS = $thimage->createThumbs('500X500', $scale_method)[0]->getPath();
$thumbImage = JURI::base() .$img_XS;


?>
	<?php /*		<img src="<?php echo $imgTh; ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>" /> */ ?>
			<img src="<?php echo $thumbImage; ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>" />
			
			</a>
			<?php endif; ?>


				<h3 class="page-header item-title">
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language)); ?>">
				<?php echo $this->escape($item->title); ?></a></h3>

		</div>
		</div>
		<?php //if ( ($i%$cols==($cols-1)) || $i==($total-1) )  echo '</div>'; ?>
		
		<?php endif; ?>
	<?php $i++; endforeach; ?>
		</div>
<?php endif; ?>


