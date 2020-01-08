<?php
/**
 * Get placeholders for WooCommerce module in Theme Builder
 *
 * @since 4.0.1
 *
 * @return array
 */
function et_theme_builder_wc_placeholders() {
	global $post;

	static $placeholders = array();

	// If placeholders values have been populated, reuse it
	if ( ! empty( $placeholders ) ) {
		return $placeholders;
	}

	// Get latest uploaded images to library
	$gallery_images    = get_posts(
		array(
			'numberposts' => 4,
			'post_type'   => 'attachment',
			'orderby'     => 'menu_order ASC, ID',
			'order'       => 'DESC',
		)
	);
	$gallery_image_ids = wp_list_pluck( $gallery_images, 'ID' );
	$image_id          = array_shift( $gallery_image_ids );
	$gallery_image_ids = array();

	// Get recent products for upsells / related product
	$recent_products_query = new WC_Product_Query( array(
		'limit' => 4,
	) );
	$recent_product_ids    = array();

	foreach( $recent_products_query->get_products() as $recent_product ) {
		$recent_product_ids[] = $recent_product->get_id();
	}

	// Populate placeholders
	$placeholders = array(
		'title'              => esc_html( 'Product name', 'et_builder' ),
		'slug'               => 'product-name',
		'short_description'  => esc_html( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum eget dui sed vehicula. Suspendisse potenti. Nam dignissim at elit non lobortis.', 'et_builder' ),
		'description'        => esc_html( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum eget dui sed vehicula. Suspendisse potenti. Nam dignissim at elit non lobortis. Cras sagittis dui diam, a finibus nibh euismod vestibulum. Integer sed blandit felis. Maecenas commodo ante in mi ultricies euismod. Morbi condimentum interdum luctus. Mauris iaculis interdum risus in volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent cursus odio eget cursus pharetra. Aliquam lacinia lectus a nibh ullamcorper maximus. Quisque at sapien pulvinar, dictum elit a, bibendum massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris non pellentesque urna.', 'et_builder' ),
		'status'             => 'publish',
		'comment_status'     => 'open',
		'reviews_allowed'    => true,
		'manage_stock'       => true,
		'stock_status'       => 'instock',
		'stock_quantity'     => 50,
		'low_stock_amount'   => 2,
		'rating_counts'      => array(
			4 => 2,
		),
		'average_rating'     => '4.00',
		'review_count'       => 2,
		'image_id'           => $image_id,
		'gallery_image_ids'  => $gallery_image_ids,
		'weight'             => 2,
		'width'              => 2,
		'height'             => 2,
		'recent_product_ids' => $recent_product_ids,
		'attributes'         => array(
			'id'        => 1,
			'name'      => 'color',
			'options'   => 'Black | White | Gray',
			'position'  => 0,
			'visible'   => 1,
			'variation' => 1,
		),
	);

	return $placeholders;
}

/**
 * Get review placeholder for WooCommerce module in Theme Builder. This can't be included at
 * `et_theme_builder_wc_placeholders()` due to dependability on global $post value and
 * `et_theme_builder_wc_placeholders()`'s returned value being cached on static variable
 *
 * @since 4.0.1
 *
 * @return object
 */
function et_theme_builder_wc_review_placeholder() {
	global $post;

	$review = new stdClass();
	$review->comment_ID           = 1;
	$review->comment_author       = 'John Doe';
	$review->comment_author_email = 'john@doe.com';
	$review->comment_date         = '2019-10-15 16:13:13';
	$review->comment_date_gmt     = '2019-10-15 16:13:13';
	$review->comment_content      = 'Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis parturient montes; nascetur ridiculus mus.';
	$review->comment_post_ID      = $post->ID;
	$review->user_id              = null;

	return new WP_Comment( $review );
}

/**
 * Set global objects needed to manipulate `ETBuilderBackend.currentPage.woocommerceComponents` on
 * theme builder into displaying WooCommerce module placeholder (even though TB's CPT is not
 * WooCommerce's product CPT)
 *
 * @since 4.0.1
 *
 * @param array $conditional_tags evaluate conditional tags when current request is AJAX request
 */
function et_theme_builder_wc_set_global_objects( $conditional_tags = array() ) {
	// Check if current request is theme builder (direct page / AJAX request)
	if ( ! et_builder_tb_enabled() && ! et_()->array_get( $conditional_tags, 'is_tb', false ) ) {
		return;
	}

	// Global variable that affects WC module rendering
	global $product, $post, $tb_original_product, $tb_original_post, $tb_wc_post, $tb_wc_product;

	// Making sure correct comment template is loaded on WC tabs' review tab
	add_filter( 'comments_template', array( 'ET_Builder_Module_Woocommerce_Tabs', 'comments_template_loader' ), 20 );

	// Force display related posts; technically sets all products as related
	add_filter( 'woocommerce_product_related_posts_force_display', '__return_true' );

	// Make sure review's form is opened
	add_filter( 'comments_open', '__return_true' );

	// Save original $post for reset later
	$tb_original_post = $post;

	// Save original $product for reset later
	$tb_original_product = $product;

	// If modified global existed, use it for efficiency
	if ( ! is_null( $tb_wc_post ) && ! is_null( $tb_wc_product ) ) {
		$post    = $tb_wc_post;
		$product = $tb_wc_product;

		return;
	}

	// Get placeholders
	$placeholders = et_theme_builder_wc_placeholders();

	// $post might be null if current request is computed callback (ie. WC gallery)
	if ( is_null( $post ) ) {
		$post = new stdClass();
	}

	// Overwrite $post global
	$post->post_title     = $placeholders['title'];
	$post->post_slug      = $placeholders['slug'];
	$post->post_excerpt   = $placeholders['short_description'];
	$post->post_content   = $placeholders['description'];
	$post->post_status    = $placeholders['status'];
	$post->comment_status = $placeholders['comment_status'];

	// Overwrite global $product
	$product = new ET_WC_Product_Variable_TB_Placeholder();

	// Manually set product props because this has no real value stored in DB
	$product->set_defaults();

	// Set global product's props
	$product->set_props(
		array(
			'name'              => $placeholders['title'],
			'slug'              => $placeholders['slug'],
			'sku'               => $placeholders['slug'],
			'status'            => $placeholders['status'],
			'description'       => $placeholders['description'],
			'short_description' => $placeholders['short_description'],

			// Reviews
			'reviews_allowed'   => $placeholders['reviews_allowed'],

			// Stock
			'manage_stock'      => $placeholders['manage_stock'],
			'stock_status'      => $placeholders['stock_status'],
			'stock_quantity'    => $placeholders['stock_quantity'],
			'low_stock_amount'  => $placeholders['low_stock_amount'],

			// Rating
			'rating_counts'     => $placeholders['rating_counts'],
			'average_rating'    => $placeholders['average_rating'],
			'review_count'      => $placeholders['review_count'],

			// Image & Gallery
			'image_id'          => $placeholders['image_id'],
			'gallery_image_ids' => $placeholders['gallery_image_ids'],

			// Additional Info
			'weight'            => $placeholders['weight'],
			'width'             => $placeholders['width'],
			'height'            => $placeholders['height'],
		)
	);

	// Set recent products as upsell product for TB placeholder
	$product->set_upsell_ids( $placeholders['recent_product_ids'] );

	// Set attributes, since placeholder uses variable type product
	$attribute = new WC_Product_Attribute();

	$attribute->set_id( $placeholders['attributes']['id'] );
	$attribute->set_name( $placeholders['attributes']['name'] );
	$attribute->set_options( $placeholders['attributes']['options'] );
	$attribute->set_position( $placeholders['attributes']['position'] );
	$attribute->set_visible( $placeholders['attributes']['visible'] );
	$attribute->set_variation( $placeholders['attributes']['variation'] );

	$product->set_attributes( array( $attribute ) );

	// Save modified global for later use
	$tb_wc_post    = $post;
	$tb_wc_product = $product;
}

/**
 * Reset global objects needed to manipulate `ETBuilderBackend.currentPage.woocommerceComponents`
 *
 * @since 4.0.1
 */
function et_theme_builder_wc_reset_global_objects() {
	if ( ! et_builder_tb_enabled() ) {
		return;
	}

	global $product, $post, $tb_original_product, $tb_original_post;

	remove_filter( 'comments_template', array( 'ET_Builder_Module_Woocommerce_Tabs', 'comments_template_loader' ), 20 );
	remove_filter( 'woocommerce_product_related_posts_force_display', '__return_true' );
	remove_filter( 'comments_open', '__return_true' );

	$post     = $tb_original_post;
	$product  = $tb_original_product;
}

/**
 * Modify reviews output on WooCommerce's review and tabs' review module in TB
 *
 * @since 4.0.1
 *
 * @param array $comments
 *
 * @return array
 */
function et_theme_builder_wc_set_review_objects( $comments ) {
	// Return early if it isn't theme builder
	if ( ! et_builder_tb_enabled() ) {
		return $comments;
	}

	$placeholder = et_theme_builder_wc_review_placeholder();

	// Add two placeholder reviews
	$comments = array(
		$placeholder,
		$placeholder,
	);

	// When comment metadata is modified via `get_comment_metadata` filter, the $comment param
	// passed into template functions is int instead of WP_Comment object which triggers
	// `get_comment()` which triggers error because there's no real review/comment saved in database
	// to fix it, modify cache to short-circuit and prevent full `get_comment()`  execution
	wp_cache_set( $placeholder->comment_ID, $placeholder, 'comment' );

	return $comments;
}

// Modify review output on WooCommerce Tabs module
add_filter( 'comments_array', 'et_theme_builder_wc_set_review_objects' );

// Modify review output on WooCommerce Review module
add_filter( 'the_comments', 'et_theme_builder_wc_set_review_objects' );

/**
 * Modify review rating output on WooCommerce review and tabs review module in TB
 *
 * @since 4.0.1
 *
 * @param mixed  $value
 * @param int    $object_id
 * @param string $meta_key
 * @param bool   $single
 *
 * @return mixed
 */
function et_theme_builder_wc_set_review_metadata( $value, $object_id, $meta_key, $single ) {
	$is_tb = et_builder_tb_enabled();

	// Modify rating metadata
	if ( $is_tb && 'rating' === $meta_key ) {
		$placeholders = et_theme_builder_wc_placeholders();

		return $placeholders['average_rating'];
	}

	// Modify verified metadata
	if ( $is_tb && 'verified' === $meta_key ) {
		return false;
	}

	return $value;
}

add_filter( 'get_comment_metadata', 'et_theme_builder_wc_set_review_metadata', 10, 4 );
