<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="row">
<div class="t3-sl t3-sl-1">
<?php if ($this->countModules('slider')) : ?>

	<div class="col-md-8">	
		<div class="igx-slider <?php $this->_c('slider') ?>">
		
			<jdoc:include type="modules" name="<?php $this->_p('slider') ?>" style="none"/>
		</div>
	</div>
	
<?php endif ?>


<?php if ($this->countModules('right-tabs')) : ?>

	<div class="col-md-4">	
		<div class="igx-tabs <?php $this->_c('right-tabs') ?>">
		
			<jdoc:include type="modules" name="<?php $this->_p('right-tabs') ?>" style="t3tabs"/>
		</div>
	</div>
	
<?php endif ?>
</div>
</div>