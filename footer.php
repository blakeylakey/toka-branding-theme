<?php
/* footer stuff */
?> 

<footer>

</footer>


<script>
    var mySwiper = new Swiper(".swiper-container", {
        // Optional parameters
        direction: "horizontal",
        loop: true,

        // If we need pagination
        pagination: {
            el: ".swiper-pagination"
        },

        effect: "coverflow",

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    });
</script>

<?php wp_footer(  ); ?>
</body>
</html>