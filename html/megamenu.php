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
 


function T3MenuMegamenuTpl_item_url($vars)
 {
     $item     = $vars['item'];
     $class    = $vars['class'];
     $rel	  = $vars['rel'];
     $title    = $vars['title'];
     $dropdown = $vars['dropdown'];
     $caret    = $vars['caret'];
     $linktype = $vars['linktype'];
     $icon     = $vars['icon'];
     $caption  = $vars['caption'];

     $flink = $item->flink;
     $flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
     JHtml::_('bootstrap.tooltip');
     switch ($item->browserNav) :
         default:
         case 0:
             $link = "<a itemprop='url' class=\"$class\" $rel href=\"$flink\" $title $dropdown >$icon<span class=\"link-txt\">$linktype</span>$caret$caption</a>";
             break;
         case 1:
             // _blank
             $link = "<a itemprop='url' class=\"$class\" $rel href=\"$flink\" target=\"_blank\" $title $dropdown>$icon$linktype$caret$caption</a>";
             break;
         case 2:
             // window.open
             $options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';
             $link = "<a itemprop='url' class=\"$class\" $rel href=\"$flink\"" . (!$vars['menu']->editmode ? " onclick=\"window.open(this.href,'targetWindow','$options');return false;\"" : "") . " $title $dropdown>$icon$linktype$caret$caption</a>";
             break;
     endswitch;

     return $link;
 }
 function T3MenuMegamenuTpl_item_component($vars)
 {
     $item     = $vars['item'];
     $class    = $vars['class']. 'hasTooltip';
     $rel	  = $vars['rel'];
     $title    = $vars['title'];
     $dropdown = $vars['dropdown'];
     $caret    = $vars['caret'];
     $linktype = $vars['linktype'];
     $icon     = $vars['icon'];
     $caption  = $vars['caption'];
     // Note. It is important to remove spaces between elements.
     JHtml::_('bootstrap.tooltip');
     switch ($item->browserNav) :
         default:
         case 0:
             $link = "<a itemprop='url' class=\"$class\" $rel href=\"{$item->flink}\" $title $dropdown>$icon<span class=\"link-txt\">$linktype</span>$caret$caption</a>";
             break;
         case 1:
             // _blank
             $link = "<a itemprop='url' class=\"$class\" $rel href=\"{$item->flink}\" target=\"_blank\" $title $dropdown>$icon<span>$linktype</span>$caret$caption</a>";
             break;
         case 2:
             // window.open
             $link = "<a itemprop='url' class=\"$class\" $rel href=\"{$item->flink}\"" . (!$vars['menu']->editmode ? " onclick=\"window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;\"" : "") . " $title $dropdown>$icon$linktype $caret$caption</a>";
             break;
     endswitch;

     return $link;
 }