</div>
<div class="clearfix"></div>
<footer id="footer" class="clearfix">
    <div class="container-fluid">
        <div class="row ctc-container">
            <div class="col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <p><span>Are you or a loved one struggling with addiction?</span></p><p>Call the Free Recovery Helpline Now.</p>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12 text-right">
                <?php global $PHONE; ?><a href="tel://<?php echo $PHONE; ?>" class="btn btn-white main-phone"><i class="fa fa-phone"></i><?php echo $PHONE; ?></a>
            </div>
        </div>
        <div class="row footer-bar">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-1 col-sm-12">
                        <div class="seal-box">
                            <span class="field-tip"><img src="/wp-content/uploads/2016/01/footer-logo.png" class="img-responsive" alt="The Joint Commission National Quality Approval Gold Seal" /><span class="tip-content">The Joint Commission Gold Seal is the highest healthcare accreditation available. </span></span>
                        </div>
                    </div>
                    <div class="col-md-7 col-xs-12 buttons"><?php if(!isset($_GET['nav'])) : ?><a href="/etherapy-live" class="btn btn-blue">E-Therapy</a><a href="/addiction/" class="btn btn-blue">Learning Center</a><?php endif; ?>
                        <div class="footer-contact"><a class="btn btn-green">Contact Us Now</a>
                            <div class="form-box foot-form">
                                <div class="form-box-close-1">
                                </div><h5>Free, Personal Support</h5><h6><span>3</span> Specialists Available Now</h6>
                                <div class="success_msg2"></div><form class="ajax2" method="post"><form method="post" action="/ajax/process.php" class="ajax" id="form-cta-footer"><input type="text" name="names" id="names" class="name-form" placeholder="Enter Name"><input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"><input type="text" name="email" id="email" class="form-control" placeholder="Enter Email"><input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone"><p class="text-left">Are you helping yourself or a loved one? <br><label for="me"><input class="form-control" type="radio" name="help_for" value="Myself">Myself </label>  &nbsp; <label for="loved"><input type="radio" name="help_for" id="loved" value="A Loved One"> A Loved One</label></p><p class="text-left">Do you have health insurance? <br><label for="me"><input class="form-control" type="radio" name="insurance" value="Yes">Yes </label>  &nbsp; <label for="me"><input type="radio" name="insurance" value="No">No </label></p><p><textarea class="form-control" id="comments" name="message" placeholder="Comments"></textarea></p><input type="hidden" name="Tracking_code" id="Tracking_code" value="<?php global $Tracking_code; echo $Tracking_code; ?>" /><input type="hidden" name="campaign_format" id="campaign_format" value="<?php global $campaign_format; echo $campaign_format; ?>" /><input type="hidden" name="campaign_description" id="campaign_description" value="<?php global $campaign_description; echo $campaign_description; ?>" /><input type="hidden" name="campaign_description" id="campaign_description" value="<?php echo $campaign_description; ?>" /><input type="hidden" name="campaign_string" id="campaign_string" value="INTERNET/<?php echo strtolower($campaign_format); ?>/<?php echo strtoupper($Tracking_code); ?>/FORM" /><input type="hidden" name="user_token" id="user-token" value="<?php echo $_SESSION['user_token']; ?>"><input type="hidden" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" /><input type="hidden" name="cur_url" id="cur_url" value="<?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?> "/><img class="loader" src="/images/ajax-loader.gif" width="220" height="19" alt="loader" /><input type="submit" class="btn btn-primary greeb-btn" id="Conbutton" value="Begin Healing" /></form>
                            </div>
                        </div>
                        <div class="copyright">
                            <?php if( bi_option('custom_copyright') ) : ?>
                                <?php if(!isset($_GET['nav'])) :
                                    echo  bi_option('custom_copyright');
                                else:
                                    echo str_replace('Reviews', '', bi_option('custom_copyright'));
                                endif; ?>

                            <?php else : ?>
                                &copy; <?php _e('Copyright', 'responsive'); ?><?php echo date('Y'); ?><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="location-list">
                            <?php $locations = get_pages(array('post_type' => 'location'));foreach( $locations as $location ) :	?>
                                <div class="location-item">
                                    <i class="fa fa-map-marker"></i><p><?php echo get_the_title($location->ID); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<a href="tel://<?php echo $PHONEl ?>" id="mobile-call-cta">
    <div id="mobile-phone-icon">
        <i class="fa fa-phone"></i> Call Now
    </div>
</a>
<?php wp_footer(); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/scripts.php'); ?>
<?php global $learning_center; if(isset($learning_center)){include('inc/scripts2.php'); } ?>
<?php global $custom_post; if(isset($custom_post)) { ?> <script type="text/javascript" src="/public/js/scripts3.min.js"></script> <?php }; ?>
<?php global $drug_type; if(isset($drug_type)){include('inc/script-drug-type.php'); } ?>
<?php global $custom_post; if(isset($custom_post)){include('inc/post-alt.php'); } ?>
</body>
</html>
