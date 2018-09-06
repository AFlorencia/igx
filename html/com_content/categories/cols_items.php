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
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		
		?>	
		<?php  $total = count($this->items[$this->parent->id]); ?>
		<?php 	if ($i%$cols==0) echo '<div class="row">'; ?>
	
	
			<div class="col-md-<?php echo 12/$cols;?> col-xs-6">

		<div class="category-item<?php echo $class; ?> item_<?php echo $i; ?>">
		<?php $class = ''; ?>
		
			<?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>			
			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language)); ?>" class="img-link">
<?php
// RESIZE IMAGE TO THUMBNAIL

$img_path = $item->getParams()->get('image');

$image = new JImage($img_path);
$image->setThumbnailGenerate(false);
$scale_method = JImage::SCALE_INSIDE;


$imgTh = $image->createThumbs('360x360', $scale_method)[0]->getPath();
//$imgTh = $image->crop('100','100','50','50', true);
// PARAMS TO GET IMAGE DIMENSIONS AND FILENAME

$properties = JImage::getImageFileProperties($item->getParams()->get('image'));
$height = $properties->height;
$width = $properties->width;
$rH = 100;
$rW = 100;
$lC = round($width/2); // Desde el centro X
$bC = $height;
$quality = 60;

?>
	<?php /*		<img src="<?php echo $imgTh; ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>" /> */ ?>
			<img src="<?php echo $item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>" />
			
			</a><?php endif; ?>


				<h3 class="page-header item-title">
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language)); ?>">
				<?php echo $this->escape($item->title); ?></a></h3>

		</div>
		</div>
		<?php if ( ($i%$cols==($cols-1)) || $i==($total-1) )  echo '</div>'; ?>
		
		<?php endif; ?>
	<?php $i++; endforeach; ?>
<?php endif; ?>
