<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'garden_care_above_slider' ); ?>

	<?php if( get_theme_mod('garden_care_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $garden_care_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'garden_care_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $garden_care_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($garden_care_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $garden_care_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
			        	<div class="slider-bg">
				          	<div class="carousel-caption">
					            <div class="row">
					            	<div class="col-lg-6 col-md-7">
						              	<h2><?php the_title(); ?></h2>
						              	<p><?php $garden_care_excerpt = get_the_excerpt(); echo esc_html( garden_care_string_limit_words( $garden_care_excerpt,15 ) ); ?></p>
				            			<a href="<?php the_permalink(); ?>" class="read-btn"><?php esc_html_e('Read More','garden-care'); ?><span class="screen-reader-text"><?php esc_html_e('Read More','garden-care'); ?></span></a>
				            		</div>
				            		<div class="offset-lg-2 col-lg-4 col-md-5">
				            			<svg height="120" width="120">
										  	<circle cx="60" cy="60" r="60" fill="#b5cab0" /> 
										</svg> 
				            			<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
				            		</div>
			            		</div>
				          	</div>
			          	</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
		      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','garden-care' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','garden-care' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('garden_care_below_slider'); ?>

	<?php if( get_theme_mod('garden_care_service_category') != ''){ ?>
		<section id="services-section" class="mb-5">
			<div class="container">
				<?php if(get_theme_mod('garden_care_services_text')) {?>
					<p class="section-text text-center"><?php echo esc_html(get_theme_mod('garden_care_services_text')); ?></p>
				<?php }?>
				<?php if(get_theme_mod('garden_care_services_section_title')) {?>
					<h3 class="text-center"><?php echo esc_html(get_theme_mod('garden_care_services_section_title')); ?></h2>
				<?php }?>
	            <div class="row">
		      		<?php $garden_care_catData1 =  get_theme_mod('garden_care_service_category');
	  				if($garden_care_catData1){ 
	      				$page_query = new WP_Query(array( 'category_name' => esc_html($garden_care_catData1 ,'garden-care'))); ?>
		        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
		          			<div class="col-lg-3 col-md-6">
		          				<div class="service-box">
		      						<div class="service-img">
							      		<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" />
							  		</div>
	          						<div class="service-content text-center">
					            		<h4><?php the_title(); ?></h3>
					            		<p><?php $garden_care_excerpt = get_the_excerpt(); echo esc_html( garden_care_string_limit_words( $garden_care_excerpt,15 ) ); ?></p>
					            		<div class="read-btn">
					            			<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More','garden-care' );?></a>
					            		</div>
		            				</div>
		          				</div>
						    </div>
		          		<?php $i++; endwhile; 
		          		wp_reset_postdata();
		      		}?>
	      		</div>
				<div class="clearfix"></div>
			</div>
		</section>
	<?php }?>

	<?php do_action('garden_care_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>