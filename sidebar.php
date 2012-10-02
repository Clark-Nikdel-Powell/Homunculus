<? $ancestor = highest_ancestor(); ?>
<div id="sidebar" class="ctst">

	<?
	if ( is_page() && get_pages('child_of='.$ancestor['id']) ) { $displaysubnav = true; }
	if ( (is_category() || is_single()) && get_categories('child_of='.$ancestor['id']) ) { $displaysubnav = true; }
	if ( $displaysubnav ) :
	?>
	<div id="subnav">
		<ul>
		<?
		if (is_page()) :
			wp_list_pages('child_of='.$ancestor['id'].'&title_li=');
		elseif (is_category() || is_single()) :
			wp_list_categories('child_of='.$ancestor['id'].'&title_li=&show_option_none=');
		endif;
		?>
		</ul>
	</div><!-- subnav -->
	<? endif; ?>
	
	<?
	$catid = get_cat_id('news');
	$articles = get_posts('category='.$catid.'&numberposts=2&orderby=date');
	if ($catid && $articles) :
	?>
		<ul class="postlist">
		<? foreach ($articles as $pointer => $article) : ?>
			<li><a href="<?= get_permalink($article->ID) ?>"><small><?= get_the_time('l, F j, Y', $article) ?></small><br />
			<?= $article->post_title ?></a></li>
		<? endforeach; ?>
		</ul><!-- postlist -->
		
	<? endif; ?>
	
	<? //dynamic_sidebar('Widgets'); ?>

</div><!-- sidebar -->