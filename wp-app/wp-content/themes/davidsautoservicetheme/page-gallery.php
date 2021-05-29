<?php
require_once('includes/jobs-display.php');
require_once('includes/utils.php');
require_once('includes/secondary-banner.php');

get_header();

secondary_banner();;

// $slider_data = new WP_Query([
//   'post_type'   =>  'secondary-slider-pic'
// ]);

// secondary_slider($slider_data->posts);

$jobs_qy = new WP_Query([
  'post_type'     =>  'jobs',
  'posts_per_page' =>  -1
]);

// echo "<pre>";
// print_r($jobs_qy->posts[0]);
// print_r(get_fields($jobs_qy->posts[0]));
// echo "</pre>";
?>

<section id="gallery">
    <div class="center" id="page-title">
        <h2>Gallery</h2>
        <!-- <p class="lead"></p> -->
    </div>
    <div class="container">
        <ul class="gallery-filter text-center">
            <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".auto-repair">Auto Repair</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".car-wash-regular">Car Wash - Regular</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".car-wash-details">Car Wash - Details</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".regular-cars">Regular Cars</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".vintage-cars">Vintage Cars</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".two-wheelers-wash">Two-Wheelers</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".accessories-sales">Accessories Sales</a></li>
        </ul><!--/#gallery-filter-->

        <div class="row">
            <div class="gallery-items">

              <?php display_jobs($jobs_qy->posts) ?>

            </div>
        </div>
    </div>
</section><!--/#gallery-item-->

<?php
get_footer();
?>