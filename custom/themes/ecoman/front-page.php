<?php get_header(); ?>	

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php // Get custom meta values 

  // Hero Banner
  $banner     = get_post_meta( $post->ID, '_banner_image', true );
  $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
  $heading    = get_post_meta( $post->ID, '_banner_heading', true );
  $subheading = get_post_meta( $post->ID, '_banner_subheading', true );

  // CTA
  $ctatitle 	= get_post_meta($post->ID,'_cta_heading',true);
  $ctabtn 		= get_post_meta($post->ID,'_cta_btext',true);
  $ctalink 		= get_post_meta($post->ID,'_cta_blink',true);
?>

<div class="outer-container front-page">
	<div class="main-content">
		<?php the_content(); ?>
	</div>

	<div class="column-4 column-container">
		<div class="column-4__single">
			
		</div>
		<div class="column-4__single">
			
		</div>
		<div class="column-4__single">
			
		</div>
		<div class="column-4__single">
			
		</div>
	</div>
	
	<div class="main-content">

		<div class="front-page__testimonial">
			<p><strong>WHAT CLIENTS SAY WHEN WE LEAVE THE ROOM:</strong></p>		
		</div>

		<?php get_template_part( 'template-part-contact-form' ); ?>
	</div>

</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>


