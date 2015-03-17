<?php
$type = $post->post_type;
if (is_search())
	$type = 'search';

get_header();

if (have_posts()) { while (have_posts()) { the_post(); ?>

	<article <? post_class(); ?>>

		<? get_template_part('partials/content', $type); ?>

	</article>

<?php } pagination( array('prev_text'=>'&larr; Back', 'next_text'=>'More &rarr;') ); } else { ?>

	<article class="hentry">
		<?php
		if (is_404()) {
			$title = 'Page Not Found';
			$excerpt = 'The page you are looking for could not be found. Perhaps searching the site directory will help you find what you are looking for.';
		}
		if (is_search()) {
			$title = 'No Results Found';
			$excerpt = 'No results were found for your request. Please try another search, or use the site directory to help find what you are looking for.';
		}
		?>
		<div class="postdata">
			<div class="inside">
				<h1 class="title"><?php echo $title; ?></h1>
				<p class="summary"><?php echo $excerpt; ?></p>
			</div>
		</div>
	</article>

<?php } ?>
</div> <?php // .content

get_sidebar();
get_footer();
