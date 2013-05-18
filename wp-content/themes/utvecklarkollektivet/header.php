<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * Add class to allow styling for toolbar.
 */
$html_class = ( is_admin_bar_showing() ) ? 'wp-toolbar' : '';

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 <?php echo $html_class; ?>" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 <?php echo $html_class; ?>" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="<?php echo $html_class; ?>" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="uk-message"></div>
	<div class="container">
		<header class="row-fluid">
			<a class="span4" href="<?php echo home_url(); ?>"><img class="uk-logo align-left" src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="Utvecklarkollektivet" width="200" height= "199" /></a>
			<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'container' => '', 'menu_class' => 'nav-menu span5 uk-menu' ) ); ?>

			<?php // Authentication ?>
			<div id="uk-meta" class="span3 uk-meta">
				<?php $current_user = wp_get_current_user(); ?>
				<?php if(isset($current_user->data)) : ?>
					<h3 class="uk-meta-user"><?php echo $current_user->display_name; ?></h3>
					<?php echo wp_loginout($_SERVER['REQUEST_URI']); ?>
				<?php else : ?>
					<form method="post" id="login-form">
						<label for="login-name">Användarnamn</label>
						<input name="log" id="login-name" type="text">
						<label for="login-password">Lösenord</label>
						<input name="pwd" id="login-password" type="password">
						<label class="uk-login-rememberme-label" for="rememberme">Kom ihåg mig</label>
						<input class="uk-login-rememberme" id="rememberme" name="rememberme" type="checkbox">
						<input class="btn btn-success uk-login-submit" id="login-submit-button" type="submit" value="Logga in">
						<input type="hidden" name="action" value="login_action">
					</form>
				<?php endif; ?>
			</div>
		</header>
		<div id="main" class="site-main">
