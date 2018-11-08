<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// get image field (array)
$avatar = get_field('avatar');

// create id attribute for specific styling
$id = 'testimonial-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$background_color = get_field('background_color') ? get_field('background_color') : 'initial';
$text_color = get_field('text_color') ? get_field('text_color') : 'initial';

?>
<blockquote id="<?php echo $id; ?>" class="testimonial <?php echo $align_class; ?>">
	<p class="thequote"><?php the_field('testimonial'); ?></p>
	<cite>
		<img src="<?php echo $avatar['url']; ?>" alt="<?php echo $avatar['alt']; ?>" />
		<span><?php the_field('author'); ?></span>
	</cite>
</blockquote>
<style type="text/css">
	.testimonial .thequote {
		padding: 1rem;
	}
	.testimonial cite span {
		display: block;
		padding: 1rem;	
	}
	.testimonial.alignleft {
		text-align: left;
	}
	.testimonial.aligncenter {
		text-align: center;
	}
	.testimonial.alignright {
		text-align: right;
	}
	#<?php echo $id; ?> {
		background: <?php echo $background_color; ?>;
		color: <?php echo $text_color; ?>;
	}
</style>