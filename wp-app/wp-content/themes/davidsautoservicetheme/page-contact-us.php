<?php
require_once('includes/utils.php');
require_once('includes/secondary-banner.php');

get_header();

secondary_banner();
?>

<section id="contact-info">
    <div class="center" id="page-title">
        <h2>How to Reach Us?</h2>
        <!-- <p class="lead"></p> -->
    </div>
    <div class="gmap-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-center">
                    <div class="gmap gmap_canvas">
                      <iframe scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=490.0666&amp;height=670.0666&amp;hl=en&amp;q=302%20McGuinness%20Boulevard%20Toru%C5%84+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="490.0666" height="670.0666" frameborder="0">
                      </iframe>
                      <!-- <a href='https://googlemapembed.com/'>Google Maps Generator</a></div> -->
                      <!-- <style>.mapouter{position:relative;text-align:right;width:490.0666px;height:670.0666px;}.gmap_canvas {overflow:hidden;background:none!important;width:490.0666px;height:670.0666px;}
                      </style> -->
                    </div>
                </div>

                <div class="col-sm-4 map-content">
                    <ul class="row">
                        <li class="col-sm-12">
                            <address>
                                <h5>Office</h5>
                                <p><?php the_field( 'locations', 'option' ); ?></p>
                                <p>Phone(s):
                                  <?php if ( have_rows( 'phones', 'option' ) ) : ?>
                                    <?php while ( have_rows( 'phones', 'option' ) ) : the_row(); ?>
                                    <?php the_sub_field( 'type' ); ?> - <a href="tel:+<?php the_sub_field( 'phone' ); ?>"><?php echo phone_formater(get_sub_field( 'phone' )); ?></a>
                                    <?php endwhile; ?>
                                  <?php else : ?>
                                    <?php // no rows found ?>
                                  <?php endif; ?>
                                </p>
                                <p>Email(s):
                                  <?php if ( have_rows( 'emails', 'option' ) ) : ?>
                                    <?php while ( have_rows( 'emails', 'option' ) ) : the_row(); ?>
                                      <a href="mailto:<?php the_sub_field( 'email' ); ?>"><?php the_sub_field( 'email' ); ?></a>, 
                                    <?php endwhile; ?>
                                  <?php else : ?>
                                    <?php // no rows found ?>
                                  <?php endif; ?>
                                </p>
                            </address>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->

<section id="contact-page">
    <div class="container">
        <div class="center">
            <h2>Drop Your Message</h2>
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <form class="contact-form" name="contact-form" method="post" action="/mail">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Subject *</label>
                        <input type="text" name="subject" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Message *</label>
                        <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <button id="sendBtn" type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                    </div>
                </div>
            </form>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->

<?php
get_footer();
?>