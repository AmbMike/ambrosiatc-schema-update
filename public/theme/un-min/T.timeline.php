<?php
/**
 * Template - Timeline
 *  Template Name:  Template - Timeline
 * @author         Michael Giammattei
 */
$header_bg = get_field('header_background_image');
if(!$header_bg){$header_bg = "/wp-content/uploads/2015/12/bg-page-default.jpg";}
$subTitle = get_field('sub_title');
$timelineBG = get_field('timeline_background_image');
$timelineTopTitle = get_field('timeline_top_title');
$timelineTopParagraph = get_field('timeline_top_content');
$timeline1 = get_field('timeline_1');
$timeline2 = get_field('timeline_2');
$timeline3 = get_field('timeline_3');
$timeline4 = get_field('timeline_4');
$timeline5 = get_field('timeline_5');
$whiteTitle = get_field('timeline_white_section_title');
$accordion1Title = get_field('accordion_1_title');
$accordion1Content = get_field('accordion_1_content');
$accordion2Title = get_field('accordion_2_title');
$accordion2Content = get_field('accordion_2_content');
$accordion3Title = get_field('accordion_3_title');
$accordion3Content = get_field('accordion_3_content');
$accordion4Title = get_field('accordion_4_title');
$accordion4Content = get_field('accordion_4_content');
$timeline_testimonials = get_field('timeline_testimonials');
$taxonomy = get_term( $timeline_testimonials, 'easy-testimonial-category' );
$name = $taxonomy->name;
?><style type="text/css">.video-body,.video-btn,.video-btn:before{position:relative;background:#fff}.video-btn{padding:10px 20px 10px 0;border-radius:11px 10px 0 27px;margin-top:-61px;top:-36px;display:inline-block;font-weight:700;color:#29c000;left:0;cursor:pointer;z-index:20}.video-btn,.video-btn:before{-webkit-transition:all .4s ease;-moz-transition:all .4s ease;-ms-transition:all .4s ease;-o-transition:all .4s ease;transition:all .4s ease}.video-btn:before{font-family:FontAwesome;content:'\f144';font-size:54px;line-height:0;top:12px;left:-8px;width:50px;height:50px;padding:3px 6px;border-radius:50%}.video-btn:hover{left:-5px}.video-btn.on{color:#888;left:-25px}.video-btn.on:before{color:#888;content:'\f00d';font-size:35px;padding:13px 16px;top:5px}.video-body{-webkit-transition:all 1s ease;-moz-transition:all 1s ease;-ms-transition:all 1s ease;-o-transition:all 1s ease;transition:all 1s ease;margin-bottom:30px;top:-48px;box-sizing:border-box;padding:0;margin-left:-30px;margin-right:-30px;height:0;overflow:hidden;z-index:10}.video-body iframe{opacity:0}.video-body.on{height:300px;padding:30px}.timeline{margin-top:57px}@media(max-width:1446px){.video-btn{top:-27px}.video-body{margin-left:-20px;margin-right:-20px}}@media(max-width:992px){.video-btn{top:-25px}.video-btn.on{left:0}}@media(max-width:769px){.video-btn{top:-15px}.video-body{margin-left:-10px;margin-right:-10px;top:-33px}}</style>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <section class="row timeline-container" style="background:url(<?php echo $timelineBG; ?>) top center no-repeat;background-size:cover;">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php if($timelineTopTitle){echo '<h1>' . $timelineTopTitle . '</h1>';} ?>
                            <?php if($timelineTopParagraph){echo '<h4>' . $timelineTopParagraph . '</h4>';} ?>
                        </div>
                    </div>
                    <div class="timeline">
                        <div class="middlebar"></div>
                        <?php if($timeline1){?>
                            <div class="row">
                                <div class="col-lg-5 col-md-5  timeline-left">
                                    <div class="video-btn">
                                        Watch the Video
                                    </div>
                                    <div class="video-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe id="video-timeline" class="embed-responsive-item" src="" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="bird-icon animated bounceIn eds-on-scroll delay2"></div>
                                    <?php echo $timeline1; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($timeline2){?>
                            <div class="row">
                                <div class="col-lg-5 col-lg-offset-7 col-md-5 col-md-offset-7 timeline-right animated bounceInRight eds-on-scroll">
                                    <div class="bird-icon animated bounceIn eds-on-scroll delay2"></div>
                                    <?php echo $timeline2; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($timeline3){?>
                            <div class="row">
                                <div class="col-lg-5 col-md-5  timeline-left">
                                    <div class="bird-icon animated bounceIn eds-on-scroll delay2"></div>
                                    <?php echo $timeline3; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($timeline4){?>
                            <div class="row">
                                <div class="col-lg-5 col-lg-offset-7 col-md-5 col-md-offset-7 timeline-right animated bounceInRight eds-on-scroll">
                                    <div class="bird-icon animated bounceIn eds-on-scroll delay2"></div>
                                    <?php echo $timeline4; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($timeline5){?>
                            <div class="row">
                                <div class="col-lg-5 col-md-5  timeline-left">
                                    <div class="bird-icon animated bounceIn eds-on-scroll delay2"></div>
                                    <?php echo $timeline5; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="row content">
                <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
                    <div class="row stats">
                        <h5>Get The Facts</h5>
                        <div style="clear:both;"></div>
                        <div class="col-xs-6 col-sm-3">
                            <img src="/wp-content/uploads/2016/07/700-drug-addicts-gray-stat.png"" />
                            <p class="stat-title">You are not alone.</p>
                            On any given day, over 700,000 Americans seek addiction treatment.
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <img src="/wp-content/uploads/2016/07/10-percent-in-drug-recovery.png" />
                            <p class="stat-title stat-highlight">Recovery is possible.</p>
                            10% of the U.S. population is living in recovery from addiction.
                        </div>

                        <div class="clearfix visible-xs-block"></div>

                        <div class="col-xs-6 col-sm-3">
                            <img src="/wp-content/uploads/2016/07/drug-rehab-stats-gray-stats.png" />
                            <p class="stat-title">Rehab really works.</p>
                            Permanent recovery is 5 times more likely with inpatient rehab.
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <img src="/wp-content/uploads/2016/07/substance-abuse-related-deaths-stats.png" />
                            <p class="stat-title">Take action today.</p>
                            Sadly, the number of deaths related to substance abuse increased 400%.
                        </div>
                        <div style="clear:both"></div>
                        <span><center>Data from the National Institute on Alcohol Abuse & Awareness, NY State Office of Alcoholism and Substance Abuse Services & the National Center for Health Statistics.</center></span>
                    </div>
                    <h3 id="timeline-h3"><?php echo $whiteTitle; ?></h3>
                    <div class="row faq-agency">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading collapseOne">
                                        <p class="panel-title"><a><?php echo $accordion1Title; ?><div></div></a></p>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo $accordion1Content; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading collapseTwo">
                                        <p class="panel-title"><a><?php echo $accordion2Title; ?></a></p>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo $accordion2Content; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="panel-group" id="accordion2">
                                <div class="panel panel-default">
                                    <div class="panel-heading collapseThree" >
                                        <p class="panel-title"><a><?php echo $accordion3Title; ?></a></p>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo $accordion3Content; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading collapseFour">
                                        <p class="panel-title"><a><?php echo $accordion4Title; ?></a></p>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo $accordion4Content; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>


                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row bottom-review-blue">
                    <div class="col-lg-10 col-lg-offset-1 col-md-12">
                        <?php echo do_shortcode('[Ambrosia_testimonial tags="Timeline" version="2 column" limit="10" style="2" top_color="#006493"]'); ?>
                    </div>
                </div>
            </section>
            <section class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 logos"><img src="/wp-content/uploads/2015/12/logos.jpg" class="img-responisve aligncenter" /></div>
            </section>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>