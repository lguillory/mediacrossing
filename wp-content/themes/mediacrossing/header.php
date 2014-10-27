<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Mediacrossing
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon.ico" />

<?php wp_head(); ?>

<!--[if lt IE 8]>
<div class="msgIE">Pour profiter pleinement des fonctionnalités de ce site internet, veuillez mettre à jour votre navigateur. <a href="http://windows.microsoft.com/fr-FR/internet-explorer/downloads/ie" title="Mettre à jour son navigateur">Cliquez ici…</a></div>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
<div id="page">	

	<header id="masthead" class="site-header" role="banner">
		<div id="header-site">
			<div class="site-branding">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">			
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- #header-site -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
