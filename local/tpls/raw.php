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
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$menu = $app->getMenu();
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class='<jdoc:include type="pageclass" />'>
<head>
<jdoc:include type="head" />
<?php $this->loadBlock('head') ?>
</head>
<body>
<?php if($this->hasMessage()) : ?>
			<jdoc:include type="message" />
			<?php endif ?>
			<jdoc:include type="component" />
			
		</div>
</body>
</html>
