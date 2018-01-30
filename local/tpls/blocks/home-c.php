<?php
/**
 * ------------------------------------------------------------------------
 * Uber Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

defined('_JEXEC') or die;
?>

<?php if ($this->countModules('acm-p')) : ?>
<!-- HOME POSITION -->
<div id="t3-section" class="wrap sections-wrap <?php $this->_c('acm-p') ?>">
	<div class="container">
	<jdoc:include type="modules" name="<?php $this->_p('acm-p') ?>" style="T3section" />
	</div>
</div>
<!-- //HOME POSITION -->
<?php endif ?>