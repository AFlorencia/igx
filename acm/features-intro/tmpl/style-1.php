<?php 
	$featuresImg 				= $helper->get('block-bg');
	$fullWidth = $helper->get('full-width');
	$featuresBackground  = 'background-image: url("'.$featuresImg.'"); background-repeat: no-repeat; background-size: cover; background-position: center center;';
	$count      = $helper->getRows('data.title');
	$col        = $helper->get('columns');
	$colzise	= 12 / $col;

	?>


<div class="section-inner <?php echo $helper->get('block-extra-class'); ?>" <?php if($featuresImg): echo 'style="'.$featuresBackground.'"'; endif; ?>>

	<div class="acm-features <?php echo $helper->get('features-style'); ?> style-1">
		<?php if(!$fullWidth): ?><div class="container"><?php endif; ?>
			<?php if($helper->get('features-description')) : ?>
				<h2 class="features-description"><?php echo $helper->get('features-description'); ?></h2>
			<?php endif ; ?>
			
			<div class="<?php if(!$fullWidth): ?> row <?php else: ?> clearfix <?php endif; ?> ">
			<?php

			
			for ($i=0; $i < $count; $i++) :
          if ($i%$col==0) echo '<div class="row">'; 
				?>
			
				<div class="features-item col-sm-<?php echo $colzise; ?>">
					<div class="f-item">
					<?php if($helper->get('data.title', $i)) : ?>
						<h3><?php echo $helper->get('data.title', $i) ?></h3>
					<?php endif ; ?>
					<?php if($helper->get('data.font-icon', $i)) : ?>
						<div class="font-icon">
						<svg class="icon">
<use xlink:href="images/sprites.svg#<?php echo $helper->get('data.font-icon', $i) ?>" />
</svg>
						</div>
					<?php endif ; ?>
	
			
					
					
					
					<?php if($helper->get('data.description', $i)) : ?>
						<p><?php echo $helper->get('data.description', $i) ?></p>
					<?php endif ; ?>
				</div></div>
				<?php  if ( ($i%$col==($col-1)) || $i==($count-1) )  echo '</div>'; ?>
			<?php endfor ?>
			</div>
		<?php if(!$fullWidth): ?></div><?php endif; ?>
	</div>
</div>