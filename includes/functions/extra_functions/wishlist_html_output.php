<?php


/*
 * Return pull down menu for top-level categories
 *-----------------------------------------------------------------------*/
 
function draw_categories_pull_down_menu($sName, $aValues, $sDefault = '', $sParameters = '') {
	global $db;

	if ( !is_array($aValues) ){
		$aValues = array(
			array(
				'id' => '',
				'text' => $aValues,
			),
			array(
				'id' => '-',
				'text' => '-',
			),
		);
	}
	
	$categories = get_categories();
	
	while ( !$categories->EOF ) {
		$aValues[] = array(
			'id' => $categories->fields['categories_id'],
			'text' => $categories->fields['categories_name']
			);
		$categories->MoveNext();
	}

	return zen_draw_pull_down_menu($sName, $aValues, $sDefault, $sParameters);
}


/*
 * Return pull down menu for layout views
 *-----------------------------------------------------------------------*/
 
function draw_view_pull_down_menu($sName, $aValues, $sDefault = '', $sParameters = '') {
	
	$aMore = array(
		array(
			'id' => 's',
			'text' => TEXT_COMPACT,
		),
		array(
			'id' => 'e',
			'text' => TEXT_EXTENDED,
		),
	);

	if ( !is_array($aValues) && !empty($aValues) ){
		$aValues = array(
			array(
				'id' => '',
				'text' => $aValues,
			),
			array(
				'id' => '-',
				'text' => '-',
			),
		);
		$aValues = array_merge($aValues, $aMore);
	} else {
		$aValues = $aMore;
	}
	$defaultview = DEFAULT_LIST_VIEW;
	if ($defaultview == 'extended') {
		$defaultview = 'e';
	} else {
		$defaultview = 's';
	}
	if ($sDefault == '') $sDefault = $defaultview;
	return zen_draw_pull_down_menu($sName, $aValues, $sDefault, $sParameters);
}


/*
 * Return pull down menu for wishlist priority
 *-----------------------------------------------------------------------*/
 
function draw_priority_pull_down_menu($sName, $aValues, $sDefault = '', $sParameters = '') {
	
	$aMore = array(
		array(
			'id' => '4',
			'text' => TEXT_PRIORITY_4,
		),
		array(
			'id' => '3',
			'text' => TEXT_PRIORITY_3,
		),
		array(
			'id' => '2',
			'text' => TEXT_PRIORITY_2,
		),
		array(
			'id' => '1',
			'text' => TEXT_PRIORITY_1,
		),
		array(
			'id' => '0',
			'text' => TEXT_PRIORITY_0,
		),
	);

	if ( !is_array($aValues) && !empty($aValues) ){
		$aValues = array(
			array(
				'id' => '',
				'text' => $aValues,
			),
			array(
				'id' => '-',
				'text' => '-',
			),
		);
		$aValues = array_merge($aValues, $aMore);
	} else {
		$aValues = $aMore;
	}

	return zen_draw_pull_down_menu($sName, $aValues, $sDefault, $sParameters);
}


/*
 * Return pull down menu for wishlist priority (small)
 *-----------------------------------------------------------------------*/
 
function draw_priority_pull_down_menu_s($sName, $aValues, $sDefault = '', $sParameters = '') {
	
	$aMore = array();
	for ( $i=1; $i <= 4; $i++ ) {
			
		$aOption = array(
			'id' => $i,
			'text' => $i
		);
		array_push($aMore, $aOption);
		
	} // end for i

	if ( !is_array($aValues) && !empty($aValues) ){
		$aValues = array(
			array(
				'id' => '',
				'text' => $aValues,
			),
			array(
				'id' => '-',
				'text' => '-',
			),
		);
		$aValues = array_merge($aValues, $aMore);
	} else {
		$aValues = $aMore;
	}

	return zen_draw_pull_down_menu($sName, $aValues, $sDefault, $sParameters);
}


?>
