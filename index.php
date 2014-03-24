<?
get_header('int');
if ( is_search() ) {$type = 'search';}
else {$type = $post->post_type;}

if (have_posts()) { while (have_posts()) { the_post(); ?>

	<div <? post_class(); ?>>

		<? get_template_part('content', $type); ?>

	</div>

<? } pagination('&larr; Back', 'More &rarr;'); } else { ?>

	<div class="hentry">

		<p class="summary">There is nothing in this section right now. Check back later for updates!</p>

	</div>

<?
}

get_footer('int');
?>
