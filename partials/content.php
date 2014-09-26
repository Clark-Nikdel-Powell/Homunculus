<?php

cnp_postdata_header($post);

// Post body
if (is_singular()) {
	the_content();
	edit_post_link('Edit this', '<p>','</p>');
}
