<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// T3 ovrride
JHtml::addIncludePath(T3_PATH . '/html/com_content');
JHtml::addIncludePath(dirname(dirname(__FILE__)));

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);

// T3 ovrride.
$aInfo1 = ($params->get('show_publish_date') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author'));
$aInfo2 = ($params->get('show_create_date') || $params->get('show_modify_date') || $params->get('show_hits'));
$topInfo = ($aInfo1 && $info != 1) || ($aInfo2 && $info == 0);
$botInfo = ($aInfo1 && $info == 1) || ($aInfo2 && $info != 0);
$icons = !empty($this->print) || $canEdit || $params->get('show_print_icon') || $params->get('show_email_icon');


// Check if associations are implemented. If they are, define the parameter.
$assocParam = (JLanguageAssociations::isEnabled() && $params->get('show_associations'));
JHtml::_('behavior.caption');
//add facebook tags
$doc = JFactory::getDocument();
$fbog .= '<meta property="og:url" content="http://'.($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']).'"/>'."\n";
$fbog = '<meta property="og:type" content="article"/>'."\n";
$fbog .= '<meta property="og:site_name" content="AtmabHava"/>'."\n";
$fbog .= '<meta property="og:title" content="'.$this->item->title.'"/>'."\n";



//$fbog .= '<meta property="og:author" content="1112147599"/>'."\n";
$fbog .= '<meta property="og:locale" content="es_ES">'."\n";
if (isset($images->image_fulltext) && !empty($images->image_fulltext)) {
 $fbog .= '<meta property="og:image" content="'.JURI::base().$images->image_fulltext.'" />' ."\n";
/*
$fbog .='<meta property="og:image" content="http://example.com/ogp.jpg" />';
$fbog .='<meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" /> ';
$fbog .='<meta property="og:image:type" content="image/jpeg" /> ';
$fbog .='<meta property="og:image:width" content="400" /> ';
$fbog .='<meta property="og:image:height" content="300" />';
*/
}
if (isset($images->image_fulltext) && !empty($images->image_fulltext)) {
 $fbog .= '<meta property="og:image:url" content="'.JURI::base().$images->image_fulltext.'" />' ."\n";

$fbog .='<meta property="og:image" content="'.JURI::base().$images->image_fulltext.'" />';
//$fbog .='<meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" /> ';
$fbog .='<meta property="og:image:type" content="image/jpeg" /> ';
$fbog .='<meta property="og:image:width" content="400" /> ';
$fbog .='<meta property="og:image:height" content="300" />';

}
$fbog .= '<meta property="fb:admins" content="1112147599">'."\n";
$fbog .= '<meta property="article:published_time" content="'.JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC4')).'" />'."\n";
$fbog .= '<meta property="article:modified_time" content="'.JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC4')).'" />' ."\n";
if ($this->item->publish_down != '0000-00-00 00:00:00') {
 $fbog .= '<meta property="article:expiration_time" content="'.JHtml::_('date', $this->item->publish_down, JText::_('DATE_FORMAT_LC4')).'" />' ."\n";
}else{
 $fbog .= '<meta property="article:expiration_time" content="3000-01-01" />' ."\n";
}
$fbog .= '<meta property="article:section" content="'.$this->escape($this->item->category_title).'" />' ."\n";
if ($this->item->tags->itemTags != null) {
 $this->item->rawtagLayout = new JLayoutFile('joomla.content.rawtags');
 $fbog .= '<meta property="article:tag" content="'.$this->item->rawtagLayout->render($this->item->tags->itemTags).'" />' ."\n";
}
$doc->addCustomTag($fbog);
?>

<!-- Page header -->
<?php if ($this->params->get('show_page_heading')) : ?>
<div class="page-header">
	<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
</div>
<?php endif; ?>
<!-- // Page header -->

<div class="item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
	<?php if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
		echo $this->item->pagination;
	} ?>

	<!-- Article -->
	<article itemscope itemtype="http://schema.org/Article">
	  <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
		<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />

		<?php if ($params->get('show_title')) : ?>
			<?php echo JLayoutHelper::render('joomla.content.item_title', array('item' => $this->item, 'params' => $params, 'title-tag'=>'h1')); ?>
		<?php endif; ?>
		
		<?php // Content is generated by content plugin event "onContentAfterTitle" ?>
		<?php //echo $this->item->event->afterDisplayTitle; ?>

		<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
  	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam || $icons); ?>

  	<!-- Aside -->
		<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
		<aside class="article-aside clearfix">
			<?php // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block ?>
			<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>

		  <?php if ($icons): ?>
		  <?php echo JLayoutHelper::render('joomla.content.icons', array('item' => $this->item, 'params' => $params, 'print' => $this->print)); ?>
		  <?php endif; ?>
		</aside>
		<?php endif; ?>
		<!-- // Aside -->

		<?php if (isset ($this->item->toc)) :
			echo $this->item->toc;
		endif; ?>

		<!-- Item tags -->
		<?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags)) : ?>
			<?php echo JLayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
		<?php endif; ?>
		<!-- // Item tags -->

		<?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
		<?php //echo $this->item->event->beforeDisplayContent; ?>

		<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
			|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
			<?php echo $this->loadTemplate('links'); ?>
		<?php endif; ?>

		<?php if ($params->get('access-view')) : ?>
			<?php echo JLayoutHelper::render('joomla.content.full_image', $this->item); ?>

			<?php if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) :
				echo $this->item->pagination;
			endif; ?>

			<section class="article-content clearfix" itemprop="articleBody">
				<?php echo $this->item->text; ?>
			</section>

			<!-- Footer -->
			<?php if ($info == 1 || $info == 2) : ?>
				<?php if ($useDefList) : ?>
					<footer class="article-footer clearfix">
					<?php // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block ?>
					<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
					</footer>
				<?php endif; ?>
			<?php endif; ?>
			<!-- // Footer -->

			<?php if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative) :
				echo '<hr class="divider-vertical" />';
				echo $this->item->pagination; ?>
			<?php endif; ?>

			<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
				<?php echo $this->loadTemplate('links'); ?>
			<?php endif; ?>

			<?php // Optional teaser intro text for guests ?>
			<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
				<?php echo JHtml::_('content.prepare', $this->item->introtext); ?>
				
				<?php // Optional link to let them register to see the whole article. ?>
				<?php if ($params->get('show_readmore') && $this->item->fulltext != null) : ?>
					<?php $menu = JFactory::getApplication()->getMenu(); ?>
					<?php $active = $menu->getActive(); ?>
					<?php $itemId = $active->id; ?>
					<?php $link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false)); ?>
					<?php $link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language))); ?>

					<section class="readmore">
						<a href="<?php echo $link; ?>" class="register"><span>
						<?php $attribs = json_decode($this->item->attribs); ?>
						<?php
						if ($attribs->alternative_readmore == null) :
							echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
						elseif ($readmore = $attribs->alternative_readmore) :
							echo $readmore;
							if ($params->get('show_readmore_title', 0) != 0) :
								echo JHtml::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
							endif;
						elseif ($params->get('show_readmore_title', 0) == 0) :
							echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
						else :
							echo JText::_('COM_CONTENT_READ_MORE');
							echo JHtml::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
						endif; ?>
						</span></a>
					</section>
				<?php endif; ?>
			<?php endif; ?>

	</article>
	<!-- //Article -->

	<?php if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
		echo $this->item->pagination; ?>
	<?php endif; ?>

	<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
	<?php //echo $this->item->event->afterDisplayContent; ?>
</div>
