<?php
/**
 * @package Helix Ultimate Framework
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

defined ('JPATH_BASE') or die();

$url = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->id . ':' . $displayData->alias, $displayData->catid, $displayData->language));
$root = JURI::base();	$root = JURI::base();
$root = new JURI($root);	$root = new JURI($root);
$url = $root->getScheme() . '://' . $root->getHost() . $url;
$params = JFactory::getApplication()->getTemplate(true)->params;	

JHtml::_('bootstrap.tooltip');
//print_r($params);

/****************************** */

JLoader::register('MailtoHelper', JPATH_SITE . '/components/com_mailto/helpers/mailto.php');


/****************************** */




if( $params->get('social') ==1) : ?>

	<div class="social-share-icon">
		<ul>
			<li>
				<a class="facebook hasTooltip" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $url; ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>" title="Compartir en Facebook" data-toggle="tooltip" data-placement="top">
					<span class="fa fa-facebook"></span>
				</a>
			</li>
			<li>
				<a class="twitter hasTooltip" title="Compartir en Twitter" onClick="window.open('http://twitter.com/share?url=<?php echo $url; ?>&amp;text=<?php echo str_replace(" ", "%20", $displayData->title); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo $url; ?>&amp;text=<?php echo str_replace(" ", "%20", $displayData->title); ?>">
					<span class="fa fa-twitter"></span>
				</a>
			</li>
				<li>
				<a class="gplus hasTooltip" title="Compartir en Google" onClick="window.open('https://plus.google.com/share?url=<?php echo $url; ?>','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=<?php echo $url; ?>" >
					<span class="fa fa-google-plus"></span></a>
				</li>
	
				
				<?php /* <li>
					<a class="linkedin" title="Compartir en Linkedin" onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>','Linkedin','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>" >
						<span class="fa fa-linkedin-square"></span>
					</a>
				</li>

				*/ ?>
			<li>	<a class="whatsapp hasTooltip" title="Enviar por Whatsapp" onclick="window.open('https://api.whatsapp.com/send?text=<?php echo $url; ?>','Whatsapp','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="/ https://api.whatsapp.com/send?text=<?php echo $url; ?>">
<span class="fa fa-whatsapp"></span>
</a></li>

			</ul>
		</div>

<?php endif; ?>

