<?php

/*
*  ACF Field Separator Class
*
*  All the logic for this field type
*
*  @class 		acf_field_separator
*  @extends		acf_field
*  @package		ACF
*  @subpackage	Fields
*/

if( ! class_exists('acf_field_separator') ) :

class acf_field_separator extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {

		$this->name = 'separator';
		$this->label = __("Separator",'acf');
		$this->category = 'layout';

		add_filter("acf/get_field_types", array($this, 'get_field_types'), 10, 1);
		
		// do not delete!
    	parent::__construct();
	}
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function render_field( $field ) {
		echo '<h2 class="acf-heading"><span>' . $field['label'] . '</span></h2>';
	}
	
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @param	$field	- an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function render_field_settings( $field ) {
		acf_render_field_setting( $field, array(
			'label'			=> __('Instructions','acf'),
			'instructions'	=> '',
			'type'			=> 'message',
			'message'		=> 'Use "Field Separators" to better organize your edit screen by grouping fields together. The separator field just adds a lined heading between groups of fields, with the field Label as the text',
		));	
	}


	function field_group_admin_head() {
		?>
		<style type="text/css">

		.acf-field-list .acf-field-object-separator tr[data-name="name"], 
		.acf-field-list .acf-field-object-separator tr[data-name="instructions"], 
		.acf-field-list .acf-field-object-separator tr[data-name="required"], 
		.acf-field-list .acf-field-object-separator tr[data-name="wrapper"], 
		.acf-field-list .acf-field-object-separator tr[data-name="warning"] {
			display: none !important;
		}
		</style>
		<script type="text/javascript">
			acf.add_action('change_field_type', function( $el ){
				var	type	= $el.attr('data-type');
				
				//  Remove field name
				if ( type == 'separator' ) {
					$el.find('tr[data-name="name"] input').val('').trigger('keyup');
				}
			});

			acf.add_action('change_field_label', function( $el ){
				var $label = $el.find('tr[data-name="label"]:first input'),
					$name  = $el.find('tr[data-name="name"]:first input'),
					type   = $el.attr('data-type');

				if ( type == 'separator' ) {
					$name.val('').trigger('change');
					$el.find('> .field-info .li-field_name').text('');
					return;
				}
			});
		</script>

			<?php
	}
	
	function input_admin_head() {
		wp_enqueue_style( "acf-separator-css", plugin_dir_url( __FILE__ ) . 'css/input.css');	
	}

}

new acf_field_separator();

endif;

?>
