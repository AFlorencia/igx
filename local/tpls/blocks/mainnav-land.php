<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$logotype  = $this->params->get('logotype', 'text');
$logoimage = $logotype == 'image' ? $this->params->get('logoimage', T3Path::getUrl('images/logo.png', '', true)) : '';
$logoimgsm = ($logotype == 'image' && $this->params->get('enable_logoimage_sm', 0)) ? $this->params->get('logoimage_sm', T3Path::getUrl('images/logo-sm.png', '', true)) : false;
$slogan    = $this->params->get('slogan', '');
$navbaralign = $this->params->get('menualign');
$navposition = $this->params->get('headertype');
$sitename  = $this->params->get('sitename');
?>

<!-- MAIN NAVIGATION -->
<nav id="t3-mainnav" class="wrap navbar navbar-default t3-mainnav <?php echo $navbaralign.' '.$navposition; ?>">
	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		<div class="logo-<?php echo $logotype, ($this->params->get('enable_logoimage_sm','1')  ? ' logo-sm' : ' logo-sm-hide') ?> <?php if($logosize =='12') echo 'text-center'; ?>">
				<a href="<?php echo JUri::base() ?>" title="<?php echo strip_tags($sitename) ?>">
						<?php if($logotype == 'image'): ?>
						<img class="logo-img-big" src="<?php echo JUri::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
								<?php if($logoimgsm) : ?>
								<img class="logo-img-small" src="<?php echo JUri::base(true) . '/' . $logoimgsm ?>" alt="<?php echo strip_tags($sitename) ?>" />
								<?php endif ?>									
								
										
								<?php endif ?>					
								
								
						
								<?php if($logotype == 'text'): ?>
								<span class="sitename"><?php echo $sitename ?></span>
									<?php if($showslogan =='1'): ?>
								<small class="site-slogan-show"><?php echo $slogan ?></small>
								<?php endif ?>				
								<?php endif ?>
										
									</a>

								</div>
	
			<?php if ($this->getParam('navigation_collapse_enable', 1) && $this->getParam('responsive', 1)) : ?>
				<?php $this->addScript(T3_URL.'/js/nav-collapse.js'); ?>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".t3-navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			<?php endif ?>

			<?php if ($this->getParam('addon_offcanvas_enable')) : ?>
				<?php $this->loadBlock ('off-canvas') ?>
			<?php endif ?>

		</div>
		<?php if ($this->getParam('navigation_collapse_enable')) : ?>
			<div class="t3-navbar-collapse navbar-collapse collapse"></div>
		<?php endif ?>

		<div class="t3-navbar navbar-collapse collapse">
			<jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />
		</div>
			
	</div>
</nav>
<!-- //MAIN NAVIGATION -->
