<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.framework');
// Create a shortcut for params.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);
$aInfo1 = ($params->get('show_publish_date') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author'));
$aInfo2 = ($params->get('show_create_date') || $params->get('show_modify_date') || $params->get('show_hits'));
$topInfo = ($aInfo1 && $info != 1) || ($aInfo2 && $info == 0);
$botInfo = ($aInfo1 && $info == 1) || ($aInfo2 && $info != 0);
$icons = $params->get('access-edit') || $params->get('show_print_icon') || $params->get('show_email_icon');


$app = JFactory::getApplication();
$templateparams = $app->getTemplate(true)->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');

// Create shortcut to parameters.
$params = $this->item->params;



$doc = JFactory::getDocument();





$sitename = $app->getCfg('sitename');
$fbog = '<meta property="og:type" content="article"/>'."\n";
$fbog .= '<meta property="og:site_name" content="'.$sitename.'"/>'."\n";
$fbog .= '<meta property="og:title" content="'.$this->item->title.'"/>'."\n";
//$fbog .= '<meta property="og:description" content="'.$this->item->text.'"/>'."\n";
$fbog .= '<meta property="og:url" content="https://'.($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']).'"/>'."\n";
//$fbog .= '<meta property="og:author" content="1112147599"/>'."\n";
$fbog .= '<meta property="og:locale" content="es_ES">'."\n";
///////////////////////// start image
$tparams = JFactory::getApplication()->getTemplate(true)->params;
$images = json_decode($this->item->images);
$image_default = JURI::base().'/images/default.jpg';
 
//$item->image = $images->image_intro;
if($images->image_intro){
  $img = $images->image_intro;
}else{
  if($images->image_fulltext){
    $img = $image->image_fulltext;
  }
  else{
    $img = $image_default;
  }
}
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
$image = new JImage($img);
$image->setThumbnailGenerate(false);
$scale_method = JImage::CROP_RESIZE;
$img_XS = $image->createThumbs('600x600', $scale_method)[0]->getPath();
$thumbImage = JURI::base() .$img_XS;
$fbog .= '<meta property="og:image:url" content="'.$thumbImage.'" />' ."\n";
$fbog .='<meta property="og:image" content="'.$thumbImage.'" />';
//$fbog .='<meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" /> ';
$fbog .='<meta property="og:image:type" content="image/jpeg" /> ';
$fbog .='<meta property="og:image:width" content="300" /> ';
$fbog .='<meta property="og:image:height" content="300" />';
///////////////////// end image
$fbog .= '<meta property="fb:app_id" content="'.$tparams->get('fbid').'">'."\n";
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
$fbog .= '<meta property="og:description" content="'.$this->item->text.'">'."\n";
$doc->addCustomTag($fbog);
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
<?php JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php'); ?>
<?php foreach ($this->item->jcfields as $field) : ?>
<?php //echo FieldsHelper::render($field->context, 'field.render', array('field' => $field)); ?>
<?php endforeach ?>
    <!-- Article -->
    <article>
        <div class="item-detail">
            <?php if ($params->get('show_title')) : ?>
            <?php echo JLayoutHelper::render('joomla.content.item_title', array('item' => $this->item, 'params' => $params, 'title-tag'=>'h2')); ?>
            <?php //echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
            <?php endif; ?>
<?php if($tparams->get('social_position') ==1 || $tparams->get('social_position')==3){ ?>
  <div class="article-social-share top">
<?php echo JLayoutHelper::render('joomla.content.social_share', $this->item);  ?>
</div>
<? } ?>
            <?php if (!$params->get('show_intro')) : ?>
            <?php // Content is generated by content plugin event "onContentAfterTitle" ?>
            <?php //echo $this->item->event->afterDisplayTitle; ?>
            <?php endif; ?>
            <!-- Aside -->
            <?php if ($topInfo || $icons) : ?>
            <aside class="article-aside clearfix">
                <?php if ($topInfo): ?>
                <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
                <?php endif; ?>
            
            </aside>
            <?php endif; ?>
            <!-- //Aside -->
            <section class="article-intro clearfix">
                <?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
                <?php echo $this->item->event->beforeDisplayContent; ?>
                <div class="row">
                    <div class="col-sm-5">
                        <?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
                    </div>
                    <div class="col-sm-7">
                        <?php // CAMPOS PERSONALIZADOS ?>
                        <?php 
 $user    = JFactory::getUser();
 if($user->get('guest')){
  echo '&nbsp;<a href="index.php?option=com_users&view=registration" class="btn btn-registro"><b>Precio:</b>&nbsp;'.JText::_('COM_CONTENT_REGISTER_TO_READ_MORE').'</a>';
  
 } else{
if($this->item->jcfields['precio']->value) { ?>
                        <h4 class="<?php echo $this->item->jcfields['precio']->name; ?>">$&nbsp;
                            <?php echo $this->item->jcfields['precio']->value; ?>
                        </h4>
                        <?php } 
 }
?>
                        <div class="text-detail">
                            <?php echo $this->item->text; ?>
                        </div>
                        <jdoc:include type="modules" name="consultas" style="none" />
                    </div>
                    <?php //echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
                </div>
                <hr />
               
        </div>
        
    


        <?php if($tparams->get('social_position') ==2 || $tparams->get('social_position')==3){ ?>
  <div class="article-social-share bottom">
<?php echo JLayoutHelper::render('joomla.content.social_share', $this->item);  ?>
</div>
<? } ?>
    </article>
 
<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
<?php //echo $this->item->event->afterDisplayContent; ?>
