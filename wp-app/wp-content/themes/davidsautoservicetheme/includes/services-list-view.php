<?php
function services_list_view($services) {
  ?>

  <section id="services" class="service-item">
    <div class="container">
      <div class="center wow fadeInDown">
        <h2>Our Service</h2>
        <!-- <p class="lead"></p> -->
      </div>

      <div class="row">
        <?php
        foreach($services as $service):
          ?>
          <div class="col-sm-6 col-md-6">
            <div class="media services-wrap wow fadeInDown">
              <div class="pull-left">
                <i class="<?= $service['icon'] ?>"></i>
              </div>
              <div class="media-body">
                <h3 class="media-heading"><?= $service['group_title'] ?></h3>
                <ul>
                  <?php
                  foreach($service['details'] as $service_detail) {
                    echo "<li>" . $service_detail['service_title']  . "</li>";
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <?php
        endforeach;
        ?>
      </div>

    </div>
    <!--/.container-->
  </section>
  <!--/#services-->

  <?php
}