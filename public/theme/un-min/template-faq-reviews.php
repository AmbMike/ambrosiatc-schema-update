<?php
/**
 * Template Name:  Template - FAQ/Reviews
 *
 *
 * @file           template-faq-reviews.php
 * @package        StrapPress
 * @author         Mike Giammatei
 */
?>
<?php get_header();

$header_bg = get_field('header_background_image');

if(!$header_bg){
    $header_bg = "/wp-content/uploads/2015/12/bg-page-default.jpg";
}

$blue_background_content = get_field('blue_background_content');
$white_background_content = get_field('white_background_content');
$post_objects = get_field('staff_members');
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="row staff-header-bg" style="background:url('<?php echo $header_bg; ?>') center center no-repeat;background-size:cover;">
                <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="subpage-title"><?php the_title(); ?></h1>
                </div>
            </section>
            <section class="row page-content white-bg">
                <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
                    <?php the_content(); ?>

                </div>
            </section>
            <?php if( !empty( $post_objects )){ ?>
                <section class="row page-content white-bg">
                    <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
                        <h4 class="text-center"><i class="fa fa-users"></i> Staff Members</h4>
                        <ul class="staff-list">
                            <?php foreach( $post_objects as $post_object): ?>
                                <?php $lID = $post_object->ID; ?>
                                <li class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"><img src="<?php the_field('portrait', $lID); ?>" class="img-responsive alignleft" /></div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                        <h5><?php echo get_the_title($lID); ?></h5>
                                        <strong><?php the_field('position', $lID); ?></strong>
                                        <p><?php the_field('about', $lID); ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            <?php } ?>
        </article><!-- end of #post-<?php the_ID(); ?> -->
    <?php endwhile; ?>
<?php endif; ?>
    <div class="clearfix"></div>
    <div class="row faq-review-box">
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
            <h3 class="faq-text">Frequent Questions</h3>
            <?php do_shortcode("[amb_faqs tags='detox' limit='4']"); ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="site-blue-bg" id="stable-page">
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
            <?php if(isset($_GET['page_dev'])) : ?>
                <div class="amb-testimonial-outer">
                    <div class="amb-testimonial-block review-page-testi-box">
                        <?php echo do_shortcode('[amb_testimonials tags="detox" limit="1" pagination="hide" style="full_width" h4="A Client\'s Perspective"]'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(!isset($_GET['page_dev'])) : ?>
                <div class="at1-page-box-detox">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php global $slug;  echo do_shortcode('[Ambrosia_testimonial tags="detox" version="1 column" top_color="#006493" show_stars="No" heading="A Client\'s Perspective" limit="1" style="3"]'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>