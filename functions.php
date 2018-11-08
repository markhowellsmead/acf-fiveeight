<?php

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
});


function my_acf_block_render_callback($block)
{
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if (file_exists(STYLESHEETPATH . "/template-parts/block/content-{$slug}.php")) {
		include(STYLESHEETPATH . "/template-parts/block/content-{$slug}.php");
	}
}

// This sample code is copied 1:1 from https://www.advancedcustomfields.com/blog/acf-5-8-introducing-acf-blocks-for-gutenberg/
add_action('acf/init', function () {
	// check function exists
	if (function_exists('acf_register_block')) {
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('A custom testimonial block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));
	}
});
