<?php
installer(); 

function installer()
{
	global $wpdb;
	$table_name = $wpdb->prefix . "my_products";
	$my_products_db_version = '1.0.0';
	$charset_collate = $wpdb->get_charset_collate();

	if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

	    $sql = "CREATE TABLE $table_name (
	            `id` int(9) UNSIGNED NOT NULL,
				`product_name` varchar(255)   NOT NULL,
				`product_model` varchar(255)   NOT NULL,
				`product_description` text   NOT NULL
	            PRIMARY KEY  (id)
	    ) $charset_collate;";

	    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	    dbDelta( $sql );
	    add_option( my_db_version, $my_products_db_version );
	}
}

register_activation_hook(__file__, 'installer' );
