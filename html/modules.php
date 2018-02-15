<?php
/** 
 *------------------------------------------------------------------------------
 * @package       T3 Framework for Joomla!
 *------------------------------------------------------------------------------
 * @copyright     Copyright (C) 2004-2013 JoomlArt.com. All Rights Reserved.
 * @license       GNU General Public License version 2 or later; see LICENSE.txt
 * @authors       JoomlArt, JoomlaBamboo, (contribute to this project at github 
 *                & Google group to become co-author)
 * @Google group: https://groups.google.com/forum/#!forum/t3fw
 * @Link:         http://t3-framework.org 
 *------------------------------------------------------------------------------
 */

defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * three arguments.
 */


/*
 * Default Module Chrome that has sematic markup and has best SEO support
 */


function modChrome_spot($module, &$params, &$attribs)
{ 
	$badge          = preg_match ('/badge/', $params->get('moduleclass_sfx'))? '<span class="badge">&nbsp;</span>' : '';
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'));
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$headerClass    = $params->get('header_class');
	$moduleId		= $params->get('moduleID');
	$modulebgcolor  = $params->get('module-bg-color');
	$textcolor  = $params->get('textcolor');
	$bootstrapSize  = $params->get('bootstrap_size');
	$moduleClass    = !empty($bootstrapSize) ? ' col-md-' . (int) $bootstrapSize . '' : '12';
	$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));
	$isbox = htmlspecialchars($params->get('fullwidth'));
	$moduleIntro    = $params->get('module-intro');
  $bgImage        = $params->get('module-background');
  $bgImageSize    = $params->get('module-background-size');
  $bgImagePo      = $params->get('module-background-position','center center');
  $moduleBg       = $bgImage ? 'style="background-image: url(' . JUri::base(true) . '/' . $bgImage . '); background-repeat: no-repeat; background-position: '.$bgImagePo.'; background-size: '.$bgImageSize.'"' : '';
	if (!empty ($module->content)) {
		
		
		$html ='<section id="'.$moduleId.'" class="main-box" '.$moduleBg.'>';

if ($isbox==='1'){
	$html .= '<div class="container">';
}
else{
	
	$html .= '<div class="wrapper">';
}
		$html .= '<div class="content">';
					

		if ($module->showtitle != 0) {
			$html .= '<div class="module-title">';
		
		
			$html .='<'.$headerTag.'><span>'.$module->title.'</span></'.$headerTag.'>';
		
			$html .= '</div>';
		}



	
		$html .= '<div class="module-ct '.$moduleClassSfx.'">'.$module->content.'</div>';
		$html .= "</div></div>";

		$html .= '</section>'; //id
		echo $html;
	}
}

function modChrome_fullSpot($module, &$params, &$attribs)
{ 
	$badge          = preg_match ('/badge/', $params->get('moduleclass_sfx'))? '<span class="badge">&nbsp;</span>' : '';
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'));
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$headerClass    = $params->get('header_class');
	$moduleId		= $params->get('moduleID');
	$bootstrapSize  = $params->get('bootstrap_size');
	$moduleClass    = !empty($bootstrapSize) ? ' col-md-' . (int) $bootstrapSize . '' : '12';
	$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

	if (!empty ($module->content)) {
	
		$html ="<div id=\"{$moduleId}\" class=\"container-fluid {$modulebgcolor}\">";
		$html = "<div class=\"full-spot {$moduleClassSfx}\" id=\"{$moduleId}\">";
		
		

		$html .= "{$module->content}</div></div>";
	
		echo $html;
	}
}

function modChrome_t3modalB($module, &$params, &$attribs)
{

	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;

	if (!empty ($module->content)) : ?>

	<div class="moduletable <?php echo $params->get('moduleclass_sfx'); ?> modalmodule">
		<div class="t3-module-title">
			<a href="#module<?php echo $module->id ?>" role="button" class="btn" data-toggle="modal">
				<h<?php echo $headerLevel; ?>><span><?php echo $module->title; ?></span></h<?php echo $headerLevel; ?>>
			</a>
		</div>
		<div id="module<?php echo $module->id ?>" class="modal hide fade" aria-hidden="true">
			<div class="modal-header">
				<h<?php echo $headerLevel; ?>><span><?php echo $module->title; ?></span></h<?php echo $headerLevel; ?>>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

			</div>
			<div class="t3-module-body">
				<?php echo $module->content; ?>
			</div>
		</div>
	</div>
	
	<?php endif;  
}

