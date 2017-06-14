<?php


/* Page Booleans */
$drug_type   = TRUE;
$custom_post = TRUE;
$page_css = 'single-alt';

$header_img_obj			= (get_field('header_image')) ? : NULL;
$above_fold_img 		= (get_field('above_fold_background_image')) ? : NULL;
$b1_obj					= (get_field('block_1')) ? : NULL;
$b1_right_obj			= (get_field('block_1_right')) ? : NULL;
$b1_right_toggle		= (get_field('toggle_right_content')) ? : NULL;
$b2_left_obj			= (get_field('block_2_left_image')) ? : NULL;
$b2_right_obj			= (get_field('right_block_2')) ? : NULL;
$b3_left_obj			= (get_field('left_block_3')) ? : NULL;
$b3_right_obj			= (get_field('right_block_3')) ? : NULL;
$b4_obj	        		= (get_field('block_4')) ? : NULL;
$block_5	    		= (get_field('block_5')) ? : NULL;
$block_6	    		= (get_field('block_6')) ? : NULL;
$faqs_obj				= get_field('faqs');
$posts_title        	= get_field('related_post_title');
$post_category_name		= get_field('post_catetagory_name');
$post_per_page	    	= get_field('post_per_page');
$faq_style	    	    = get_field('faq_style');
$block_2_toggle    	    = get_field('block_2_toggle') ? : NULL;
$block_2_heading	    = get_field('block_2_heading') ? : NULL;
$block_2_left_text	    = get_field('block_2_left_text') ? : NULL;

