<?php
/*
	Plugin Name: Remove Problematic Formatting Options From tinyMCE
	Plugin URI: http://www.pixelovely.com/format-web-content-wordpress/
	Description: Removes those extra-tempting but extra-problematic buttons from tinyMCE, like font color, alignment, and other things that will wreck your style sheet. Encourages the use of the "role" dropdown.
	Author: PIXELovely Web Design & Development
	Version: 1.0.2
	Author URI: http://www.PIXELovely.com/
 */

/*  Copyright 2014  Kimberly Genly (email : kim@pixelovely.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

	You may find a copy of the GNU General Public License at http://www.gnu.org/licenses/gpl.html
*/
 
if (isset($wp_version)) {
	add_filter("mce_buttons", "pix_extended_editor_mce_buttons", 0);
	add_filter("mce_buttons_2", "pix_extended_editor_mce_buttons_2", 0);
}

function pix_extended_editor_mce_buttons($buttons) {
return array(
"undo", "redo", "separator",
"bold", "italic", "strikethrough", "separator",
"bullist", "numlist", "separator",
"charmap", "separator", "link", "unlink", "anchor", "blockquote", 
"separator", 
"formatselect", 
"separator", 
"removeformat");
}

function pix_extended_editor_mce_buttons_2($buttons) {
// the second toolbar line
return array();
}


function pix_remove_h1($init) {
  $init['block_formats'] = "Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Address=address; Pre=pre; Code=code";
  return $init;
}

add_filter('tiny_mce_before_init', 'pix_remove_h1' );

?>