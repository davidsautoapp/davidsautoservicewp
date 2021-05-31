<?php
function services_summary_view($services) {
  ?>
  <!-- about-->
	<section class="single_grid_w3_main align-w3-abt" id="about">
		<div class="container">
			<div class="wthree_pvt_title text-center">
				<h4 class="w3pvt-title">Welcome</h4>
        <?php if (have_posts()): while(have_posts()): the_post(); ?>
				  <p class=""><?php the_content() ?></p>
        <?php endwhile; endif; ?>
			</div>
			<div class="row">

        <?php foreach($services as $service): ?>

          <div class="col-lg-6 mb-4">
            <div class="abt-grid">
              <div class="row">
                <div class="col-3">
                  <div class="abt-icon">
                    <span class="<?= $service['icon'] ?>"></span>
                  </div>
                </div>
                <div class="col-9">
                  <div class="abt-txt">
                    <h4><?= $service['title'] ?></h4>
                    <p><?= $service['short_description'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

			</div>
			<div class="d-flex justify-content-center">
				<a href="<?php echo get_site_url() . '/services#services' ?>" class="btn w3ls-btn">view more</a>
			</div>
		</div>
	</section>
	<!-- //about -->

  <?php

}
?>