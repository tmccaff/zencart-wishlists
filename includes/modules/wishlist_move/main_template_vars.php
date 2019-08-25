<?php 

$structure = array(
	array(
		'label'			=>	TABLE_HEADING_SELECT,
		'field'			=>	'',
		'column_order'	=>	1,
		'default'		=>	false,
		'sortable'		=>	false,
		'align'			=>	'center',
		'command'		=>	'select_checkbox',
	),
	array(
		'label'			=>	TABLE_HEADING_PRODUCTS,
		'field'			=>	'pd.products_name',
		'column_order'	=>	2,
		'default'		=>	true,
		'sortable'		=>	true,
		'command'		=>	'product',
	),
	array(
		'label'			=>	TEXT_PRIORITY,
		'field'			=>	'p2w.priority',
		'column_order'	=>	3,
		'default'		=>	false,
		'sortable'		=>	true,
		'align'			=>	'center',
		'command'		=>	'field_value',
	),
	array(
		'label'			=>	TEXT_COMMENT,
		'field'			=>	'p2w.comment',
		'column_order'	=>	4,
		'default'		=>	false,
		'sortable'		=>	false,
		'command'		=>	'field_value',
	),
);

// Sort columns as defined
$oWishlist->setStructure($structure);
$products_query = $oWishlist->getProductsQuery();
$aSortOptions = $oWishlist->getSortOptions(isset($_GET['sort'])? $_GET['sort']: '');

$listing_split = new splitPageResults($products_query, MAX_DISPLAY_EXTENDED);
$tpl_page_body = 'tpl_wishlist_move_default.php';

require($template->get_template_dir($tpl_page_body, DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/' . $tpl_page_body);

?>
