<?php 
// The template for displaying search results

get_header(); 
?>
<!--
<div class="bnt-container">

	<div class="content content-search">
        <main class="site-main"> -->

<div class="container-fluid innermain" role="main">
    <div class="row">
        <div class="innermain-title col-md-12 wow slideInDown">
            <div class="full-width-container">
                <!--  <h1 id="main"> Blog</h1> -->
                <?php the_archive_title( '<h1 id="main">', '</h1>' ); ?>
            </div>
        </div>

        <div class="full-width-container">
            <div class="col-md-12 col-lg-12 col-xl-12 blog">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="blog-container wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">

                            <?php 
            // Start the Loop
            if ( have_posts() ) { 
			
				?>
                            <header class="archive-header">
                                <div class="archive-description">
                                    <?php esc_html_e( 'Search results for', 'bento' ); ?>
                                </div>
                                <h1 class="archive-title">
                                    "<?php echo get_search_query(); ?>"
                                </h1>
                            </header>
                            <?php
			
                while ( have_posts() ) { 
                    the_post(); 
                    // Include the post-format-specific template for the content.
                    //get_template_part( 'content' );
                    get_template_part( 'search-results' );
                // End the Loop
                } 
				// Navigation
				bento_blog_pagination();
            } else {
                // Display a specialized template if no posts have been found
                get_template_part( 'content', 'none' );	
            }
            ?>

                            <!--</main>
    </div> -->

                            <?php //get_sidebar(); ?>

                            <!-- </div> -->




                        </div>
                    </div>
                    <!-- col 8 -->
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <aside class="sidebar">
                            <!-- <div class="search d-flex align-items-center">
                                <input type="search" class="" placeholder="Search">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div> -->
                            <?php get_search_form();?>
                            <h3>Recent Posts</h3>
                            <?php
	$myposts = get_recent_blog_posts('');
	foreach ($myposts as $post) :
		setup_postdata($post);
		?>
                            <ul class="recent-posts mt-4">
                                <li>
                                    <div class="recent-posts-img mr-2">
                                        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                                        <!-- <img src="<?php echo $img[0]; ?>" alt="" class="img-responsive"> -->
                                        <?php if (class_exists('MultiPostThumbnails')) :
                                                        MultiPostThumbnails::the_post_thumbnail(
                                                            get_post_type(),
                                                            'secondary-image'
                                                        );
                                                endif; ?>
                                    </div>
                                    <a
                                        href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                            <?php endforeach;
				wp_reset_postdata();
                ?>
                            <?php $myposts = get_recent_blog_showmore_posts('');
    if(isset($myposts) && !empty($myposts)){
        ?>
                            <div id="demo" class="collapse">
                                <div>
                                    <ul class="recent-posts mt-4">
                                        <?php
	foreach ($myposts as $post) :
		setup_postdata($post);
		?>
                                        <li>
                                            <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                                            <img src="<?php echo $img[0]; ?>" alt="" class="img-responsive">
                                            <a
                                                href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a>
                                            <div class="clearfix"></div>
                                        </li>
                                        <?php endforeach;
				wp_reset_postdata();
				?>
                                    </ul>
                                </div>
                            </div>
                            <a href="#" data-toggle="collapse" data-target="#demo"></a>
                            <?php } ?>
                            <h3>Categories</h3>
                            <?php


	$myposts = get_blog_child_categories();
				?>
                            <h3>Follow Us</h3>
                            <ul class="follow list-inline mb-5">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/peopletechInc" target="_blank"><img
                                            src="<?php echo site_url()?>/wp-content/uploads/2019/10/facebook.png"
                                            alt=""></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/peopletechinc?lang=en" target="_blank"><img
                                            src="<?php echo site_url()?>/wp-content/uploads/2019/10/twitter.png"
                                            alt=""></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://in.linkedin.com/company/people-tech-group-inc" target="_blank"><img
                                            src="<?php echo site_url()?>/wp-content/uploads/2019/10/linkedin.png"
                                            alt=""></a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!--</div>
                 col 12 -->
        </div>
    </div>
</div>

<!-- blog code ends -->

<?php get_footer(); ?>
