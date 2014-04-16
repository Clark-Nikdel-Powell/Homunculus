
<div id="sidebar" class="ctst">

	<?= ($subnav = cnp_subnav() ? $subnav : '') ?>

	<?
	$catid = get_cat_id('news');
	$articles = get_posts('category='.$catid.'&numberposts=2&orderby=date');
	if ($catid && $articles) {
	?>
		<ul class="postlist">
		<? foreach ($articles as $pointer => $article) : ?>
			<li><a href="<?= get_permalink($article->ID) ?>"><small><?= get_the_time('l, F j, Y', $article) ?></small><br />
			<?= $article->post_title ?></a></li>
		<? endforeach; ?>
		</ul><!-- postlist -->

	<? } ?>

	<? //dynamic_sidebar('Widgets'); ?>

</div><!-- sidebar -->