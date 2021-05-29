<?php
require_once('includes/data.php');
require_once('includes/main-slider.php');
require_once('includes/services-summary.php');
require_once('includes/services-list-view.php');

get_header();

$home_slider_qy = new WP_Query([
  'post_type' =>  'home-slide-picture',
  'order'   =>  'asc'
]);

main_slider_view($home_slider_qy->posts);

services_summary_view($services);

services_list_view($services);

// echo '<pre>';
// print_r($services);
// echo '</pre>';

?>


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
            <p>Please give us a call at <a href="tel:+17183834808">(718) 383-4808</a></p>
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