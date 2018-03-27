<?php
/**
 * ------------------------------------------------------------------------
 * JA Brickstore Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// load virtuemart css, js
vmJsApi::jPrice();
vmJsApi::writeJS();

$input = JFactory::getApplication()->input;
$model = VmModel::getModel('User');
$user = $model->getCurrentUser();
$shopper_groups = $user->shopper_groups;

$json = file_get_contents(JPATH_SITE.$this->config->json);
$array = (array) json_decode($json);
$sefUrl = array();
foreach ( $array as $value)
{
	$sefUrl[$value->id] = JROUTE::_($value->url);
}
?>
<div class="row ja-megafilter-wrapper equal-height clearfix">
  <div data-mgfilter="vm" class="sidebar sidebar-main ja-mg-sidebar col">
    <a href="#" title="<?php echo JText::_('COM_JAMEGAFILTER_FILTERS'); ?>" class="btn btn-primary btn-filter">
      <i class="fa fa-filter" aria-hidden="true"></i>
      <span class="filters-text"><?php echo JText::_('COM_JAMEGAFILTER_FILTERS'); ?></span><span class="close-text"><?php echo JText::_('COM_JAMEGAFILTER_CLOSE'); ?></span>
    </a>
    <div class="block ub-layered-navigation-sidebar sidebar-content">    
    </div>
  </div>

  <div class="main-content col">    
  </div>

</div>

<script type="text/javascript">
var JABaseUrl = '<?php echo JUri::base(true); ?>';
var sefUrl = <?php echo json_encode($sefUrl) ?>;
var shopper_groups = <?php echo json_encode($shopper_groups) ?>;

var p = <?php echo json_encode($this->jstemplate); ?>;
for (var key in p) {
  if (p.hasOwnProperty(key)) {
    var compiled = dust.compile(p[key], key);
    dust.loadSource(compiled);
  }
}

function bindCallback() {
	setTimeout(function(){
		jQuery('.quantity-controls.quantity-plus, .quantity-controls.quantity-minus').off().unbind().on('click' ,function(){
			$val = jQuery(this).parents('form.product.js-recalculate').find('input.quantity-input').val();
			$val = parseInt($val);
			if (jQuery(this).hasClass('quantity-plus'))
				$val++;
			else $val--;
			if ($val<1) $val=1;
			jQuery(this).parents('form.product.js-recalculate').find('input.quantity-input').val($val);
		});
		if (jQuery('.ja-megafilter-wrapper').find('.pagination-wrap').length) {
			jQuery('.ja-megafilter-wrapper').removeClass('no-pagination');
		} else {
			jQuery('.ja-megafilter-wrapper').addClass('no-pagination');
		}
		
		if (isMobile.apple.tablet && jQuery('#t3-off-canvas-sidebar').length) {
			jQuery('select').unbind().off().on('touchstart', function() {
    			formTouch=true;
    			fixedElement.css('position', 'absolute');
    			fixedElement.css('top', jQuery(document).scrollTop());
			});
			jQuery('html').unbind().off().on('touchmove', function() {
				if (formTouch==true) {
					fixedElement.css('position', 'fixed');
					fixedElement.css('top', '0');
					formTouch=false;
				}
			});
		}
		initScript();
	  }, 1000);
	if (jQuery('.items.product-items').find('.item').length == 0) {
		jQuery('.toolbar-amount').each(function(){
			jQuery(this).find('.toolbar-number').first().text(0);
		});
	}
}

function scrolltop() {
	if (!isMobile.phone) jQuery("html, body").stop().animate({ scrollTop: 0 }, 400);
}

function afterAutoPage() {
	var autopage =<?php echo $input->getCmd('autopage') ? 'true':'false' ?>;
	if (autopage) {
		Virtuemart.product(jQuery("form.product"))
	}
}

function MegaFilterCallback() {
	Virtuemart.product(jQuery("form.product"));
	bindCallback();
	<?php echo $input->getCmd('scrolltop') ? 'scrolltop();':'' ?>
}


function afterGetData(item) {
//	console.log(item.id)
	item.url = sefUrl[item.id];
	
	if ( item['shopper_groups'].length !== 0 ) {
		var common = jQuery.grep(shopper_groups, function(element) {
			return jQuery.inArray(element, item['shopper_groups'] ) !== -1;
		});
		
		if (common.length !== 0 ) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}

jQuery(document).ready(function() {
  var UBLNConfig = {};
  UBLNConfig.dataUrl = "<?php echo JUri::base(true).$this->config->json;  ?>";
  UBLNConfig.fields = <?php echo json_encode($this->config->fields); ?>;
  UBLNConfig.sortByOptions = <?php echo json_encode($this->config->sorts); ?>;
  UBLNConfig.defaultSortBy = "position";
  UBLNConfig.productsPerPageAllowed = [<?php echo implode(',', $this->config->paginate); ?>];
  UBLNConfig.autopage = <?php echo $this->config->autopage ? 'true':'false' ?>;
  UBLNConfig.sticky = <?php echo $this->config->sticky ? 'true':'false' ?>;
  UBLN.main(UBLNConfig);
  MegaFilterCallback();
});
</script>
