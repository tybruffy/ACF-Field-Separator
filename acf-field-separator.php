<?php
/*
	Plugin Name: ACF Field Separator
	Plugin URI: https://github.com/tybruffy/ACF-Field-Separator
	Description: Allows you to insert a heading in between fields.
	Version: 1.0.0
	Author: tybruffy
	Author URI: https://github.com/tybruffy/
	GitHub Plugin URI: https://github.com/tybruffy/ACF-Field-Separator
	License: GPL
*/

function include_field_types_field_separator( $version ) {
    include_once('acf-field-separator-v5.php');
}
add_action('acf/include_field_types', 'include_field_types_field_separator'); 

?>
