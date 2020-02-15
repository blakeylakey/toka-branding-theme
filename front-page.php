<?php
// static home page
get_header();
?>

<main class="main-content">

    <div class="jumbotron jumbotron-fluid home-jumbotron-hero home-jumbotron-hero-1 d-flex">
        <div class="home-jumbotron-overlay"></div>
        <div class="home-hero-container text-center mx-auto align-self-center">
            <h1 class="display-4 text-uppercase font-weight-bold text-light">Laser Engraved Jars</h1>
            <p class="lead text-light">Custom engraved wooden jars, to keep your herbs fresh.</p>
            <button class="btn btn-primary">Shop now</button>
        </div>
    </div>

    <div class="row">
        <!-- <div class="col-8 offset-2">
            <?php echo wc_get_product(64); ?>
            <?php echo wp_get_attachment_url( 70 ); ?>
        </div> -->
        <div>
            <?php echo do_shortcode( '[toka_branding_product_thumbnails product_id="64"]' ); ?>
        </div>

        <div id="toka-branding-product-thumbnail">
            
        </div>
    </div>

    <!-- <div class="swiper-container">
        <div class="swiper-wrapper ">

            <div class="jumbotron jumbotron-fluid home-jumbotron-hero home-jumbotron-hero-1 swiper-slide d-flex">
                <div class="home-jumbotron-overlay"></div>
                <div class="home-hero-container text-center mx-auto align-self-center">
                    <h1 class="display-4 text-uppercase font-weight-bold text-light">Laser Engraved Jars</h1>
                    <p class="lead text-light">Custom engraved wooden jars, to keep your herbs fresh.</p>
                    <button class="btn btn-primary">Shop now</button>
                </div>
            </div>
            <div class="jumbotron jumbotron-fluid home-jumbotron-hero home-jumbotron-hero-2 swiper-slide d-flex">
                <div class="home-jumbotron-overlay"></div>
                <div class="home-hero-container text-center mx-auto align-self-center">
                    <h1 class="display-4 text-uppercase font-weight-bold text-light">Laser Engraved Jars</h1>
                    <p class="lead text-light">Custom engraved wooden jars, to keep your herbs fresh.</p>
                    <button class="btn btn-primary">Shop now</button>
                </div>
            </div>
            ...
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div> -->

</main>

<?php get_footer(); ?>