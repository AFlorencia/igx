<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$spotbottom = $this->params->get('bottomblockid');
?>

<?php if ($this->checkSpotlight('spot-bottom', 'spot-bottom-1, spot-bottom-2, spot-bottom-3, spot-bottom-4')) : ?>
	<!-- SPOTLIGHT 5 -->
	<div class="main-box" id="<?php echo $spotbottom; ?>">
	<div class="container ">
		<?php $this->spotlight('spot-bottom', 'spot-bottom-1, spot-bottom-2, spot-bottom-3, spot-bottom-4', array('style'=>'none, none, none, none')) ?>
	</div>
	</div>
	<!-- //SPOTLIGHT 5 -->
<?php endif ?>