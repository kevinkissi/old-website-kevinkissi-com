	<?php
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio leaders Title: Add Meta Field
/*-----------------------------------------------------------------------------------*/

       function taxonomy_add_new_meta_field_leader_title() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leadertitle]"><?php _e( 'Leadership Role', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leadertitle]" id="term_meta[leadertitle]" value="">
			<p class="description"><?php _e( 'Enter a title value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_title');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_title');

	function taxonomy_edit_meta_field_leader_title($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leadertitle]"><?php _e( 'Leadership Role', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leadertitle]" id="term_meta[leadertitle]" value="<?php echo esc_attr( $term_meta['leadertitle'] ) ? esc_attr( $term_meta['leadertitle'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a title value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_title');

    
	function save_taxonomy_custom_meta_leader_title( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_title' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_title');
    
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio leaders Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_leader_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leaderdate]"><?php _e( 'Leadership Dates', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leaderdate]" id="term_meta[leaderdate]" value="">
			<p class="description"><?php _e( 'Enter a dates value in the form: [Start Month, Start Year to End Month, End Year].','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_date');

	function taxonomy_edit_meta_field_leader_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leaderdate]"><?php _e( 'Leadership Dates', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leaderdate]" id="term_meta[leaderdate]" value="<?php echo esc_attr( $term_meta['leaderdate'] ) ? esc_attr( $term_meta['leaderdate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a dates value in the form: [Start Month, Start Year to End Month, End Year].','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_date');

    
	function save_taxonomy_custom_meta_leader_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_date' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_date');
  
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio leaders organization: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_leader_organization() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leaderorganization]"><?php _e( 'Organization/Capacity', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leaderorganization]" id="term_meta[leaderorganization]" value="">
			<p class="description"><?php _e( 'Enter a organization value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_organization');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_organization');

	function taxonomy_edit_meta_field_leader_organization($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leaderorganization]"><?php _e( 'Organization/Capacity', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leaderorganization]" id="term_meta[leaderorganization]" value="<?php echo esc_attr( $term_meta['leaderorganization'] ) ? esc_attr( $term_meta['leaderorganization'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a organization value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_organization');

    
	function save_taxonomy_custom_meta_leader_organization( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_organization' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_organization');
  
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Leaders Division: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_leader_division() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leaderdivision]"><?php _e( 'Chapter/Division', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leaderdivision]" id="term_meta[leaderdivision]" value="">
			<p class="description"><?php _e( 'Enter a division value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_division');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_division');

	function taxonomy_edit_meta_field_leader_division($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leaderdivision]"><?php _e( 'Chapter/Division', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leaderdivision]" id="term_meta[leaderdivision]" value="<?php echo esc_attr( $term_meta['leaderdivision'] ) ? esc_attr( $term_meta['leaderdivision'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a division value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_division');

    
	function save_taxonomy_custom_meta_leader_division( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_division' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_division');
    
  
// ======================================================
// leader Call Functions
// =========================================================
function get_leader_date($leaderdate_id){
$term_meta = get_option( "taxonomy_{$leaderdate_id}" );
return $term_meta['leaderdate'];
}

function get_leader_organization($leaderorganization_id){
$term_meta = get_option( "taxonomy_{$leaderorganization_id}" );
return $term_meta['leaderorganization'];
}

function get_leader_division($leaderdivision_id){
$term_meta = get_option( "taxonomy_{$leaderdivision_id}" );
return $term_meta['leaderdivision'];
}

function get_leader_title($leadertitle_id){
$term_meta = get_option( "taxonomy_{$leadertitle_id}" );
return $term_meta['leadertitle'];
}

// ======================================================
// leader Taxonomy
// =========================================================
$leader_labels = array(
    'name'              => _x( 'Leadership', 'taxonomy general name' ),
    'singular_name'     => _x( 'Leadership', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Leadership', 'kevinkissi' ),
    'all_items'         => __( 'All Leadership', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Leadership', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Leadership:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Leadership', 'kevinkissi' ),
    'update_item'       => __( 'Update Leadership', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Leadership', 'kevinkissi' ),
    'new_item_name'     => __( 'New Leadership Name', 'kevinkissi' ),
    'menu_name'         => __( 'Leadership Engagements', 'kevinkissi' ),
);

$leader_args = array(
    'hierarchical'      => true,
    'labels'            => $leader_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_leader')
                                
);

register_taxonomy( 'portfolio_leader', array( 'portfolio' ), $leader_args );