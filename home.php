<?
get_header();
get_template_part('layout','beforehome');
?>

<div id="content" class="ctst">

	<?
	$catid = get_cat_id('news');
	$articles = get_posts('category='.$catid.'&numberposts=5&orderby=date');
	if ($catid && $articles) :
	?>
		<p>
		<small><?= get_the_time('l, F j, Y', $articles[0]->ID) ?></small><br />
		<big><a href="<?= get_permalink($articles[0]->ID) ?>"><?= $articles[0]->post_title ?></a></big><br />
		<?= get_excerpt($articles[0]) ?>
		</p>
		
		<ul class="postlist">
		<? foreach ($articles as $pointer => $article) : if ($pointer != 0) : ?>
			<li><a href="<?= get_permalink($article->ID) ?>"><small><?= get_the_time('l, F j, Y', $article) ?></small><br />
			<?= $article->post_title ?></a></li>
		<? endif; endforeach; ?>
		</ul><!-- postlist -->
		
	<? endif; ?>

</div><!-- content -->

<?
get_template_part('layout','afterhome');
get_footer();
?>