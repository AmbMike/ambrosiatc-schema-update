<?php
/* Page Booleans */
$drug_type_style = TRUE;
$page_css = 'drug-types';

get_header();

/* Page Booleans */
$remove_show = TRUE;
$drug_type   = TRUE;

/* Page Variables */
$page_heading_one 	 = get_field('page_heading_one');
$opening_text		 = get_field('opening_text');
$feature_bg = get_field('body_background_image');
if(!$feature_bg){$feature_bg = "/wp-content/uploads/2016/04/ambrosia-prescription-opioids-bg.jpg";}
$right_block_1 = get_field('right_block_1');
$below_fold_background_image = get_field('below_fold_background_image');
if(!$below_fold_background_image){$below_fold_background_image = "/wp-content/uploads/2016/04/ambrosia-prescription-opioids-bg-green.jpg";}
$testimonial_category 	= get_field('testimonial_category');
$related_posts_title 	= get_field('related_post_title');
$leader_page_title 		= get_field('leader_page_title');
$leader_page_text 		= get_field('leader_page_text');
$leader_page_link 		= get_field('leader_page_link');
$post_category_name	= get_field('post_category_name');
$faqs_obj			    = get_field('faqs');
$table_names			= get_field('table_names');
$drug_type_obj    		=  get_field('drug_type_data');


if($drug_type_obj){

    if($table_names){
        $table_naming = explode(',',$table_names);
    }

    $table_naming[0] = ($table_naming[0] != NULL) ? $table_naming[0] : 'COMMERCIAL NAMES';
    $table_naming[1] = ($table_naming[1] != NULL) ? $table_naming[1] : 'STREET NAMES';
    $table_naming[2] = ($table_naming[2] != NULL) ? $table_naming[2] : 'COMMON FORMS';
    $table_naming[3] = ($table_naming[3] != NULL) ? $table_naming[3] : 'COMMON WAYS TAKEN';
}
/* Function to check and replace phone shortCode */
function custom_short_code($input,$short_code,$pattern, $wrap_start = '<nobr>', $wrap_end = '</nobr>'){
    $short_code = do_shortcode($short_code);
    $short_code = $wrap_start . $short_code . $wrap_end;
    $value = $input;

    $string = preg_replace($pattern, $short_code, $value, 1);
    return $string;
}
?>

<?php /* Testimonial array building  */

if($testimonial_category != ''){
    $page_testimonials;

    foreach ($testimonial_category as $value) {
        $page_testimonials .= $value->ID.',';
    }
}

?>

<div class="clearfix"></div>

<hr class="hr-shadow-aaa">
<div class="fluid-container" id="drug-type-amb">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <h1><?php echo $page_heading_one;?></h1>
            <div class="site-bar-white"></div>
        </div>
    </div>
