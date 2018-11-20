<?php 
$featuresImg 				= $helper->get('block-bg');
$fullWidth = $helper->get('full-width');
$featuresBackground  = 'background-image: url("'.$featuresImg.'"); background-repeat: no-repeat; background-size: cover; background-position: center center;';
$count      = $helper->getRows('data.title');
$col        = $helper->get('columns');
$colzise	= 12 / $col;
?>
<div class="acm-features <?php echo $helper->get('features-style'); ?> style-1">

<?php if($helper->get('features-description')) : ?>
<h2 class="features-description"><?php echo $helper->get('features-description'); ?></h2>
<?php endif ; ?>

<?php

for ($i=0; $i < $count; $i++) :
if ($i%$col==0) echo '<div class="row">'; 
?>

<div class="features-item col-sm-<?php echo $colzise; ?>">
<div class="f-item">
<?php if($helper->get('data.title', $i)) : ?>
<h3>
<?php if($helper->get('data.link', $i))	{ ?>
        <a href="<?php echo $helper->get('data.link', $i) ?>"><?php echo $helper->get('data.title', $i) ?></a>
        <?php } else{ ?>
        <?php echo $helper->get('data.title', $i) ?>
        <?php } ?>
</h3>
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
</div></div>
<?php  if ( ($i%$col==($col-1)) || $i==($count-1) )  echo '</div>'; ?>
<?php endfor ?>

</div>
