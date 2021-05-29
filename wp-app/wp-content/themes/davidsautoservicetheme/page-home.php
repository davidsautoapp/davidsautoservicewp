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

// services_summary_view($services);

// services_list_view($services);

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



<section id="recent-works">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>Some of our Works</h2>
      <!-- <p class="lead"></p> -->
    </div>

    
    <div class="row">
      <?php display_jobs($jobs_qy->posts); ?>
    </div>
    <!--/.row-->
    <div class="row text-center">
      <a class="btn-slide wow fadeInDown" href="<?php echo get_site_url() . '/gallery' ?>">See More</a>
    </div>
  </div>
  <!--/.container-->
</section>
<!--/#recent-works-->

<section id="conatcat-info">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="media contact-info wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
          <div class="pull-left">
            <a href="tel:+17183834808"><i class="fa fa-phone"></i></a>
          </div>
          <div class="media-body">
            <h2>Have a question or need a custom quote?</h2>
            <p>
              Please give us a call at 
              <?php if ( have_rows( 'phones', 'option' ) ) : ?>
                <?php while ( have_rows( 'phones', 'option' ) ) : the_row(); ?>
                  
                  <a href="tel:+<?php the_sub_field( 'phone' ); ?>">
                    <?php echo phone_formater(get_sub_field( 'phone' )); ?>
                  </a>, 
                <?php endwhile; ?>
              <?php else : ?>
                <?php // no rows found ?>
              <?php endif; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/.container-->
</section>
<!--/#conatcat-info-->

<?php
get_footer();
?>