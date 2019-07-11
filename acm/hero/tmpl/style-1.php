<?php
  $heroStyle      = $helper->get('hero-style');
  $heroTextPos    = $helper->get('hero-content-position');
  $heroTextAlign  = $helper->get('hero-text-align');
  $heroHeading    = $helper->get('hero-heading');
  $heroIntro      = $helper->get('hero-intro');
  $btnFirstText   = $helper->get('hero-btn1-text');
  $btnFirstLink   = $helper->get('hero-btn1-link');
  $btnSecondText  = $helper->get('hero-btn2-text');
  $btnSecondLink  = $helper->get('hero-btn2-link');
  $heroBg         = $helper->get('hero-bg');
  $heroBgSmall    = $helper->get('hero-bg-small');
  $heroScreen			= $helper->get('hero-screen');
  

  $doc = JFactory::getDocument();

  $styles = '#hero-'.$module->id.' .acm-hero{'; 
  $styles .= 'background-image: url('.trim($heroBg).');}';
  $styles .= '@media(max-width:768px) and (orientation:portrait){';
  $styles .= '#hero-'.$module->id.' .acm-hero{';
  $styles .= 'background-image: url('.trim($heroBgSmall).');}';
  $styles .= '}';
  $doc->addStyleDeclaration($styles);
//echo $styles;


  ?>


<div class="section-inner <?php echo $helper->get('block-extra-class'); ?>" id="hero-<?php echo$module->id; ?>">
  <div class="acm-hero <?php echo ($heroStyle .' '. $heroTextPos. ' '. $heroTextAlign.' '. $heroScreen); ?> <?php if( trim($heroHeading) ) echo ' show-intro'; ?>">
    <div class="container">
      <div class="hero-content<?php echo $helper->get('hero-effect'); ?>">
      
        <?php if( trim($heroHeading)) : ?>
        <div class="hero-heading">
          <?php echo $heroHeading; ?>
        </div>
        <?php endif; ?>
        
        <?php if( trim($heroIntro)) : ?>
        <div class="hero-intro">
          <?php echo $heroIntro; ?>
        </div>
        <?php endif; ?>
        
        <?php if( trim($btnFirstText) || trim($btnSecondText) ) : ?>
        <div class="hero-btn-actions">
  			<?php if( trim($btnFirstText)): ?>
          <a href="<?php echo trim($btnFirstLink); ?>" title="<?php echo trim($btnFirstText); ?>" class="btn btn-primary btn-rounded"><?php echo trim($btnFirstText); ?></a>
  				<?php endif; ?>
  				
  				<?php if( trim($btnSecondLink)) :?>
          <a href="<?php echo trim($btnSecondLink); ?>" title="<?php echo trim($btnSecondText); ?>" class="btn btn-rounded btn-border"><?php echo trim($btnSecondText); ?></a>
  				<?php endif; ?>	
        </div>
        <?php endif; ?>
      </div>
  
    </div>
  </div>
</div>