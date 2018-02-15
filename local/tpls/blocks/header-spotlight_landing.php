<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($this->checkSpotlight('header-spotlight_landing', 'top-1, top-2, social-links')) : ?>
	<!-- header-spotlight-->
	<div class="header-spot container">
	
		<?php $this->spotlight('header-spotlight_landing', 'top-1, top-2, social-links', array('style'=>'none, none, none')) ?>
	</div>
	
	<!-- //header-spotlight-->
<?php endif ?>