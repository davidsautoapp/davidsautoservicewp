<?php
function services_details($services) {
  ?>

  <!-- about-->
  <section class="single_grid_w3_main align-w3">
    <div class="container">
      <div class="wthree_pvt_title text-center">
        <h4 class="w3pvt-title">Superior Services</h4>
        <p class="sub-title">More about David's AS services</p>
      </div>

      <?php foreach($services as $service): ?>
        <?php
        // echo "<pre>";
        // print_r($service);
        // echo "</pre>";
        ?>

        <div class="">
          <div class="abt-grid">
            <div class="row">
              <div class="col-12">
                <div class="abt-icon">
                  <span class="<?= $service['icon'] ?>"></span>
                </div>
              </div>
              <div class="col-12">
                <div class="abt-txt">
                  <h4><?= $service['group_title'] ?></h4>
                  <div class="row">
                    <?php foreach($service['details'] as $detail): ?>

                      <div class="col col-lg-6 col-12 p-3">
                        <h6><?= $detail['service_title'] ?></h6>
                        <p><?= $detail['service_description'] ?></p>
                      </div>

                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
      
    </div>
  </section>

  <?php
}
?>