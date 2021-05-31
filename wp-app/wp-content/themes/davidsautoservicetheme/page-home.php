<?php
require_once('includes/data.php');
require_once('includes/main-banner.php');
require_once('includes/services-summary.php');
require_once('includes/services-list-view.php');
require_once('includes/jobs-display.php');
require_once('includes/utils.php');

get_header();

main_banner();
// main_slider_view($home_slider_qy->posts);

services_summary_view($services);

services_list_view($services);

// echo '<pre>';
// print_r($services);
// echo '</pre>';

$jobs_qy = new WP_Query([
  'post_type'       =>  'jobs',
  'posts_per_page'  =>  '4',
]);

// echo "<pre>";
// print_r($jobs_qy->posts[0]);
// print_r(get_fields($jobs_qy->posts[0]));
// echo "</pre>";

?>

<!-- portfolio -->
<section class="portfolio-wthree align-w3 py-5" id="portfolio">
		<div class="container py-xl-5 py-lg-3">
        <div class="wthree_pvt_title text-center">
            <h4 class="w3pvt-title">Portfolio
            </h4>
            <!-- <p class="sub-title">Some of our performances.</p> -->
        </div>
        <?php display_jobs($jobs_qy->posts); ?>
    </div>
    <div class="d-flex justify-content-center">
        <a href="portfolio.html" class="btn w3ls-btn">view more</a>
    </div>
</section>
<!-- //portfolio -->


<?php
get_footer();
?>