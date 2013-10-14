wp-adminpage
============

A basic 'quick file' to create a standard admin page and sub-menu page. 

I whipped up this little file to walk me through the process of creating top level admin pages and to document the common functions needed. (they get confusing)

<h2>Steps for use:</h2>
<ol>
<li>Read through the comments and make the file familiar before customizing. </li>

<li>Rename add_menu_page()'s Page Title, Menu Title, Slug Name and function name to your preference. Note: slug_name is used in several places. page_content_func is the page's html output function.</li>

<li>Rename register_setting()'s options group (used within settings_fields()), 
the options name (used in settings_fields() & any get_option('my-setting') in the future), 
and finally the optional yet "c'mon guy's" sanitization callback (these are used throughout the file and saved to your WP DB!)</li>

<li>include('admin_page.php');</li>
</ol>

<h3>Function Notes:</h3>

<b>add_action('admin_menu', 'shnazy_options');<b>

	initializes some shnazy options when the admin_menu fires. Some use the admin_init hook instead.

<b><a href="http://codex.wordpress.org/Function_Reference/add_menu_page" target="_blank">add_menu_page</a>($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );<b>

	The main function to add a top level page tab on the administration menu.
	Could use add_options_page() as well. If the function parameter is omitted, the menu_slug should be the PHP file that handles the display of the menu page content.

<b><a href="http://codex.wordpress.org/Function_Reference/add_submenu_page" target="_blank">add_submenu_page</a>($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);<b>

	Requires the function parameter that handles the display of the menu page content

<b> In order to use the Settings API properly </b>

<a href="http://codex.wordpress.org/Function_Reference/register_setting" target="_blank">register_setting</a>( $option_group, $option_name, $sanitize_callback );

The group name groups the option_names together for security reasons when saving the data. This is a big part of the settings API and is used with settings_fields($option_group). $option_name is the option name to save or retrieve, it is saved as an array. Sanitization is the ush.


<a href="http://codex.wordpress.org/Function_Reference/add_settings_section" target="_blank">add_settings_section</a>( $id, $title, $callback, $page );

"Settings Sections are the groups of settings you see on WordPress settings pages with a shared heading."


<a href="add_settings_field" target="_blank" rel="dofollow"style="">add_settings_field</a>( $id, $title, $callback, $page, $section, $args );

"Register a settings field to a settings page and section." Its $callback function "needs to output the appropriate html input and fill it with the old value, the saving will be done behind the scenes.

The html input field's name attribute must match $option_name in register_setting(), and value can be filled using get_option()."

