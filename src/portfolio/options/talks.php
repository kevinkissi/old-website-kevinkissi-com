	<?php
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks Title: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_title() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talktitle]"><?php _e( 'Talk Title', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talktitle]" id="term_meta[talktitle]" value="">
			<p class="description"><?php _e( 'Enter a title value in the form of Institution, City, State, Country.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_title');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_title');

	function taxonomy_edit_meta_field_talk_title($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talktitle]"><?php _e( 'Talk Title', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talktitle]" id="term_meta[talktitle]" value="<?php echo esc_attr( $term_meta['talktitle'] ) ? esc_attr( $term_meta['talktitle'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a title value in the form of Institution, City, State, Country, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_title');

    
	function save_taxonomy_custom_meta_talk_title( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_title' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_title');
    
        
    
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talkdate]"><?php _e( 'Talk Date', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talkdate]" id="term_meta[talkdate]" value="">
			<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_date');

	function taxonomy_edit_meta_field_talk_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talkdate]"><?php _e( 'Talk Date', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talkdate]" id="term_meta[talkdate]" value="<?php echo esc_attr( $term_meta['talkdate'] ) ? esc_attr( $term_meta['talkdate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_date');

    
	function save_taxonomy_custom_meta_talk_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_date' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_date');
  
  
  /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks Location: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_location() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talklocation]"><?php _e( 'Talk Location', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talklocation]" id="term_meta[talklocation]" value="">
			<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_location');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_location');

	function taxonomy_edit_meta_field_talk_location($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talklocation]"><?php _e( 'Talk Location', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talklocation]" id="term_meta[talklocation]" value="<?php echo esc_attr( $term_meta['talklocation'] ) ? esc_attr( $term_meta['talklocation'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_location');

    
	function save_taxonomy_custom_meta_talk_location( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_location' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_location');
  
  /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks source: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_source() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talksource]"><?php _e( 'Talk Source', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talksource]" id="term_meta[talksource]" value="">
			<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_source');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_source');

	function taxonomy_edit_meta_field_talk_source($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talksource]"><?php _e( 'Talk Source', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talksource]" id="term_meta[talksource]" value="<?php echo esc_attr( $term_meta['talksource'] ) ? esc_attr( $term_meta['talksource'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_source');

    
	function save_taxonomy_custom_meta_talk_source( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_source' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_source');
   
  
// ======================================================
// Talk Call Functions
// =========================================================
function get_talk_title($talktitle_id){
$term_meta = get_option( "taxonomy_{$talktitle_id}" );
return $term_meta['talktitle'];
}

function get_talk_date($talkdate_id){
$term_meta = get_option( "taxonomy_{$talkdate_id}" );
return $term_meta['talkdate'];
}

function get_talk_location($talklocation_id){
$term_meta = get_option( "taxonomy_{$talklocation_id}" );
return $term_meta['talklocation'];
}

function get_talk_source($talksource_id){
$term_meta = get_option( "taxonomy_{$talksource_id}" );
return $term_meta['talksource'];
} 

// ======================================================
// Talk Taxonomy
// =========================================================
$talk_labels = array(
    'name'              => _x( 'Talk', 'taxonomy general name' ),
    'singular_name'     => _x( 'Talk', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Talk', 'kevinkissi' ),
    'all_items'         => __( 'All Talk', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Talk', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Talk:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Talk', 'kevinkissi' ),
    'update_item'       => __( 'Update Talk', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Talk', 'kevinkissi' ),
    'new_item_name'     => __( 'New Talk Name', 'kevinkissi' ),
    'menu_name'         => __( 'Talks', 'kevinkissi' ),
);

$talk_args = array(
    'hierarchical'      => true,
    'labels'            => $talk_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_talk')
                                
);

register_taxonomy( 'portfolio_talk', array( 'portfolio' ), $talk_args );