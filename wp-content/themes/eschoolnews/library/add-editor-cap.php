<?php

// Customizes 'Editor' role to have the ability to modify menus, add new users
// and more.
class Custom_Admin {
    // Add our filters
    public function __construct(){
        // Allow editor to edit theme options (ie Menu)
        add_action('init', array($this, 'init'));
        add_filter('editable_roles', array($this, 'editable_roles'));
        add_filter('map_meta_cap', array($this, 'map_meta_cap'), 10, 4);
    }

    public function init() {
        if ($this->is_client_admin()) {
            // Disable access to the theme/widget pages if not admin
            add_action('admin_head', array($this, 'modify_menus'));
            add_action('load-themes.php', array($this, 'wp_die'));
            add_action('load-widgets.php', array($this, 'wp_die'));
            add_action('load-customize.php', array($this, 'wp_die'));

            add_filter('user_has_cap', array($this, 'user_has_cap'));
        }
    }

    public function wp_die() {
        _default_wp_die_handler(__('You do not have sufficient permissions to access this page.'));
    }

    public function modify_menus() 
    {

        remove_menu_page( 'themes.php' );
        //remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
        //remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu

        // Appearance Menu
        //global $menu;
        //global $submenu;
        //if (isset($menu[60][0])) {
          //  $menu[60][0] = "Menus"; // Rename Appearance to Menus
        //}
        //unset($submenu['themes.php'][6]); // Customize
    }

    // Remove 'Administrator' from the list of roles if the current user is not an admin
    public function editable_roles( $roles ){
        if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
            unset( $roles['administrator']);
        }
        return $roles;
    }

    public function user_has_cap( $caps ){
        $caps['list_users'] = true;
        $caps['create_users'] = true;

        $caps['edit_users'] = true;
        $caps['promote_users'] = true;

        $caps['delete_users'] = true;
        $caps['remove_users'] = true;

        $caps['edit_theme_options'] = true;
        return $caps;
    }

    // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
    public function map_meta_cap( $caps, $cap, $user_id, $args ){
        // $args[0] == other_user_id
        foreach($caps as $key => $capability)
        {
            switch ($cap)
            {
                case 'edit_user':
                case 'remove_user':
                case 'promote_user':
                    if(isset($args[0]) && $args[0] == $user_id) {
                        break;
                    }
                    else if(!isset($args[0])) {
                        $caps[] = 'do_not_allow';
                    }
                    // Do not allow non-admin to edit admin
                    $other = new WP_User( absint($args[0]) );
                    if( $other->has_cap( 'administrator' ) ){
                        if(!current_user_can('administrator')){
                            $caps[] = 'do_not_allow';
                        }
                    }
                    break;
                case 'delete_user':
                case 'delete_users':
                    if( !isset($args[0])) {
                        break;
                    }
                    // Do not allow non-admin to delete admin
                    $other = new WP_User(absint($args[0]));
                    if( $other->has_cap( 'administrator' ) ){
                        if(!current_user_can('administrator')){
                            $caps[] = 'do_not_allow';
                        }
                    }
                    break;
                break;
            }
        }
        return $caps;
    }

    // If current user is called admin or administrative and is an editor
    protected function is_client_admin() {
        $current_user = wp_get_current_user();
        $is_editor = isset($current_user->caps['editor']) ? $current_user->caps['editor'] : false;
        return ($is_editor);
    }
}
new Custom_Admin();

?>