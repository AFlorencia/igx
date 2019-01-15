<?php 
$featuresImg 				= $helper->get('block-bg');
$fullWidth = $helper->get('full-width');
$featuresBackground  = 'background-image: url("'.$featuresImg.'"); background-repeat: no-repeat; background-size: cover; background-position: center center;';
$count      = $helper->getRows('data.title');
$col        = $helper->get('columns');

$aos ='';
if($helper->get('animate')==1){
$aos = ' data-aos="'.$helper->get('animations').'" data-aos-easing="'.$helper->get('easing').'"';
}
?>
<div class="acm-features <?php echo $helper->get('features-style'); ?> style-1">

<?php if($helper->get('features-description')) : ?>
<h2 class="features-description"><?php echo $helper->get('features-description'); ?></h2>
<?php endif ; ?>
<div class="flex-row">
<?php
$doc = JFactory::getDocument();
// Add styles
$gridGap = "";
$colWidth = "";
$cols = $helper->get('columns');
$gap =$helper->get('gap');

$gridGap = $gap * $cols;
$colWidth = (1140 - $gridGap) / $cols;
$style = '.flex-row {'.
         'grid-template-columns: repeat(auto-fill, minmax('.$colWidth.'px, 1fr));'.
         'grid-gap: '.$gap.'px;'.
           '}'; 
$doc->addStyleDeclaration($style);
?>
<?php

for ($i=0; $i < $count; $i++) :

?>

<div class="features-item"<?php echo $aos; ?>>

<?php if($helper->get('data.title', $i)) : ?>
<h3>
<?php if($helper->get('data.link', $i))	{ ?>
        <a href="<?php echo $helper->get('data.link', $i) ?>"><?php echo $helper->get('data.title', $i) ?></a>
        <?php } else{ ?>
        <?php echo $helper->get('data.title', $i) ?>
        <?php } ?>
</h3>
<?php endif ; ?>


<?php if($helper->get('data.img-icon', $i)) : ?>
						<div class="img-icon">
							<img src="<?php echo $helper->get('data.img-icon', $i) ?>" alt="" />
						</div>
                    <?php endif ; ?>
                    
<?php if($helper->get('data.font-icon', $i)) : ?>
<div class="font-icon">
<?php if($helper->get('data.link', $i))	{ ?><a href="<?php echo $helper->get('data.link', $i) ?>">
        
        <svg class="icon">
        <use xlink:href="images/sprites.svg#<?php echo $helper->get('data.font-icon', $i) ?>" />
        </svg>
        </a>
        <?php }  else{ ?>
        <svg class="icon">
        <use xlink:href="images/sprites.svg#<?php echo $helper->get('data.font-icon', $i) ?>" />
        </svg>
        <?php } ?>
</div>
<?php endif ; ?>

<?php if($helper->get('data.description', $i)) : ?>
<p><?php echo $helper->get('data.description', $i) ?></p>
<?php endif ; ?>
</div>
<?php  if ( ($i%$col==($col-1)) || $i==($count-1) )  echo '</div>'; ?>
<?php endfor ?>
</div>
</div>
