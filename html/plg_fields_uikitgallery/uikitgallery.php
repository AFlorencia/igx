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

$allowedExtensions = array('jpg','png','gif', 'jpeg');
    // Also allow filetypes in uppercase
    $allowedExtensions = array_merge($allowedExtensions, array_map('strtoupper', $allowedExtensions));
    // Build the filter. Will return something like: "jpg|png|JPG|PNG|gif|GIF"
    $filter = implode('|',$allowedExtensions);
    $filter = "^.*\.(" . implode('|',$allowedExtensions) .")$";

$images = JFolder::files('images/' . $path, $filter);
$i = 0;
$j = 0;
$active ='';
$h = 0;

?>
  <div id="carousel-custom" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">
    <?php foreach ($images as $image) { ?>
      

     <div class="item<?php if ($i == 0) {  echo ' active'; } ?>" style="background-image:url(<?php echo JURI::base().'images/'.$path.'/'.$image; ?>); height:500px;">
  
  <a href="<?php echo JURI::base().'images/'.$path.'/'.$image; ?>" data-fancybox="gallery">
  <i class="fa fa-search" aria-hidden="false" title="Zoom"></i>
    </a> </div>
   
        <?php $i++; 
     }  ?>

    </div>
   


  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
    <i class="fa fa-chevron-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
    <i class="fa fa-chevron-right"></i>
    <span class="sr-only">Next</span>
  </a>


    <ol class="carousel-indicators visible-sm-block  visible-md-block visible-lg-block">

            <?php foreach ($images as $image) {

                $thimage = new JImage('images/' . $path . '/' . $image);
                $thimage->setThumbnailGenerate(false);
                $scale_method = JImage::CROP_RESIZE;
                $img_XS = $thimage->createThumbs('80x80', $scale_method, 'media/thumbs')[0]->getPath();
                $thumbImage = JURI::base() . $img_XS;
                ?>
                <li data-target="#carousel-custom" data-slide-to="<?php echo $h; ?>" class="th-item<?php if ($h == 0) {  echo ' active'; } ?>">
                   
     <img src="<?php echo JURI::base() . $img_XS; ?>" alt="Galeria" class="th-<?php echo $h; ?>"/>
                  
                </li>

                <?php $h++; ?>

            <?php } ?>



            </ol>

</div>



<?php
$doc = JFactory::getDocument();
$itemsWidth = floor(100 / $i) - 1;
$style = '.thumbnails-row {' .
    'grid-template-columns: repeat(auto-fill, minmax(' . $itemsWidth . '%, 1fr));' .
    'grid-gap: 5px;' .
    '}';
$doc->addStyleDeclaration($style);
?>
 
<?php /*
<script type="text/javascript">
(function($) {

$(document).ready(function(){
var itemWidth = $('.carousel-inner').width();

$('.carousel-inner .item').css('height', itemWidth);



});

$(window).resize(function() {
    $('.carousel-inner .item').css('height', itemWidth);
      
});




})(jQuery);
 </script>

 */