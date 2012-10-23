<? get_header(); ?>

<div id="slideshow">
	
	<div id="slides">
	<div class="slide">
		
		<img src="http://placekitten.com/400/400">
		<h1>Title of Slide</h1>
		
	</div><!-- slide -->
	<div class="slide">
		
		<img src="http://placekitten.com/400/400">
		<h1>Title of Slide</h1>
		
	</div><!-- slide -->
	</div><!-- slides -->
	
	<nav id="slide-stepper">
		<a href="#" class="prev">Previous</a>
		<a href="#" class="next">Next</a>
	</nav>
	
	<nav id="slide-counter">
		<a href="#">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
		<a href="#">4</a>
		<a href="#">5</a>
	</nav>
	
</div><!-- slideshow -->

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

<? get_footer(); ?>