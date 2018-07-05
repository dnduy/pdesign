<?php
/**
* Template Name: Contact
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				
<article id="post-<?php the_ID(); ?>" class="container contact" <?php //post_class(); ?>>
 

	<div class="row">
		<div class="col-md-4 col-lg-4">
			<div class="row">
				 <div style="padding: 15px;font-size: 13px;text-align: center;">
            <div style="color: #e7e2d0;" class="mo">
                <div class="lh_title">ĐỊA CHỈ</div>
                <div>VP1:   <br>Tel: 0236  </div><br>
                <div>VP2:     <br>Tel: 0236  </div><br>
                <div>Email:  </div>
            </div>
             
            <div></div>
            <div class="lh_title">Hotline</div>
            <div class="hotline">0905  </div>
            
        		</div>
			</div>
		</div>
		<div class="col-md-8 col-lg-8" style="background: #fff">
			<div class="row">
    <div class="col-md-6 dangky">                 
      <div class="row">
            <div style="padding: 30px 20px;">
                <div class="tt_lh">Ý kiến phản hồi</div>
                <div style="text-align: center;padding-bottom: 5px;"><img src="<?php bloginfo('template_directory');?>/images/tron.png" alt="cc"></div>
    	 	     <?php the_content(); ?>
            <div class="clear"></div>
             
           </div>
            </div>
    </div>
    <div class="col-md-6">
    <div style="padding: 30px 10px;" class="">
                <div class="tt_lh">Kết nối với chúng tôi</div>
                <div style="text-align: center;padding-bottom: 5px;"><img src="<?php bloginfo('template_directory');?>/images/tron.png" alt="cc"></div>

                
                 	
               
	                <div class="l col-md-12 col-sm-6" style="padding: 30px 0;"> <div class="row">
	                <div class="col-md-4 col-sm-4 col-xs-4 col-xss-4" style="text-align: center;">
	                    <a target="_blank" href="#"><img src="<?php bloginfo('template_directory');?>/images/f.png" alt="facebook kavila"></a>
	                    <div style="padding-top: 10px;color:#010101;font-size: 12px;">FACEBOOK</div>
	                </div>
	                
	                <div class="col-md-4 col-sm-4 col-xs-4 col-xss-4" style="text-align: center;">
	                    <a target="_blank" href="#"><img src="<?php bloginfo('template_directory');?>/images/k.png" alt="PINTEREST kavila"></a>
	                    <div style="padding-top: 10px;color:#010101;font-size: 12px;">PINTEREST</div>
	                </div>
	                <div class="col-md-4 col-sm-4 col-xs-4 col-xss-4" style="text-align: center;">
	                    <a target="_blank" href="#"><img src="<?php bloginfo('template_directory');?>/images/y.png" alt="youtube kavila"></a>
	                    <div style="padding-top: 10px;color:#010101;font-size: 12px;">YOUTUBE</div>
	                </div>
	                </div>
                </div>
    </div>
    </div>
</div>
		</div>
		
	</div><!-- .entry-content -->

	 
</article><!-- #post-## -->
	
				
	<?php		endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