/* Function to check and replace phone shortCode */
function custom_short_code($input,$short_code,$pattern, $wrap_start = '<nobr>', $wrap_end = '</nobr>'){
    $short_code = do_shortcode($short_code);
    $short_code = $wrap_start . $short_code . $wrap_end;
    $value = $input;

    $string = preg_replace($pattern, $short_code, $value, 1);
    return $string;
}
?>
<?php get_header(); ?>
<?php
$page_data = array(
    'header_img' 		=> ($header_img_obj) ? $header_img_obj['url'] : 'https://www.ambrosiatc.com/wp-content/uploads/2016/05/ambrosia-dual-diagnosis-1.jpg',
    'header_img_txt'    => (get_field('title_over_header_image')) ? : 'Ambrosia Post',
    'above_fold_img'	=> ($above_fold_img) ? $above_fold_img['url'] : 'https://www.ambrosiatc.com/wp-content/uploads/2016/05/custom-post-default-bg.jpg',
    'b1_heading'		=> ($b1_obj[0]['heading']) ? : NULL,
    'b1_text'           => ($b1_obj[0]['block_text']) ? : NULL,
    'b1_list'           => ($b1_obj[0]['list_items']) ? : NULL,
    'b1_right_video'    => ($b1_right_obj[0]['right_video']) ? : NULL,
    'b1_right_img'      => ($b1_right_obj[0]['img']['url']) ? $b1_right_obj[0]['img']['url'] : 'https://www.ambrosiatc.com/wp-content/uploads/2016/05/ambrosia-dual-diagnosis-right-art.jpg',
    'b1_right_img_alt'  => ($b1_right_obj[0]['img']['alt']) ? : $b1_obj[0]['heading'],
    'b2_left_img'       => ($b2_left_obj['url']) ? $b2_left_obj['url'] : 'https://www.ambrosiatc.com/wp-content/uploads/2016/05/ambrosia-dual-diagnosis-chart.jpg',
    'b2_left_img_alt'   => ($b2_left_obj['alt']) ? : $b1_obj[0]['heading'],
    'b2_heading'        => ($b2_right_obj[0]['heading']) ? : NULL,
    'b2_text'           => ($b2_right_obj[0]['text']) ? custom_short_code($b2_right_obj[0]['text'],'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/') : NULL,
    'b3_heading_lft'    => ($b3_left_obj[0]['heading']) ? : NULL,
    'b3_text_lft'       => ($b3_left_obj[0]['text']) ? custom_short_code($b3_left_obj[0]['text'],'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/') : NULL,
    'b3_heading_rt'     => ($b3_right_obj[0]['heading']) ? : NULL,
    'b3_text_rt'        => ($b3_right_obj[0]['text']) ? custom_short_code($b3_right_obj[0]['text'],'[AMB_MAIN_PHONE]','/\*AMB\_MAIN\_PHONE\*/') : NULL,
    'b4_top_heading'	=> ($b4_obj[0]['top_heading'])? : NULL,
    'b4_text_1'	        => ($b4_obj[0]['text_1'])? : NULL,
    'block_5'	        => ($block_5)? : NULL,
    'block_6'	        => ($block_6)? : NULL,
    'posts_title'	    => ($posts_title)? : NULL,
    'post_id'	        => ($post_category_name)? : NULL,
    'post_per_page'	    => ($post_per_page)? : -1,
    'faq_style'			=> ($faq_style && $faqs_obj) ? $faq_style : "Full",
);
?>
    <div class="fluid-container" id="custom-blog">
    <div class="row">
        <section class="row amb-header-bg" style="background-image:url(<?php echo $page_data['header_img']; ?>)">
            <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <h1 class="amb-subpage-title "><?php echo $page_data['header_img_txt'] ?></h1>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1">
            </div>
        </div>
    </div>
    <div class="above-fold-amb" style="background-image:url(<?php echo $page_data['above_fold_img']; ?>)">
        <div class="row cus-marg">
            <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1">
                <?php /* Block 1 Content */ ?>
                <div class="row" id="b1-left">
                    <?php if($b1_obj !== NULL): ?>
                        <div class="col-md-6">
                            <div class="pad-all">
                                <?php if($page_data['b1_heading']): ?>
                                    <h4><?php echo $page_data['b1_heading']; ?></h4>
                                <?php endif; ?>
                                <?php if($page_data['b1_text']): ?>
                                    <?php echo $page_data['b1_text']; ?>
                                <?php endif; ?>
                                <?php if($page_data['b1_list']): ?>
                                    <ul>
                                        <?php foreach( $page_data['b1_list'] as $item): ?>
                                            <li><?php echo strip_tags($item['items']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php /* Block 1 Right Content */ ?>
                    <?php if($b1_right_obj != NULL): ?>
                        <div class="col-md-6">
                            <?php if(!empty($b1_right_toggle) && $b1_right_toggle != 'Video') : ?>
                                <div class="pad-all" id="b1-right">
                                    <img src="<?php echo $page_data['b1_right_img']; ?>" alt="<?php echo $page_data['b1_right_img_alt']; ?>" class="img-responsive" />
                                </div>
                            <?php else : ?>
                                <div class="mobile-video-el">
                                    <div class="embed-responsive embed-responsive-16by9" >
                                        <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/<?php echo $page_data['b1_right_video']; ?>?rel=0" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="embed-responsive embed-responsive-16by9" id="right-video">
                                    <div id="player_post" data-videoId="<?php echo $page_data['b1_right_video']; ?>"></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="pad-all">
                        <div class="pg-divder"></div>
                    </div>
                </div>
                <?php /* Block 2 Content */ ?>
                <div class="row" id="b1-left">
                    <?php if($block_2_toggle != null && $block_2_toggle == 'Text' && $block_2_heading != null) :  ?>
                        <div class="col-md-12">
                            <div class="pad-all">
                                <h3 class="text-center"><?php echo $block_2_heading; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pad-all left-blk-2" id="b1-right">
                                <?php if($block_2_toggle != null && $block_2_toggle == 'Text') :  ?>
                                    <div class="pad-all"><?php echo $block_2_left_text; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($b2_left_obj != NULL && $block_2_toggle != 'Text') : ?>
                        <div class="col-md-6">
                            <div class="pad-all" id="b1-right">
                                <?php if($page_data['b1_heading']): ?>
                                    <img src="<?php echo $page_data['b2_left_img']; ?>" alt="<?php echo $page_data['b2_left_img_alt']; ?>" class="img-reponsive" />
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php /* Block 2 Right Content */ ?>
                    <?php if($b2_right_obj !== NULL): ?>
                        <div class="col-md-6">
                            <div class="pad-all">
                                <?php if($page_data['b2_heading']): ?>
                                    <h2><?php echo $page_data['b2_heading']; ?></h2>
                                <?php endif; ?>
                                <?php if($page_data['b2_text']): ?>
                                    <div class="pad-all left-blk-2"><?php echo $page_data['b2_text']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="above-fold-amb">
        <?php if($b3_left_obj || $page_data['b4_top_heading'] !== NULL): ?>
            <div class="row cus-marg">
                <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1">
                    <?php /* Block 3 Content */ ?>
                    <div class="row" id="b3-left">
                        <?php /* Block 3 Right Content */ ?>
                        <?php if($b3_left_obj): ?>
                            <div class="col-md-6">
                                <div class="pad-all">
                                    <?php if($page_data['b3_heading_lft']): ?>
                                        <h3><?php echo $page_data['b3_heading_lft']; ?></h3>
                                    <?php endif; ?>
                                    <?php if($page_data['b3_text_lft']): ?>
                                        <div class=""><?php echo $page_data['b3_text_lft']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php /* Block 3 Right Content */ ?>
                        <?php if($b3_right_obj !== NULL): ?>
                            <div class="col-md-6">
                                <div class="pad-top">
                                    <?php if($page_data['b3_heading_rt']): ?>
                                        <h3><?php echo $page_data['b3_heading_rt']; ?></h3>
                                    <?php endif; ?>
                                    <?php if($page_data['b3_text_rt']): ?>
                                        <div class="pad-all"><?php echo $page_data['b3_text_rt']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row" id="block-4">
                        <?php /* Block 4 Right Content */ ?>
                        <?php if($page_data['b4_top_heading'] !== NULL): ?>
                            <div class="col-md-6">
                                <div class="pad-all">
                                    <?php if($page_data['b4_top_heading']): ?>
                                        <h3><?php echo $page_data['b4_top_heading']; ?></h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php /* Block 4 Right Content */ ?>
                        <?php if($page_data['b4_top_heading']!== NULL): ?>
                            <div class="col-md-6">
                                <div class="pad-all">
                                    <i class="fa fa-chevron-down"></i>
                                    <div class="blue-line-effect"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($page_data['b4_text_1']!== NULL): ?>
                            <div class="col-md-12">
                                <div class="pad-all">
                                    <?php echo $page_data['b4_text_1']; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php if($page_data['block_5'] !== NULL): ?>
    <div class="row cus-marg">
        <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1">
            <div class="row" id="block-5">
                <?php foreach($page_data['block_5'][0]['edit_bock'] as $row):?>
                    <div class="col-sm-4">
                        <div class="box-amb" style="background-image:url(<?php echo ($row['image']['url']) ? : '' ; ?>); width:97%; height:<?php echo $row['image']['height']; ?>px;">
                            <h4><?php echo ($row['text']) ? : '' ?></h4>
                            <p></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($page_data['block_6'] !== NULL && $page_data['block_6'][0]['heading'] != ''  && $page_data['block_6'][0]['text'] != '' && $page_data['block_6'][0]['background_image'] != ''): ?>
    <div class="fluid-container" id="block-6" style="background-image:url(<?php echo ($block_6[0]['background_image']['url']) ? : '/wp-content/uploads/2016/04/ambrosia-prescription-opioids-bg-green.jpg' ?>);">
        <div class="row pad-all cus-marg">
            <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1">
                <?php if($block_6[0]['heading']): ?>
                    <div class="col-md-12">
                        <h3><?php echo ($block_6[0]['heading']) ?></h3>
                    </div>
                <?php endif; ?>
                <div class="col-md-9">
                    <div class="row">
                        <?php
                        if($block_6[0]['text']):
                            echo ($block_6[0]['text']);
                        endif;
                        ?>
                        <?php
                        if($block_6[0]['list_items']): ?>
                            <div class="row">
                                <?php foreach($block_6[0]['list_items'] as $row):?>
                                    <div class="box-amb">
                                        <div class="circle-amb">
                                            <?php echo $row['item']; ?>
                                        </div>
                                    </div>
                                <?php	endforeach;?>
                            </div>
                        <?php endif; ?>
                        <?php
                        if($block_6[0]['second_block_text']):
                            echo ($block_6[0]['second_block_text']);
                        endif;
                        ?>

                    </div>
                </div>
                <div class="row" id="side-amb">
                    <?php if($block_6[0]['right_image']): ?>
                        <div class="col-md-3">
                            <img src="<?php echo $block_6[0]['right_image']['url']?>" alt="<?php echo $block_6[0]['right_image']['alt']?>" />
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>
<?php /*
	************************************
				 FAQ Block
	************************************
	*/?>
<?php

/* Check if faq is set in the admin panel */
if( get_field('faqs')): ?>
    <div class="fluid-container">
    <div class="row">
    <div class="pad-all">
        <?php
        $posts_faq = get_posts('post_type=faqs&tag='.$faqs_obj[0]['faq_tag'].'');

        /* Get the faq field value */
        $faq_var_field = get_field('faqs');


        $tag_ids = array();
        foreach($posts_faq as $post) {
            $tag_ids[] = $post->ID;
        }
        $faq_count = count($tag_ids);
        ?>
        <div class="row cus-marg" id="faq-alt">
            <div class="col-lg-10 col-lg-offset-1 pad-fix">
                <div class="effects-amb">
                    <h2><a name="FAQ"></a><?php echo $faqs_obj[0]['faq_title']; ?></h2>
                </div>
                <div class="clearfix"></div>
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

                    /* Set the count to toggle faq box layout
                    if($faq_count <= 1){
                        $box_size  = 0;
                    }*/
                    /* Set the count to toggle faq box layout */
                    if($page_data['faq_style'] == "Full"){
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
                                        <div class="clearfix"></div>
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
                echo '</div>';
                echo '</div>';
                ?>
            </div>
        </div>
    </div>

<?php endif;

/*
************************************
            FAQ Block
************************************
*/?>
<?php if($page_data['post_id'] !== NULL):?>
    <hr class="hr-shadow-aaa">
    <div class="fluid-container" id="custom-blog">
        <div class="row">
            <div class="page-container-amb">
                <div class="col-lg-10 col-lg-offset-1 child-pages-boxed">
                    <div class="row pad-20">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="row" id="block-1-fa">
                                    <table border="0">
                                        <tr>
                                            <td><h2><?php echo $page_data['posts_title']; ?></h2></td>
                                            <td><div class="h-line"></div></td>
                                            <td class="post-item-1-move"><i class="fa fa-arrow-circle-left"></i>
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="post-contain-amb">
                                    <div class="post-contain-amb-inner">
                                        <?php

                                        /* Call database to get post ids from the related posts category */
                                        $args = array( 'category' => $page_data['post_id'], 'posts_per_page' => -1 );

                                        $related_post_id = get_posts( $args );

                                        /* Put related post ids into an array */
                                        $post_array = array();
                                        foreach($related_post_id as $the_post){
                                            $post_array[] = $the_post->ID;
                                        }
                                        wp_reset_query();

                                        /* Put additional post ids into the related posts array */
                                        foreach(get_field('additional_posts') as $addon_post){
                                            $post_array[] = $addon_post;
                                        }
                                        /* call the database to get all the posts for related and addictional posts (limited by admin value) */
                                        $args = array(
                                            'post__in' => $post_array,
                                            'posts_per_page' => $page_data['post_per_page'],
                                            'post_type'	=> array('post','drug_types')
                                        );

                                        $theposts = get_posts( $args );
                                        foreach ( $theposts as $post ) : setup_postdata( $post ); ?>
                                            <div class="col-sm-6 post-item-amb post-item-1-move">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="child-pages-inner img-post-amb">
                                                            <?php if(has_post_thumbnail ()){
                                                                echo get_the_post_thumbnail();
                                                            }else{
                                                                echo '<img src="https://www.ambrosiatc.com/wp-content/uploads/2015/12/photo-coming-soon.jpg" alt="Learning Center">';
                                                            }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="child-pages-inner child-amb-text">
                                                            <h3><?php echo get_the_title();?></h3>
                                                            <?php
                                                            $main_text = strip_tags( wp_trim_words(get_the_excerpt(),40, '...' ),'<p>');
                                                            echo preg_replace('/Read more/','',$main_text);
                                                            ?>
                                                            <?php if(empty(get_the_excerpt())){
                                                                $alt_text =strip_tags( wp_trim_words(get_field('opening_text', get_the_ID()),40, '...' ),'<p>');
                                                                echo  $alt_text;
                                                            }?>
                                                            <a href="<?php echo get_permalink();?>">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    <div class="clearfix"></div>
    <hr class="hr-shadow-aaa">
    <div class="container">
        <div class="row" id="insurance-foot-block">
            <div class="col-md-6">
                <img src="/images/insurance/insuranceBanner1.gif" alt="Insurance">
            </div>
            <div class="col-md-6">
                <img src="/images/insurance/insuranceBanner2.gif" alt="Insurance">
            </div>
        </div>
    </div>
    </div>

<?php get_footer(); ?>