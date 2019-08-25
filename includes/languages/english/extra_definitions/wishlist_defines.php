<?php
// control multiple wishlist functionality
if(MODULE_WISHLISTS_ENABLED == 'true'){
        define('MODULE_WISHLISTS_ENABLED', true);
} else {
        define('MODULE_WISHLISTS_ENABLED', false);}
if(ALLOW_MULTIPLE_WISHLISTS == 'true'){
        define('ALLOW_MULTIPLE_WISHLISTS', true);
} else {
        define('ALLOW_MULTIPLE_WISHLISTS', false);}
if(DISPLAY_CATEGORY_FILTER == 'true'){
        define('DISPLAY_CATEGORY_FILTER', true);
} else {
        define('DISPLAY_CATEGORY_FILTER', false);}
if(ALLOW_MULTIPLE_PRODUCTS_CART_COMPACT == 'true'){
        define('ALLOW_MULTIPLE_PRODUCTS_CART_COMPACT', true);
} else {
        define('ALLOW_MULTIPLE_PRODUCTS_CART_COMPACT', false);}

// template header
define('HEADER_TITLE_WISHLIST', 'Wish List');

// wishlist sidebox
define('BOX_HEADING_WISHLIST', 'Wish List');
define('BUTTON_IMAGE_WISHLIST_ADD', 'wishlist_add.gif');
define('BUTTON_WISHLIST_ADD_ALT', 'Add to Wish List');
define('BOX_WISHLIST_ADD_TEXT', 'Click to add this product to your Wish List.');
define('BOX_WISHLIST_LOGIN_TEXT', '<p><a href="' . zen_href_link(FILENAME_LOGIN, '', 'NONSSL') . '">Log In</a> to be able to add this product to your Wish List.</p>');

// control form
define('TEXT_SORT', 'Sort');
define('TEXT_SHOW', 'Show');
define('TEXT_VIEW', 'View');
define('TEXT_ALL_CATEGORIES', 'All Categories');

// more
define('TEXT_ADD_WISHLIST', 'Add to Wishlist');
define('TEXT_REMOVE_WISHLIST', 'Remove from Wishlist');
define('BUTTON_IMAGE_SAVE', BUTTON_IMAGE_UPDATE);
define('BUTTON_SAVE_ALT', BUTTON_UPDATE_ALT);
define('TEXT_EMAIL_WISHLIST', 'Tell a Friend');
define('TEXT_FIND_WISHLIST', 'Find a Friend\'s Wish List');
define('TEXT_NEW_WISHLIST', 'Create a new Wish List');
define('TEXT_MANAGE_WISHLISTS', 'Manage my Wish Lists');
define('TEXT_WISHLIST_MOVE', 'Move items between Wish Lists');
define('SUCCESS_ADDED_TO_WISHLIST_PRODUCT', 'Successfully added Product to the Wish List ...');

define('TEXT_PRIORITY', 'Priority');
define('TEXT_DATE_ADDED', 'Date Added');
define('TEXT_QUANTITY', 'Quantity');
define('TEXT_COMMENT', 'Comment');

define('TEXT_PRIORITY_0', '0 - Don\'t buy this for me');
define('TEXT_PRIORITY_1', '1 - I\'m thinking about it');
define('TEXT_PRIORITY_2', '2 - Like to have');
define('TEXT_PRIORITY_3', '3 - Love to have');
define('TEXT_PRIORITY_4', '4 - Must have');

// product lists
define('TEXT_NO_PRODUCTS', 'No products currently in list.');
define('TEXT_COMPACT', 'Compact');
define('TEXT_EXTENDED', 'Extended');

// general
define('LABEL_DELIMITER', ': ');
define('TEXT_REMOVE', 'Remove');
define('EMAIL_SEPARATOR', "-------------------------------------------------------------------------------\n");
define('TEXT_DATE_AVAILABLE', 'Date Available: %s');
define('TEXT_FORM_FIELD_REQUIRED', '*');
define('TEXT_OPTION_DIVIDER', '&nbsp;-&nbsp;');

// tables
define('TABLE_HEADING_PRODUCTS', 'Name');
define('TABLE_HEADING_PRICE', 'Price');
define('TABLE_HEADING_BUY_NOW', 'Cart');
define('TABLE_HEADING_QUANTITY', 'Qty');
define('TABLE_HEADING_WISHLIST', 'Wishlist');
define('TABLE_HEADING_SELECT', 'Select');

//errors
define('ERROR_GET_ID', 'Error getting default wishlist id.');
define('ERROR_GET_CUSTDATA', 'Error getting customer data.');
define('ERROR_GET_PERMISSION', 'You do not have permission.');
define('ERROR_GET_WISHLIST', 'Error getting wishlist.');
define('ERROR_GET_WISHLIST_ID', 'Error getting wishlist: id not set.');
define('ERROR_FIND_WISHLIST', 'Error finding wishlists.');
define('ERROR_IS_PRIVATE', 'Error determining if wishlist is private.');
define('ERROR_MAKE_DEFAULT', 'Error setting default.');
define('ERROR_MAKE_DEFAULT_ZERO', 'Error zeroing default.');
define('ERROR_MAKE_PUBLIC', 'Error making wishlist public.');
define('ERROR_MAKE_PRIVATE', 'Error making wishlist private.');
define('ERROR_CREATE_DEFAULT', 'Error creating default wishlist.');
define('ERROR_IN_WISHLIST', 'Error determining if product in wishlist.');
define('ERROR_CREATE_WISHLIST', 'Error creating wishlist.');
define('ERROR_ADD_WISHLIST', 'Error adding wishlist item.');
define('ERROR_EDIT_WISHLIST', 'Error editing wishlist item.');
define('ERROR_ADD_PRODUCT_WISHLIST', 'Error adding product to wishlist.');
define('ERROR_DELETE_DEFAULT_WISHLIST', 'Error deleting default wishlist.');
define('ERROR_DELETE_WISHLIST', 'Error deleting wishlist.');
define('ERROR_DELETE_PRODUCT_WISHLIST', 'Error deleting product from wishlist.');
