<?php
/*
This is a sample local-config.php file
In it, you *must* include the four main database defines

You may include other settings here that you only want enabled on your local development checkouts
*/

$projetct_folder_path = dirname(__FILE__);
$project_path_array = explode('/', $projetct_folder_path );
end( $project_path_array );         // move the internal pointer to the end of the array
$last_key = key( $project_path_array ); 
$project_folder_name = $project_path_array[$last_key];

define( 'DB_NAME', 'wp_' . $project_folder_name );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' ); // Probably 'localhost'

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . $project_folder_name . '/content' );

// ========================
// Site URL
// ========================
define('WP_SITEURL','http://wp-api/wp');
define('WP_HOME','http://wp-api/');