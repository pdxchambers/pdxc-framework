<?php
/**
 * The header template
 *
 * @package WordPress
 * @subpackage pdxc-framework
 * @since PDXC Framework 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="site-container">
			<header id="site-header">
				<div>
						<!--
						Display custom branding using the Theme Customizer. See functions.php line 61 for more info.
						 -->
						<?php pdxc_the_custom_logo(); ?>
				</div>
				
			</header>
			<?php
				/*Main Site Navigation*/
				wp_nav_menu( array(
					'container' 	 => 'nav',
					'container_id'	 => 'site-nav',
					'menu_class'     => 'site-nav',
					'theme_location' => 'pdxc-main-menu',
				) );
    		?>			
