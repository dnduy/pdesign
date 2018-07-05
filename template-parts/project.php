<?php
/*
 * Template Name: project
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>


<?php getImage(); ?>


<section id="primary" class="content-area col-sm-12 col-lg-12">
		<main id="main" class="site-main" role="main">
    <div class="breadrumb"><?php bcn_display($return = false, $linked = true, $reverse = false, $force = false); ?></div>
 
		<?php
		// while ( have_posts() ) : the_post();

		// 	the_title();
		// 	the_content(  );

		// endwhile; // End of the loop.
		?>
		<?php 
		$id = get_the_ID();
		$attachments = get_posts( array(
		      'post_type' => 'attachment',
		      'posts_per_page' => -1,
		      'post_parent' => $id,
		      'exclude'     => get_post_thumbnail_id()
		    ) );
// echo shortcode_gallery($attachments);

?>


<div id="demo" class="carousel slide" data-ride="carousel">


  <!-- The slideshow -->
  <div class="carousel-inner">

	  <?php 
    $i=0;
    foreach ( $attachments as $attachment ) {
    	 
        if ($i == 0) {
          $class = 'active';
        }else{
          $class='';
        }
        ?>

      <div class="carousel-item <?php echo $class; ?>">

        <?php $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
        $thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );

        ?> 

          <?php echo $thumbimg; ?>
          <div class="cc">
	           <div class="noidung">
			    <h5>Chủ đâu tư: <?php echo get_post_meta( get_the_ID(), 'chudautu', true ); ?> </h5>
			    <p> Địa chỉ:<?php echo get_post_meta( get_the_ID(), 'diachi', true ); ?></p>
			    <p> Diện tích:<?php echo get_post_meta( get_the_ID(), 'dientich', true ); ?> </p>
			    <p> Hướng:<?php echo get_post_meta( get_the_ID(), 'huong', true ); ?> </p>




	  		</div>
			</div>
        </div>

        <?php
        $i++; } ?>
     
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(  ); ?>