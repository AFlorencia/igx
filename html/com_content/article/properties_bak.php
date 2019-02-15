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
}jimport('joomla.filesystem.folder');
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
}$fbog .= '<meta property="article:section" content="'.$this->escape($this->item->category_title).'" />' ."\n";
if ($this->item->tags->itemTags != null) {
        $this->item->rawtagLayout = new JLayoutFile('joomla.content.rawtags');
        $fbog .= '<meta property="article:tag" content="'.$this->item->rawtagLayout->render($this->item->tags->itemTags).'" />' ."\n";
}$fbog .= '<meta property="og:description" content="'.$this->item->text.'">'."\n";
$doc->addCustomTag($fbog);
// update catslug if not exists - compatible with 2.5
if (empty ($this->item->catslug)) {
        $this->item->catslug = $this->item->category_alias ? ($this->item->catid.':'.$this->item->category_alias) : $this->item->catid;
}?>
<?php foreach($this->item->jcfields as $jcfield)
{
        $this->item->jcfields[$jcfield->name] = $jcfield;
}
?>
<?php JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php'); ?>
<?php foreach ($this->item->jcfields as $field) : ?>
<?php endforeach ?>
<!-- Page header -->
<?php if ($this->params->get('show_page_heading')) : ?>
<div class="page-header">
    <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
</div>
<?php endif; ?>

