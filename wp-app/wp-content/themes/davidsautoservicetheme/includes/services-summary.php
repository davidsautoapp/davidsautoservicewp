<?php
function services_summary_view($services) {
  ?>
  <section id="feature">
    <div class="container">
      <div class="row">
        <div class="features">

          <?php
          foreach($services as $service):
            ?>
            
            <div class="col-md-6 col-sm-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
              <div class="feature-wrap row">
                <div class="col-sm-2 col-md-3">
                  <i class="<?= $service['icon'] ?>"></i>
                </div>
                <div class="col-sm-10 col-md-9">
                  <h2><?= $service['title'] ?></h2>
                  <h3><?= $service['short_description'] ?></h3>
                </div>
              </div>
            </div>
            <!--/.col-md-4-->

            <?php
          endforeach;
          ?>

        </div>
        <!--/.services-->
      </div>
      <!--/.row-->
      <div class="row text-center">
        <a class="btn-slide wow fadeInDown" href="<?php echo get_site_url() . '/services#services' ?>">Read More</a>
      </div>
    </div>
    <!--/.container-->
  </section>
  <!--/#feature-->
  <?php

}
?>