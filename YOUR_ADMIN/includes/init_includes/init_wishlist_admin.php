<?php
// -----
// Part of the Wishlist plugin, created by Thomas McCaffery

if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

if (empty($_SESSION['admin_id'])) {
    return;
}

define ('WISHLISTS_CURRENT_VERSION', '1.6');
define ('WISHLISTS_CURRENT_UPDATE_DATE', '2019-08-12');

$version_release_date = WISHLISTS_CURRENT_VERSION . ' (' . WISHLISTS_CURRENT_UPDATE_DATE . ')';

function init_wishlist_next_sort($menu_key) 
{
    global $db;
    $next_sort = $db->Execute('SELECT MAX(sort_order) as max_sort FROM ' . TABLE_ADMIN_PAGES . " WHERE menu_key='$menu_key'");
    return $next_sort->fields['max_sort'] + 1;
}

$configurationGroupTitle = 'Wishlist Configuration';
$configuration = $db->Execute("SELECT configuration_group_id FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_title = '$configurationGroupTitle' LIMIT 1");
if ($configuration->EOF) {
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION_GROUP . "
                 (configuration_group_title, configuration_group_description, sort_order, visible)
                 VALUES ('$configurationGroupTitle', '$configurationGroupTitle', '1', '1');");
    $cgi = $db->Insert_ID();
    $db->Execute("UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = $cgi WHERE configuration_group_id = $cgi;");
} else {
    $cgi = $configuration->fields['configuration_group_id'];
}

// ----
// Record the configuration's current version in the database.
//
if (defined('WISHLISTS_MODULE_VERSION')) {
    $wishlists_versions = explode(' ', WISHLISTS_MODULE_VERSION);
    $wishlists_current_version = $wishlists_versions[0];
} else {
    $wishlists_current_version = '0.0.0';
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, set_function) VALUES ('Version/Release Date', 'WISHLISTS_MODULE_VERSION', '" . $version_release_date . "', 'The Wishlists version number and release date.', $cgi, 1, now(), 'trim(')");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist Module Switch', 'MODULE_WISHLISTS_ENABLED', 'true', 'Set this option true or false to enable or disable the wishlist', $cgi, 5, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist sidebox header link', 'SIDEBOX_LINK_HEADER', 'true', 'Set this option true or false to make the sidebox header a link to the wishlist page.', $cgi, 6, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist allow multiple lists', 'ALLOW_MULTIPLE_WISHLISTS', 'true', 'Set this option true or false to allow for more than 1 wishlist', $cgi, 7, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist display category filter', 'DISPLAY_CATEGORY_FILTER', 'false', 'Set this option true or false to enable a category filter', $cgi, 8, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist default name', 'DEFAULT_WISHLIST_NAME', 'Default', 'Enter the name you want to be assigned to the initial wishlist.', $cgi, 9, now(), NULL, NULL)");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist show list after product addition', 'DISPLAY_WISHLIST', 'false', 'Set this option true or false to show the wishlist after a product was added to the wishlist', $cgi, 10, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist display max items in extended view', 'MAX_DISPLAY_EXTENDED', '10', 'Enter the maximum amount of products you want to show in extended view.<br />default = 10', $cgi, 11, now(), NULL, NULL)");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist display max items in compact view', 'MAX_DISPLAY_COMPACT', '20', 'Enter the maximum amount of products you want to show in extended view.<br />default = 20', $cgi, 12, now(), NULL, NULL)");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist default view Switch', 'DEFAULT_LIST_VIEW', 'extended', 'Set the default view of the list to compact or extended view', $cgi, 13, now(), NULL, 'zen_cfg_select_option(array(\'compact\', \'extended\'),')");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function ) VALUES ( 'Wishlist allow multiple products to cart', 'ALLOW_MULTIPLE_PRODUCTS_CART_COMPACT', 'false', 'Set this option true or false to allow multiple products to be moved in the cart via checkboxes in compact view', $cgi, 14, now(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),')");
    }
    $db->Execute(
                "DROP TABLE IF EXISTS " . TABLE_WISHLISTS . ", " . TABLE_PRODUCTS_TO_WISHLISTS
            );
            $db->Execute(
                "CREATE TABLE " . TABLE_WISHLISTS . " (

                    id int(11) NOT NULL auto_increment,
                    customers_id int(11) NOT NULL,
                    created datetime default NULL,
                    modified datetime default NULL,
                    name varchar(255) NOT NULL default '',
                    comment varchar(255) NOT NULL default '',
                    default_status int(1) NOT NULL,
                    public_status int(1) NOT NULL,
                    PRIMARY KEY (id)
                 ) ENGINE=MyISAM"
            );
            $db->Execute(
                "CREATE TABLE " . TABLE_PRODUCTS_TO_WISHLISTS . " (
                    products_id int(11) NOT NULL,
                    wishlists_id int(11) NOT NULL,
                    created datetime default NULL,
                    modified datetime default NULL,
                    quantity int(2) NOT NULL,
                    priority int(1) NOT NULL,
                    comment varchar(255) NOT NULL default '',
                    attributes varchar(255) NOT NULL default '',
                    PRIMARY KEY (products_id,wishlists_id)
                 ) ENGINE=MyISAM"
            );
        
 // Register the admin-level pages for use.
 //
if (function_exists('zen_page_key_exists')) {
    if (!zen_page_key_exists('toolsWishlist')) {
        zen_register_admin_page('toolsWishlist', 'BOX_TOOLS_WISHLISTS', 'FILENAME_WISHLISTS', '', 'tools', 'Y', init_wishlist_next_sort ('tools'));
    }
    if (!zen_page_key_exists('configWishListModule')) {
        zen_register_admin_page('configWishListModule', 'BOX_CONFIGURATION_WISHLIST', 'FILENAME_CONFIGURATION', "gID=$cgi", 'configuration', 'Y', init_wishlist_next_sort ('configuration'));
        }

    // -----
    // Now, update the current configuration version for the plugin.
    //
    $db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $version_release_date . "' WHERE configuration_key = 'WISHLISTS_MODULE_VERSION' LIMIT 1");
}

