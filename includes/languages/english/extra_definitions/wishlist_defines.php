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
if(UN_DB_DISPLAY_CATEGORY_FILTER == 'true'){
        define('UN_DISPLAY_CATEGORY_FILTER', true);
} else {
        define('UN_DISPLAY_CATEGORY_FILTER', false);}
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
define('UN_TEXT_SORT', 'Sort');
define('UN_TEXT_SHOW', 'Show');
define('UN_TEXT_VIEW', 'View');
define('UN_TEXT_ALL_CATEGORIES', 'All Categories');

// more
define('TEXT_ADD_WISHLIST', 'Add to Wishlist');
define('TEXT_REMOVE_WISHLIST', 'Remove from Wishlist');
define('UN_BUTTON_IMAGE_SAVE', BUTTON_IMAGE_UPDATE);
define('UN_BUTTON_SAVE_ALT', BUTTON_UPDATE_ALT);
define('TEXT_EMAIL_WISHLIST', 'Tell a Friend');
define('TEXT_FIND_WISHLIST', 'Find a Friend\'s Wish List');
define('TEXT_NEW_WISHLIST', 'Create a new Wish List');
define('TEXT_MANAGE_WISHLISTS', 'Manage my Wish Lists');
define('TEXT_WISHLIST_MOVE', 'Move items between Wish Lists');
define('SUCCESS_ADDED_TO_WISHLIST_PRODUCT', 'Successfully added Product to the Wish List ...');

define('UN_TEXT_PRIORITY', 'Priority');
define('UN_TEXT_DATE_ADDED', 'Date Added');
define('UN_TEXT_QUANTITY', 'Quantity');
define('UN_TEXT_COMMENT', 'Comment');

define('UN_TEXT_PRIORITY_0', '0 - Don\'t buy this for me');
define('UN_TEXT_PRIORITY_1', '1 - I\'m thinking about it');
define('UN_TEXT_PRIORITY_2', '2 - Like to have');
define('UN_TEXT_PRIORITY_3', '3 - Love to have');
define('UN_TEXT_PRIORITY_4', '4 - Must have');

// product lists
define('UN_TEXT_NO_PRODUCTS', 'No products currently in list.');
define('UN_TEXT_COMPACT', 'Compact');
define('UN_TEXT_EXTENDED', 'Extended');

// general
define('UN_LABEL_DELIMITER', ': ');
define('UN_TEXT_REMOVE', 'Remove');
define('UN_EMAIL_SEPARATOR', "-------------------------------------------------------------------------------\n");
define('UN_TEXT_DATE_AVAILABLE', 'Date Available: %s');
define('UN_TEXT_FORM_FIELD_REQUIRED', '*');
define('TEXT_OPTION_DIVIDER', '&nbsp;-&nbsp;');

// tables
define('UN_TABLE_HEADING_PRODUCTS', 'Name');
define('UN_TABLE_HEADING_PRICE', 'Price');
define('UN_TABLE_HEADING_BUY_NOW', 'Cart');
define('UN_TABLE_HEADING_QUANTITY', 'Qty');
define('UN_TABLE_HEADING_WISHLIST', 'Wishlist');
define('UN_TABLE_HEADING_SELECT', 'Select');

//errors
define('UN_ERROR_GET_ID', 'Error getting default wishlist id.');
define('UN_ERROR_GET_CUSTDATA', 'Error getting customer data.');
define('UN_ERROR_GET_PERMISSION', 'You do not have permission.');
define('ERROR_GET_WISHLIST', 'Error getting wishlist.');
define('ERROR_GET_WISHLIST_ID', 'Error getting wishlist: id not set.');
define('ERROR_FIND_WISHLIST', 'Error finding wishlists.');
define('UN_ERROR_IS_PRIVATE', 'Error determining if wishlist is private.');
define('UN_ERROR_MAKE_DEFAULT', 'Error setting default.');
define('UN_ERROR_MAKE_DEFAULT_ZERO', 'Error zeroing default.');
define('UN_ERROR_MAKE_PUBLIC', 'Error making wishlist public.');
define('UN_ERROR_MAKE_PRIVATE', 'Error making wishlist private.');
define('UN_ERROR_CREATE_DEFAULT', 'Error creating default wishlist.');
define('ERROR_IN_WISHLIST', 'Error determining if product in wishlist.');
define('ERROR_CREATE_WISHLIST', 'Error creating wishlist.');
define('ERROR_ADD_WISHLIST', 'Error adding wishlist item.');
define('ERROR_EDIT_WISHLIST', 'Error editing wishlist item.');
define('ERROR_ADD_PRODUCT_WISHLIST', 'Error adding product to wishlist.');
define('ERROR_DELETE_DEFAULT_WISHLIST', 'Error deleting default wishlist.');
define('ERROR_DELETE_WISHLIST', 'Error deleting wishlist.');
define('ERROR_DELETE_PRODUCT_WISHLIST', 'Error deleting product from wishlist.');