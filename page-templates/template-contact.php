<?php
/**
 * Template Name: Template Contact
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="page-header-holder">
   <div class="container">
  
  <header class="entry-header">

  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

   </header><!-- .entry-header -->
  </div>
	
 </div>

<div class="wrapper template-contact-us" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

         <div class="col-lg-6">
				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

                </main><!-- #main -->
         </div>

               <div class="offset-lg-1 col-lg-5">
               <div class="iframe-holder">

               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26490.225826093272!2d35.497256546647336!3d33.90823811128546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                1!3m3!1m2!1s0x151f168cef36c0a5%3A0xf6f4af286ffdea34!2sBeirut%20Central%20District%2C%20Beirut!5e0!3m2!1sen!2slb!4v1601096507070!5m2!1sen!2slb" 
                width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

               </div>
           
               <div class="iframe-holder">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26490.225826093272!2d35.497256546647336!3d33.90823811128546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
               1!3m3!1m2!1s0x151f168cef36c0a5%3A0xf6f4af286ffdea34!2sBeirut%20Central%20District%2C%20Beirut!5e0!3m2!1sen!2slb!4v1601096507070!5m2!1sen!2slb" 
               width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

                <div class="iframe-holder">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26490.225826093272!2d35.497256546647336!3d33.90823811128546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                1!3m3!1m2!1s0x151f168cef36c0a5%3A0xf6f4af286ffdea34!2sBeirut%20Central%20District%2C%20Beirut!5e0!3m2!1sen!2slb!4v1601096507070!5m2!1sen!2slb" 
                width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  </div>
          </div>

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
