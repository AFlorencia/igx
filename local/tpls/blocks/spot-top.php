<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$topspot = $this->params->get('topblockid');
?>

<?php if ($this->checkSpotlight('spot-top', 'spot-top-1, spot-top-2, spot-top-3, spot-top-4')) : ?>
	
<div class="main-box" id="<?php echo $topspot; ?>">
	<div class="container ">
		<?php $this->spotlight('spot-top', 'spot-top-1, spot-top-2, spot-top-3, spot-top-4', array('style'=>'none, none, none, none')) ?>
	</div></div>
	
<?php endif ?>

