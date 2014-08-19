<?php
$type = $post->post_type;
if (is_search())
	$type = 'search';

get_header();

if (have_posts()) { while (have_posts()) { the_post(); ?>

	<article <? post_class(); ?>>

		<? get_template_part('partials/content', $type); ?>

	</article>

<?php } pagination('&larr; Back', 'More &rarr;'); } else { ?>

	<article class="hentry">
		<p class="summary">There is nothing in this section right now. Check back later for updates!</p>
	</article>

<?php } ?>
</div> <?php // .content

get_sidebar();
get_footer();
