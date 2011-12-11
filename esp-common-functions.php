<?php
// Some common ESP functions

// Change the login URL to the site homepage
add_filter( 'login_headerurl', 'esp_change_login_url' );
function esp_change_login_url( $message ) {
	return get_bloginfo( 'url' );
}

// Change the login title text
add_filter( 'login_headertitle', 'esp_change_login_title' );
function esp_change_login_title( $message ) {
	return get_bloginfo( 'description' );
}

/* Add our own menu to the Admin bar
 *
 * NOTE: $wp_admin_bar->add_node() requires WordPress 3.3 and later. If
 * you are using an earlier version, use $wp_admin_bar->add_menu() instead
 */
add_action( 'admin_bar_menu', 'esp_quick_access_menu', 75 );
function esp_quick_access_menu( $wp_admin_bar ) {
    $wp_admin_bar->add_node( array(
        'id' => 'esp_menu',
        'title' => 'Quick Access'
    ) );
    $wp_admin_bar->add_node( array(
        'id' => 'esp_menu_widgets',
        'parent' => 'esp_menu',
        'title' => 'Widgets',
        'href' => admin_url( 'widgets.php' )
    ) );
    $wp_admin_bar->add_node( array(
        'id' => 'esp_menu_add_post',
        'parent' => 'esp_menu',
        'title' => 'Add Post',
        'href' => admin_url( 'post-new.php')
    ) );
    $wp_admin_bar->add_node( array(
        'id' => 'esp_menu_all_posts',
        'parent' => 'esp_menu',
        'title' => 'All Posts',
        'href' => admin_url( 'edit.php' )
    ) );
    $wp_admin_bar->add_node( array(
        'id' => 'esp_menu_plugins',
        'parent' => 'esp_menu',
        'title' => 'Plugins',
        'href' => admin_url( 'plugins.php' )
    ) );
    $wp_admin_bar->add_node( array(
        'id' => 'esp_menu_nav_menu',
        'parent' => 'esp_menu',
        'title' => 'Menus',
        'href' => admin_url( 'nav-menus.php' )
    ) );
}

// I really don't see the need for the Genesis Readme menu
remove_theme_support( 'genesis-readme-menu' );



?>