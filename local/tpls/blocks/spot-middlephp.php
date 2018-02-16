<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$spotmiddle = $this->params->get('middleblockid');
?>

<?php if ($this->checkSpotlight('spot-m', 'spot-m-1, spot-m-2, spot-m-3, spot-m-4')) : ?>
	<!-- SPOTLIGHT 5 -->
	<div class="main-box" id="<?php echo $spotmiddle; ?>">
	<div class="container ">
		<?php $this->spotlight('spot-m', 'spot-m-1, spot-m-2, spot-m-3, spot-m-4', array('style'=>'none, none, none, none')) ?>
	</div>
	</div>
	<!-- //SPOTLIGHT 5 -->
<?php endif ?>