<?
get_header('int');

if (have_posts()) { while (have_posts()) { the_post(); ?>

	<article <? post_class(); ?>>

		<? get_template_part('content', $post->post_type); ?>

	</article>

<? } pagination('&larr; Back', 'More &rarr;'); } else { ?>

	<article class="hentry">

		<p class="summary">There is nothing in this section right now. Check back later for updates!</p>

	</article>

<?
}

get_footer('int');
?>
