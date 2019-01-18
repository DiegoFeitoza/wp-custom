<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">
				<div class="container">
					<div class="row">
						<!-- nav -->
						<nav class="navegacao" role="navigation" id="menu-nav">
							<a class="" href="<?php echo home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
							</a>
							<div class="" id="menu-principal">
								<?php html5blank_nav(); ?>
							</div>
						</nav>
						<!-- /nav -->
					</div>
				</div>
				<?php
					$menu_name = 'menu_filmes';
 
					if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
						$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
					 
						$menu_items = wp_get_nav_menu_items($menu->term_id);
					 
						$menu_list = '<ul id="menu-' . $menu_name . '">';
					 
						foreach ( (array) $menu_items as $key => $menu_item ) {
							$title = $menu_item->title;
							$url = $menu_item->url;
							$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
						}
						$menu_list .= '</ul>';
					} else {
						$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
					}
					echo $menu_list;

				?>
			</header>
			<!-- /header -->
