<?php   
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio conferences Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_conference_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[conferencedate]"><?php _e( 'Conference Date', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[conferencedate]" id="term_meta[conferencedate]" value="">
			<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_conference_add_form_fields', 'taxonomy_add_new_meta_field_conference_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_conference_date');

	function taxonomy_edit_meta_field_conference_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[conferencedate]"><?php _e( 'Conference Date', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[conferencedate]" id="term_meta[conferencedate]" value="<?php echo esc_attr( $term_meta['conferencedate'] ) ? esc_attr( $term_meta['conferencedate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_conference_edit_form_fields', 'taxonomy_edit_meta_field_conference_date');

    
	function save_taxonomy_custom_meta_conference_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$conference_keys = array_keys( $_POST['term_meta'] );
			foreach ( $conference_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_conference', 'save_taxonomy_custom_meta_conference_date' );  
  add_action( 'create_portfolio_conference', 'save_taxonomy_custom_meta_conference_date');
  
  
  /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio conferences Location: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_conference_location() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[conferencelocation]"><?php _e( 'Conference Location', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[conferencelocation]" id="term_meta[conferencelocation]" value="">
			<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_conference_add_form_fields', 'taxonomy_add_new_meta_field_conference_location');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_conference_location');

	function taxonomy_edit_meta_field_conference_location($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[conferencelocation]"><?php _e( 'Conference Location', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[conferencelocation]" id="term_meta[conferencelocation]" value="<?php echo esc_attr( $term_meta['conferencelocation'] ) ? esc_attr( $term_meta['conferencelocation'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_conference_edit_form_fields', 'taxonomy_edit_meta_field_conference_location');

    
	function save_taxonomy_custom_meta_conference_location( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$conference_keys = array_keys( $_POST['term_meta'] );
			foreach ( $conference_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_conference', 'save_taxonomy_custom_meta_conference_location' );  
  add_action( 'create_portfolio_conference', 'save_taxonomy_custom_meta_conference_location');
  
// ======================================================
// conference Call Functions
// =========================================================
function get_conference_date($conferencedate_id){
$term_meta = get_option( "taxonomy_{$conferencedate_id}" );
return $term_meta['conferencedate'];
}

function get_conference_location($conferencelocation_id){
$term_meta = get_option( "taxonomy_{$conferencelocation_id}" );
return $term_meta['conferencelocation'];
}


// ======================================================
// Conference Taxonomy
// =========================================================
$conference_labels = array(
    'name'              => _x( 'Conference', 'taxonomy general name' ),
    'singular_name'     => _x( 'Conference', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Conference', 'kevinkissi' ),
    'all_items'         => __( 'All Conference', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Conference', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Conferences:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Conferences', 'kevinkissi' ),
    'update_item'       => __( 'Update Conferences', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Conferences', 'kevinkissi' ),
    'new_item_name'     => __( 'New Conferences Name', 'kevinkissi' ),
    'menu_name'         => __( 'Conferences', 'kevinkissi' ),
);

$conference_args = array(
    'hierarchical'      => true,
    'labels'            => $conference_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_conference')
                                
);

register_taxonomy( 'portfolio_conference', array( 'portfolio' ), $conference_args );