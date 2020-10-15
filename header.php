<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Just+Another+Hand&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
<div id="wrapper-navbar">

     <div class="top-header">
            <div class="container">

                 <div class="row align-items-center">

                        <div class="col-lg-5 col-md-6"">
						   <div class="mobile-holder-logo">
						   <a href="/">
                             <img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="Logo">
                            </a>
						   </div>
						 </div>
						<div class="top-header-contact">
						    <a href="tel:+96170040810"><i class="fa fa-phone"></i>+96170040810</a>
							<a href="mailto:oscar.sc.imperiumcode@gmail.com" class="top-header-contact-email"><i class="fa fa-envelope-o"></i>oscar.sc.imperiumcode@gmail.com</a>
						  <div class="mobile-menu-dropdown">
		                     	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" 
		                      	aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
		                    	 <span>Menu</span> <i class="fa fa-bars"></i>
	                     		</button> 
                               </div> 
						</div>
					        	

                        <div class="col-lg-7 col-md-6">

                         </div>
                 </div>

	        </div>
     </div>

		<nav id="main-nav" class="navbar navbar-expand-xl navbar-dark" aria-labelledby="main-nav-label">

			<div class="container">

				<div class="search-input-holder">

					 <div class="title">Quote:</div>

				     <input type="text" id="Suburb-quick-search" class="testing-the-input" placeholder="Type your suburb here">

				</div>
               <div class="mobile-menu-dropdown">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" 
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			 <span>Menu</span> <i class="fa fa-bars"></i>
			</button> 
            </div> 
				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</div><!-- .container -->

		</nav><!-- .site-navigation -->

</div><!-- #wrapper-navbar end -->

<div id="quick-select-bins">
    <div class="container">
		<div class="row align-items-center">
		 <div class="col-lg-7">
			 <div class="steps">
                   <div class="step one active">
	            	  <div class="title">
						  <div class="title-icon">
						  <i class="fa fa-arrow-circle-up"></i>
						  </div>
			  Step 1: <Strong>Suburb Selected, Bunbury</Strong>
	        	  </div>	 
	      	   <div class="icon">
	      	   <i class="fa fa-check-circle"></i>
		     	</div>
	        	</div>
	         	<div class="step two">
	      	   <div class="title">
			    <div class="title-icon">
						  <i class="fa fa-arrow-circle-down"></i>
						  </div>
			  Step 2: <Strong>Select the skip that suits your needs</Strong>
		       </div>	 
		         <div class="icon">
		       <i class="fa fa-check-circle"></i>
		    	</div>
	        	</div>
                  </div>
		     	</div>
			     <div class="offset-lg-1 col-lg-4">
			          <div class="price-info">
	                    All prices below reflect the price you will pay to hire a skip-bin from West Coast Waste for 7 days, delivered to your door.
					  </div>
			</div>
        </div>
		
		<div class="quick-select-all-bins">
	    	<div class="row">
		    <?php
	    	$args = array(
			'post_type' => 'product',
			'product_cat' => 'Bin',
			'orderby' => 'date',
			'order' => 'ASC',
			'posts_per_page' => 4
			);
			$index=0;
		    $loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			$index++;
			$variation_html="";

			if($product->is_type('variable')){
				$available_variations=$product->get_available_variations();
				foreach($available_variations as $variations){
					$attribute_depo=$variations['attributes']['attribute_depo'];
					$attribute_distance=$variations['attributes']['attribute_distance'];
					$variation_id=$variations['variation_id'];
					$price_html=$variations['price_html'];
					$variation_html .="<div
										class='depo-price'
										data-depo='$attribute_depo'
										data-distance='$attribute_distance' 
										data-variation_id='$variation_id'
										>";
					$variation_html .=$price_html;
					$variation_html .="</div>";
				}
			} 
			?>
                   <div class="col-lg-3">
					   <a href="#" class="quick-select-bin" data-productid="<?php echo $product->get_id();?>" 
					   data-distance=""
					   data-depo=""
					   variationid=""
					   >
					      <div class="title">
						   <?php the_field('full_title');?>
					      </div>
								 <?php $image =wp_get_attachment_image_src(get_post_thumbnail_id (), 'medium');?>
								 <img src="<?php echo $image[0];?>" alt="<?php the_field('full_title');?>">
					      <div class="price">
						  <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
							  <!--   <?php echo $product->get_price_html();?> --> 
							  Get Quote
							  <?php else : ?>
							  <?php echo $variation_html;?>
							  <?php endif;?>
						  </div>	 
					      <div class="hire">
							     Up to 7 Days Hire inc. GST
						  </div>
						  <div class="meta-info">
						  <div class="info">
							     <div>
								 <img src="<?php echo get_template_directory_uri(); ?>/img/home-trailer.svg" alt="product placeholder" width="100%">
								 </div>
								 x <?php the_field('approx_trailer');?> 
						  </div>
						  <div class="spacer"></div>
						  <div class="info">
							     <div>
								 <img src="<?php echo get_template_directory_uri(); ?>/img/home-bin.svg" alt="product placeholder" width="66%">
								 </div>
								 x <?php the_field('approx_trailer');?> 
		                  </div>
						  </div>	
						         <div class="quick-button">
						     	 Order this skip bin
		                       </div>
		               </a>		   
				 </div>
					   <?php endwhile; ?>
		               <?php wp_reset_query();?>			
	    	</div>

		</div>
	</div>
</div>