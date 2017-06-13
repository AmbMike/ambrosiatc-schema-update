<?php $output_html = <<<EOD
<div class="at1-head-box">
    <h5 style="background: {$atts['top_color']}">Reviews <img src="/wp-content/uploads/2016/01/5-stars-rating.png" alt="Rehab Reviews Highest Rated"/> <br><span class="review-rate hidden-md">7.5K+ Clients Helped</span></h5>
</div>
<div class="at1-controls">
    <div class="row">
        <div class="col-xs-4 at1-backward">
            <i class="fa fa-backward" aria-hidden="true"></i>
        </div>
        <div class="col-xs-4 at1-pause">
            <i class="fa fa-pause" aria-hidden="true"></i>
        </div>
        <div class="col-xs-4 at1-forward">
            <i class="fa fa-forward" aria-hidden="true"></i>
        </div>
    </div>
</div>
<div class="amb-testimonial-1-wrap">
    <div class="amb-testimonial-1-container">
EOD;
?>
<?php
/* Start looping through the data */
while($query->have_posts()) : $query->the_post();
    unset($stars);
    $stars = array();

    unset($empty_stars);
    $empty_stars = array();

    /* Create Page Data value */
    $page_data = array(
        'thumbnail' => (get_field('image')) ? get_field('image')['sizes']['thumbnail'] : '/wp-content/uploads/2015/12/photo-coming-soon-150x150.jpg',
        'name' => (get_field('name')) ? get_field('name') : 'Anonymous',
        'description' => (get_field('content')) ? get_field('content') : 'There is no content for this testimonial. Check back soon.',
        'date' => (get_field('date')) ? get_field('date') : NULL,
        'rating' => (get_field('rating')) ? get_field('rating') : 5,
    );

    $rating_int       = (float)$page_data['rating'];
    $empty_star_count = 5 - $rating_int;

    for($i=0; $i < $rating_int; $i++){
        $stars[] = '<i class="fa fa-star"></i>';
    }

    for($i=0; $i < $empty_star_count; $i++){
        $empty_stars[] = '<i class="fa fa-star-o"></i>';
    }

    $date_out = preg_replace('/\,.{5}/','',$page_data['date']);
    $value_star = '';

    foreach($stars as $key => $value){
        $value_star .= $value;
    }
    foreach($empty_stars as $key => $value){
        $value_star .= $value;
    }

    ?>

    <?php
    $output_html .= <<<EOD
                    <div class="amb-testimonial-1 ver2" itemscope itemtype="//schema.org/Organization">
                    <span itemprop="name" style="display:none;">Ambrosia Treatment Center</span>
                    <div style="display:none;" itemprop="aggregateRating" itemscope itemtype="//schema.org/AggregateRating">
                        <span itemprop="ratingValue">4.5</span> <span itemprop="reviewCount">7500</span>
                    </div>
                    <div itemscope itemtype="http://schema.org/Review">
                        <div style="display:none;" itemprop="name">
                            Ambrosia Treatment Center
                        </div>
                        <div class="at1-img-box">
                            <div class="at1-img-box-container">
                                <img src="{$page_data['thumbnail']}" alt="{$page_data['name']}">
                            </div>
                        </div>
                        <div itemprop="author" itemscope itemtype="http://schema.org/Person">
                            <span class="at1-name" itemprop="name">{$page_data['name']}</span>
                        </div>
                        <div itemprop="itemReviewed" itemscope itemtype="http://schema.org/ProfessionalService">
                            <span style="display:none;" itemprop="name">Treatment Center</span>
                        </div>
                        <span class="at1-description clamp" itemprop="reviewBody">{$page_data['description']}</span>
                        <div class="at1-date-star-box">
                            <div class="at1-published-date"><meta itemprop="datePublished" content="{$page_data['date']}">{$date_out}</div>
                            <div class="at1-stars" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                                <meta itemprop="worstRating" content="0"><span style="display:none;" itemprop="ratingValue">{$page_data['rating']}</span> <span style="display:none;" itemprop="bestRating">5</span>{$value_star}
                            </div>
                        </div>
                    </div>
                </div>
EOD;
    ?>

    <?php

endwhile;
wp_reset_query();
?>
<?php
$output_html .= <<<EOD
    </div>
    <div class="clearfix"></div>
    <div class="at1-controls">
        <div class="row">
            <div class="col-xs-4 at1-backward">
                <i class="fa fa-backward" aria-hidden="true"></i>
            </div>
            <div class="col-xs-4 at1-pause">
                <i class="fa fa-pause" aria-hidden="true"></i>
            </div>
            <div class="col-xs-4 at1-forward">
                <i class="fa fa-forward" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
EOD;
?>

<?php
if($atts['column'] == 1){
    wp_enqueue_script( 'main.js', plugins_url(PLUGIN_NAME) . '/js/horizontal.js');
}else{
    wp_enqueue_script( 'main.js', plugins_url(PLUGIN_NAME) . '/js/version-2.js');
}

?>