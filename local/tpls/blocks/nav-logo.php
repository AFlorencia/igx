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
<<<<<<< HEAD
$logosize = $this->params->get('logocolsize', 'number');
$othercolsize = 12-$logosize;
=======

>>>>>>> 5b5783aa06772566c865ac81306648041ec2c504
?>


<!-- MAIN NAVIGATION -->
<<<<<<< HEAD
<header class="nav-logo">
=======
<header class="nav sticky-nav">
>>>>>>> 5b5783aa06772566c865ac81306648041ec2c504

<?php if ($this->countModules('header-spot')) : ?>
<div class="topbar"><?php $this->loadBlock('header-spot'); ?></div>
<?php endif ?>

<<<<<<< HEAD
<nav id="t3-mainnav" class="wrap navbar navbar-custom t3-mainnav">
	<div class="nav-wrap row">
=======
<nav id="t3-mainnav" class="wrap navbar navbar-default t3-mainnav">
	<div class="container">
>>>>>>> 5b5783aa06772566c865ac81306648041ec2c504
		
		<?php if ($this->getParam('addon_offcanvas_enable')) : ?>
				<?php $this->loadBlock ('off-canvas') ?>
			<?php endif ?>
		



<<<<<<< HEAD
		 <div class="navbar-header page-scroll col-xs-12 col-sm-<?php echo $logosize ?>">
=======
		 <div class="navbar-header page-scroll">
>>>>>>> 5b5783aa06772566c865ac81306648041ec2c504
               
                <div class="navbar-brand">

                    <div class="logo-top">
                        <a href="<?php echo JUri::base() ?>" title="<?php echo strip_tags($sitename) ?>">
                                <?php if($logotype == 'image'): ?>
                                <img class="logo-img" src="<?php echo JUri::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
                                        
                                <?php endif ?>					
                                
                                        <?php if($logotype == 'text'): ?>
                                        <span class="sitename"><?php echo $sitename ?></span>
                                            <?php if($showslogan =='1'): ?>
                                        <small class="site-slogan-show"><?php echo $slogan ?></small>
                                        <?php endif ?>				
                                        <?php endif ?>										
                                            </a>
                                        </div>
               
            </div> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topnav">
                    <span class="sr-only">Saltar a navegación</span><i class="fa fa-bars"></i>
                </button>
</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
<<<<<<< HEAD
            <div class="collapse navbar-collapse col-xs-12 col-sm-<?php echo $othercolsize ?> " id="topnav">
=======
            <div class="collapse navbar-collapse" id="topnav">
>>>>>>> 5b5783aa06772566c865ac81306648041ec2c504
                <jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />
            </div>	
			
	
</nav>
</header>
<!-- //MAIN NAVIGATION -->
