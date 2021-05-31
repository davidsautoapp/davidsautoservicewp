<?php
function display_testimonies($testimonies) {
  ?>

  <!-- testimonials -->
  <div class="testimonials align-w3" id="testi">
    <div class="container">
      <div class="wthree_pvt_title text-center">
        <h4 class="w3pvt-title">testimonials
        </h4>
        <p class="sub-title">Some testimonials of satisfied customerrs</p>
      </div>
      <div class="row">
        <?php foreach($testimonies as $testimony): ?>
          <div class="col-lg-6">
            <div class="testimonials_grid">
              <div class="testi-text text-center">
                <p>
                  <span class="fa fa-quote-left"></span>
                  <?= $testimony->post_content ?>
                  <span class="fa fa-quote-right"></span>
                </p>
              </div>
              <div class="d-flex align-items-center justify-content-center">
                <div class="testi-desc">
                  <span class="fa fa-user"></span>
                  <h5><?= $testimony->post_title ?></h5>
                  <p>Member</p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- //testimonials -->

  <?php
}