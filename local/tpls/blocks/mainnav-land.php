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
$showslogan = $this->params->get('showslogan','0');
?>


<!-- MAIN NAVIGATION -->
<header class="nav navbar-fixed-top sticky-nav">

    <?php if ($this->countModules('header-spot')) : ?>
    <div class="topbar"><?php $this->loadBlock('header-spot'); ?></div>
    <?php endif ?>

    <nav id="t3-mainnav" class="wrap navbar navbar-default t3-mainnav">
        <div class="container">

            <?php if ($this->getParam('addon_offcanvas_enable')) : ?>
            <?php $this->loadBlock ('off-canvas') ?>
            <?php endif ?>




            <div class="navbar-header page-scroll">

                <div class="navbar-brand">

                    <div class="logo-top">
                        <a href="<?php echo JUri::base() ?>" title="<?php echo strip_tags($sitename) ?>">
                            <?php if($logotype == 'image'): ?>
                            <img class="logo-img" src="<?php echo JUri::base(true) . '/' . $logoimage ?>"
                                alt="<?php echo strip_tags($sitename) ?>" />

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
                <button class="btn btn-primary off-canvas-toggle hidden-lg hidden-md<?php $this->_c('off-canvas') ?>"
                    type="button" data-pos="left" data-nav="#t3-off-canvas"
                    data-effect="<?php echo $this->getParam('addon_offcanvas_effect', 'off-canvas-effect-4') ?>">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="topnav">
  <jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />
            </div>

        </div>
    </nav>
</header>
<!-- //MAIN NAVIGATION -->
