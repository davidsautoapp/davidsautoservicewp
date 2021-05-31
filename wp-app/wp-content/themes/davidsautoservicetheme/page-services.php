<?php  
require_once('includes/data.php');
require_once('includes/utils.php');
require_once('includes/secondary-banner.php');
require_once('includes/services-details.php');
require_once('includes/testimonies-display.php');

get_header();

secondary_banner();
?>

<!-- about-->
<section class="single_grid_w3_main align-w3">
  <a id="services"></a>
  <div class="container">
    <div class="row pt-lg-4">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <div class="col-lg-5">
          <div class="wthree_pvt_title  mb-3">
            <h4 class="w3pvt-title">about us
            </h4>
            <span class="sub-title"><?= get_fields(get_the_ID())['sub_title'] ?></span>
          </div>
          <div class="single_grid_text pt-lg-3">
            <?= get_fields(get_the_ID())['about-us_content'] ?>
          </div>
        </div>
        <div class="col-lg-7 mt-lg-0 mt-4">
          <div class="slide-img-2">
            <img src="<?= get_fields(get_the_ID())['picture']['url'] ?>" class="img-fluid" alt="" />
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<!-- //about -->

<?php
services_details($services);

$reviews_qy = new WP_Query([
  'post_type'   =>  'reviews',
  'order'       =>  'asc',
  // 'orderby'     =>  ''
]);

display_testimonies($reviews_qy->posts);

get_footer();
?>