</div>
<div id="drug-type-content" style="background-image:url(<?php echo $feature_bg; ?>);">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="opening-text">
                <p><?php echo custom_short_code($opening_text,'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/'); ?></p>
            </div>
            <?php if( have_rows('drug_type_data') ): ?>
                <div class=" drug-type-tab">
                    <?php $street_names = get_sub_field_object( 'street_names' );
                    $commercial_names = get_sub_field_object( 'commercial_names' );
                    $common_forms = get_sub_field_object( 'common_forms' );
                    $common_ways_taken = get_sub_field_object( 'common_ways_taken' );

                    $commercial_label			  = $table_naming[0];
                    $street_names_label 		  = $table_naming[1];
                    $common_forms_label	      = $table_naming[2];
                    $common_ways_taken_label    = $table_naming[3];
                    ?>
                    <div class="row tab-dotted-border drug-type-desktop">
                        <div class="col-lg-3 col-sm-6">
                            <div class="drug-type-boxes">
                                <h6><?php echo $commercial_label; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="drug-type-boxes">
                                <h6><?php echo $street_names_label; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="drug-type-boxes">
                                <h6><?php echo $common_forms_label; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="drug-type-boxes">
                                <h6><?php echo $common_ways_taken_label; ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php while( have_rows('drug_type_data') ): the_row();
                        $street_names = strip_tags(get_sub_field('street_names'));
                        $commercial_names = strip_tags(get_sub_field('commercial_names'));
                        $common_forms = strip_tags(get_sub_field('common_forms'));
                        $common_ways_taken =strip_tags( get_sub_field('common_ways_taken'));
                        ?>

                        <div class="row tab-dotted-border">
                            <?php if($commercial_names ): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="drug-type-boxes">
                                        <h6 class="mobile-only-aaa"><?php echo $commercial_label; ?></h6>
                                        <span><?php echo $commercial_names; ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($street_names ): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="drug-type-boxes">
                                        <h6 class="mobile-only-aaa"><?php echo $street_names_label; ?></h6>
                                        <span><?php echo $street_names; ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($common_forms ): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="drug-type-boxes">
                                        <h6 class="mobile-only-aaa"><?php echo $common_forms_label; ?></h6>
                                        <span><?php echo $common_forms; ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($common_ways_taken ): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="drug-type-boxes">
                                        <h6 class="mobile-only-aaa"><?php echo $common_ways_taken_label; ?></h6>
                                        <span><?php echo $common_ways_taken; ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div id="drug-type-content">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
                <?php if( have_rows('left_block_1') ): ?>
                    <?php while( have_rows('left_block_1') ): the_row();

                        $heading = get_sub_field('heading');
                        $block_text = custom_short_code(get_sub_field('block_text'),'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/');
                        $list_items = get_sub_field('list_items');
                        ?>
                        <?php if($heading ): ?>
                            <div class="col-sm-12">
                                <div class="effects-amb">
                                    <h3><?php echo $heading; ?></h3>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-sm-6">
                            <div class="effects-amb"  id="top-l-block" >
                                <?php if($block_text ): ?>
                                    <?php echo preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '',$block_text); ?>
                                <?php endif; ?>
                                <?php if($list_items ): ?>
                                    <ul>
                                        <?php foreach($list_items as $effect): ?>
                                            <li><?php echo $effect['effects'];  ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="col-sm-6">
                        <div class="effects-amb" id="top-r-block">
                            <?php echo custom_short_code($right_block_1,'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php if( have_rows('left_block_2') ): ?>
                    <?php while( have_rows('left_block_2') ): the_row();

                        $heading = get_sub_field('heading');
                        $block_text = get_sub_field('block_text');
                        $list_items = get_sub_field('list_items');
                        ?>
                        <div class="col-sm-6">
                            <div class="effects-amb"  id="top-l-block">
                                <?php if($heading ): ?>
                                    <h3><?php echo $heading; ?></h3><br />
                                <?php endif; ?>
                                <?php if($block_text ): ?>
                                    <?php echo custom_short_code($block_text ,'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/') ?>
                                <?php endif; ?>
                                <?php if($list_items ): ?>
                                    <ul>
                                        <?php foreach($list_items as $symptoms): ?>
                                            <li><?php echo $symptoms['symptoms'];  ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if( have_rows('right_block_2') ): ?>
                    <?php while( have_rows('right_block_2') ): the_row();
                        $heading = get_sub_field('heading');
                        $block_text = get_sub_field('text');
                        ?>
                        <div class="col-sm-6" >
                            <div class="effects-amb"  id="top-r-block">
                                <?php if($heading ): ?>
                                    <h3><?php echo $heading; ?></h3><br />
                                <?php endif; ?>
                                <?php if($block_text ): ?>
                                    <?php echo custom_short_code($block_text ,'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/');?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php  if($testimonial_category || $post_category_name ): ?>
    <div id="drug-type-fold" class="fluid-container reset-marg" style="background-image:url(<?php echo $below_fold_background_image; ?>);">
        <?php  if($testimonial_category): ?>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <?php /* if(isset($_GET['page_dev'])) : ?>
						<?php if($testimonial_category): ?>
						<div class="effects-amb drug-type-fold">
							<?php echo do_shortcode('[amb_testimonials tags="'.$testimonial_category.'" limit="1" style="full_width" h4="A Client\'s Perspective"]'); ?>
						</div>
						<?php endif; ?>
					<?php endif; */ ?>
                    <div class="at1-page-box">
                        <div class="row">
                            <div class="col-lg-12" id="full-js-mod">
                                <?php global $slug;  echo do_shortcode('[Ambrosia_testimonial Multiple="Yes" multiple_output="'.$page_testimonials.'" top_color="#006493" show_stars="No"  version="2 column" heading="Hear the Stories" style="2"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
</div>
</div>
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
                        $posts_faq = get_posts('post_type=faqs&tag='.$faqs_obj[0]['faq_tag'].'');

                        /* Get the faq field value */
                        $faq_var_field = get_field('faqs');


                        $tag_ids = array();
                        foreach($posts_faq as $post) {
                            $tag_ids[] = $post->ID;
                        }
                        $faq_count = count($tag_ids);

                        ?>
                        <div class="effects-amb">
                            <h3><?php echo $faqs_obj[0]['faq_heading']; ?></h3>
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
                            }
                            // Tag Reference
                            $faq_tag = wp_get_post_tags($faq_out);

                            /* Run the query to get each faq data */
                            $query = new WP_Query(array(
                                'post_status' => 'publish',
                                'post_type' => 'faqs',
                                'tag_slug__in' => $faqs_obj[0]['faq_tag'],
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
                                                    <h3 <?php echo $font_size; ?>><?php echo $question?></h3>
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<?php  if($leader_page_title && $leader_page_text && $leader_page_link): ?>
    <div class="row related-updates white-bg-aaa">
        <div class="fluid-container" id="drug-type-fold">
            <div class="row related-updates white-bg-aaa">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="effects-amb">
                                <table>
                                    <tr>
                                        <td class="left-axx">
                                            <h4><?php echo $leader_page_title ?></h4>
                                            <div><?php echo custom_short_code($leader_page_text ,'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/');?></div>
                                        </td>
                                        <td class="right-axx">
                                            <a class="btn-amb" href="<?php echo $leader_page_link[0]['linked_page']; ?>"><?php echo $leader_page_link[0]['link_title']; ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="mobile-axx">
                                            <a class="btn-amb" href="<?php echo $leader_page_link[0]['linked_page']; ?>"><?php echo $leader_page_link[0]['link_title']; ?></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<?php endif; ?>
<?php  if(!empty($post_category_name)):
    $post_cat_ids = array();
    foreach($post_category_name as $post_cats){
        $post_cat_ids[] = $post_cats->ID;
    }
    ?>
    <div id="drug-type-fold" class="marg-edit">
        <div class="row related-updates">
            <div class="col-lg-10 col-lg-offset-1">
                <h3><?php echo !empty($related_posts_title) ? $related_posts_title : 'General Questions' ; ?></h3>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        global $post;
                        $args = array( 'numberposts' => 3, 'post__in' => $post_cat_ids, 'post_type' =>  'any' );
                        $posts = get_posts( $args );
                        foreach( $posts as $post ): setup_postdata($post);
                            $the_content = get_the_content();
                            $the_content = strtolower($the_content);
                            $the_content = ucfirst($the_content);
                            ?>
                            <div class="col-sm-4">
                                <a href="<?php echo the_permalink() ?>">
                                    <div class="blog-con-box">
                                        <h5><?php echo the_title(); ?></h5>
                                        <div class="img-box-22" style="background-image: url(<?php echo (get_the_post_thumbnail_url($post->ID, 'medium')) ? get_the_post_thumbnail_url($post->ID, 'medium') :'https://www.ambrosiatc.com/wp-content/uploads/2015/12/img41.jpg" alt="Image Coming Soon'; ?>);">

                                        </div>

                                        <p class="text-related"><?php
                                            /* If Drug Type use top text var */
                                            //if($post->post_type == 'drug_types'){
                                            //echo strip_tags(wp_trim_words(get_field('opening_text',$post->ID ),30,'...' ));
                                            //}else{
                                            /* If not Drug Type post when use content */

                                            //}
                                            if($post->post_type == 'drug_types' && empty(get_the_excerpt())){
                                                echo strip_tags(wp_trim_words(get_field('opening_text',$post->ID ),25,'...' ));
                                            }else{
                                                echo get_the_excerpt();
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<div class="clearfix"></div>
<?php get_footer();?>