<!-- // Page header -->
<div class="item-detail<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
    <?php if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
        echo $this->item->pagination;
} ?>
    <!-- Article -->
    <article itemscope itemtype="http://schema.org/Article">
       
        <meta itemprop="inLanguage"
            content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
        <?php if ($params->get('show_title')) : ?>
        <?php echo JLayoutHelper::render('joomla.content.item_title', array('item' => $this->item, 'params' => $params, 'title-tag'=>'h1')); ?>
        <?php endif; ?>
        <!-- item detail-->
        <?php if (!$params->get('show_intro')) : ?>
        <?php  //Content is generated by content plugin event "onContentAfterTitle" ?>
        <?php echo $this->item->event->afterDisplayTitle; ?>
        <?php endif; ?>
        <section class="article-intro clearfix catalog-box">
            <div class="row">
                <div class="col-sm-7">
                    <div class="galeria-box">
                        <?php 
       
    
        $images = json_decode($this->item->images);
        if (empty($images->image_fulltext)) {
        } ;
        
       
        ?>



                        <?php if($this->item->jcfields['galeria']->value) {?>
                     <?php echo $this->item->jcfields['galeria']->value; ?>
                     
                        <?php } else{ ?>
                        <div class="article-image-full" id="gallery-main-image" style="">
                            <a href="<?php echo htmlspecialchars($images->image_fulltext); ?>" data-fancybox="gallery">
                                <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                    <img src="<?php echo htmlspecialchars($images->image_fulltext); ?>"
                                        alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"
                                        itemprop="url" />
                                    <meta itemprop="height" content="auto" />
                                    <meta itemprop="width" content="auto" />
                                </span></a>
                        </div>
                        <?php   }   ?>
                        <section class="article-content clearfix" itemprop="articleBody">
                            <div class="introtext-box"> <?php echo $this->item->introtext; ?></div>
                        </section>
                        <div class="bottom-icons">
                            <?php if($this->item->jcfields['ambientes']->value) {?>
                                <span class="ambientes hasTooltip" title=" <?php echo $this->item->jcfields['ambientes']->label; ?>">
                                <svg class="rs-icon">
                 <use xlink:href="../<?php echo T3Path::getUrl('images/rs-icons.svg', '', true); ?>#flat-plan">
                                </svg>
                                <?php echo $this->item->jcfields['ambientes']->value; ?>
                            </span>
                            <?php } ?>

                            <?php if($this->item->jcfields['banos']->value) {?>
                                <span class="banos hasTooltip" title=" <?php echo $this->item->jcfields['banos']->label; ?>">
                                <svg class="rs-icon">
<use xlink:href="../<?php echo T3Path::getUrl('images/rs-icons.svg', '', true); ?>#bathroom">
                                </svg>
                                <?php echo $this->item->jcfields['banos']->value; ?>
                            </span>
                            <?php } ?>


                            <?php if($this->item->jcfields['superficie']->value) {?>
                                <span class="superficie hasTooltip" title=" <?php echo $this->item->jcfields['superficie']->label; ?>">
                                <svg class="rs-icon">
<use xlink:href="../<?php echo T3Path::getUrl('images/rs-icons.svg', '', true); ?>#size">
                                </svg>
                                <?php echo $this->item->jcfields['superficie']->value; ?>
                            </span>
                            <?php } ?>

                            <?php if($this->item->jcfields['dormitorios']->value) {?>
                            <span class="dormitorios hasTooltip" title=" <?php echo $this->item->jcfields['dormitorios']->label; ?>">
                                <svg class="rs-icon">
 <use xlink:href="../<?php echo T3Path::getUrl('images/rs-icons.svg', '', true); ?>#bed">
                                </svg>
                                <?php echo $this->item->jcfields['dormitorios']->value; ?>
                            </span>
                            <?php } ?>

                        </div>
                                <div class="bottom-info">
                                <?php if($this->item->jcfields['tipo-de-propiedad']->value) {?>
                              <div class="tipo-propiedad"><?php echo $this->item->jcfields['tipo-de-propiedad']->value; ?></div>
                                <?php } ?>
                                <?php if($this->item->jcfields['ubicacion']->value) {?>
                        <div class="ubicacion-texto"><i class="fa fa-map-marker"></i> <?php echo $this->item->jcfields['ubicacion-texto']->value; ?>
                        </div>
<?php } ?>
                                </div>

                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="detalle">
                        <?php  if ($this->item->jcfields['operacion']){
               ?>
                        <div class="operacion">
                            <?php 
        if(is_array($this->item->jcfields['operacion']->rawvalue)){
                $colores = explode(',',$this->item->jcfields['operacion']->value);
                $p = 0;
                foreach ($this->item->jcfields['operacion']->rawvalue as $item) {
                     
                        echo' <div class="banner-title">'.$colores[$p].' </div>';
                      //  echo'<div class="panel-body"> '.$colores[$p].'</div>';
                        $p++;
                }	}
           ?>
                        </div>
                        <!--end colores-->
                        <?php        }           ?>
                        <?php // CAMPOS PERSONALIZADOS ?>
                        <?php if($this->item->jcfields['codigo']->value) {?>
                        <h4 class="<?php echo $this->item->jcfields['codigo']->name; ?>">
                            <?php echo $this->item->jcfields['codigo']->label; ?>:
                            <?php echo $this->item->jcfields['codigo']->value; ?></h4>
                        <?php } ?>
                        <?php if($this->item->jcfields['precio']->value) {?>
                        <h4 class="<?php echo $this->item->jcfields['precio']->name; ?>">
                            $<?php echo $this->item->jcfields['precio']->value; ?></h4>
                        <?php } ?>


                        <jdoc:include type="modules" name="ask_embed" style="none" />
                        <?php if($tparams->get('social_position') ==1 || $tparams->get('social_position')==3){ ?>
                        <div class="article-social-share top">
                            <?php echo JLayoutHelper::render('joomla.content.social_share', $this->item);  ?>
                        </div>
                        <? } ?>
                        <?php  ?>

                        <?php if($this->item->jcfields['estado']->value) {?>
            <h4 class="estado estado-<?php echo $this->item->jcfields['estado']->value; ?>">
              
                <?php //echo $this->item->jcfields['estado']->label; ?>
                <?php echo $this->item->jcfields['estado']->value; ?>

            </h4>
            <?php } ?>


                    </div>
                </div>
            </div>

        </section>
        <!-- item detail-->
        <hr />
        <section class="article-content clearfix" itemprop="articleBody">
            <h3>Descripción</h3>
            <?php echo $this->item->text; ?>
        </section>
        <?php if($this->item->jcfields['ubicacion']->value) { ?>
        <section class="map-location">
            <h3 class="<?php echo $this->item->jcfields['ubicacion']->name; ?>">
                <?php echo $this->item->jcfields['ubicacion']->label; ?></h3>
            <?php echo $this->item->jcfields['ubicacion']->value; ?>
        </section>
        <?php } ?>
        <?php if($tparams->get('social_position') ==2 || $tparams->get('social_position')==3){ ?>
        <div class="article-social-share bottom">
            <?php echo JLayoutHelper::render('joomla.content.social_share', $this->item);  ?>
        </div>
        <? } ?>
    </article>
</div>



<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
<?php echo $this->item->event->afterDisplayContent; ?>
<script>
(function($) {
    $('.detalle, .galeria-box').matchHeight();
})(jQuery);
