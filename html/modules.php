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
	$modulecontentClass = $params->get('modulecontentClass');
	$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));
	$isbox = htmlspecialchars($params->get('isbox'));
	$moduleIntro    = $params->get('module-intro');
  $bgImage        = $params->get('module-background');
  $bgImageSize    = $params->get('module-background-size');
  
  	$customTitle		= $params->get('custom-title');
  	$headerLevel =  $params->get('header-level');
  $bgImagePo      = $params->get('module-background-position','center center');
  $moduleBg       = $bgImage ? 'style="background-image: url(' . JUri::base(true) . '/' . $bgImage . '); background-repeat: no-repeat; background-position: '.$bgImagePo.'; background-size: '.$bgImageSize.'"' : '';
  
  $aos ='';
  if($params->get('animate')==1){
  $aos = ' data-aos="'.$params->get('animations').'" data-aos-easing="'.$params->get('easing').'"';
  }
  
	if (!empty ($module->content)) {
		
		
		$html ='<section id="'.$moduleId.'" class="main-box '.$moduleClassSfx.' '.$moduleId.'" '.$moduleBg.'>';

$boxClass = "wrapper";

$titleClass="";

if($isbox===0){
	
	$boxClass = 'wrapper';
}

if ($isbox==='1'){
	$boxClass = 'container';
}


 	if (!empty ($customTitle))
  	{
  	   	$html .='<'.$headerLevel.$aos.'><span>'.$module->title.'</span></'.$headerLevel.'>';
  	}



$html .= '<div class="'.$boxClass.'">';


		$html .= '<div class="content">';
					

		if ($module->showtitle != 0) {
			$html .= '<div class="module-title"'.$aos.'>';
		
		
			$html .='<'.$headerTag.'><span>'.$module->title.'</span></'.$headerTag.'>';
		
			$html .= '</div>';
		}



	
		$html .= '<div class="module-ct '.$modulecontentClass.'" id="item-box-'.$module->id.'"'.$aos.'>'.$module->content.'</div>';
		$html .= "</div></div>";

		$html .= '</section>'; //id
		echo $html;
	}
}



function modChrome_spot2($module, &$params, &$attribs)
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
	$modulecontentClass = $params->get('modulecontentClass');
	$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));
	$isbox = htmlspecialchars($params->get('isbox'));
	$moduleIntro    = $params->get('module-intro');
  $bgImage        = $params->get('module-background');
  $bgImageSize    = $params->get('module-background-size');
  $bgImagePo      = $params->get('module-background-position','center center');
  $moduleBg       = $bgImage ? 'style="background-image: url(' . JUri::base(true) . '/' . $bgImage . '); background-repeat: no-repeat; background-position: '.$bgImagePo.'; background-size: '.$bgImageSize.'"' : '';
	if (!empty ($module->content)) {
		
		
		$html ='<section id="'.$moduleId.'" class="main-box-slogan" '.$moduleBg.'>';



$titleClass="";

if($isbox===0){
	
	$boxClass = 'wrapper';
}

if ($isbox==='1'){
	$boxClass = 'container';
}






$html .= '<div class="'.$boxClass.'">';


		$html .= '<div class="content">';
					

		if ($module->showtitle != 0) {
			$html .= '<div class=\"module-title {$headerClass}\">';
		
		
			$html .='<'.$headerTag.'><span>'.$module->title.'</span></'.$headerTag.'>';
		
			$html .= '</div>';
		}



	
		$html .= '<div class="module-ct '.$modulecontentClass.'">'.$module->content.'</div>';
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


	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $params->get('moduleclass_sfx'); ?>">
<?php echo $module->title; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="<?php echo $params->get('moduleclass_sfx'); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $module->title; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="<?php echo $params->get('moduleclass_sfx'); ?>_title"><?php echo $params->get('moduleclass_sfx'); ?></h4>
      </div>
      <div class="modal-body">
      <?php echo $module->content; ?>
      </div>
     
    </div>
  </div>
</div>



	<?php endif;  
}

function modChrome_T3Xhtml($module, &$params, &$attribs)
{ 
	$badge          = preg_match ('/badge/', $params->get('moduleclass_sfx'))? '<span class="badge">&nbsp;</span>' : '';
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'));
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$headerClass    = $params->get('header_class');
	$bootstrapSize  = $params->get('bootstrap_size');
	$moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
	$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

	if (!empty ($module->content)) {
		$html = "<{$moduleTag} class=\"t3-module module{$moduleClassSfx} {$moduleClass}\" id=\"Mod{$module->id}\">" .
					"<div class=\"module-inner\">" . $badge;

		if ($module->showtitle != 0) {
			$html .= "<{$headerTag} class=\"module-title {$headerClass}\"><span>{$module->title}</span></{$headerTag}>";
		}

		$html .= "<div class=\"module-ct\">{$module->content}</div></div></{$moduleTag}>";

		echo $html;
	}
}


