<?php
  
  /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio skillss ratings: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_skills_ratings() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[skillsratings]"><?php _e( 'Skills ratings', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[skillsratings]" id="term_meta[skillsratings]" value="">
			<p class="description"><?php _e( 'Enter a ratings numerical values between 1 and 100.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_skills_add_form_fields', 'taxonomy_add_new_meta_field_skills_ratings');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_skills_ratings');

	function taxonomy_edit_meta_field_skills_ratings($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[skillsratings]"><?php _e( 'Skills ratings', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[skillsratings]" id="term_meta[skillsratings]" value="<?php echo esc_attr( $term_meta['skillsratings'] ) ? esc_attr( $term_meta['skillsratings'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a ratings numerical values between 1 and 100.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_skills_edit_form_fields', 'taxonomy_edit_meta_field_skills_ratings');

    
	function save_taxonomy_custom_meta_skills_ratings( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$skills_keys = array_keys( $_POST['term_meta'] );
			foreach ( $skills_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_skills', 'save_taxonomy_custom_meta_skills_ratings' );  
  add_action( 'create_portfolio_skills', 'save_taxonomy_custom_meta_skills_ratings');
  
// ======================================================
// Skills Call Functions
// =========================================================
function get_skills_ratings($skillsratings_id){
$term_meta = get_option( "taxonomy_{$skillsratings_id}" );
return $term_meta['skillsratings'];
}

// ======================================================
// Skills Taxonomy
// =========================================================
$skills_labels = array(
    'name'              => _x( 'Skills', 'taxonomy general name' ),
    'singular_name'     => _x( 'Skills', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Skills', 'kevinkissi' ),
    'all_items'         => __( 'All Skills', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Skills', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Skills:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Skills', 'kevinkissi' ),
    'update_item'       => __( 'Update Skills', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Skills', 'kevinkissi' ),
    'new_item_name'     => __( 'New Skills Name', 'kevinkissi' ),
    'menu_name'         => __( 'Skills', 'kevinkissi' ),
);

$skills_args = array(
    'hierarchical'      => true,
    'labels'            => $skills_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
           
    'rewrite'           => array( 'slug' => 'portfolio_skills')                               
);

register_taxonomy( 'portfolio_skills', array( 'portfolio' ), $skills_args );