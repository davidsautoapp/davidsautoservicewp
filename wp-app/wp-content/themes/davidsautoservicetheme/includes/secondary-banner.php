<?php
function secondary_banner() {
  ?>

  <div class="inner-banner-w3ls contact banner-inner-overlay d-flex flex-column justify-content-start align-items-center">
    <div class="container">
      <div id="open-hours-sign">
        <div class="d-inline-block">
          <h6>Call Us at:</h6>
          <p>
            <?php if ( have_rows( 'phones', 'option' ) ) : ?>
              <?php while ( have_rows( 'phones', 'option' ) ) : the_row(); ?>
                <a href="tel:+<?php the_sub_field( 'phone' ); ?>"><?php echo phone_formater(get_sub_field( 'phone' )); ?></a>
              <?php endwhile; ?>
            <?php else : ?>
              <?php // no rows found ?>
            <?php endif; ?>
          </p>
        </div>
        <div class="d-inline-block">
          <h6>Hours</h6>
          <p>Monday-Saturday: 8am-7pm</p>
        </div>
      </div>
    </div>
  </div>

  <!-- breadcrumbs -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb d-flex justify-content-center">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">About Us, Services</li>
    </ol>
  </nav>
  <!-- //breadcrumbs -->

  <?php
}
?>