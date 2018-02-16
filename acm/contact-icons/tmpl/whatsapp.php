<?php 
	
?>

<div class="section-inner <?php echo $helper->get('block-extra-class'); ?>">
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

            */ ?>

    
  
  		  <?php $count= $helper->getRows('contact-info-item.contact-info-name'); ?>
  		  
  		  <?php for ($i=0; $i<$count; $i++) : ?>
           
  			<a href="https://api.whatsapp.com/send?phone=<?php echo $helper->get ('contact-info-item.contact-info-value', $i); ?>" target="_blank" title="Envianos un mensaje" class="<?php echo $helper->get('item-class'); ?>"/>
                 
                <?php if($helper->get ('contact-info-item.contact-info-icon', $i)): ?>
                        <i class="fa fa-<?php echo $helper->get ('contact-info-item.contact-info-icon', $i); ?>"></i>
                <?php endif; ?>


                <?php if($helper->get ('contact-info-item.contact-info-name', $i)): ?>
                    <span><?php echo $helper->get ('contact-info-item.contact-info-text', $i) ?></span>
                <?php endif; ?>

                <?php if($helper->get ('contact-info-item.contact-info-value', $i)): ?>
                    <span><?php echo $helper->get ('contact-info-item.contact-info-value', $i) ?></span>
                <?php endif; ?>


  		
            </a>
  	  	
  			<?php endfor; ?>
  			
  	
   
  
</div>
