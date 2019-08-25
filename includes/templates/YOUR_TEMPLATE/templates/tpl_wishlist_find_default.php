<div id="wishlist">
<h1><?php echo TEXT_WISHLIST_FOR . $customers_name; ?></h1>

<!-- control -->
<?php echo zen_draw_form('control', zen_href_link(FILENAME_WISHLIST_FIND, '', 'SSL'), 'get', 'class="control"'); ?>
<?php echo zen_hide_session_id(); ?>
<?php echo zen_draw_hidden_field('main_page', FILENAME_WISHLIST_FIND); ?>
<?php echo zen_draw_hidden_field('wid', $wid); ?>

<fieldset>

	<div class="multiple">
	<label for="sort"><?php echo TEXT_SORT . LABEL_DELIMITER; ?></label>
	<?php 
	echo zen_draw_pull_down_menu('sort', $aSortOptions, (isset($_GET['sort']) ? $_GET['sort'] : ''), 'class="m" onchange="this.form.submit()"');
	?>
	</div>
	
<?php if ( DISPLAY_CATEGORY_FILTER===true ) { ?>
	<div class="multiple">
	<label for="cPath"><?php echo TEXT_SHOW . LABEL_DELIMITER; ?></label>
	<?php
	echo draw_categories_pull_down_menu('cPath', TEXT_ALL_CATEGORIES, (isset($_GET['cPath']) ? $_GET['cPath'] : ''), 'class="m" onchange="this.form.submit()"');
	?>
	</div>
<?php } ?>

	<div class="multiple">
	<label for="layout"><?php echo TEXT_VIEW . LABEL_DELIMITER; ?></label>
	<?php 
	echo draw_view_pull_down_menu('layout', '', (isset($_GET['layout']) ? $_GET['layout'] : ''), 'class="m" onchange="this.form.submit()"');
	?>
	</div>
	<div class="clearleft"></div>
	
</fieldset>
</form>
<!-- control -->
		
<?php if (($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) { ?>
	<dl class="pageresults">
	<dd><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></dd>
	<dd><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page', 'wid')) . '&wid=' . $wid); ?></dd>
	</dl>
	
<?php } // end paging top ?>

<?php echo zen_draw_form('wishlist', zen_href_link(FILENAME_WISHLIST_FIND, zen_get_all_get_params(array('action')) . 'action=multiple_products_add_product')); ?>
<?php echo zen_hide_session_id(); ?>
<?php echo zen_draw_hidden_field('layout', isset($_REQUEST['layout'])? $_REQUEST['layout']: ''); ?>
<?php echo zen_draw_hidden_field('wid', $wid); ?>

<!-- product listing -->
<div class="tableheading"><?php echo TEXT_LISTING_TYPE; ?></div>
<?php
if ($listing_split->number_of_rows > 0) {
	$rows = 0;
	$products = $db->Execute($listing_split->sql_query);
	while (!$products->EOF) {
		if ( $rows & 1 ) {
			$tdclass = 'even';
		} else {
			$tdclass = 'odd';
		}
		$products_price = zen_get_products_display_price($products->fields['products_id']);
?>

		<div class="wishlist<?php echo (!is_empty($tdclass)? '-'.$tdclass: ''); ?>">
		
		<!-- buttons -->
		<?php //echo '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $products->fields['products_id']) . '" title="'.BUTTON_IN_CART_ALT.'">' . zen_image_button(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT, 'style="float: right; margin-left: 5px; padding: 0;"') . '</a>'; ?>
		<?php
            $the_button = '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $products->fields['products_id']) . '" title="'.BUTTON_IN_CART_ALT.'">' . zen_image_button(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT) . '</a>';
  			$display_button = zen_get_buy_now_button($products->fields['products_id'], $the_button);
  		if ( $display_button != '') { ?>
    	<div class="extendedCart">
    	<?php
      	echo $display_button;
		} ?>	</div>
		<!-- product data -->
		<h3><?php echo $products->fields['products_name']; ?></h3>
		<?php echo zen_image(DIR_WS_IMAGES . $products->fields['products_image'], $products->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'class="productlist"'); ?>

		<ul>			
		<li class="price"><?php echo ((zen_has_product_attributes_values((int)$products->fields['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . $products_price; ?></li>

		<?php if ( SHOW_PRODUCT_INFO_DATE_AVAILABLE && ( $products->fields['products_date_available'] > date('Y-m-d H:i:s') ) ) { ?>
		<li class="notabene"><?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_short($products->fields['products_date_available'])); ?></li>
		<?php } ?>
		
		<li><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products->fields['products_id'], 'SSL') . '">' . MORE_INFO_TEXT . '</a>'; ?></li>
		</ul>
		<div class="clearleft"></div>
		
		<!-- wishlist data -->
		<div class="wishlistfields">
		
		<ul>
		<?php if ( $products->fields['date_added'] ) { ?>
		<li><span class="label"><?php echo TEXT_DATE_ADDED . LABEL_DELIMITER; ?> <?php echo zen_date_short($products->fields['date_added']); ?></span></li>
		<?php } ?>
		<li>
		<span class="label"><?php echo TEXT_QUANTITY . LABEL_DELIMITER; ?> 
		<?php echo $products->fields['quantity']; ?></span>
		</li>
		<li>
		<span class="label"><?php echo TEXT_COMMENT . LABEL_DELIMITER; ?> <?php echo $products->fields['comment']; ?></span>
		</li>
		<li>
		<span class="label"><?php echo TEXT_PRIORITY . LABEL_DELIMITER; ?> <?php echo $products->fields['priority']; ?></span>
		</li>
		</ul>
		</div> <!-- end div.wishlistfields -->
		
		</div> <!-- end div.wishlist -->
		<?php $rows ++; ?>
		<?php $products->MoveNext(); ?>
	<?php } // end while products ?>
	
<?php } else { ?>
	<p><?php echo TEXT_NO_PRODUCTS; ?></p>
	
<?php } // end if products ?>
<!-- end product listing -->
</form>

<?php if (($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) { ?>

	<dl class="pageresults">
	<dd><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></dd>	
	<dd><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'wid')) . '&wid=' . $wid); ?></dd>
	</dl>

<?php } // end paging bottom ?>

<div class="buttons">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>

</div> 
