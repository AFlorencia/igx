<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$classe ='img';
 if ($params->get('responsive')=='1'){
     $classe ='img-responsive';
     }
?>


<div class="custom <?php echo $moduleclass_sfx ?> <?php echo $params->get('module-bg-color'); ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?> >
	<?php echo $module->content;?>
   <?php if ($params->get('showimg')=='1') { ?>
  
  
 

   <img src="https://via.placeholder.com/<?php echo $params->get('width');?>/<?php echo substr($params->get('bgcolor'),1);?>/<?php echo substr($params->get('textcolor'),1);?>?text=<?php echo $params->get('txt');?>" class="img-responsive"  style="padding:15px 0;"/>
   
   <?php  } ?>
    
    
</div>
