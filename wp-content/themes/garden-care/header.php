<?php
/**
 * The header for our theme
 *
 * @subpackage Garden Care
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'garden-care' ); ?></a>

<div id="header">
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 text-lg-left text-center">
					<?php if(get_theme_mod('garden_care_topheader_text')) {?>
						<p class="topbar-text mb-0 text-md-left text-center mt-md-0 mt-2 py-2"><?php echo esc_html(get_theme_mod('garden_care_topheader_text')); ?></p>
					<?php }?>
				</div>
				<div class="col-lg-5 col-md-6 text-md-right text-center">
					<?php if(get_theme_mod('garden_care_topheader_mail')) {?>
						<span class="mail py-2">
							<a href="mailto:<?php echo esc_attr(get_theme_mod('garden_care_topheader_mail')); ?>"><i class="fas fa-envelope mr-2"></i><span><?php echo esc_html(get_theme_mod('garden_care_topheader_mail')); ?></span><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('garden_care_topheader_mail')); ?></span></a>
						</span>
					<?php }?>
					<?php if(get_theme_mod('garden_care_topheader_location')) {?>
						<span class="location py-2">
							<i class="fas fa-map-marker-alt mr-2"></i><span><?php echo esc_html(get_theme_mod('garden_care_topheader_location')); ?></span>
						</span>
					<?php }?>
				</div>
				<div class="col-lg-2 col-md-12 social-icons text-lg-right text-center py-2">
					<?php if(get_theme_mod('garden_care_topheader_facebook_url')) {?>
						<a href="<?php echo esc_url(get_theme_mod('garden_care_topheader_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'garden-care'); ?></span></a>
					<?php }?>
					<?php if(get_theme_mod('garden_care_topheader_twitter_url')) {?>
						<a href="<?php echo esc_url(get_theme_mod('garden_care_topheader_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'garden-care'); ?></span></a>
					<?php }?>
					<?php if(get_theme_mod('garden_care_topheader_youtube_url')) {?>
						<a href="<?php echo esc_url(get_theme_mod('garden_care_topheader_youtube_url')); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php echo esc_html('Youtube', 'garden-care'); ?></span></a>
					<?php }?>
					<?php if(get_theme_mod('garden_care_topheader_instagram_url')) {?>
						<a href="<?php echo esc_url(get_theme_mod('garden_care_topheader_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'garden-care'); ?></span></a>
					<?php }?>
					<?php if(get_theme_mod('garden_care_topheader_pinterest_url')) {?>
						<a href="<?php echo esc_url(get_theme_mod('garden_care_topheader_pinterest_url')); ?>"><i class="fab fa-pinterest"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'garden-care'); ?></span></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-3 px-md-0 px-3">
					<div class="logo py-2 text-center text-md-left">
						<?php if ( has_custom_logo() ) : ?>
		            		<?php the_custom_logo(); ?>
			            <?php endif; ?>
		             	<?php if (get_theme_mod('garden_care_show_site_title',true)) {?>
	              			<?php $blog_info = get_bloginfo( 'name' ); ?>
			                <?php if ( ! empty( $blog_info ) ) : ?>
			                  	<?php if ( is_front_page() && is_home() ) : ?>
			                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			                  	<?php else : ?>
		                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                  		<?php endif; ?>
			                <?php endif; ?>
			            <?php }?>
			            <?php if (get_theme_mod('garden_care_show_tagline',true)) {?>
			                <?php
		                  		$description = get_bloginfo( 'description', 'display' );
			                  	if ( $description || is_customize_preview() ) :
			                ?>
		                  	<p class="site-description">
		                    	<?php echo esc_attr($description); ?>
		                  	</p>
		              		<?php endif; ?>
	              		<?php }?>
					</div>
				</div>
				<div class="col-lg-10 col-md-9">
					<div class="menu-section">
						<div class="row mx-0">
							<div class="col-lg-6 col-md-2 col-3">
								<div class="toggle-menu responsive-menu">
									<?php if(has_nav_menu('primary')){ ?>
						            	<button onclick="garden_care_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','garden-care'); ?></span></button>
						            <?php }?>
						        </div>
								<div id="sidelong-menu" class="nav sidenav">
					                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'garden-care' ); ?>">
					                  	<?php if(has_nav_menu('primary')){
						                    wp_nav_menu( array( 
												'theme_location' => 'primary',
												'container_class' => 'main-menu-navigation clearfix' ,
												'menu_class' => 'clearfix',
												'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
												'fallback_cb' => 'wp_page_menu',
						                    ) ); 
					                  	} ?>
					                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="garden_care_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','garden-care'); ?></span></a>
					                </nav>
					            </div>
							</div>
							<div class="col-lg-3 col-md-5 col-9 phone">
								<?php if(get_theme_mod('garden_care_topheader_phone_no') || get_theme_mod('garden_care_topheader_timing')) {?>
									<div class="call row">
										<div class="col-lg-2 col-md-2 col-2 call-icon">
											<i class="far fa-clock"></i>
										</div>
										<div class="col-lg-10 col-md-10 col-10">
											<?php if(get_theme_mod('garden_care_topheader_phone_no')) {?>
												<a href="tel:<?php echo esc_attr(get_theme_mod('garden_care_topheader_phone_no')); ?>"><p class="callno"><?php echo esc_html(get_theme_mod('garden_care_topheader_phone_no')); ?></p><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('garden_care_topheader_phone_no')); ?></span></a>
											<?php }?>
											<?php if(get_theme_mod('garden_care_topheader_timing')) {?>
												<p class="timing">
													<span><?php echo esc_html(get_theme_mod('garden_care_topheader_timing')); ?></span>
												</p>
											<?php }?>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="col-lg-3 col-md-5">
								<div class="header-btn text-md-right text-center my-3">
									<span class="search-box">
				          				<button onclick="garden_care_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
				        			</span> 
									<?php if(get_theme_mod('garden_care_getstarted_btn_url')) {?>
										<span class="getstarted-btn">
											<a href="<?php echo esc_url(get_theme_mod('garden_care_getstarted_btn_url')); ?>"><span><?php echo esc_html(get_theme_mod('garden_care_getstarted_btn_text')); ?></span><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('garden_care_getstarted_btn_text')); ?></span></a>
										</span>
									<?php }?>
								</div>
							</div>
							<div class="search-outer">
								<div class="search-inner">
						        	<?php get_search_form(); ?>
					        	</div>
					        	<button onclick="garden_care_search_close()" class="search-close"><i class="fas fa-times"></i></button>
					        </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>