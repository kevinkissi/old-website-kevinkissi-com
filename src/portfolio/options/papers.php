	<?php
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Papers Journal: Add Meta Field
/*-----------------------------------------------------------------------------------*/

       function taxonomy_add_new_meta_field_paper_journal() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[paperjournal]"><?php _e( 'Journal Name', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[paperjournal]" id="term_meta[paperjournal]" value="">
			<p class="description"><?php _e( 'Enter a journal value where paper is published' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_journal');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_journal');

	function taxonomy_edit_meta_field_paper_journal($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[paperjournal]"><?php _e( 'Journal Name', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[paperjournal]" id="term_meta[paperjournal]" value="<?php echo esc_attr( $term_meta['paperjournal'] ) ? esc_attr( $term_meta['paperjournal'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a journal value in the form of Institution, City, State, Country, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_journal');

    
	function save_taxonomy_custom_meta_paper_journal( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_journal' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_journal');
    
        
  
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio papers Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_paper_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[paperdate]"><?php _e( 'Paper Publication/Archive Date', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[paperdate]" id="term_meta[paperdate]" value="">
			<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_date');

	function taxonomy_edit_meta_field_paper_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[paperdate]"><?php _e( 'Paper Publication/Archive Date', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[paperdate]" id="term_meta[paperdate]" value="<?php echo esc_attr( $term_meta['paperdate'] ) ? esc_attr( $term_meta['paperdate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_date');

    
	function save_taxonomy_custom_meta_paper_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_date' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_date');
  

/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio papers status: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_paper_status() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[paperstatus]"><?php _e( 'Paper Status', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[paperstatus]" id="term_meta[paperstatus]" value="">
			<p class="description"><?php _e( 'Enter a status value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_status');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_status');

	function taxonomy_edit_meta_field_paper_status($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[paperstatus]"><?php _e( 'Paper status', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[paperstatus]" id="term_meta[paperstatus]" value="<?php echo esc_attr( $term_meta['paperstatus'] ) ? esc_attr( $term_meta['paperstatus'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a status value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_status');

    
	function save_taxonomy_custom_meta_paper_status( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_status' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_status');
  

/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio papers source: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_paper_source() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[papersource]"><?php _e( 'Paper Source', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[papersource]" id="term_meta[papersource]" value="">
			<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_source');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_source');

	function taxonomy_edit_meta_field_paper_source($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[papersource]"><?php _e( 'Paper Source', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[papersource]" id="term_meta[papersource]" value="<?php echo esc_attr( $term_meta['papersource'] ) ? esc_attr( $term_meta['papersource'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_source');

    
	function save_taxonomy_custom_meta_paper_source( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_source' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_source');
   
  
// ======================================================
// paper Call Functions
// =========================================================
function get_paper_journal($paperjournal_id){
$term_meta = get_option( "taxonomy_{$paperjournal_id}" );
return $term_meta['paperjournal'];
}

function get_paper_date($paperdate_id){
$term_meta = get_option( "taxonomy_{$paperdate_id}" );
return $term_meta['paperdate'];
}

function get_paper_status($paperstatus_id){
$term_meta = get_option( "taxonomy_{$paperstatus_id}" );
return $term_meta['paperstatus'];
}

function get_paper_source($papersource_id){
$term_meta = get_option( "taxonomy_{$papersource_id}" );
return $term_meta['papersource'];
} 

// ======================================================
// paper Taxonomy
// =========================================================
$paper_labels = array(
    'name'              => _x( 'Paper', 'taxonomy general name' ),
    'singular_name'     => _x( 'Paper', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Paper', 'kevinkissi' ),
    'all_items'         => __( 'All Paper', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Paper', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent paper:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Paper', 'kevinkissi' ),
    'update_item'       => __( 'Update Paper', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Paper', 'kevinkissi' ),
    'new_item_name'     => __( 'New Paper Name', 'kevinkissi' ),
    'menu_name'         => __( 'Papers', 'kevinkissi' ),
);

$paper_args = array(
    'hierarchical'      => true,
    'labels'            => $paper_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_paper')
                                
);

register_taxonomy( 'portfolio_paper', array( 'portfolio' ), $paper_args );