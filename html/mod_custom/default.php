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


<div class="custom<?php echo $moduleclass_sfx ?> <?php echo $params->get('module-bg-color'); ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?> >
	<?php echo $module->content;?>
   <?php if ($params->get('showimg')=='1') { ?>
   
   <img src="https://placeholdit.imgix.net/~text?txtsize=<?php echo $params->get('txtsize');?>&bg=<?php echo substr($params->get('bgcolor'),1);?>&txtclr=<?php echo substr($params->get('txtcolor'),1);?>&txt=<?php echo $params->get('txt');?>&w=<?php echo $params->get('width');?>&h=<?php echo $params->get('height');?>&txttrack=0" class="<?php echo $classe; ?>"  style="padding:15px 0;"/>
   
   <?php  } ?>
    
    
</div>
