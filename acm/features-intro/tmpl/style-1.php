<?php 
	$featuresImg 				= $helper->get('block-bg');
	$fullWidth = $helper->get('full-width');
	$featuresBackground  = 'background-image: url("'.$featuresImg.'"); background-repeat: no-repeat; background-size: cover; background-position: center center;';
?>
<div class="section-inner <?php echo $helper->get('block-extra-class'); ?>" <?php if($featuresImg): echo 'style="'.$featuresBackground.'"'; endif; ?>>

	<div class="acm-features <?php echo $helper->get('features-style'); ?> style-1">
		<?php if(!$fullWidth): ?><div class="container"><?php endif; ?>
			<?php if($helper->get('features-description')) : ?>
				<h2 class="features-description"><?php echo $helper->get('features-description'); ?></h2>
			<?php endif ; ?>
			
			<div class="<?php if(!$fullWidth): ?> row <?php else: ?> clearfix <?php endif; ?> items-container">
			<?php $count = $helper->getRows('data.title'); ?>
			<?php $column = 2; ?>
			<?php for ($i=0; $i<$count; $i++) : ?>
			<?php 
		//	echo $count%$i;
			if ($i%3==0) //echo '<div class="col-md-6">';
			 ?>
			<div class="serv-item">
					<div class="item-wrap">
						<?php if($helper->get('data.title', $i)) : ?>
						<h3><?php echo $helper->get('data.title', $i) ?></h3>
					<?php endif ; ?>
					<div class="item-content clearfix">
					<?php if($helper->get('data.font-icon', $i)) : ?>
					<div class="svg-icon">
						<svg class="icon">
<use xlink:href="images/sprites.svg#<?php echo $helper->get('data.font-icon', $i) ?>" />
</svg>
						</div>
					<?php endif ; ?>
	
					
					
				
					
					<?php if($helper->get('data.description', $i)) : ?>
						<?php echo $helper->get('data.description', $i) ?>
					<?php endif ; ?>
</div>
					</div>
				</div>
				<?php  ?>
			<?php	if ($i%3==2) //echo '</div>'; ?>
			<?php endfor ?>
			</div>
		<?php if(!$fullWidth): ?></div><?php endif; ?>
	</div>
</div>
