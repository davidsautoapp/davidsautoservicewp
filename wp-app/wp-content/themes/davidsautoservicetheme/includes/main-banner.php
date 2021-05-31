<?php
function main_banner() {
  ?>

  
	<!-- banner -->
	<section class="banner">
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
							<img src="images/a3.jpg" class="img-fluid img-thumbnail" alt="" />
							<h3>Preventive <br>Maintenance</h3>
						</div>
					</div>
					<!-- <div class="col-sm-3 col-6 mx-auto mt-sm-0 mt-4"> -->
					<div class="col-sm-3 col-6 mb-3 mx-auto mt-sm-0">
						<div class="bb-img">
							<img src="images/a2.jpg" class="img-fluid img-thumbnail" alt="" />
							<h3>Tire <br>Services</h3>
						</div>
					</div>
					<div class="col-sm-3 col-6 mb-3">
						<div class="bb-img">
							<img src="images/a1.jpg" class="img-fluid img-thumbnail" alt="" />
							<h3>Repair <br>Services</h3>
						</div>
					</div>
					<div class="col-sm-3 col-6 mb-3">
						<div class="bb-img">
							<img src="images/a4.jpg" class="img-fluid img-thumbnail" alt="" />
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
}
?>
