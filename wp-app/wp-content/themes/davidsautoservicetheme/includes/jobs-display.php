
<?php
function display_jobs($jobs) {
  
  foreach($jobs as $job):
      $job_details = get_fields($job);
      $job_cats = get_the_terms($job->ID, 'job_category');
      $cat_list = array_reduce($job_cats, function($c, $i) {
        return $c . ' ' . $i->slug;
      }, '');
      foreach($job_details['pictures'] as $picture): ?>
          
          <div class="<?= $cat_list ?> gallery-item col-xs-12 col-sm-4 col-md-3">
              <div class="recent-work-wrap">
                  <div class="sign-over"><?= $picture['caption'] ?></div>
                  <img class="img-responsive" src="<?= $picture['url'] ?>" alt="">                     
                  <div class="overlay">
                      <div class="recent-work-inner">
                          <h3><a href="#"><?php echo $job->post_title ?></a></h3>
                          <p><?php echo $job_details['brand'] . ": " . $job_details['model'] . " " . $job_details['year'] ?></p>
                          <a class="preview" href="<?= $picture['sizes']['large'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                      </div>
                  </div>
              </div>
          </div><!--/.gallery-item-->

      <?php 
      endforeach;
  endforeach;

}
?>
