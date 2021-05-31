<?php
function main_banner() {
  if (have_posts()): while (have_posts()): the_post();
    ?>
    <!-- banner -->
    <section 
      class="banner"
      style="background: url(<?php the_post_thumbnail_url() ?>) center no-repeat; background-size: cover; position: relative; z-index: 1;" >
        <!-- banner text -->
        <div class="container">
          <div id="open-hours-sign">
            <div class="d-inline-block">
              <h6>Call Us at:</h6>
              <?php if ( have_rows( 'phones', 'option' ) ) : the_row(); ?>
                <p>
                  <a href="tel:+<?php the_sub_field( 'phone' ); ?>"><?php echo phone_formater(get_sub_field( 'phone' )) ?></a>
                </p>
              <?php else : ?>
                <?php // no rows found ?>
              <?php endif; ?>
            </div>
            <div class="d-inline-block">
              <h6>Hours</h6>
              <p>Monday-Saturday: 8am-7pm</p>
            </div>
          </div>
          <div class="banner_text_wthree_pvt">
            <h3 class="home-banner-w3">Greenpoint, Brooklyn<br>New York Tri-State Area</h3>
            <p class="bnr-txt main-title-w3pvt">Our mission: keeping you a satisfied customer
            </p>
          </div>
        </div>
        
        <div class="banner-bottom-w3ls">
          <div class="container">
            <div class="row">
              <div class="col-sm-3 col-6 mb-3">
                <div class="bb-img">
                <?php $preventive_maintenance = get_field( 'preventive_maintenance' ); ?>
                <?php if ( $preventive_maintenance ) { ?>
                  <img class="img-fluid img-thumbnail" src="<?php echo $preventive_maintenance['url']; ?>" alt="<?php echo $preventive_maintenance['alt']; ?>" />
                <?php } ?>
                  <h3>Preventive <br>Maintenance</h3>
                </div>
              </div>
              <!-- <div class="col-sm-3 col-6 mx-auto mt-sm-0 mt-4"> -->
              <div class="col-sm-3 col-6 mb-3 mx-auto mt-sm-0">
                <div class="bb-img">
                <?php $alignment_tire_services = get_field( 'alignment_&_tire_services' ); ?>
                <?php if ( $alignment_tire_services ) { ?>
                  <img class="img-fluid img-thumbnail" src="<?php echo $alignment_tire_services['url']; ?>" alt="<?php echo $alignment_tire_services['alt']; ?>" />
                <?php } ?>
                  <h3>Tire <br>Services</h3>
                </div>
              </div>
              <div class="col-sm-3 col-6 mb-3">
                <div class="bb-img">
                <?php $repair_services = get_field( 'repair_services' ); ?>
                <?php if ( $repair_services ) { ?>
                  <img class="img-fluid img-thumbnail" src="<?php echo $repair_services['url']; ?>" alt="<?php echo $repair_services['alt']; ?>" />
                <?php } ?>
                  <h3>Repair <br>Services</h3>
                </div>
              </div>
              <div class="col-sm-3 col-6 mb-3">
                <div class="bb-img">
                <?php $car_wash = get_field( 'car_wash' ); ?>
                <?php if ( $car_wash ) { ?>
                  <img class="img-fluid img-thumbnail" src="<?php echo $car_wash['url']; ?>" alt="<?php echo $car_wash['alt']; ?>" />
                <?php } ?>
                  <h3>Free Car <br>Wash</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //banner-bottom -->
    </section>
    <!-- //banner -->

  <?php
  endwhile; endif;
}
?>
