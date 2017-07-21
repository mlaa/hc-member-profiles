<?php

namespace MLA\Commons;



class Blogs_Field_Type extends \BP_XProfile_Field_Type {

	public $name = Profile::XPROFILE_FIELD_NAME_BLOGS;

	public $accepts_null_value = true;

	public function __construct() {
		parent::__construct();
	}

	public static function display_filter( $field_value, $field_id = '' ) {
		global $humanities_commons;

		$html = '';
		$societies_html = [];

		$querystring =  bp_ajax_querystring( 'blogs' ) . '&' . http_build_query( [
			'type' => 'alphabetical',
		] );

		if ( bp_has_blogs( $querystring ) ) {
			while ( bp_blogs() ) {
				bp_the_blog();
				switch_to_blog( bp_get_blog_id() );
				$user = get_userdata( bp_core_get_displayed_userid( bp_get_displayed_user_username() ) );
				if ( ! empty( array_intersect( ['administrator', 'editor'], $user->roles ) ) ) {
					$society_id = $humanities_commons->hcommons_get_blog_society_id( bp_get_blog_id() );
					$societies_html[ $society_id ][] = '<li><a href="' . bp_get_blog_permalink() . '">' . bp_get_blog_name() . '</a></li>';
				}
				restore_current_blog();
			}

			ksort( $societies_html );

			foreach ( $societies_html as $society_id => $society_html ) {
				$html .= '<h5>' . strtoupper( $society_id ) . '</h5>';
				$html .= '<ul>' . implode( '', $society_html ) . '</ul>';
			}
		}

		return $html;
	}

	public function edit_field_html( array $raw_properties = [] ) {
		global $mla_academic_interests;

		$tax = get_taxonomy( 'mla_academic_interests' );

		$interest_list = $mla_academic_interests->mla_academic_interests_list();
		$input_interest_list = wpmn_get_object_terms( bp_displayed_user_id(), 'mla_academic_interests', [ 'fields' => 'names' ] );

		$html = '<p class="description">Enter interests from the existing list, or add new interests if needed.</p>';
		$html .= '<select name="academic-interests[]" class="js-basic-multiple-tags interests" multiple="multiple" data-placeholder="Enter interests.">';

		foreach ( $interest_list as $interest_key => $interest_value ) {
			$html .= sprintf('
				<option class="level-1" %1$s value="%2$s">%3$s</option>' . "\n",
				( in_array( $interest_key, $input_interest_list ) ) ? 'selected="selected"' : '',
				$interest_key,
				$interest_value
			);
		}

		$html .= '</select>';

		return $html;
	}

	public function admin_field_html( array $raw_properties = [] ) {
		echo 'This field is not editable.';
	}

}