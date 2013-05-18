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
	<div class="container">
		<header class="row-fluid">
			<a class="span4" href="<?php echo home_url(); ?>"><img class="uk-logo align-left" src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="Utvecklarkollektivet" width="200" height= "199" /></a>
			<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'container' => '', 'menu_class' => 'nav-menu span5 uk-menu' ) ); ?>

			<?php // Authentication ?>
			<ul class="span3 uk-meta">
				<?php $current_user = wp_get_current_user(); ?>
				<?php if(isset($current_user->data)) : ?>
					<h3 class="uk-meta-user"><?php echo $current_user->display_name; ?></h3>
					<?php echo wp_loginout($_SERVER['REQUEST_URI']); ?>
				<?php else : ?>
					<div class="login-error"></div>				
					<form method="post" id="login-form">
						<input name="log" id="login-name" placeholder="We want your username in this field..." type="text" style="background-image: url(data:image/gif;base64,R0lGODlhEAAQAMQAAHgAFq9RZp8BJfT09JkCJKUuSO/q6/n//vHh5YYBGvf6+tOyucB0hsuLmpUiOpIAHIgJJtzFy7pneuvT2fP49/Dw8L5/juS+x8Scpn4BHaMDJ3cAHHQAG6YDKHEAGv///yH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjEgNjQuMTQwOTQ5LCAyMDEwLzEyLzA3LTEwOjU3OjAxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOkZCN0YxMTc0MDcyMDY4MTFCRURDRjg2RUEzOUI0MjBEIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjUyQjY0RUJGQTQ2QzExRTA5MkM2OTcwNjIwMUM1QjhFIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjUyQjY0RUJFQTQ2QzExRTA5MkM2OTcwNjIwMUM1QjhFIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgTWFjaW50b3NoIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RkE3RjExNzQwNzIwNjgxMTkyQjA4Nzg0MUEyMjBGMUUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RkI3RjExNzQwNzIwNjgxMUJFRENGODZFQTM5QjQyMEQiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQAAAAAACwAAAAAEAAQAAAFmGAnjmTZaSgqCCqbautKdMVaOEQsEDkRTAjN44IIyHi8R+DzYRSYjAcy+Ug0PojJZ/HoUh2BgGRwOCga4UK3uiwP3mSmJVFNBBQVQwWuVzASgAkQDmAVFIcShBCAGY0ZAAsHEZEREACOjgABBxQBDhUHFpeNG6UcDhgLHgCpBQClsKUeHBAeGxkctrAcvL2zub2+HsPExcYhADs=); padding-right: 18px; background-attachment: scroll; border: 1px solid rgb(192, 31, 47); background-position: 100% 50%; background-repeat: no-repeat no-repeat;">
						<input name="pwd" placeholder="...And your password in this" type="password" style="background-image: url(data:image/gif;base64,R0lGODlhEAAQAMQAAHgAFq9RZp8BJfT09JkCJKUuSO/q6/n//vHh5YYBGvf6+tOyucB0hsuLmpUiOpIAHIgJJtzFy7pneuvT2fP49/Dw8L5/juS+x8Scpn4BHaMDJ3cAHHQAG6YDKHEAGv///yH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjEgNjQuMTQwOTQ5LCAyMDEwLzEyLzA3LTEwOjU3OjAxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOkZCN0YxMTc0MDcyMDY4MTFCRURDRjg2RUEzOUI0MjBEIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjUyQjY0RUJGQTQ2QzExRTA5MkM2OTcwNjIwMUM1QjhFIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjUyQjY0RUJFQTQ2QzExRTA5MkM2OTcwNjIwMUM1QjhFIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgTWFjaW50b3NoIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RkE3RjExNzQwNzIwNjgxMTkyQjA4Nzg0MUEyMjBGMUUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RkI3RjExNzQwNzIwNjgxMUJFRENGODZFQTM5QjQyMEQiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQAAAAAACwAAAAAEAAQAAAFmGAnjmTZaSgqCCqbautKdMVaOEQsEDkRTAjN44IIyHi8R+DzYRSYjAcy+Ug0PojJZ/HoUh2BgGRwOCga4UK3uiwP3mSmJVFNBBQVQwWuVzASgAkQDmAVFIcShBCAGY0ZAAsHEZEREACOjgABBxQBDhUHFpeNG6UcDhgLHgCpBQClsKUeHBAeGxkctrAcvL2zub2+HsPExcYhADs=); padding-right: 18px; background-attachment: scroll; border: 1px solid rgb(192, 31, 47); background-position: 100% 50%; background-repeat: no-repeat no-repeat;">
						<input type="checkbox" id="rememberme" name="rememberme"><label for="rememberme">Kom ihåg mig</label>
						<input id="login-submit-button" type="submit" value="Login">
						<input type="hidden" name="action" value="login_action">
					</form>
				<?php endif; ?>
			</ul>
		</header>
		<div id="main" class="site-main">
