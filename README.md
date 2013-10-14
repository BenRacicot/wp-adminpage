wp-adminpage
============

A basic 'quick file' to create a standard admin page and sub-menu page. 

I whipped up this little file to walk me through the process of creating top level admin pages and to document the common files needed for such.

Steps for use:

1: Read through the comments and make the file farmiliar before customizing. 

2: Rename add_menu_page()'s Page Title, Menu Title, Slug Name and function name to your prefrence. Note: slug_name is used in several places. page_content_func is the page's html output function.

3: Rename register_setting()'s options group (used in within settings_fields()), the options name (used in settings_fields() & any get_option('my-setting') in the future), and finally the optional yet "c'mon guy's" sanitization callback (these are used throughout the file and saved to your WP DB!)

4: include('admin_page.php');


Function Notes:

add_action('admin_menu', 'shnazy_options');


add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	Could use add_options_page() as well. If the function parameter is omitted, the menu_slug should be the PHP file that handles the display of the menu page content.

add_submenu_page()




