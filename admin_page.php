<?php 

// include this file in functions.php

// create the menu tab - http://codex.wordpress.org/Administration_Menus
add_action('admin_menu', 'shnazy_options');
function shnazy_options() {

  //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	// If the function parameter is omitted, the menu_slug should be the PHP file that handles the display of the menu page content.
  add_menu_page("page title", 'Menu Title', 'manage_options','slug_name', 'page_content_func');

  //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
  add_submenu_page( 'slug_name', 'My Submenu Page Title', 'My Menu Submenu Title', 'manage_options', 'slug_name_sub', 'my_custom_submenu_page_callback' );

	register_setting( 
    	'my-settings-group', // option group
    	'my-setting', 		 // option name - exists in the DB 
    	'sanitize_callback'	 // sanitization callback function...
    );
    	// add_settings_section( $id, $title, $callback, $page ):
	    add_settings_section( 
	    	'section-one', 		     // section ID
	    	'Section One', 			 // section title
	    	'section_one_callback',  // usually renders some help text
	    	'slug_name' 			 // the menu slug we used in our add_menu_page()
	    );	
	    	
		    add_settings_field( 
		    	'field-one', 			// $id
		    	'Field One', 			// $title echoed
		    	'field_one_callback', 	// $callback for html
		    	'slug_name', 			// $page
		    	'section-one' 			// $section (optional)
		    );
		    
		    add_settings_field(
		    	'field-two', 			// $id
		    	'Field Two', 			// $title echoed
		    	'field_two_callback', 	// $callback for html
		    	'slug_name', 			// $page
		    	'section-one' 			// $section (optional)
		    );
		    
		    add_settings_field(
		    	'field-three', 			// $id
		    	'Field Three', 			// $title echoed
		    	'field_three_callback', // $callback for html
		    	'slug_name', 			// $page
		    	'section-one' 			// $section (optional)
		    );
}



// The admin page content - add_menu_page
function page_content_func() { ?>
    <div class="wrap">
        <?php screen_icon();?><h2>My Plugin Options</h2>
        <form action="options.php" method="POST">
            <?php 
            	settings_fields( 'my-settings-group' ); // The setting fields will know which settings your options page will handle.
           	    do_settings_sections( 'slug_name' ); // slug_name - the $page parameter of your call to add_settings_section
            	submit_button(); 
            ?>
        </form>
    </div>
<?php }

$options = get_option('my-setting');
global $options;
	// - add_settings_section
	function section_one_callback(){
		echo 'This is Section One\'s Callback <hr>'; 

	}
		// add_settings_field Callbacks echoing stored data in 3 ways
		function field_one_callback(){
			$options = get_option('my-setting');

			echo "<input id='plugin_textarea_string' name='my-setting[text_box]' type='textarea' value='{$options['text_box']}'>";
		}
		// 
		function field_two_callback(){
			$options = get_option('my-setting');
			$text_area_two = esc_attr($options['text_area_two']);
			echo "<input id='plugin_textareatwo_string' name='my-setting[text_area_two]' type='textarea' value='{$text_area_two}'>";
		}
		// 
		function field_three_callback(){
			$options = get_option('my-setting');
			echo "<input id='plugin_textareathree_string' name='my-setting[field_three_callback]' type='textarea' value='{$options['field_three_callback']}'>";
		}



// create submenu content
function my_custom_submenu_page_callback() {
	
	echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
		echo '<h2>My Custom Submenu Page</h2>';
	echo '</div>';
}

// function sanitize_callback(){}





