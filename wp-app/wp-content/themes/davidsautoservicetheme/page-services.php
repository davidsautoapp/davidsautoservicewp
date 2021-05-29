<?php  
require_once('includes/data.php');
require_once('includes/utils.php');
require_once('includes/secondary-banner.php');

get_header();

secondary_banner();

?>


<section id="feature" class="transparent-bg">
    <a id="services"></a>
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Our Services</h2>
            <!-- <p class="lead"></p> -->
        </div>

        
        <?php foreach($services as $service_group): ?>
          <div class="media services-wrap wow fadeInDown">
              <div class="media-heading center">
                  <!-- <img class="img-responsive" src="images/services/services2.png"> -->
                  <div class="feature-wrap center">
                    <i class="<?php echo $service_group['icon'] ?>"></i>
                  </div>
                  <h3><?php echo $service_group['group_title'] ?></h3>
              </div>
              <div class="row media-body">
                <?php foreach($service_group['details'] as $service_detail): ?>
                  <div class="col col-md-6 col-12 p-6">
                    <h6><?php echo $service_detail['service_title'] ?></h6>
                    <p><?php echo $service_detail['service_description'] ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
          </div>
        <?php endforeach; ?>


        <div class="media services-wrap wow fadeInDown">
          <div class="media-heading center row">
              <!-- <img class="img-responsive" src="images/services/services1.png"> -->
              <div class="feature-wrap center">
                <i class="flaticon-car-wash"></i>
              </div>
              
              <h3>Car Wash Prices</h3>
          </div>
          <div>
              <?php 
              while(have_posts()): 
                the_post();
                the_content();
                
              endwhile; ?>
          </div>
        </div>

        <div class="clients-area center wow fadeInDown">
            <h2>What our client says</h2>
            <!-- <p class="lead"></p> -->
        </div>

        <div class="row">
          <?php
          $reviews_qy = new WP_Query([
            'post_type'   =>  'reviews',
            'order'       =>  'asc',
            // 'orderby'     =>  ''
          ]);

          foreach($reviews_qy->posts as $review):
            // echo "<pre>";
            // print_r($review->post_title)
            ?>

            <div class="col-md-6 wow fadeInDown">
              <div class="clients-comments text-center">
                <img src="<?= get_the_post_thumbnail_url($review->ID) ?>" class="img-circle" alt="">
                <p class="reviews"><?= $review->post_content ?></p>
                <h4><span>-<?= $review->post_title ?></span></h4>
                <p class="read-more"><a href="#" class="button">Read More</a></p>
              </div>
            </div>

            <?php
          endforeach;
          ?>

        </div>

    </div><!--/.container-->
</section><!--/#feature-->

<?php

get_footer();
?>