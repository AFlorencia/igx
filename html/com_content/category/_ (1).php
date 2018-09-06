<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.framework');

// Create a shortcut for params.
$params  = & $this->item->params;
$images  = json_decode($this->item->images);
$info    = $params->get('info_block_position', 2);
$aInfo1 = ($params->get('show_publish_date') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author'));
$aInfo2 = ($params->get('show_create_date') || $params->get('show_modify_date') || $params->get('show_hits'));
$topInfo = ($aInfo1 && $info != 1) || ($aInfo2 && $info == 0);
$botInfo = ($aInfo1 && $info == 1) || ($aInfo2 && $info != 0);
$icons = $params->get('access-edit') || $params->get('show_print_icon') || $params->get('show_email_icon');

// update catslug if not exists - compatible with 2.5
if (empty ($this->item->catslug)) {
  $this->item->catslug = $this->item->category_alias ? ($this->item->catid.':'.$this->item->category_alias) : $this->item->catid;
}
?>

<?php foreach($this->item->jcfields as $jcfield)
     {
          $this->item->jcfields[$jcfield->name] = $jcfield;
     }
?>

<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00' )) : ?>
<div class="system-unpublished">
<?php endif; ?>

	<!-- Article -->
	<article class="article">
  
    <?php if ($params->get('show_title')) : ?>
			<?php //echo JLayoutHelper::render('joomla.content.item_title', array('item' => $this->item, 'params' => $params, 'title-tag'=>'h2')); ?>
    <?php endif; ?>

	<?php echo $this->item->event->afterDisplayTitle; ?>


	
		<section class="article-intro clearfix">
<div class="item-pack">
<h3 class=""><?php echo $this->item->title; ?></h3>

<?php // CAMPOS PERSONALIZADOS ?>
<?php if($this->item->jcfields['temporada']->value) {?>
<h4 class="<?php echo $this->item->jcfields['temporada']->name; ?>"><?php echo $this->item->jcfields['temporada']->value; ?></h4>
<?php } ?>

<?php if($this->item->jcfields['salidas']->value) { /*?>
	<div class="<?php echo $this->item->jcfields['salidas']->name; ?>"><?php echo $this->item->jcfields['salidas']->value; ?></div>
<?php } ?>

<?php if($this->item->jcfields['transporte']->value) {?>
	<div class="<?php echo $this->item->jcfields['transporte']->name; ?>"><?php echo $this->item->jcfields['transporte']->value; ?></div>
<?php */ } ?>


<?php if($this->item->jcfields['destino']->value) {
	/*?>	
	<div class="<?php echo $this->item->jcfields['destino']->name; ?>"><?php echo $this->item->jcfields['destino']->value; ?></div>
<?php */
} ?>


<?php/* if($this->item->jcfields['estrellas']->value) { ?>	
	<div class="<?php echo $this->item->jcfields['estrellas']->name; ?>" title="<?php echo $this->item->jcfields['estrellas']->value; ?> estrellas">
<?php	
$stars =$this->item->jcfields['estrellas']->value;
for ($i = 1; $i <= $stars; $i++) {
  //  echo '<i class="fa fa-star" aria-speak="none"></i>';
}  
?>
		
</div>
<?php } */?>


<?php if($this->item->jcfields['estadia']->value) {?>	
	<div class="<?php echo $this->item->jcfields['estadia']->name; ?>"><?php echo $this->item->jcfields['estadia']->value; ?></div>
<?php } ?>


<?php if($this->item->jcfields['traslados']->value) {?>	
	<div class="<?php echo $this->item->jcfields['traslados']->name; ?>"><strong><?php echo $this->item->jcfields['traslados']->label; ?>: </strong><?php echo $this->item->jcfields['traslados']->value; ?></div>
<?php } ?>

<?php if($this->item->jcfields['hotel']->value) {?>	
	<div class="<?php echo $this->item->jcfields['hotel']->name; ?>"><?php echo $this->item->jcfields['hotel']->value; ?></div>
<?php } ?>

<?php if($this->item->jcfields['adicional-1']->value) {?>	
	<div class="<?php echo $this->item->jcfields['adicional-1']->name; ?>"><?php echo $this->item->jcfields['adicional-1']->value; ?></div>
<?php } ?>

<?php if($this->item->jcfields['adicional-2']->value) {?>	
	<div class="<?php echo $this->item->jcfields['adicional-2']->name; ?>"><?php echo $this->item->jcfields['adicional-2']->value; ?></div>
<?php } ?>
	
<?php if($this->item->jcfields['adicional-3']->value) {?>	
	<div class="<?php echo $this->item->jcfields['adicional-3']->name; ?>"><?php echo $this->item->jcfields['adicional-3']->value; ?></div>
<?php } ?>




		
<?php if($this->item->jcfields['adicional-personas']->value) {?>	
	<div class="<?php echo $this->item->jcfields['adicional-personas']->name; ?>"><?php echo $this->item->jcfields['adicional-personas']->value; ?></div>
<?php } ?>
		

<?php if($this->item->jcfields['formas-de-pago']->value) {?>	
	<div class="<?php echo $this->item->jcfields['formas-de-pago']->name; ?>"><?php echo $this->item->jcfields['formas-de-pago']->value; ?></div>
<?php } ?>

<?php if($this->item->jcfields['planes']->value) {?>	
	<div class="<?php echo $this->item->jcfields['planes']->name; ?>"><?php echo $this->item->jcfields['planes']->value; ?></div>
<?php } ?>


<?php if($this->item->jcfields['precio']->value) {?>	
	<div class="<?php echo $this->item->jcfields['precio']->name; ?>"><?php echo $this->item->jcfields['precio']->value; ?></div>
<?php } ?>


<?php if($this->item->jcfields['precio-contado']->value) {?>	
	<div class="<?php echo $this->item->jcfields['precio-contado']->name; ?>"><?php echo $this->item->jcfields['precio-contado']->value; ?></div>
<?php } ?>


		

<div class="icons clearfix">
<?php  if ($this->item->jcfields['iconos']->rawvalue){

	foreach ($this->item->jcfields['iconos']->rawvalue as $item) {

	echo '<div  class="icon-'.$item.'"><i class="'.$item.'"></i></div>';	
	}
} ?>
</div>
			<?php echo $this->item->event->beforeDisplayContent; ?>

			<?php echo JLayoutHelper::render('joomla.content.image', $this->item); ?>

			<?php echo $this->item->introtext; ?>
</div>
		</section>

    <!-- footer -->
    <?php if ($botInfo) : ?>
    <footer class="article-footer clearfix">
      <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
    </footer>
    <?php endif; ?>
    <!-- //footer -->


		<?php if ($params->get('show_readmore') && $this->item->readmore) :
			if ($params->get('access-view')) :
				$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
			else :
				$menu      = JFactory::getApplication()->getMenu();
				$active    = $menu->getActive();
				$itemId    = $active->id;
				$link1     = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
				$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
				$link      = new JURI($link1);
				$link->setVar('return', base64_encode($returnURL));
			endif;
			?>
			<section class="readmore">
				<a class="btn btn-default" href="<?php echo $link; ?>">
					<span>
					<?php if (!$params->get('access-view')) :
						echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
					elseif ($readmore = $this->item->alternative_readmore) :
						echo $readmore;
						if ($params->get('show_readmore_title', 0) != 0) :
							echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
						endif;
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
					else :
						echo JText::_('COM_CONTENT_READ_MORE');
						echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
					endif; ?>
					</span>
				</a>
			</section>
		<?php endif; ?>

	</article>
	<!-- //Article -->

<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate())) : ?>
</div>
<?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?> 
