<?php
/**
*
* Baby Boomer Loader
*
* @package WordPress
* @subpackage Baby Boomer
*
* Version: 1.4.1
**/

$foundation_q_includes = array(
  'frameworks/ReduxFramework/ReduxCore/framework.php', // Load options theme framework
  'frameworks/wp-custom-post-type-class/src/CPT.php', // Load post types framework
  'lib/extras.php', // Baby Boomer extra functions
  'lib/options.php', // Theme options
  'lib/config.php', // Configuration
  'lib/init.php', // Initial theme setup and constants
  'lib/breadcrumbs.php', // Baby Boomer extra functions
  'lib/types.php', // Post types
  'lib/fields.php', // Fields
  'lib/titles.php', // Page and post titles
  'lib/comments.php', // WordPress comments modifications
  'lib/gallery.php', // WordPress [gallery] modifications for bootstrap
  'lib/gallery-metabox/gallery.php', // Image gallery metabox for post types
  'lib/scripts.php', // Scripts and stylesheets
  'lib/plugin-activation.php', // Auto activation for plugins
  'lib/wp-bootstrap-navwalker.php', // Bootstrap nav walker
);

foreach ($foundation_q_includes as $file):
  if (!$filepath = locate_template($file)):
    trigger_error( sprintf( 'Error locating %s for inclusion', $file ), E_USER_ERROR);
  endif;
  require_once $filepath;
endforeach;
unset($file, $filepath);
