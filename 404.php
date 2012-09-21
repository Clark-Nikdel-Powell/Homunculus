<?
get_header();
get_template_part('layout','beforeinterior');
?>

<div id="content" class="ctst">
	
	<div class="hentry">
		
		<div class="postdata">
			<h1>Page Not Found</h1>
		</div><!-- postdata -->
		
		<p class="summary">We're sorry, but the page you are looking for does not exist. Perhaps searching the site would help.</p>
		<? get_search_form(); ?>
		
	</div><!-- hentry -->
	
</div><!-- content -->

<?
get_template_part('layout','beforeinterior');
get_footer();
?>
