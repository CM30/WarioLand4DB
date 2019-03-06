<?php 
	/* A standard list of Mods used for the main page */
    get_header();
    if(have_posts()):
        get_template_part('content/list', 'mods');
	else:
		get_template_part('errors/error','no-content');
	endif;
	get_footer();
?>