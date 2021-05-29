<?php
require_once('includes/utils.php');
?>

  <!-- footer -->
  <footer class="footer py-md-5 pt-md-3 pb-sm-5">
		<div class="container">
			<div class="row p-sm-4 px-3 py-3">
				<div class="col-md-6 footer-top mt-md-0 mt-sm-5">
					<h2>
						<a class="navbar-brand" href="index.html">
							David's Auto Service
						</a>
					</h2>
					<div class="fv3-contact mt-2">
						<p>
							Email:
              <?php if ( have_rows( 'emails', 'option' ) ) : ?>
                <?php while ( have_rows( 'emails', 'option' ) ) : the_row(); ?>
                  <a href="mailto:<?php the_sub_field( 'email' ); ?>"><?php the_sub_field( 'email' ); ?></a>, 
                <?php endwhile; ?>
              <?php else : ?>
                <?php // no rows found ?>
              <?php endif; ?>
						</p>
					</div>
					<div class="fv3-contact my-2">
            <?php if ( have_rows( 'phones', 'option' ) ) : ?>
              <?php while ( have_rows( 'phones', 'option' ) ) : the_row(); ?>
                <p>  
                  Tel: <?php the_sub_field( 'type' ); ?>&nbsp;-&nbsp;<a href="tel:+<?php the_sub_field( 'phone' ); ?>"><?php echo phone_formater(get_sub_field( 'phone' )) ?></a>
                </p>
                <br>
              <?php endwhile; ?>
            <?php else : ?>
              <?php // no rows found ?>
            <?php endif; ?>
					</div>
          <div class="fv3-contact my-2">
            <p>
              Address: <?php the_field( 'locations', 'option' ); ?>
            </p>
          </div>
				</div>
				<div class="col-md-3 mt-lg-0 mt-4">
					<div class="footerv2-w3ls">
						<h3 class="mb-3 w3f_title">Navigation</h3>
						<hr>
            <?php 
            wp_nav_menu([
              'theme_location'  =>  'secondary-menu',
              'container'       =>  'ul',
              'menu_class'      =>  'list-w3pvtits'
            ]) 
            ?>
					</div>
				</div>
				<div class="col-md-3 mt-lg-0 mt-4">
					<div class="footerv2-w3ls">
						<h3 class="mb-3 w3f_title">Links</h3>
						<hr>
						<ul class="list-w3pvtits">
							<li>
								<a href="<?php echo get_site_url() . '/about-us' ?>">
									Our Mission
								</a>
							</li>
              <?php if ( have_rows( 'sitenetwork', 'option' ) ) : ?>
                <?php while ( have_rows( 'sitenetwork', 'option' ) ) : the_row(); ?>
                  <li class="my-2">
                    <a href="<?php the_sub_field( 'url' ); ?>"><?php the_sub_field( 'name' ); ?></a>
                  </li>
                <?php endwhile; ?>
              <?php else : ?>
                <?php // no rows found ?>
              <?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- //footer bottom -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="cpy-right text-center bg-theme">
		<p class="text-wh">© 2019 Car Repairs | Design by Ben D.
		</p>
	</div>
	<!-- //copyright -->
	<!-- move top icon -->
	<a href="#home" class="move-top text-center">
		<span class="fa fa-level-up" aria-hidden="true"></span>
	</a>
	<!-- //move top icon -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158662794-3">
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-158662794-3');
	</script>
  <?php wp_footer(); ?>

</body>

</html>


