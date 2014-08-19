<?
$ancestor = highest_ancestor();
?>
<header class="section">
	<h2><? echo $ancestor['name']; ?></h2>
</header>

<? get_template_part('partials/nav', 'breadcrumbs'); ?>