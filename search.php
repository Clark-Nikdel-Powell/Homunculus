<?
get_header();
$ancestor = highest_ancestor();
$s = get_query_var('s');
$key = wp_specialchars($s, 1);
?>

<div id="content" class="ctst">
	
	<? get_template_part('layout','beforeinterior'); ?>

		<?
	    print '<h2>'.$wp_query->found_posts.' Search Results</h2>'."\n";
	    get_search_form();
	
	    if (have_posts()) : while (have_posts()) : the_post();
			
			?>
			<div <? post_class(); ?>>
			<?
			
			// shorten content around the query
			$charsBefore = 50;
			$charsTotal = 200;
			$content = strip_tags(get_the_content());
			$position = stripos($content, $key);
			if ($position < $charsBefore) {
				$position = 0;
				$before = "";
			} else {
				$position = $position-$charsBefore;
				$before = "... ";
			}
			if (($position+$charsTotal) > strlen($content)) {
				$length = strlen($content) - $position;
				$after = "";
			} else {
				$length = $charsTotal;
				$after = " ...";
			}
			$shortened = substr($content, $position, $length);
			
			// highlight the query in the shortened content without losing capitalization
			preg_match_all("/$key+/i", $shortened, $matches);
			if (is_array($matches[0]) && count($matches[0]) >= 1) {
				foreach ($matches[0] as $match) {
					$shortened = str_replace($match, '<b class="red">'.$match.'</b>', $shortened);
				}
			}
			$excerpt = $before.$shortened.$after;

			// highlight the query in the title without losing capitalization
			$title = get_the_title();
			preg_match_all("/$key+/i", $title, $matches);
			?>
			
			<h3><a href="<? the_permalink(); ?>"><? print $title; ?></a></h3>
			<? if ($post->post_type == 'post') : ?>
			<p class="meta"><? the_time('F j, Y'); ?> &nbsp;&middot;&nbsp; <? the_category(', ');?></p>
			<? endif; ?>
			<p><? print $excerpt; ?></p>
			
			</div><!-- post_class -->
			<?
			
	    endwhile; endif;
	
	    if (function_exists('pagination')) { pagination(); }
		?>
</div><!-- content -->

<?
get_sidebar();
get_template_part('layout','afterinterior');
get_footer();
?>
