<?php
/**
 * Location Page Template
 *
 *
 * @file           page-location.php
 * @package        StrapPress
 * @author         Brad Williams
 * @copyright      2010 - 2015 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.3.5
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

$pagination_style = TRUE;
$single_location_js = TRUE;
$gallery_1 = TRUE;
$page_css = 'single-location';
?>
<?php get_header(); ?>

<?php
$header_bg = get_field('header_background_image');
if(!$header_bg){
    $header_bg = "/wp-content/uploads/2015/12/bg-page-default.jpg";
}
$sub_title = get_field('sub_title');
$featured_image = get_field('featured_image');
$location = get_field('google_map');
$address = get_field('address');
$phone_number_1 = get_field('phone_number_1');
$phone_number_2 = do_shortcode('[AMB_MAIN_PHONE]');
$post_objects = get_field('staff_members');
$gallery = get_field('gallery');
$slug = get_field('slug');
$desc = get_field('location_description');
$map_bg = get_field('map_container_background');

$page_data = array(
    'facility_info' => (get_field('facility_info')) ? : null,
    'top_heading' 	=> (get_field('top_heading')) ? : null,
    'staff_info' => (get_field('staff_info')) ? : null,
    'special_obj' => (get_field('specialization')) ? : null,
    'other_programs' => (get_field('other_programs')) ? : null,
    'faq_area' => (get_field('faq_area')) ? : null,
    'subject_table' => (get_field('subject_table')) ? : null,
);

if(!empty($page_data['subject_table'])){
    /* Create table array */
    $table_array = array();
    foreach($page_data['subject_table'] as $subject){
        $table_array[] = $subject['subject_content'];
    }

    /* Create table array */
    $table_content = array();
    foreach($page_data['subject_table'] as $subject){
        $subject_content[] = $subject['subject_content'];
    }

    /* Create Subject Table Values */
    $table_subject = array();
    foreach($subject_content as $table_subjects){
        $table_subject[] = $table_subjects;
    }
    /* Create Table List Values Group */
    if(!empty($table_subject)){
        $table_item = array();
        foreach($table_subject as $table_items){
            if(!empty($table_items[0]['list_items'])){
                $table_item[] = $table_items[0]['list_items'];
            }
        }
        /* Create Table List Values Single */
        $table_single_item = array();
        foreach($table_item as $table_single_items){
            $table_single_item[] = $table_single_items;
        }

    }

}
$facility;
if(!$map_bg){
    $map_bg='/wp-content/uploads/2015/12/locations-blue-bg.jpg';
}
global $post;
switch($post->ID){
    case 265 :
        $facility = 'psl';
        $video = 'video-plug/PSL-Center-1';
        break;
    case 347 :
        $facility = 'medford';
        $video = 'video-plug/medford _website_video';
        break;
    case 304 :
        $facility = 'si';
        $video = 'video-plug/singer_island_treatment_center_fl';
        break;
    case 320 :
        $facility = 'wpb';
        $video = 'video-plug/west_palm_website_video';
        break;
}
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="live-loc">
            <section class="row home-slider-container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="cover-outer-loc">
                        <div class="vid-overlay">
                            <div class="col-lg-8 col-lg-offset-2 col-md-12">
                                <div class="row">
                                    <h1 class="live-log subpage-title "><?php echo ($page_data['top_heading'] != null) ? $page_data['top_heading'] : the_title(); ?><span class="h1-sub"></span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="video-box" style="background-image:url('<?php echo $header_bg; ?>');" data-vide-bg="mp4: /<?php echo $video; ?>, poster: /video-plug/singer" data-vide-options="loop: true, muted: true, position: 0% 30%, posterType: 'jpg'">
                        </div>
                    </div>
                </div>
            </section>
            <section class="row page-content blue-bg" style="background-image:url(<?php echo $map_bg; ?>);">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12 cl">
                            <?php if( !empty($sub_title)){?>
                                <h5 class="location-title"><?php echo $sub_title; ?></h5>
                            <?php } ?>
                            <?php
                            if(!empty($desc)){
                                echo '<div class="description" itemprop="description">'.$desc.'</div>';
                            }
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                            <div class="row" id="location-info">
                                <table>
                                    <tr>
                                        <td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
                                        <td>
                                            <div style="display: none;" itemscope itemtype="http://schema.org/LocalBusiness">
                                                <span itemprop="name">Ambrosia Treatment Center</span>
                                            </div>
                                            <div class="address-container" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                                <?php echo $address; ?>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-phone"></i></td>
                                        <td>
                                            <div class="phone1" itemprop="telephone">
                                                <?php echo $phone_number_1; ?>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-phone"></i></td>
                                        <td>
                                            <?php
                                            if( !empty($phone_number_2)): ?>
                                                <div class="phone2">
                                                    <?php echo $phone_number_2; ?> (Admissions)
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if( !empty($location) ){ ?>
                                        <div class="map-container"><div id="map"></div></div>
                                        <script src='//maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>
                                        <script type="text/javascript">
                                            function locationmap(){
                                                var myOptions = {
                                                    zoom:15,
                                                    center:new google.maps.LatLng(<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>),
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                };
                                                map = new google.maps.Map(document.getElementById("map"), myOptions);
                                                marker = new google.maps.Marker({
                                                    map: map,
                                                    position: new google.maps.LatLng(<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>)
                                                });
                                            }
                                            google.maps.event.addDomListener(window, 'load', locationmap);
                                        </script>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php if( !empty( $gallery )){ ?>
                <section class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 location-gallery">
                        <h3 class="text-center">Tour the Facility</h3>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" id="facility-info">
                                <?php if( $page_data['facility_info'] != null ): ?>
                                    <?php echo $page_data['facility_info']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row gal-1-con">
                            <div class="gal-1-left">
                                &nbsp;
                            </div>
                            <div class="gal-1-center">
                                <div class="row gallery-1">
                                    <?php $g = 0; ?>
                                    <?php foreach( $gallery as $image ): ?>
                                        <div><a href="<?php echo $image['sizes']['large']; ?>"><img src="<?php echo $image['sizes']['location_gallery']; ?>" alt="<?php echo $image['alt']; ?>" /></a> </div>
                                        <?php
                                        $g++;
                                    endforeach; ?>
                                </div>
                            </div>
                            <div class="gal-1-right">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <section class="row page-content location-staff">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <?php if( !empty( $post_objects )){ ?>
                        <h3>Meet Your Team</h3>
                        <?php if($page_data['staff_info'] != null): ?>
                            <div id="staff-info">
                                <?php echo $page_data['staff_info']; ?>
                            </div>
                        <?php endif; ?>
                        <div class="row staff-list">

                            <?php $i=0;foreach( $post_objects as $post_object): ?>
                                <?php if($i==0){echo '<div class="row staff-box-main">';}; ?>
                                <?php $lID = $post_object->ID; ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"><img src="<?php the_field('portrait', $lID); ?>" class="img-responsive team-thumb" /></div>
                                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 staff-about">
                                            <h4><?php echo get_the_title($lID); ?></h4>
                                            <p class="position"><?php the_field('position', $lID); ?></p>
                                            <div class="aboutme"><?php the_field('about', $lID); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($i==1){echo '</div><div class="row">';}; ?>
                                <?php $i++;endforeach; ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <?php if(!empty($page_data['subject_table'][0]['subject_content'])):  ?>
                <h3 class="text-center">Review the Schedule</h3>
                <div id="subject-table-outside">
                    <div class="row" id="subject-table">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="subject-table-box">
                                <?php foreach($table_array as $table_data): ?>
                                    <?php if(!empty($table_data[0]['title'])): ?>
                                        <div class="subject-header <? echo ($table_data[0]['featured'] == true ) ? ' active_m' : ''; ?>">
                                            <p><?php echo !empty($table_data[0]['title']) ? $table_data[0]['title'] : ''; ?><span><?php echo !empty($table_data[0]['sub_title']) ? $table_data[0]['sub_title']: ''; ?></span></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php /* Content for box 1 */ ?>
                    <?php if(!empty($table_single_item[0])): ?>
                        <div class="subject-container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row table-out">
                                        <?php
                                        $item_count = count($table_single_item[0]);
                                        $item_split = $item_count / 2;
                                        ?>
                                        <?php foreach($table_single_item[0] as $key => $table_item): ?>
                                            <?php
                                            if(!empty($table_item['title'])):?>
                                                <div class="col-sm-6 sub-table">
                                                    <div class="subject-list">
                                                        <div class="sub-one">
                                                            <i class="fa <?php echo $table_item['syllable']; ?> sub-icon" aria-hidden="true"></i>
                                                            <span><?php echo $table_item['title']; ?></span>
                                                            <small><?php echo $table_item['timeframe']; ?></small>
                                                            <div class="clearfix"></div>
                                                            <div class="text-body">
                                                                <?php echo $table_item['text_body']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="sub-two">
                                                            <i class="fa fa-plus expand-icon" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php /* Content for box 2 */ ?>
                    <?php if(!empty($table_single_item[1])): ?>
                        <div class="subject-container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row table-out">
                                        <?php
                                        $item_count = count($table_single_item[0]);

                                        $item_split = $item_count / 2;
                                        ?>
                                        <?php foreach($table_single_item[1] as $key => $table_item): ?>
                                            <div class="col-sm-6 sub-table">
                                                <div class="subject-list">
                                                    <div class="sub-one">
                                                        <i class="fa <?php echo $table_item['syllable']; ?> sub-icon" aria-hidden="true"></i>
                                                        <span><?php echo $table_item['title']; ?></span>
                                                        <small><?php echo $table_item['timeframe']; ?></small>
                                                        <div class="clearfix"></div>
                                                        <div class="text-body">
                                                            <?php echo $table_item['text_body']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="sub-two">
                                                        <i class="fa fa-plus expand-icon" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php /* Content for box 3 */ ?>
                    <?php if(!empty($table_single_item[2])): ?>
                        <div class="subject-container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row table-out">
                                        <?php
                                        $item_count = count($table_single_item[0]);

                                        $item_split = $item_count / 2;
                                        ?>
                                        <?php foreach($table_single_item[2] as $key => $table_item): ?>
                                            <div class="col-sm-6 sub-table">
                                                <div class="subject-list">
                                                    <div class="sub-one">
                                                        <i class="fa <?php echo $table_item['syllable']; ?> sub-icon" aria-hidden="true"></i>
                                                        <span><?php echo $table_item['title']; ?></span>
                                                        <small><?php echo $table_item['timeframe']; ?></small>
                                                        <div class="clearfix"></div>
                                                        <div class="text-body">
                                                            <?php echo $table_item['text_body']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="sub-two">
                                                        <i class="fa fa-plus expand-icon" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php /*
                                            if($key == ceil($item_split) - 1){
                                                echo '</div><div class="row xxxxx">';
                                            } */
                                            ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <?php global $wp_query;
            $post_id = $wp_query->post->ID;
            $post = get_post( $post_id );
            $slug = $post->post_name;
            $slug = preg_replace('/(drug|rehab|florida)/i'," ",$slug);
            $slug = preg_replace('/-/'," ",$slug);
            $slug = rtrim($slug);
            if (preg_match('/port/',$slug)){
                $slug = "Port St Lucie";
            }
            if (preg_match('/medford/',$slug)){
                $slug = "Medford";
            }
            if (preg_match('/west/',$slug)){
                $slug = "West Palm Beach";
            }
            if (preg_match('/singer/',$slug)){
                $slug = "Singer Island";
            }
            ?>
            <div class="row" id="special-info">
                <?php if(!empty($page_data['special_obj'][0]['title'])): ?>
                    <h3><?php echo !empty($page_data['special_obj'][0]['title']) ? $page_data['special_obj'][0]['title'] : 'Specialization'; ?></h3>
                    <div class="special-info-head">
                        <div class="col-md-10 col-md-offset-1">
                            <?php if(!empty($page_data['special_obj'][0]['sub_title']) || !empty($page_data['special_obj'][0]['text'])): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-box">
                                            <?php echo (!empty($page_data['special_obj'][0]['sub_title'])) ? '<h4>'.$page_data['special_obj'][0]['sub_title'].'</h4>' : ''; ?>
                                            <?php echo (!empty($page_data['special_obj'][0]['text'])) ? $page_data['special_obj'][0]['text'] : ''; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($page_data['other_programs'] != null || !empty($page_data['special_obj'][0]['bullets'])): ?>
                    <div class="special-info-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="inner-box2">
                                        <?php /* other programs */
                                        if($page_data['other_programs'] != null): ?>

                                            <div class="row" id="program-addon">
                                                <div class="col-md-12">
                                                    <div class="inner-box3">
                                                        <ul>
                                                            <?php if(!empty($page_data['other_programs'][0]['bullets'])):
                                                            foreach($page_data['other_programs'][0]['bullets'] as $bullet_content):
                                                                /* Create Values */
                                                                $text_1 = strip_tags(($bullet_content['bullet_content'][0]['part_one_text']) ? :null);
                                                                $text_2 = strip_tags(($bullet_content['bullet_content'][0]['part_two_text']) ? :null);
                                                                $page_to_link;
                                                                ?>
                                                                <?php if($text_1 != null || $text_2 != null):
                                                                /* Determine Page Link */
                                                                if(!empty($bullet_content['bullet_content'][0]['choose_page'])){
                                                                    if($bullet_content['bullet_content'][0]['choose_page'] == 'Internal Page'){
                                                                        $internal_page_id = ($bullet_content['bullet_content'][0]['page_link'][0]) ? :null;
                                                                        $page_to_link = get_permalink($internal_page_id);
                                                                    }else{
                                                                        $page_to_link = ($bullet_content['bullet_content'][0]['external_link']) ? :null;
                                                                    }
                                                                };
                                                                ?>
                                                                <li><a <?php echo ($page_to_link != null) ? 'href="'.$page_to_link.'"' : ''; ?>><span class="bold"><?php echo ($text_1 != null) ? $text_1: ''; ?> </span> <?php echo ($text_2 != null) ? $text_2 : ''; ?></a> </li>
                                                            <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                        <ul class="inner-ul">
                                            <?php if(!empty($page_data['special_obj'][0]['bullets'])):
                                            foreach($page_data['special_obj'][0]['bullets'] as $bullet): ?>
                                                <li><?php echo $bullet['bullet_text'];?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endif;?>
            </div>
            <?php
            if(!empty($page_data['faq_area'][0]['title'] )):  ?>
                <div class="row" id="faq-box">
                    <div class="col-md-10 col-md-offset-1">
                        <h3><?php echo !empty($page_data['faq_area'][0]['title']) ? $page_data['faq_area'][0]['title']: ''; ?></h3>
                        <?php /** FAQ Block  ******************************************/  ?>
                        <?php
                        /* Build values for query*/
                        $tag_ids = array();

                        /* Put the tags into an array */
                        foreach($page_data['faq_area'][0]['faq_tags'] as $faq_tag):
                            $tag_ids[] = $faq_tag->slug;
                        endforeach;

                        /* Build the query to get the faqs by the tag ids */

                        /* Pagination arg defined */
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        $args = array(
                            'tag_slug__in' => $tag_ids,
                            'post_status' => 'publish',
                            'post_type' => 'faqs',
                            'posts_per_page' => 6,
                            'paged' => $paged
                        );
                        /* Data for ajax */
                        $tag_ids_str = implode(',',$tag_ids);
                        ?>
                        <input type="hidden" id="paged-num" value="<?php echo ($paged) ? $paged  : '';  ?>">
                        <input type="hidden" id="pag-tags" name="pag-tags" value="<?php echo ($tag_ids_str) ? $tag_ids_str  : '';  ?>">
                        <?php

                        $query = new WP_Query($args);

                        /* Pagination fix */
                        $temp_query = $wp_query;
                        $wp_query   = NULL;
                        $wp_query   = $query;
                        /* End Pagination fix */

                        ?>
                        <div id="pagination-out-box">
                            <div id="pagination-out-inner">
                                <?php

                                while( $query->have_posts() ) : $query->the_post();
                                    ;
                                    ?>
                                    <div class="amb-faq-box off">
                                        <ul>
                                            <li><a><?php echo stripslashes(get_field('question', $post->ID)); ?></a>
                                                <ul>
                                                    <li><?php echo stripslashes(get_field('answer', $post->ID)); ?></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endwhile;

                                /* Pagination properties */
                                $page_pagination = get_the_posts_pagination( array(
                                    'mid_size'           => '2',
                                    'prev_text'          => false,
                                    'next_text'          => false,
                                    'screen_reader_text' => __( 'A' )
                                ) );

                                /* Remove screen reader text */
                                $page_pagination = str_replace( '<h2 class="screen-reader-text">A</h2>','', $page_pagination);

                                echo $page_pagination;

                                wp_reset_postdata();
                                wp_reset_query();
                                ?>
                            </div>
                        </div>

                        <?php /** FAQ Block  ******************************************/  ?>

                    </div>
                </div>
            <?php endif; // End FAQ if ?>
            <section class="row">
                <?php if(!empty($slug)): ?>
                    <div class="at1-page-box">
                        <div class="row" id="testimonial-box">
                            <div class="col-lg-10 col-lg-offset-1 col-md-12">
                                <?php global $slug;  echo do_shortcode('[Ambrosia_testimonial tags="'.$slug.'" version="square img" column="2" top_color="#006493" limit="10" style="6"]'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 logos"><img
                        src="/wp-content/uploads/2015/12/logos.jpg" class="img-preserve" /></div>
            </section>
        </article><!-- end of #post-<?php the_ID(); ?> -->
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>