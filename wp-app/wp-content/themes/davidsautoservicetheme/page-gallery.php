<?php
require_once('includes/jobs-display.php');
require_once('includes/utils.php');
require_once('includes/secondary-banner.php');
require_once('includes/jobs-display.php');

get_header();

secondary_banner();;


$jobs_qy = new WP_Query([
  'post_type'     =>  'jobs',
  'posts_per_page' =>  -1
]);

// echo "<pre>";
// print_r($jobs_qy->posts[0]);
// print_r(get_fields($jobs_qy->posts[0]));
// echo "</pre>";



?>

<!-- portfolio -->
<section class="portfolio-wthree align-w3 py-5 position-relative" id="portfolio">
    <div class="container py-xl-5 py-lg-3">
        <div class="wthree_pvt_title text-center">
        <h4 class="w3pvt-title">Jobs
        </h4>
        <p class="">Below is a sample of the work with do here at David's Auto Services</p>
        </div>
        <?php display_jobs($jobs_qy->posts); ?>
    </div>
    <!-- <div class="d-flex justify-content-center">
        <a href="portfolio.html" class="btn w3ls-btn">view more</a>
        </div> -->
</section>
<!-- //portfolio -->

<?php
get_footer();
?>