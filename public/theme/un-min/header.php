<?php session_start(); if(!isset($_SESSION['user_token'])){$_SESSION['user_token'] = sha1(mt_rand(1, 90000) . 'SALT');} global $show_errors; if(!isset($show_errors)){error_reporting(1);} include_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/ambrosia-tracking-form/init.php'); include_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/ambrosia-tracking-form/classes/default-form.php'); $AMP_TRK_GET = new Default_form; $TRACK_ON = FALSE;if (isset($_GET['ambTRK'])) {$campaign = (isset($_GET['ambTRK']) && $_GET['ambTRK'] !== '') ? $_GET['ambTRK'] : "AMBROSIA-DEFAULT";$AMP_TRK_GET->track_form($con, $campaign);if($PHONE == ''){}global $PHONE, $Tracking_code, $campaign_format, $campaign_description;$PHONE= $AMP_TRK_GET->return_data[0];$Tracking_code = $AMP_TRK_GET->return_data[2];$campaign_format = $AMP_TRK_GET->return_data[3];$campaign_description = $AMP_TRK_GET->return_data[4];}if (!isset($_GET['ambTRK']) && !isset($_COOKIE['campaign_phone'])) {$AMP_TRK_GET->track_form($con, 'AMBROSIA-DEFAULT');global $PHONE, $Tracking_code, $campaign_format, $campaign_description;$PHONE = $AMP_TRK_GET->return_data[0];$Tracking_code = $AMP_TRK_GET->return_data[2];$campaign_format = $AMP_TRK_GET->return_data[3];$campaign_description = $AMP_TRK_GET->return_data[4];}if (!isset($_GET['ambTRK']) && $_COOKIE['campaign_phone']) {global $PHONE, $Tracking_code, $campaign_format, $campaign_description;$PHONE = $_COOKIE['campaign_phone'];$Tracking_code        = $_COOKIE['campaign_ref'];$campaign_format      = $_COOKIE['campaign_format'];$campaign_description = $_COOKIE['campaign_description'];} ?>
<?php if (get_post_meta($post->ID, 'Page Specific Phone Number', true) != '') {$PHONE = get_post_meta($post->ID, 'Page Specific Phone Number', true);} include_once($_SERVER['DOCUMENT_ROOT'] . '/controls/header-controls.php'); ?>
    <!doctype html>
    <!--[if lt IE 7 ]><html class="no-js ie6" <?php language_attributes(); ?>><![endif]-->
    <!--[if IE 7 ]><html class="no-js ie7" <?php language_attributes(); ?>><![endif]-->
    <!--[if IE 8 ]><html class="no-js ie8" <?php language_attributes(); ?>><![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" <?php language_attributes(); ?>>
    <!--<![endif]-->

    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="msvalidate.01" content="8F89D9538BCB7CAB29E01CD06AFFEA9D" />
        <title>
            <?php wp_title('&#124;', true, 'right'); ?>
            <?php bloginfo('name'); ?>
        </title>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <?php if( bi_option('custom_favicon') !== '' ) : ?>
            <link rel="icon" type="image/png" href="<?php echo bi_option('custom_favicon', false, 'url'); ?>" />
        <?php endif; ?>
        <?php if(isset($canonical)): ?>
            <link rel="canonical" href="<?php echo get_site_url(); ?>/<?php echo $canonical; ?>" />
        <?php endif; ?>
        <link rel="profile" href="//gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <?php wp_head(); ?>
        <!--[if lt IE 9]><script src="<?php bloginfo('template_url');?>/js/respond.min.js"></script><![endif]-->

        <?php global $events_page; if(isset($events_page)): ?>
            <link rel="stylesheet" type="text/css" href="/css/events-page.css">
        <?php endif; ?>
        <?php global $drug_type_style; if(isset($drug_type_style)): ?>
            <link rel="stylesheet" type="text/css" href="/css/drug.type.temp.css">
        <?php endif; ?>
        <?php global $single_location; if(isset($single_location)): ?>
            <link rel="stylesheet" type="text/css" href="/css/single-location.css">
        <?php endif; ?>
        <?php global $wellness_page; if(isset($wellness_page)): ?>
            <link rel="stylesheet" type="text/css" href="/css/wellness-page.css">
        <?php endif; ?>
        <?php  global $photobox; if(isset($photobox)){ echo '<link rel="stylesheet" type="text/css" href="/public/libs/gallery1/el.css">';} ?>
        <?php global $captcha; if(isset($captcha)): ?>
            <script src='https://www.google.com/recaptcha/api.js'></script>
        <?php endif; ?>
        <?php global $homepage; if(!isset($homepage)):
            echo "<link rel='stylesheet' type='text/css' href='/public/css/inside-general.css'>";
        endif;?>

        <?php global $page_css; if(isset($page_css)): ?>
            <?php echo page_css();?>
        <?php endif; ?>
        <?php global $sidebar_style; if(isset($sidebar_style)):
            echo "<link rel='stylesheet' type='text/css' href='/public/css/pages/sidebar.css'>";
        endif; ?>

    </head>

<body <?php body_class(); ?>>
    <div id="fb-root"></div>
<?php /*Google Tag Manager */?>
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WJDDD8" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <header>
        <div class="container-fluid header-container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 header-left" id="top-chat">
                    <?php if(isset($chat) && $chat === TRUE) :?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-4 col-xs-12 header-center">
                    <?php if( bi_option('custom_logo', false, 'url') !== '' ) { ?>
                        <div id="logo"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo bi_option('custom_logo', false, 'url'); ?>" alt="<?php bloginfo( 'name' ) ?>" /></a></div>
                    <?php } ?>
                    <nav role="navigation">
                        <div class="nav-container">
                            <?php require($_SERVER['DOCUMENT_ROOT'] . '/public/inc/nav.php'); ?>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs header-right">
                    <div class="green">
                        End Addiction • Call Today</div><a href="tel://<?php echo $PHONE ?>" class="lightblue main-phone" id="mobile-call-cta"><i class="fa fa-phone"></i><?php echo $PHONE;?></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="clearfix"></div>
<?php /* Part of Tracking Form Plugin *\<span style="display:none;" class="campaign_number"><?php echo $AMP_TRK_GET->return_data[0]; ?></span><span style="display:none;" class="campaign_text"><?php echo $AMP_TRK_GET->return_data[1]; ?></span>
                    <?php /* End of Tracking Form Plugin */ ?>
<?php responsive_header_end(); // after header hook ?>
<?php responsive_wrapper(); // before wrapper ?>
    <div class="container-fluid">
        <div id="wrapper" class="clearfix">
<?php responsive_in_wrapper(); // wrapper hook ?>