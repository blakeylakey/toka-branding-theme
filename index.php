<?php 
/* main template file */
get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10 col-lg-8 offset-1 offset-lg-2">
            <h1><?php echo get_the_title(); ?></h1>

            <main class="main-content">
                <?php
                    // start loop
                    if (have_posts(  )):
                        while(have_posts(  )):
                            the_post(  );
                            the_content( );
                        endwhile;
                    endif;
                ?>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>