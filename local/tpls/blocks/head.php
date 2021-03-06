<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>
<!-- META FOR IOS & HANDHELD -->
<?php if ($this->getParam('responsive', 1)): ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>
	
	<script type="text/javascript">
		//<![CDATA[
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
			var msViewportStyle = document.createElement("style");
			msViewportStyle.appendChild(
				document.createTextNode("@-ms-viewport{width:auto!important}")
			);
			document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
		}
		//]]>
	</script>
<?php endif ?>
<meta name="HandheldFriendly" content="true"/>
<meta name="apple-mobile-web-app-capable" content="YES"/>
<!-- //META FOR IOS & HANDHELD -->
<?php
// SYSTEM CSS
$this->addStyleSheet(JUri::base(true) . '/templates/system/css/system.css');
?>
<?php
// T3 BASE HEAD
$this->addHead();
?>

<?php
// CUSTOM CSS
if (is_file(T3_TEMPLATE_PATH . '/css/custom.css')) {
	//$this->addStyleSheet(T3_TEMPLATE_URL . '/css/custom.css');
}
	$app = JFactory::getApplication();
	$sitename = $app->getCfg('sitename');
if (!$sitename) {
	$sitename = JFactory::getConfig()->get('sitename');
}
?>
<link rel="stylesheet" href="templates/t3_bs3_blank/local/css/custom.css?<?php echo time(); ?>">
<!-- Le HTML5 shim and media query for IE8 support -->
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script type="text/javascript" src="<?php echo T3_URL ?>/js/respond.min.js"></script>
<![endif]-->
<!-- You can add Google Analytics here or use T3 Injection feature -->


<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="<?php echo $this->params->get('safari'); ?>">
<meta name="msapplication-TileColor" content="<?php echo $this->params->get('metro'); ?>">
<meta name="theme-color" content="<?php echo $this->params->get('android'); ?>">

<?php $doc = JFactory::getDocument();
if($this->params->get('aos')==1){
	$doc->addStyleSheet (T3_TEMPLATE_URL.'/css/aos.css');
	}
?>
<?php $doc = JFactory::getDocument();
if($this->params->get('customgallerycss')==1){
	$doc->addStyleSheet (T3_TEMPLATE_URL.'/css/CGallery.css');
	}

	if($this->params->get('fancyboxcss')==1){
		$doc->addStyleSheet (T3_TEMPLATE_URL.'/css/jquery.fancybox.min.css');
		}
?>