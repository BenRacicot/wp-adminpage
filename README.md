wp-adminpage
============

A basic 'quick file' to create a standard admin page and sub-menu page. 

I whipped up this little file to walk me through the process of creating top level admin pages and to document the common functions needed. (they get confusing)

<h2>Steps for use:</h2>
<ol>
<li>Read through the comments and make the file farmiliar before customizing. </li>

<li>Rename add_menu_page()'s Page Title, Menu Title, Slug Name and function name to your prefrence. Note: slug_name is used in several places. page_content_func is the page's html output function.</li>

<li>Rename register_setting()'s options group (used within settings_fields()), 
	the options name (used in settings_fields() & any get_option('my-setting') in the future), 
	and finally the optional yet "c'mon guy's" sanitization callback (these are used throughout the file and saved to your WP DB!)</li>

<li>include('admin_page.php');</li>
</ol>

<h3>Function Notes:</h3>

<b>add_action('admin_menu', 'shnazy_options');<b>


<b>add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );<b>
	Could use add_options_page() as well. If the function parameter is omitted, the menu_slug should be the PHP file that handles the display of the menu page content.

<b>add_submenu_page()<b>




