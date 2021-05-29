<?php
require_once('includes/utils.php');
require_once('includes/secondary-banner.php');

get_header();

secondary_banner();;

?>

<section id="about-us">


  <?php while(have_posts()): the_post(); ?>
    <div class="center wow fadeInDown">
      <h2><?php the_title(); ?></h2>
    </div>
    <div class="wow fadeInDown">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>

  <!--/#about-slider-->
  <!--/.container-->
</section>

<?php
get_footer();

