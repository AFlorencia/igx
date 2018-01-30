<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// get params
$sitename  = $this->params->get('sitename');
$slogan    = $this->params->get('slogan', '');
$logotype  = $this->params->get('logotype', 'text');
$logoimage = $logotype == 'image' ? $this->params->get('logoimage', T3Path::getUrl('images/logo.png', '', true)) : '';
$logoimgsm = ($logotype == 'image' && $this->params->get('enable_logoimage_sm', 0)) ? $this->params->get('logoimage_sm', T3Path::getUrl('images/logo-sm.png', '', true)) : false;

if (!$sitename) {
	$sitename = JFactory::getConfig()->get('sitename');
}

$logosize = $this->params->get('logocolsize', 'number');
$othercolsize = 12-$logosize;
/* if ($headright = $this->countModules('head-search or languageswitcherload')) {
	$logosize = 'col-sm-8';
} */
$showslogan = $this->getParam('showslogan', 0)
?>

<!-- HEADER -->
<header id="t3-header" class="t3-header">
	<div class="row">
		
		<!-- LOGO -->
		<div class="col-xs-12 col-sm-<?php echo $logosize ?> logo">
		<div class="logo-<?php echo $logotype, ($logoimgsm ? ' logo-control' : '') ?> <?php if($logosize =='12') echo 'text-center'; ?>">
				<a href="<?php echo JUri::base() ?>" title="<?php echo strip_tags($sitename) ?>">
					<?php if($logotype == 'image'): ?>
						<img class="logo-img" src="<?php echo JUri::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
					<?php endif ?>
					<?php if($logoimgsm) : ?>
						<img class="logo-img-sm" src="<?php echo JUri::base(true) . '/' . $logoimgsm ?>" alt="<?php echo strip_tags($sitename) ?>" />
					<?php endif ?>
					<span><?php echo $sitename ?></span>
				</a>
					<?php if($showslogan) : ?>
				<small class="site-slogan-show"><?php echo $slogan ?></small>
				<?php endif ?>
			</div>
		</div>
		<!-- //LOGO -->

		<?php if ($logosize !=12): ?>
		<div class="col-xs-12 col-sm-<?php echo $othercolsize ?> ">
		
		<?php if ($this->countModules('head-search')) : ?>
	<div class="row">
		<div class="col-xs-12">	
			<jdoc:include type="modules" name="<?php $this->_p('head-search') ?>" />
		</div>
	</div>
<?php endif ?>		
		
	  <?php $this->loadBlock('header-spotlight') ?>
		</div>		
		<?php endif ?>

	</div>
</header>
<!-- //HEADER -->
	