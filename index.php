<?
get_header();
get_template_part('layout','beforeinterior');
?>

<div id="content" class="ctst">

<? if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div <? post_class(); ?>>
		
		<div class="postdata">
			<h1><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h1>
			<? if ($post->post_type == 'post') : ?>
			<p class="meta">Posted by <? the_author_posts_link(); ?> on <? the_time('l, F j, Y'); ?> in <? the_category(', '); ?></p>
			<? endif; ?>
		</div><!-- postdata -->
		
		<?
		print (has_excerpt() ? '<p class="summary">'.get_the_excerpt().'</p>' : '');
		the_content();
		if (is_singular()) { edit_post_link('Edit this', '<p>','</p>'); }
		?>
		
	</div><!-- post_class -->
	
<? endwhile; pagination(); else : ?>
	
	<div class="hentry">
		
		<p class="summary">There is nothing in this section. Check back later for updates!</p>
				
	</div><!-- hentry -->
	
<? endif; ?>

</div><!-- content -->

<?
get_template_part('layout','beforeinterior');
get_footer();
?>
