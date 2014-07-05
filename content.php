
<? if (highest_ancestor('return=name') != $post->post_title) { ?>
<div class="postdata">
	<h1><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h1>
	<? if (!is_post_type_hierarchical($post->post_type)) { ?>
	<p class="meta">
		Posted on <? the_time('F j, Y'); ?>
		<? if ($post->post_type == 'post') {
			echo 'in ';
			the_category(', ');
		} ?>
	</p>
	<? } ?>
</div><!-- postdata -->
<? } ?>

<?
// Post Excerpt
if (has_excerpt()) {echo '<p class="summary">'.get_the_excerpt().'</p>';}

// Post body
the_content();

if (is_singular()) { edit_post_link('Edit this', '<p>','</p>'); }
