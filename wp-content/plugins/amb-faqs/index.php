<?php
/**
 * Plugin Name: Ambrosia's FAQs
 * Description: This is to display FAQs on ambrosiaTC.com
 * Version: 1.0
 * Author: Michael Giammattei
 * License: GPL2
 */

function faqs_func(){
	$labels = array(
		'name' 			 	=> 'FAQs',
		'singular_name'  	=> 'FAQ',
		'menu_name' 	 	=> 'FAQs',
		'add_new'		 	=> 'Add New',
		'add_new_item' 		=> 'Add New FAQ',
		'new_item'		 	=> 'New  FAQ',
		'edit_item'		 	=> 'Edit FAQ',
		'view_item'		 	=> 'View FAQ',
		'all_items'		 	=> 'All FAQs',
		'search_items'   	=> 'Search FAQs',
		'parent_item_colon' => 'Parent FAQs',
		'not_found'			=> 'No FAQs Found',
		'not_found_in_trash'=> 'No FAQs found in Trash'
 	);
	$args = array(
		'labels'  			 => $labels,
		'public' 			 => true,
		'public_queryable'   => true,
		'show_ui'			 => true,
		'show_in_menu'		 => true,
		'menu_position'		 => 4,
		'menu_icon'			 => 'dashicons-editor-help',
		'query_var'			 => true,
		'write'				 => array('slug' =>'faqs'),
		'capability_type'	 => 'post',
		'has_archive'		 => true,
		'hierarchical'		 => false,
		'supports'			 => array( 'title','slug','page-attributes'),
		'taxonomies'		 => array('category', 'post_tag'),
		'publicly_queryable' => false
	);
	register_post_type('faqs',$args);
}

add_action('init', 'faqs_func');

function amb_faq_rewrite_flush() {
    faqs_func();

    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'amb_faq_rewrite_flush' );


/* Custom Taxonomies */

function amb_FAQs_taxonomies(){
	/* Type of drug */
	register_taxonomy(
		'product-type',
		'reviews',
		array(
			'label' => 'type of Product / Service',
			'rewrite' => array('slug' => 'product-types'),
			'hierarchical' => true,
			)
	);
}

add_action('init','amb_FAQs_taxonomies');

function faq_SC_out($atts, $content = NULL) {
		$atts = shortcode_atts(
			array(
				'tags' => 'addiction',
				'limit' => 50
			),$atts
		);
		$query = new WP_Query(array(
			 'post_status' => 'publish',
			 'post_type' => 'faqs',
			 'tag_slug__in' => $atts['tags'],
			 'posts_per_page' => $atts['limit'],

			)
		);

		$list = '<div class="row ttt">';
		$count = 1;
		$div_add;

		while($query->have_posts()) : $query->the_post();

		if ($count % 2 == 0) {
		  $div_add    = '<div class="row">';
		  $div_close  = '</div>';
		}else{
			$div_add   = '';
			$div_close = '';
		}

		$list .= '<div class="col-sm-6">
					<div class="general-faq gen-faq off">
						<ul itemscope itemtype="http://schema.org/Question">
							<li><span class="gen-faq-head" itemprop="text">'.get_field("question").'</span><span class="gen-faq-trigger"><i class="fa  fa-chevron-down"></i></span>
								<ul>
									<li itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer"><span  itemprop="text">'.get_field("answer").'</span></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>'
				.$div_close
				.$div_add;

		$count++;

		endwhile;

		wp_reset_query();

		return $list . '</div><div class="clearfix gen-faq-outer"></div>';
}
add_shortcode('Ambrosia_FAQ', 'faq_SC_out');