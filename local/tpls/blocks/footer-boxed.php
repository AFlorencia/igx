<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">
<jdoc:include type="modules" name="<?php $this->_p('footer') ?>" />
	<?php if ($this->checkSpotlight('footnav', 'footer-1, footer-2, footer-3, footer-4, footer-5, footer-6')) : ?>
		<!-- FOOT NAVIGATION -->
	
			<?php $this->spotlight('footnav', 'footer-1, footer-2, footer-3, footer-4, footer-5, footer-6') ?>
		
		<!-- //FOOT NAVIGATION -->
	<?php endif ?>

	<section class="t3-copyright">
	
		
				<div class="row">
				<div class="col-md-12 copyright <?php $this->_c('footer') ?>">
					
         				<?php	$app = JFactory::getApplication();
						$sitename = $app->getCfg('sitename');
					?>	
					<span class="sitename">&copy; <?php echo date('Y', time()).'  '.$sitename; ?></span>
					
         	
				</div>
				
				</div>
				
			
		
	</section>

</footer>
<!-- //FOOTER -->