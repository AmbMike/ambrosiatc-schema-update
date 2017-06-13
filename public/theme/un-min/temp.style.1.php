<?php
/**
Template Name: Style 1
@author         Michael Giammattei
 */
?>
<?php

get_header();

/* Page Booleans */
$remove_show = TRUE;
$drug_type   = TRUE;

$uploads            = wp_upload_dir();
$upload_path        = $uploads['baseurl'];

$page_BG            = (get_field('background_image')) ? : $upload_path.'/2016/01/timeline-body-bg.jpg';;
$top_title          = (get_field('top_title')) ? : null ;
$top_content        = (get_field('top_content')) ? : null;
$dynamic_content    = (get_field('dynamic_content')) ? : null;
$testimonial_category 	= get_field('testimonial_category');


/* Testimonial array building  */
if($testimonial_category != ''){
    $page_testimonials;

    foreach ($testimonial_category as $value) {
        $page_testimonials .= $value->ID.',';
    }
}

?>
    <style type="text/css">
        .timeline-left.amb-update:after{background: none;}
    </style>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <section class="row timeline-container" style="background:url(<?php echo $page_BG; ?>) top center no-repeat;background-size:cover;">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php if($top_title){echo '<h1>' . $top_title . '</h1>';} ?>
                            <?php if($top_content){echo '<h4>' . $top_content . '</h4>';} ?>
                        </div>
                    </div>
                    <?php if($dynamic_content):
                        $content = array();
                        foreach($dynamic_content as $data){
                            $content[] = $data['content_block'];
                        }

                        foreach($content as $data):
                            ?>
                            <div class="timeline ">
                                <div class="row">
                                    <div class="col-md-12  timeline-left amb-update">
                                        <?php echo $data; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach;
                    endif ?>
                </div>
            </section>

        </article>
    <?php endwhile; ?>
<?php endif; ?>
    <div class="clearfix"></div>
    <div class="row white-bg-aaa">
        <div id="drug-type-content" class="faq-bottom-amb">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <?php /*
					************************************
								 FAQ Block
					************************************
					*/?>
                        <?php

                        /* Check if faq is set in the admin panel */
                        if( get_field('faqs')):
                            /* Get the faq field value */
                            $faq_var_field = get_field('faqs');

                            $faq_tag = preg_replace('/\s+/','-',strtolower($faq_var_field[0]['faq_tag']));


                            $posts_faq = get_posts('post_type=faqs&tag='.$faq_tag .'');

                            $tag_ids = array();
                            foreach($posts_faq as $post) {
                                $tag_ids[] = $post->ID;
                            }
                            $faq_count = count($tag_ids);

                            ?>
                            <div class="effects-amb">
                                <h3><?php echo $faq_var_field[0]['faq_title']; ?></h3>
                            </div>
                            <?php

                            /* Create the faq(s) id array */
                            $faq_ids = array();
                            foreach($faq_var_field as $faq_object){
                                $faq_ids[] = $faq_object['faq']->ID.'<br>';
                            }
                            /* Run the query on the array of faq IDs */
                            foreach($faq_ids as $index => $faq_out ):
                                /* Set Font Size for check */
                                $font_size = '';
                                $fa_size   = '';

                                /* Set index to 1 */
                                $index = $index + 1;

                                /* Set the count to toggle faq box layout */
                                if($faq_count <= 1){
                                    $box_size  = 0;
                                }else{
                                    $font_size = 'class="small-font-amb"';
                                    $fa_size   = 'small-fa';
                                    $box_size  = 1;
                                }

                                /* Check if on the last div box */
                                if($index == $faq_count){
                                    $last_box  = 1;
                                }else{
                                    $last_box  = 0;
                                    $last_box  = 0;
                                }
                                // Tag Reference
                                $faq_tag = wp_get_post_tags($faq_out);

                                /* Run the query to get each faq data */
                                $query = new WP_Query(array(
                                    'post_status' => 'publish',
                                    'post_type' => 'faqs',
                                    'tag_slug__in' => $faq_var_field[0]['faq_tag'] ,
                                    'p' => $faq_out,
                                    'posts_per_page' => -1,
                                ));
                                /* Output the faqs */
                                while ($query->have_posts()) : $query->the_post();
                                    $question = get_field('question');
                                    $answer = get_field('answer');
                                    ?>
                                    <?php /* Check if the faqs need to be in 2 divs */?>
                                    <?php if($box_size == 1 ) echo '<div class="col-md-6">' ?>
                                    <div class="faq-drug-type">
                                        <div class="row">
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <div class="row">
                                                    <div class="col-xs-11">
                                                        <h3 <?php echo $font_size; ?>><?php echo preg_replace('/\-/', ' ', $question); ?></h3>
                                                    </div>
                                                    <div class="col-xs-1">
                                                        <i class="fa fa-arrow-circle-o-right <?php echo $fa_size;?>" data-faq="toggle" id="toggle-faq"></i>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="answer-amb">
                                                            <?php echo $answer?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php /* Closing div for Check if the faqs need to be in 2 divs */?>
                                    <?php if($box_size == 1 ){echo '</div>'; } ?>

                                    <?php /* Clear the row if last div */?>
                                    <?php if($last_box == 1 ){echo '<div class="clearfix"></div>'; } ?>

                                <?php endwhile;
                                wp_reset_query();
                            endforeach;
                        endif;

                        /*
                       ************************************
                                    FAQ Block
                       ************************************
                       */?>

                        <div class="clearfix"></div>
                        <div class="row stats">
                            <h5>What are the next steps?</h5>
                            <div class="checkout-wrap" style="padding:0">
                                <ul class="checkout-bar">

                                    <li class="visited first">
                                        <a href="tel://<?php echo $PHONE ?>">Call the Help Hotline</a>
                                    </li>

                                    <li class="previous visited"><a href="/rehab/safe-detox/">Detox Safely</li>

                                    <li class="previous visited"><a href="/rehab/residential-treatment/">Go to Treatment</a></li>

                                    <li class="active">Continue Care</li>

                                    <li><a href="/rehab/wellness/" style="color:#55595a;">Get Family Support</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php  if($testimonial_category): ?>
    <div class="row bottom-review-blue">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="at1-page-box">
                <div class="row">
                    <div class="col-lg-12">
                        <?php global $slug;  echo do_shortcode('[Ambrosia_testimonial Multiple="Yes" multiple_output="'.$page_testimonials.'" top_color="#006493" show_stars="No"  version="2 column" heading="A Client\'s Perspective" style="2"]'); ?>                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    <section class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 logos"><img src="/wp-content/uploads/2015/12/logos.jpg" class="img-responisve aligncenter" /></div>
    </section>
<?php get_footer(); ?>