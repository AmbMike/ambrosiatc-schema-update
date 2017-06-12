<?php the_post_thumbnail();

if(is_archive()) {
    // force 404
    $wp_query->set_404();
    status_header( 404 );
    nocache_headers();
    include("404.php");
    die;
}
?>

