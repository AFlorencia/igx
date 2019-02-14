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
$i = "";
?>

<div class="galeria" id="detail-gallery">

<div id="main-image" class="main-image"><a href="<?php echo 'images/'.$path.'/'.$images[0]; ?>" data-fancybox="gallery">
                <img src="<?php echo 'images/'.$path.'/'.$images[0]; ?>" alt="Galeria" />
            </a>
        </div>
 <div class="thumbnails-row">
   
    <?php   foreach ($images as $image) : ?>
    <?php
$thimage = new JImage('images/'.$path.'/'.$image);
$thimage->setThumbnailGenerate(false);
$scale_method = JImage::CROP_RESIZE;
$img_XS = $thimage->createThumbs('110x110', $scale_method)[0]->getPath();
$thumbImage = JURI::base() .$img_XS;
 ?>


 
   
     
      


        <div class="image-thumbnail"><a href="<?php echo 'images/'.$path.'/'.$image; ?>" data-fancybox="gallery">
                <img src="<?php echo JURI::base() .$img_XS; ?>" alt="Galeria" />
               
            </a>
        </div>

    
        
   
     <?php $i++; ?>

    <?php endforeach; ?> 
    </div>
</div>
<?php
$doc = JFactory::getDocument();
$itemsWidth = floor(100 / $i);
$style = '.thumbnails-row {'.
'grid-template-columns: repeat(auto-fill, minmax('.$itemsWidth.'%, 1fr));'.
'grid-gap: 5px;'.
'}'; 
$doc->addStyleDeclaration($style);
?>