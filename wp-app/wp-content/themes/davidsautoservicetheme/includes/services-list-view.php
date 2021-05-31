<?php
function services_list_view($services) {
  ?>
    
	<!-- services -->
	<section class="bg-services position-relative align-w3" id="services">
		<div class="container-fluid bg-overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="services-bg-color">
							<div class="wthree_pvt_title mb-3">
								<h4 class="w3pvt-title w3pvt-titl-sec text-wh">what we provide
								</h4>
								<span class="sub-title text-li">A summary non-exhaustive list of our services</span>
							</div>

              <div class="row">
                <?php foreach($services as $service): ?>

                  <div class="col-md-6 service-title my-4">
                    <h4 class="home-title text-theme"><?= $service['group_title'] ?></h4>
                    <ul class="sec-4">
                      <?php
                      foreach($service['details'] as $service_detail) {
                        echo "<li>" . $service_detail['service_title']  . "</li>";
                      }
                      ?>
                    </ul>
                  </div>
                  
                <?php endforeach; ?>
              </div>

							<div class="d-flex justify-content-start">
								<a href="about.html" class="btn w3ls-btn">More Details</a>
							</div>
						</div>

					</div>
					<div class="offset-lg-2"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- //services -->

  <?php
}