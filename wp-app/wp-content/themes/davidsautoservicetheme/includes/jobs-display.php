
<?php
function display_jobs($jobs) {
    ?>
	
    <div>
        <ul class="demo row">
            <?php
            foreach($jobs as $job):
                $job_details = get_fields($job);
                $job_cats = get_the_terms($job->ID, 'job_category');
                $cat_list = array_reduce($job_cats, function($c, $i) {
                    return $c . ' ' . $i->slug;
                }, '');
                foreach($job_details['pictures'] as $picture): ?>
                    <li class="col-lg-4">
                        <div class="img-grid">
                            <div class="Portfolio-grid1">
                                <a href="#gal1">
                                    <img src="<?= $picture['url'] ?>" alt=" " class="img-fluid" />
                                </a>
                            </div>
                            <div class="port-desc text-center">
                                <!-- <h6 class="main-title-w3pvt text-center">Oil change Description</h6> -->
                                <p><?php echo $job->post_title ?> - <?= $picture['caption'] ?></p>
                            </div>
                        </div>
                    </li>
                    <?php 
                endforeach;
            endforeach;
            ?>
        </ul>
    </div>
    <?php
    foreach($jobs as $job):
        $job_details = get_fields($job);
        $job_cats = get_the_terms($job->ID, 'job_category');
        $cat_list = array_reduce($job_cats, function($c, $i) {
            return $c . ' ' . $i->slug;
        }, '');
        foreach($job_details['pictures'] as $picture): ?>
            <!-- popup-->
            <div id="gal1" class="popup-effect animate">
                <div class="popup">
                    <img src="<?= $picture['sizes']['large'] ?>" alt="Popup Image" class="img-fluid" />
                    <p class="editContent mt-4"><?php echo $job_details['brand'] . ": " . $job_details['model'] . " " . $job_details['year'] ?></p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <?php 
        endforeach;
    endforeach;
    ?>		

<?php
}
