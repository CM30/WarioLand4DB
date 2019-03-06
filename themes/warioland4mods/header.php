<?php 
/** Header Template for Wario Land 4 Mod DB **/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
		<meta property="fb:pages" content="528104357381433" />
		<meta name="wot-verification" content="36bd35e65efe0de9256e"/>
		<!-- <link rel="manifest" href="<?php echo get_site_url(); ?>/manifest.json"> -->
	</head>
    <body <?php body_class(); ?>>
        <div class="containerforcontainer">
            <div class="container">
                <?php if(!is_front_page()): ?>
                    <a href="<?php echo get_site_url(); ?>" class="main_logo">
                        <picture>
							<source srcset="<?php echo( get_header_image() ); ?>" media="(min-width: 750px)">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logoIcon.png" alt="<?php bloginfo('name'); ?>">
						</picture>
                    </a>
                <?php else: ?>
                    <h1 class="main_logo">
                        <picture>
							<source srcset="<?php echo( get_header_image() ); ?>" media="(min-width: 750px)">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logoIcon.png" alt="<?php bloginfo('name'); ?>">
						</picture>
                    </h1>
                <?php endif; ?>
                <nav class="navbar navbar-expand-lg navbar-light">
			        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbar" aria-controls="navbar">
				        <span class="navbar-toggler-icon"></span>
			        </button>
                    <?php 
                        $menu_args = array(
                            'theme_location' => 'main_menu',
                            'container' => 'div',
                            'container_class' => 'navbar-collapse collapse',
                            'container_id' => 'navbar',
                            'menu_class' => 'navbar-nav justify-content-center d-flex flex-f'
                        );
                        wp_nav_menu($menu_args);
                    ?>
                </nav>