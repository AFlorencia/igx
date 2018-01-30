<?php // no direct access
defined('_JEXEC') or die('Restricted access');
vmJsApi::jQuery();
vmJsApi::chosenDropDowns();
?>

<!-- Currency Selector Module -->
<?php echo $text_before ?>

<form id="vm_currencies_form" action="<?php echo vmURI::getCleanUrl() ?>" method="post">
  <input id="submit-btn" class="button" type="submit" name="submit" value="<?php echo vmText::_('MOD_VIRTUEMART_CURRENCIES_CHANGE_CURRENCIES') ?>"  style="display: none;"/>
  <?php echo JHTML::_('select.genericlist', $currencies, 'virtuemart_currency_id', 'class="inputbox vm-chzn-select"', 'virtuemart_currency_id', 'currency_txt', $virtuemart_currency_id) ; ?>
</form>
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('#virtuemart_currency_id').on('change', function() {
		jQuery('#submit-btn').click();
	});
});
</script>