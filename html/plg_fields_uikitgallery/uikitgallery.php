<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Uikitgallery
 *
 * @copyright   Copyright (C) 2017 JUGN.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!$field->value || $field->value == '-1') {
    return;
}
// get the folder name in images directory
$path = $field->value;
$class = $fieldParams->get('container_class');

// read the .jpg from the selected directory
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
$filter = '.\.jpg$';
$images = JFolder::files('images/' . $path);
?>

<ul class="thumb-list">
    <?php  // var_dump($images); ?>
 <?php   foreach ($images as $image) : ?>
<?php
$thimage = new JImage('images/'.$path.'/'.$image);

//print_r(JURI::base().'images/'.$path.'/'.$image);

$thimage->setThumbnailGenerate(false);
    $scale_method = JImage::CROP_RESIZE;
$img_XS = $thimage->createThumbs('120x120', $scale_method)[0]->getPath();


 $thumbImage = JURI::base() .$img_XS;

//echo $thumbImage;
?>

<li><a href="<?php echo 'images/'.$path.'/'.$image; ?>">
<img src="<?php echo JURI::base() .$img_XS; ?>"  alt="Galeria"/>
</a>
</li>
      
           <?php //$img = JHtml::_('image', 'images/' . $path . '/' . $image, $image, array('title' => $image), false); ?>

           <?php //echo JHtml::_('link', 'images/' . $path . '/' . $img_XS, $img, array('data-uk-lightbox' => '{group:\'my-group\'}', 'title' => $image)); ?>
       
    <?php endforeach; ?>
</ul>

