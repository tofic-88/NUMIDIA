<?php
/**
 * Validate homepage.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_homepage( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_FRONT_PAGE === $type;
}

/**
 * Validate singular:post_type:<post_type>:all.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_singular_post_type_all( $type, $subtype, $id, $setting ) {
	// Cover the homepage as well.
	if ( ET_Theme_Builder_Request::TYPE_FRONT_PAGE === $type && 'page' === $setting[2] && $id === (int) get_option( 'page_on_front' ) ) {
		return true;
	}

	return ET_Theme_Builder_Request::TYPE_SINGULAR === $type && $subtype === $setting[2];
}

/**
 * Validate archive:post_type:<post_type>.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_archive_post_type( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_POST_TYPE_ARCHIVE === $type && $subtype === $setting[2];
}

/**
 * Validate singular:post_type:<post_type>:id:<id>.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_singular_post_type_id( $type, $subtype, $id, $setting ) {
	return (
		// Cover the special case where the post selected is assigned as the website homepage.
		( ET_Theme_Builder_Request::TYPE_FRONT_PAGE === $type && $id === (int) $setting[4] )
		||
		( ET_Theme_Builder_Request::TYPE_SINGULAR === $type && $id === (int) $setting[4] )
	);
}

/**
 * Validate singular:post_type:<post_type>:children:id:<id>.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_singular_post_type_children_id( $type, $subtype, $id, $setting ) {
	if ( ET_Theme_Builder_Request::TYPE_SINGULAR !== $type ) {
		return false;
	}

	return in_array( (int) $setting[5], get_post_ancestors( $id ), true );
}

/**
 * Validate singular:taxonomy:<taxonomy>:term:id:<id>.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_singular_taxonomy_term_id( $type, $subtype, $id, $setting ) {
	if ( ET_Theme_Builder_Request::TYPE_SINGULAR !== $type ) {
		return false;
	}

	return has_term( (int) $setting[5], $setting[2], $id );
}

/**
 * Validate archive:all.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_archive_all( $type, $subtype, $id, $setting ) {
	$archives = array(
		ET_Theme_Builder_Request::TYPE_POST_TYPE_ARCHIVE,
		ET_Theme_Builder_Request::TYPE_TERM,
		ET_Theme_Builder_Request::TYPE_AUTHOR,
		ET_Theme_Builder_Request::TYPE_DATE,
	);

	return in_array( $type, $archives, true );
}

/**
 * Validate archive:taxonomy:<taxonomy>:all.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_archive_taxonomy_all( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_TERM === $type && $subtype === $setting[2];
}

/**
 * Validate archive:taxonomy:<taxonomy>:term:id:<id>.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_archive_taxonomy_term_id( $type, $subtype, $id, $setting ) {
	if ( ET_Theme_Builder_Request::TYPE_TERM === $type && $subtype === $setting[2] ) {
		// Exact match.
		if ( $id === (int) $setting[5] ) {
			return true;
		}

		// Specified setting term id ($setting[5]) is an ancestor of the request term id ($id).
		if ( term_is_ancestor_of( (int) $setting[5], $id, $setting[2] ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Validate archive:user:all.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_archive_user_all( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_AUTHOR === $type;
}

/**
 * Validate archive:user:id:<id>.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_archive_user_id( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_AUTHOR === $type && $id === (int) $setting[3];
}

/**
 * Validate archive:date:all.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_archive_date_all( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_DATE === $type;
}

/**
 * Validate search.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_search( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_SEARCH === $type;
}

/**
 * Validate 404.
 *
 * @since 4.0
 *
 * @param string $type
 * @param string $subtype
 * @param integer $id
 * @param string[] $setting
 *
 * @return bool
 */
function et_theme_builder_template_setting_validate_404( $type, $subtype, $id, $setting ) {
	return ET_Theme_Builder_Request::TYPE_404 === $type;
}
