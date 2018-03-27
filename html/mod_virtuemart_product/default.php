<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
// add javascript for price and cart, need even for quantity buttons, so we need it almost anywhere
vmJsApi::jPrice();


$col = 1;
$i = 1;
$pwidth = ' width' . floor (100 / $products_per_row);
if ($products_per_row > 1) {
	$float = "floatleft";
} else {
	$float = "center";
}
?>
<div id="<?php echo $module->id; ?>" class="vmgroup<?php echo $params->get ('moduleclass_sfx') ?>">

	<?php if ($headerText) { ?>
	<div class="vmheader"><?php echo $headerText ?></div>
	<?php
}
	if ($display_style == "div") {
		?>
		<div class="vmproduct<?php echo $params->get ('moduleclass_sfx'); ?> productdetails owl-carousel">
			<?php foreach ($products as $product) { ?>
      <?php if($i%2 ==1): ?>
			<div class="product-container">
      <?php endif; ?>
				<div class="spacer">
					<div class="product-content">
						<?php
						
						if (!empty($product->images[0])) {
							$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage"', FALSE);
						} else {
							$image = '';
						}
						echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
						$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); 
						?>
						
						<h4 class="product-tit"><a href="<?php echo $url ?>"><?php echo $product->product_name ?></a></h4>     
						
						<?php
						echo '<div class="productdetails">';
						if ($show_price) {

							echo '<div class="product-price">';
							// 		echo $currency->priceDisplay($product->prices['salesPrice']);
							if (!empty($product->prices['salesPrice'])) {
								echo $currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
							}
							// 		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
							if (!empty($product->prices['salesPriceWithDiscount'])) {
								echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
							}
							echo '</div>';

						}
						echo '</div>';
						?>
					</div>
						
					<?php
					if ($show_addtocart) {
						echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product));
					}; ?>
				</div>
      <?php if($i%2 ==0): ?>
			</div>
      <?php endif; ?>
			<?php
			if ($col == $products_per_row && $products_per_row && $col < $totalProd) {
				$col = 1;
			} else {
				$col++;
			}
		$i++; } ?>
   
		</div>
    

		<?php
	} else {
		$last = count ($products) - 1;
		?>

		<ul class="vmproduct<?php echo $params->get ('moduleclass_sfx'); ?> productdetails ">
			<?php foreach ($products as $product) : ?>
			<li class="product-container">
				<?php
				if (!empty($product->images[0])) {
					$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage"', FALSE);
				} else {
					$image = '';
				}
				echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
				echo '<div class="clear"></div>';
				$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
				<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>        <?php    echo '<div class="clear"></div>';
				echo '<div class="productdetails">';
				// $product->prices is not set when show_prices in config is unchecked
				if ($show_price and  isset($product->prices)) {

					echo '<div class="product-price">'.$currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					if ($product->prices['salesPriceWithDiscount'] > 0) {
						echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					}
					echo '</div>';

				}
				if ($show_addtocart) {
					echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'position' => array('ontop', 'addtocart')));
				}
				echo '</div>';
				?>
			</li>
			<?php
			if ($col == $products_per_row && $products_per_row && $last) {
				echo '
		</ul><div class="clear"></div>
		<ul  class="vmproduct' . $params->get ('moduleclass_sfx') . ' productdetails">';
				$col = 1;
			} else {
				$col++;
			}
			$last--;
		endforeach; ?>
		</ul>
		<div class="clear"></div>

		<?php
	}
	if ($footerText) : ?>
		<div class="vmfooter<?php echo $params->get ('moduleclass_sfx') ?>">
			<?php echo $footerText ?>
		</div>
		<?php endif; ?>
</div>


<script>
(function($){
  jQuery(document).ready(function($) {
    $("#<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      items: 5,
      nav : true,
      navText : ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
      dots: false,
      slideBy: 1,
			autoplay: false,
    	lazyLoad:true,
    	responsive : {

		    // breakpoint from 0 up
		    0 : {
		      items: 1,
          dots : false,
          nav : false
		    },

		    // breakpoint from 480 up
		    480 : {
		      items: 1,
          dots : false,
          nav : false
		    },

		    // breakpoint from 768 up
		    768 : {
		      items: 2,
          dots : false,
          nav : false
		    },

		    // breakpoint from 992 up
		    992 : {
		      items: 3,
          dots : false,
          nav : true
		    },

		    // breakpoint from 1200 up
		    1200 : {
		      items: 4,
          dots : false,
          nav : true
		    },

		    // breakpoint from 1460 up
		    1460 : {
		      items: 5,
          dots : false,
          nav : true
		    }
			},

			onRefresh: function () {
            $("#<?php echo $module->id; ?> .owl-carousel").find('div.owl-item .product-container').height('');
        },
        onRefreshed: function () {
            $("#<?php echo $module->id; ?> .owl-carousel").find('div.owl-item .product-container').height($("#<?php echo $module->id; ?> .owl-carousel").height());
        }
    });
  });
})(jQuery);
</script>