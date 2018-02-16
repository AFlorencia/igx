<?php 
	
?>

<div class="<?php echo $helper->get('block-extra-class'); ?>">
	<?php if($module->showtitle || $helper->get('block-intro')): ?>
	<h3 class="section-title ">
		<?php if($module->showtitle): ?>
			<span><?php echo $module->title ?></span>
		<?php endif; ?>
		<?php if($helper->get('block-intro')): ?>
			<p><?php echo $helper->get('block-intro'); ?></p>
		<?php endif; ?>	
	</h3>
	<?php endif; ?>
    
 <!--end intro-->
  
     <?php /*
            
contact-info-name
contact-info-icon 
contact-info-text 
contact-info-value
    item-size
    item-style
    item-bg-color
	item-color
	item-link-color
			*/ ?>

			<?php 
			if($helper->get('item-size')) {

				$size = 'font-size:'.$helper->get('item-size').'em;line-height:'.$helper->get('item-size')/1.6666.'em; width:'.$helper->get('item-size')/1.6666.'em;';
			}else{
					$size = 'font-size:inherit;';
			}

			if($helper->get('item-bg-color')) {

				$bgcolor = 'background-color:'.$helper->get('item-bg-color').';';
			}else{
					$bgcolor = 'background-color:inherit;';
			}

			if($helper->get('item-color')) {

				$color = 'color:'.$helper->get('item-color').';';
			}else{
					$color = 'color:inherit;';
			}


$style = $size.$bgcolor.$color;
			?>	

		
  
  		  <?php $count= $helper->getRows('contact-info-item.contact-info-name'); ?>
  		  
  		  <?php for ($i=0; $i<$count; $i++) : ?>
           
  			<a href="https://api.whatsapp.com/send?phone=<?php echo $helper->get ('contact-info-item.contact-info-value', $i); ?>" target="_blank" title="Envianos un mensaje" class="social-btn <?php echo $helper->get('item-style'); ?>" style="<?php echo $style;?>"/>
                 
                <?php if($helper->get ('contact-info-item.contact-info-icon', $i)): ?>
                        <i class="fa fa-<?php echo $helper->get ('contact-info-item.contact-info-icon', $i); ?> <?php echo $helper->get('icon-style'); ?>"></i>
                <?php endif; ?>
                          		
            </a>
  	  	  <?php if($helper->get ('contact-info-item.contact-info-text', $i)): ?>
                    <span style="<?php echo $size; ?>"><?php echo $helper->get ('contact-info-item.contact-info-text', $i) ?></span>
                <?php endif; ?>  
  			<?php endfor; ?>
  			
  	
   
  
</div>