function modChrome_t3tabs($module, $params, $attribs)
{
	$area = isset($attribs['id']) ? (int) $attribs['id'] :'1';
	$area = 'area-'.$area;

	static $modulecount;
	static $modules;

	if ($modulecount < 1) {
		$modulecount = count(JModuleHelper::getModules($attribs['name']));
		$modules = array();
	}

	if ($modulecount == 1) {
		$temp = new stdClass;
		$temp->content = $module->content;
		$temp->title = $module->title;
		$temp->params = $module->params;
		$temp->id = $module->id;
		$modules[] = $temp;

		// list of moduletitles
		echo '<ul class="nav nav-tabs" id="tab'.$temp->id .'">';

		foreach($modules as $rendermodule) {
			echo '<li><a data-toggle="tab" href="#module-'.$rendermodule->id.'" >'.$rendermodule->title.'</a></li>';
		}
		echo '</ul>';
		echo '<div class="tab-content">';
		$counter = 0;
		// modulecontent
		foreach($modules as $rendermodule) {
			$counter ++;

			echo '<div class="tab-pane  fade in" id="module-'.$rendermodule->id.'">';
			echo $rendermodule->content;
			
			echo '</div>';
		}
		echo '</div>';
		echo '<script type="text/javascript">';
		echo 'jQuery(document).ready(function(){';
			echo 'jQuery("#tab'.$temp->id.' a:first").tab("show")';
			echo '});';
		echo '</script>';
		$modulecount--;

	} else {
		$temp = new stdClass;
		$temp->content = $module->content;
		$temp->params = $module->params;
		$temp->title = $module->title;
		$temp->id = $module->id;
		$modules[] = $temp;
		$modulecount--;
	}
}


function modChrome_t3slider($module, &$params, &$attribs)
{
	$badge = preg_match ('/badge/', $params->get('moduleclass_sfx'))?"<span class=\"badge\">&nbsp;</span>\n":"";
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	?>

	<div class="moduleslide-<?php echo $module->id ?> collapse-trigger collapsed" data-toggle="collapse" data-target="#slidecontent-<?php echo $module->id ?>">
		<h<?php echo $headerLevel; ?>><span><?php echo $module->title; ?></span></h<?php echo $headerLevel; ?>>
	</div>

	<div id="slidecontent-<?php echo $module->id ?>" class="collapse-<?php echo $module->id ?> in"><?php echo $module->content; ?></div>

	<script type="text/javascript">;
	jQuery(document).ready(function(){;
		jQuery(".collapse-<?php echo $module->id ?>").collapse({toggle: 1});
	});
	</script>

	<?php 
} 


function modChrome_t3modal($module, &$params, &$attribs)
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


function modChrome_popover($module, &$params, &$attribs)
{
	$position = preg_match ('/left/', $params->get('moduleclass_sfx'))?"":"";
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;

	if (!empty ($module->content)) : ?>
	<div class="moduletable <?php echo $params->get('moduleclass_sfx'); ?> popovermodule">
		<a id="popover<?php echo $module->id ?>" href="#" rel="popover" data-placement="right" class="btn">
			<h<?php echo $headerLevel; ?>><span><?php echo $module->title; ?></span></h<?php echo $headerLevel; ?>>
		</a>
		<div id="popover_content_wrapper-<?php echo $module->id ?>" style="display: none">
			<div><?php echo $module->content; ?></div>
		</div>
		
		<script type="text/javascript">;
		jQuery(document).ready(function(){

			jQuery("#popover<?php echo $module->id ?>").popover({
				html: true,
				content: function() {
					return jQuery('#popover_content_wrapper-<?php echo $module->id ?>').html();
				}
			}).click(function(e) {
				e.preventDefault();
			});
		});
		</script>
	</div>
	<?php endif;  
}


function modChrome_spot_map($module, &$params, &$attribs)
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
	$modulecontentClass = $params->get('modulecontentClass');
	$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));
	$isbox = htmlspecialchars($params->get('isbox'));
	$moduleIntro    = $params->get('module-intro');
  $bgImage        = $params->get('module-background');
  $bgImageSize    = $params->get('module-background-size');
  
  	$customTitle		= $params->get('custom-title');
  	$headerLevel =  $params->get('header-level');
  $bgImagePo      = $params->get('module-background-position','center center');
  $moduleBg       = $bgImage ? 'style="background-image: url(' . JUri::base(true) . '/' . $bgImage . '); background-repeat: no-repeat; background-position: '.$bgImagePo.'; background-size: '.$bgImageSize.'"' : '';
  $gmap = $params->get('gmap');
 
  
	if (!empty ($module->content)) {
		
		
		$html ='<section id="'.$moduleId.'" class="main-box '.$moduleClassSfx.' '.$moduleId.'" '.$moduleBg.'>';

$boxClass = "wrapper";

$titleClass="";

if($isbox===0){
	
	$boxClass = 'wrapper';
}

if ($isbox==='1'){
	$boxClass = 'container';
}


 	if (!empty ($customTitle))
  	{
  	   	$html .='<'.$headerLevel.'><span>'.$module->title.'</span></'.$headerLevel.'>';
  	}



$html .= '<div class="'.$boxClass.'">';


		$html .= '<div class="content">';
					

		if ($module->showtitle != 0) {
			$html .= '<div class="module-title">';
		
		
			$html .='<'.$headerTag.'><span>'.$module->title.'</span></'.$headerTag.'>';
		
			$html .= '</div>';
		}



	
		$html .= '<div class="module-ct '.$modulecontentClass.'" id="item-box-'.$module->id.'"><div class="embed-responsive embed-responsive-16by9 gmap">
		<iframe class="embed-responsive-item" src="'.$params->get('gmap').'" style="width:100%;"></iframe>
		</div></div>';
		$html .= "</div></div>";

		$html .= '</section>'; //id
		echo $html;
	}
}
