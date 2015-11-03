<?php
function add_capability() {
    // gets the author role
    $role = get_role( 'editor' );

    // This only works, because it accesses the class instance.
    $role->add_cap('edit_users'); 
    $role->add_cap('create_users'); 
    $role->add_cap('delete_users'); 
}
add_action( 'admin_init', 'add_capability');

?>