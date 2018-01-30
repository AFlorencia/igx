<?php
/*
# ------------------------------------------------------------------------
# Bootstrap Carousel for  Content for Joomla 3
# ------------------------------------------------------------------------
# Copyright(C) 2016 www.intergraphix.com.ar. All Rights Reserved.
# @license http://www.gnu.org/licenseses/gpl-3.0.html GNU/GPL
# Author: http://intergraphix.com.ar

# ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$doc = JFactory::getDocument();

$doc->addStyleSheet('templates/t3_bs3_blank/local/html/mod_articles_category/style.css');

$timthumb = JURI::base().'templates/t3_bs3_blank/local/html/mod_articles_category/libs/timthumb.php?a=c&q=99&z=0';

?>

<?php 	$cant = count($list); 	?>

<div id="mod-carousel-<?php echo $module->id; ?>" class="carousel slide mod-carousel" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<?php for ($p = 0; $p < $cant; $p++){ ?>
	<li data-target="#mod-carousel-<?php echo $module->id; ?>" data-slide-to="<?php echo $p; ?>" class="active"> </li> 
	<?php } ?>

</ol> <!-- Wrapper for slides --> 

<div class="carousel-inner"> 

<?php
$i = 0;

foreach ($list as $key => $item) :
$title 	= $item->title;
$link   = $item->link;
$images = json_decode($item->images);

$category 	 = $item->displayCategoryTitle;
$hits  		 = $item->displayHits;
$description = $item->displayIntrotext;
$created   	 = $item->displayDate;
$resizeImage = 1;
$image = $images->image_fulltext;
$image = (empty($image)) ? $images->image_intro : $image;
$imageWidth = '600px';
$imageHeight = 'auto';
			if(!empty($image)) {
					$image = (strpos($image, 'http://') === FALSE) ? JURI::base() . $image : $image;
				}
				
				$bigImage = ($resizeImage) ? $timthumb . '&w=' . $imageWidth . '&h=' . $imageHeight . '&src=' . $image : $image;
				





?>

<?php  if($i==0){ ?>
	<div class="item active ite-cur-0">
	<?php }   else { ?>
	<div class="item ite-cur-<?php echo $i; ?>">
	<?php	  }		   ?>

<div class="row">
<div class="col-xs-12">
<div class="thumbnail adjust1">
<div class="col-md-4 col-sm-4 col-xs-12">
<img class="media-object img-rounded img-responsive" src="<?php echo $bigImage; ?>"> 
</div> 
<div class="col-md-8 col-sm-8 col-xs-12"> 
<div class="caption">

		<?php if ($params->get('link_titles') == 1) : ?>
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<h1>	<?php echo $item->title; ?></h1>
							</a>
						<?php else : ?>
							<h1><?php echo $item->title; ?></h1>
						<?php endif; ?>






<!-- Info Block -->

<?php if ($item->displayDate) : ?>
<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
<?php endif; ?>

<?php if ($item->displayCategoryTitle) : ?>
<span><?php echo $item->displayCategoryTitle; ?></span>
<?php endif; ?>



<!-- Intro text Block -->
<?php if ($params->get('show_introtext')) : ?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>

<!-- Readmore Block -->
	<?php if ($params->get('show_readmore')) : ?>
<div class="readmore">
<a class="btn btn-primary" href="<?php echo $item->link; ?>" title="<?php echo $title; ?>">
<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
</a>
</div>
<?php endif; ?>


</div> 
</div> 
</div> 
</div> 
</div> 
</div>
<?php 	$i++; 	endforeach; ?>


</div> <!-- Controls --> <a class="left carousel-control" href="#mod-carousel-<?php echo $module->id; ?>" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left">
</span> 
</a> <a class="right carousel-control" href="#mod-carousel-<?php echo $module->id; ?>" data-slide="next"> <span class="glyphicon glyphicon-chevron-right">
</span> 
</a> 
</div>