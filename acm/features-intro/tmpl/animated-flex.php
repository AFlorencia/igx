<?php 
$featuresImg 				= $helper->get('block-bg');
$fullWidth = $helper->get('full-width');
$featuresBackground  = 'background-image: url("'.$featuresImg.'"); background-repeat: no-repeat; background-size: cover; background-position: center center;';
$count      = $helper->getRows('data.title');
$col        = $helper->get('columns');

$aos ='';
if($helper->get('animate')==1){
<<<<<<< HEAD
        $aos = ' data-aos="'.$helper->get('animations').'" data-aos-easing="'.$helper->get('easing').'"';
}

=======
$aos = ' data-aos="'.$helper->get('animations').'" data-aos-easing="'.$helper->get('easing').'"';
}
?>


<?php if($helper->get('features-description')) : ?>
<h2 class="features-description"><?php echo $helper->get('features-description'); ?></h2>
<?php endif ; ?>
<div class="flex-row">
<?php
>>>>>>> 6b14e667a8a96e3a68f07b21cc1e318e01a29885
$doc = JFactory::getDocument();
// Add styles
$gridGap = "";
$colWidth = "";
$cols = $helper->get('columns');
$gap =$helper->get('gap');

$gridGap = $gap * $cols;
$colWidth = (1140 - $gridGap) / $cols;
$style = '.flex-row {'.
<<<<<<< HEAD
'grid-template-columns: repeat(auto-fill, minmax('.$colWidth.'px, 1fr));'.
'grid-gap: '.$gap.'px;'.
'}'; 
$doc->addStyleDeclaration($style);
?>

<div class="flex-row">
<?php for ($i=0; $i < $count; $i++) : ?>

<div class="features-item"<?php echo $aos; ?>>
=======
         'grid-template-columns: repeat(auto-fill, minmax('.$colWidth.'px, 1fr));'.
         'grid-gap: '.$gap.'px;'.
           '}'; 
$doc->addStyleDeclaration($style);
?>
<?php

for ($i=0; $i < $count; $i++) :

?>

<div class="features-item flex-<?php echo $i; ?>"<?php echo $aos; ?> >
>>>>>>> 6b14e667a8a96e3a68f07b21cc1e318e01a29885

<?php if($helper->get('data.title', $i)) : ?>
<h3>
<?php if($helper->get('data.link', $i))	{ ?>
        <a href="<?php echo $helper->get('data.link', $i) ?>"><?php echo $helper->get('data.title', $i) ?></a>
        <?php } else{ ?>
        <?php echo $helper->get('data.title', $i) ?>
        <?php } ?>
</h3>
<?php endif ; ?>

<<<<<<< HEAD
<?php if($helper->get('data.img-icon', $i)) : ?>
<div class="img-icon">
<img src="<?php echo $helper->get('data.img-icon', $i) ?>" alt="" />
</div>
<?php endif ; ?>

=======

<?php if($helper->get('data.img-icon', $i)) : ?>
						<div class="img-icon">
							<img src="<?php echo $helper->get('data.img-icon', $i) ?>" alt="" />
						</div>
                    <?php endif ; ?>
                    
>>>>>>> 6b14e667a8a96e3a68f07b21cc1e318e01a29885
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
<<<<<<< HEAD

</div>
<?php endfor ?>
</div>

=======
</div>

<?php endfor ?>
</div>
>>>>>>> 6b14e667a8a96e3a68f07b21cc1e318e01a29885
