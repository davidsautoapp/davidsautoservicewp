<?php
require_once('includes/utils.php');
require_once('includes/secondary-banner.php');

get_header();

secondary_banner();
?>


  <!-- contact -->
  <section class="contact-wthree align-w3" id="contact">
    <div class="container">
      <div class="wthree_pvt_title text-center">
        <h4 class="w3pvt-title">contact us
        </h4>
        <p class="sub-title">Some nice words to say here</p>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7">
          <h5 class="cont-form">send us a note</h5>
          <div class="contact-form-wthreelayouts">
            <form action="/mail" method="post" class="register-wthree">
              <div class="form-group">
                <label>
                  Your Name
                </label>
                <input class="form-control" type="text" placeholder="John Doe" name="name" required="">
              </div>
              <div class="form-group">
                <label>
                  Mobile
                </label>
                <input class="form-control" type="text" placeholder="xxx xxx xxxxx" name="mobile" required="">
              </div>
              <div class="form-group">
                <label>
                  Email
                </label>
                <input class="form-control" type="email" placeholder="email@domain.com" name="email" required="">
              </div>
              <div class="form-group">
                <label>
                  Your message
                </label>
                <textarea placeholder="Type your message here" name="message" class="form-control"></textarea>
              </div>
              <div class="form-group mb-0">
                <button type="submit"
                  class="btn btn-w3layouts btn-block bg-theme text-wh w-100 font-weight-bold text-uppercase">Send</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-5 text-center">
          <h5 class="cont-form">get in touch</h5>
          <div class="row flex-column">
            <div class="contact-w3">
              <span class="fa fa-envelope-open  mb-3"></span>
              <div class="d-flex flex-column">
                <!-- <a href="mailto:david@email.com" class="d-block">info@david1.com</a> -->
                
                <!-- <a href="mailto:david@email.com">info@david3.com</a> -->
                <?php if ( have_rows( 'emails', 'option' ) ) : ?>
                  <?php while ( have_rows( 'emails', 'option' ) ) : the_row(); ?>
                    <a href="<?php the_sub_field( 'email' ); ?>" class="my-2 d-block"><?php the_sub_field( 'email' ); ?></a>
                  <?php endwhile; ?>
                <?php else : ?>
                  <?php // no rows found ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="contact-w3 my-4">
              <span class="fa fa-phone mb-3"></span>
              <div class="d-flex flex-column">
                <?php if ( have_rows( 'phones', 'option' ) ) : ?>
                  <?php while ( have_rows( 'phones', 'option' ) ) : the_row(); ?>
                    <p class="my-1">Tel: <a href="tel:+<?php the_sub_field( 'phone' ); ?>"><?php echo phone_formater(get_sub_field( 'phone' )); ?></a></p>
                  <?php endwhile; ?>
                <?php else : ?>
                  <?php // no rows found ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="contact-w3">
                <span class="fa fa-home mb-3"></span>
                <address><?php the_field( 'locations', 'option' ); ?></address>
            </div>
          </div>

        </div>
      </div>
      <div class="mx-auto text-center">
        <iframe width='100%' height='100%' id='mapcanvas'
          src='https://maps.google.com/maps?q=321%20mcguinness%20blvd,%20brooklyn,%20ny%2011222&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=&amp;output=embed'
          frameborder='0' scrolling='no' marginheight='0' marginwidth='0'>
          <div class="zxos8_gm"><a
              href="https://sites.google.com/site/wistfulvariance/cheap-samsung-galaxy-deals">samsung</a>
          </div>
          <div style='overflow:hidden;'>
            <div id='gmap_canvas' style='height:100%;width:100%;'></div>
          </div>
          <div><small>Powered by <a href="https://www.embedgooglemap.co.uk">Embed Google Map</a></small></div>
        </iframe>
        <!-- //footer right -->
      </div>
    </div>
  </section>
  <!-- //contact -->

<?php
get_footer();
?>