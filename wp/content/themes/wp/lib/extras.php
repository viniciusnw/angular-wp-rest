<?php
/**
*
* Get option theme value
*
**/

function foundation_q_get_option( $option_key ){
  global $foundation_q_options;

  if( is_array($foundation_q_options) && array_key_exists( $option_key, $foundation_q_options ) ):
    return $foundation_q_options[$option_key];
  else:
    return false;
  endif;
}

/**
*
* Show options theme social links list
*
**/

function foundation_q_the_social_links( $show_icons = false ){

    /* Busca no banco o cadastro de cada rede social */
    $foundation_twitter   = foundation_q_get_option( 'social_twitter_url' );
    $foundation_facebook  = foundation_q_get_option( 'social_facebook_url' );
    $foundation_gplus     = foundation_q_get_option( 'social_googleplus_url' );
    $foundation_youtube   = foundation_q_get_option( 'social_youtube_url' );
    $foundation_instagram = foundation_q_get_option( 'social_instagram_url' );
    $foundation_flickr    = foundation_q_get_option( 'social_flickr_url' );
    $foundation_linkedin  = foundation_q_get_option( 'social_linkedin_url' );
    $foundation_pinterest = foundation_q_get_option( 'social_pinterest_url' );
    $foundation_vimeo     = foundation_q_get_option( 'social_vimeo_url' );
    $foundation_tumblr    = foundation_q_get_option( 'social_tumblr_url' );
    $foundation_rss       = foundation_q_get_option( 'social_rss_url' );
    $foundation_itunes    = foundation_q_get_option( 'social_itunes_url' );
    $foundation_wordpress = foundation_q_get_option( 'social_wordpress_url' );
    $foundation_sd        = foundation_q_get_option( 'social_soundclound_url' );

    /* Atribui os valores aos arrays */
    if( $foundation_twitter )   $social_data[0]  = array( 'url' => $foundation_twitter,   'title' => 'Twitter',     'icon' => ('fa fa-twitter') );
    if( $foundation_facebook )  $social_data[1]  = array( 'url' => $foundation_facebook,  'title' => 'Facebook',    'icon' => ('fa fa-facebook') );
    if( $foundation_gplus )     $social_data[2]  = array( 'url' => $foundation_gplus,     'title' => 'Google+',     'icon' => ('fa fa-google-plus') );
    if( $foundation_youtube )   $social_data[3]  = array( 'url' => $foundation_youtube,   'title' => 'YouTube',     'icon' => ('fa fa-youtube') );
    if( $foundation_instagram ) $social_data[4]  = array( 'url' => $foundation_instagram, 'title' => 'Instagram',   'icon' => ('fa fa-instagram') );
    if( $foundation_flickr )    $social_data[5]  = array( 'url' => $foundation_flickr,    'title' => 'Flickr',      'icon' => ('fa fa-flickr') );
    if( $foundation_linkedin )  $social_data[6]  = array( 'url' => $foundation_linkedin,  'title' => 'LinkedIn',    'icon' => ('fa fa-linkedin') );
    if( $foundation_pinterest ) $social_data[7]  = array( 'url' => $foundation_pinterest, 'title' => 'Pinterest',   'icon' => ('fa fa-pinterest-p') );
    if( $foundation_vimeo )     $social_data[8]  = array( 'url' => $foundation_vimeo,     'title' => 'Vimeo',       'icon' => ('fa fa-vimeo') );
    if( $foundation_tumblr )    $social_data[9]  = array( 'url' => $foundation_tumblr,    'title' => 'Tumblr',      'icon' => ('fa fa-tumblr') );
    if( $foundation_rss )       $social_data[10] = array( 'url' => $foundation_rss,       'title' => 'RSS',         'icon' => ('fa fa-rss') );
    if( $foundation_itunes )    $social_data[11] = array( 'url' => $foundation_itunes,    'title' => 'iTunes',      'icon' => ('fa fa-apple') );
    if( $foundation_wordpress ) $social_data[12] = array( 'url' => $foundation_wordpress, 'title' => 'Wordpress',   'icon' => ('fa fa-wordpress') );
    if( $foundation_sd )        $social_data[13] = array( 'url' => $foundation_sd,        'title' => 'Soundclound', 'icon' => ('fa fa-soundcloud') );

    $result = '<ul class="qwp-social-list">';

    if( isset( $social_data ) ) {
      foreach( $social_data as $social ) {
        if( $show_icons ) {
          $result .= '<li><a target="_blank" href="' .foundation_q_addhttp( $social['url'] ). '"><i class="' .$social['icon']. '" aria-hidden="true"></i></a></li>';
        } else {
          $result .= '<li><a target="_blank" href="' .foundation_q_addhttp( $social['url'] ). '"><span>' .$social['title']. '</span></a></li>';
        }
      }

      /* Finaliza a listagem */
      $result .= '</ul>';

      echo $result;

    } else {
      return false;
    }
}

/**
*
* Show options theme other social accounts
*
**/

function foundation_q_the_social_accounts( $show_icons = false ){

    // Variáveis
    $foundation_skype    = foundation_q_get_option( 'social_skype_user' );
    $foundation_whatsapp = foundation_q_get_option( 'social_whatsapp_user' );
    $foundation_spotify  = foundation_q_get_option( 'social_spotify_user' );
    $foundation_snapchat = foundation_q_get_option( 'social_snapchat_user' );

    if( $foundation_skype )    $social_data[0] = array( 'url' => $foundation_skype,    'title' => 'Skype',    'icon' => ('fa fa-skype') );
    if( $foundation_whatsapp ) $social_data[1] = array( 'url' => $foundation_whatsapp, 'title' => 'Whatsapp', 'icon' => ('fa fa-whatsapp') );
    if( $foundation_spotify )  $social_data[2] = array( 'url' => $foundation_spotify,  'title' => 'Spotify',  'icon' => ('fa fa-spotify') );
    if( $foundation_snapchat ) $social_data[3] = array( 'url' => $foundation_snapchat, 'title' => 'Snapchat', 'icon' => ('fa fa-snapchat-ghost') );

    $result = '<ul class="qwp-social-list qwp-social-list--accounts">';
    if( isset( $social_data ) ) {
      foreach( $social_data as $social ) {
        if( $show_icons ) {
          $result .=  '<li><i class="' .$social['icon']. '" aria-hidden="true"></i> <span>' .$social['url']. '</span></li>';
        } else {
          $result .=  '<li><span>' .$social['url']. '</span></a></li>';
        }
      }
      $result .= '</ul>';
      echo $result;
    } else {
      return false;
    }
}


/**
*
* Show share buttons list
*
**/

function foundation_q_the_share_buttons( $url, $title, $media ){

  if ( $url && $title ) {
  $url_encode   = urlencode( $url );
  $title_encode = urlencode( $title );
  if ( $media ){
    $media_encode = urlencode( $media );
  }
  $output = '<ul class="rrssb-buttons">
        <li class="rrssb-email">
          <a href="mailto:?subject=' . $title_encode . '&amp;body=' . $url_encode . '">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
            <path d="M20.11 26.147c-2.335 1.05-4.36 1.4-7.124 1.4C6.524 27.548.84 22.916.84 15.284.84 7.343 6.602.45 15.4.45c6.854 0 11.8 4.7 11.8 11.252 0 5.684-3.193 9.265-7.398 9.3-1.83 0-3.153-.934-3.347-2.997h-.077c-1.208 1.986-2.96 2.997-5.023 2.997-2.532 0-4.36-1.868-4.36-5.062 0-4.75 3.503-9.07 9.11-9.07 1.713 0 3.7.4 4.6.972l-1.17 7.203c-.387 2.298-.115 3.3 1 3.4 1.674 0 3.774-2.102 3.774-6.58 0-5.06-3.27-8.994-9.304-8.994C9.05 2.87 3.83 7.545 3.83 14.97c0 6.5 4.2 10.2 10 10.202 1.987 0 4.09-.43 5.647-1.245l.634 2.22zM16.647 10.1c-.31-.078-.7-.155-1.207-.155-2.572 0-4.596 2.53-4.596 5.53 0 1.5.7 2.4 1.9 2.4 1.44 0 2.96-1.83 3.31-4.088l.592-3.72z"/>
            </svg>
          </span>
          <span class="rrssb-text">email</span>
          </a>
        </li>
        <li class="rrssb-facebook">
          <a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" class="popup">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="29" height="29" viewBox="0 0 29 29">
            <path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z" class="cls-2" fill-rule="evenodd" />
            </svg>
          </span>
          <span class="rrssb-text">facebook</span>
          </a>
        </li>
        <li class="rrssb-twitter">
          <a href="https://twitter.com/intent/tweet?text=' . $title_encode . '%20' . $url_encode . '" class="popup">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
            <path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62c-3.122.162-6.22-.646-8.86-2.32 2.702.18 5.375-.648 7.507-2.32-2.072-.248-3.818-1.662-4.49-3.64.802.13 1.62.077 2.4-.154-2.482-.466-4.312-2.586-4.412-5.11.688.276 1.426.408 2.168.387-2.135-1.65-2.73-4.62-1.394-6.965C5.574 7.816 9.54 9.84 13.802 10.07c-.842-2.738.694-5.64 3.434-6.48 2.018-.624 4.212.043 5.546 1.682 1.186-.213 2.318-.662 3.33-1.317-.386 1.256-1.248 2.312-2.4 2.942 1.048-.106 2.07-.394 3.02-.85-.458 1.182-1.343 2.15-2.48 2.71z"/>
            </svg>
          </span>
          <span class="rrssb-text">twitter</span>
          </a>
        </li>
        <li class="rrssb-googleplus">
          <a href="https://plus.google.com/share?url=' . $title_encode . '%20' . $url . '" class="popup">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
            <path d="M14.703 15.854l-1.22-.948c-.37-.308-.88-.715-.88-1.46 0-.747.51-1.222.95-1.662 1.42-1.12 2.84-2.31 2.84-4.817 0-2.58-1.62-3.937-2.4-4.58h2.098l2.203-1.384h-6.67c-1.83 0-4.467.433-6.398 2.027C3.768 4.287 3.06 6.018 3.06 7.576c0 2.634 2.02 5.328 5.603 5.328.34 0 .71-.033 1.083-.068-.167.408-.336.748-.336 1.324 0 1.04.55 1.685 1.01 2.297-1.523.104-4.37.273-6.466 1.562-1.998 1.187-2.605 2.915-2.605 4.136 0 2.512 2.357 4.84 7.288 4.84 5.822 0 8.904-3.223 8.904-6.41.008-2.327-1.36-3.49-2.83-4.73h-.01zM10.27 11.95c-2.913 0-4.232-3.764-4.232-6.036 0-.884.168-1.797.744-2.51.543-.68 1.49-1.12 2.372-1.12 2.807 0 4.256 3.797 4.256 6.24 0 .613-.067 1.695-.845 2.48-.537.55-1.438.947-2.295.95v-.003zm.032 13.66c-3.62 0-5.957-1.733-5.957-4.143 0-2.408 2.165-3.223 2.91-3.492 1.422-.48 3.25-.545 3.556-.545.34 0 .52 0 .767.034 2.574 1.838 3.706 2.757 3.706 4.48-.002 2.072-1.736 3.664-4.982 3.648l.002.017zM23.254 11.89V8.52H21.57v3.37H18.2v1.714h3.367v3.4h1.684v-3.4h3.4V11.89"/>
            </svg>
          </span>
          <span class="rrssb-text">google+</span>
          </a>
        </li>
        <li class="rrssb-pinterest">
          <a href="http://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . $media . '&amp;description=' . $title_encode . '">
          <span class="rrssb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
            <path d="M14.02 1.57c-7.06 0-12.784 5.723-12.784 12.785S6.96 27.14 14.02 27.14c7.062 0 12.786-5.725 12.786-12.785 0-7.06-5.724-12.785-12.785-12.785zm1.24 17.085c-1.16-.09-1.648-.666-2.558-1.22-.5 2.627-1.113 5.146-2.925 6.46-.56-3.972.822-6.952 1.462-10.117-1.094-1.84.13-5.545 2.437-4.632 2.837 1.123-2.458 6.842 1.1 7.557 3.71.744 5.226-6.44 2.924-8.775-3.324-3.374-9.677-.077-8.896 4.754.19 1.178 1.408 1.538.49 3.168-2.13-.472-2.764-2.15-2.683-4.388.132-3.662 3.292-6.227 6.46-6.582 4.008-.448 7.772 1.474 8.29 5.24.58 4.254-1.815 8.864-6.1 8.532v.003z"/>
            </svg>
          </span>
          <span class="rrssb-text">pinterest</span>
          </a>
        </li>';

  if ( wp_is_mobile() ) {
    $wpp_text =  $title . ' - ' . $url_encode;
    $output .= '<li class="rrssb-whatsapp">
          <a href="whatsapp://send?text=' . $wpp_text . '">
            <span class="rrssb-icon">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90;" xml:space="preserve">
              <path d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522  c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982 c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537 c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938 c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537 c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333 c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882 c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977 c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344 c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223 C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"/>
            </svg>
            </span>
            <span class="rrssb-text">whatsapp</span>
          </a>
          </li>';
  }

  $output .= '</ul>';
  echo $output;
  } else {
  return;
  }
}


/**
*
* Get YouTube ID video from a URL
*
**/

function foundation_q_get_youtube_ID( $youtube_url ) {
  $ytvIDlen = 11; // This is the length of YouTube's video IDs
  // The ID string starts after "v=", which is usually right after
  // "youtube.com/watch?" in the URL
  $idStarts = strpos($youtube_url, "?v=");
  // In case the "v=" is NOT right after the "?" (not likely, but I like to keep my
  // bases covered), it will be after an "&":
  if($idStarts === FALSE)
    $idStarts = strpos($youtube_url, "&v=");
  if($idStarts === FALSE)
    $idStarts = strpos($youtube_url, "be/");
  // If still FALSE, URL doesn't have a vid ID
  if($idStarts === FALSE):
    return FALSE;
    die("YouTube video ID not found. Please double-check your URL.");
  endif;
  // Offset the start location to match the beginning of the ID string
  $idStarts +=3;
  // Get the ID string and return it
  $ytvID = substr($youtube_url, $idStarts, $ytvIDlen);

  return $ytvID;
}

/**
*
* Show the YouTube video thumb from a YouTube URL
*
**/

function foundation_q_the_youtube_thumb( $youtube_url ){
  $video_id = foundation_q_get_youtube_ID( $youtube_url );
  echo '<img src="http://img.youtube.com/vi/' . $video_id . '/0.jpg" />';
}

/**
*
* Get Vimeo ID from a URL
*
**/

function foundation_q_get_vimeo_id( $vimeo_url ){
  $vimeoID = substr($vimeo_url,-8);
  return $vimeoID;
}

/**
*
* Show Vimeo video thumb from a URL
*
**/

function foundation_q_the_vimeo_thumb($vimeo_url, $info = 'thumbnail_medium') {
  $id = foundation_q_get_vimeo_id( $vimeoURL );
  if (!function_exists('curl_init')) die('CURL is not installed!');
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "vimeo.com/api/v2/video/$id.php");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $output = unserialize(curl_exec($ch));
  $output = $output[0][$info];
  curl_close($ch);
  echo '<img src="'.$output.'" />';
}

/**
*
* Removing some dashboard widgets from WordPress panel
*
**/

function foundation_q_remove_dashboard_widgets() {
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
}
add_action('wp_dashboard_setup', 'foundation_q_remove_dashboard_widgets' );

/**
*
* Show posts paginate
*
**/

function foundation_q_the_posts_paginate( $args = array() ){
  $defaults = array(
    'range'           => 4,
    'custom_query'    => FALSE,
    'previous_string' => __( '<i class="glyphicon glyphicon-chevron-left"></i>', QGP_TEXT_DOMAIN ),
    'next_string'     => __( '<i class="glyphicon glyphicon-chevron-right"></i>', QGP_TEXT_DOMAIN ),
    'before_output'   => '<div class="post-nav"><ul class="pager">',
    'after_output'    => '</ul></div>'
  );

  $args = wp_parse_args(
    $args,
    apply_filters( 'qvp_bootstrap_pagination_defaults', $defaults )
  );

  $args['range'] = (int) $args['range'] - 1;
  if ( !$args['custom_query'] )
    $args['custom_query'] = @$GLOBALS['wp_query'];
  $count = (int) $args['custom_query']->max_num_pages;
  $page  = intval( get_query_var( 'paged' ) );
  $ceil  = ceil( $args['range'] / 2 );

  if ( $count <= 1 )
    return FALSE;

  if ( !$page )
    $page = 1;

  if ( $count > $args['range'] ) {
    if ( $page <= $args['range'] ) {
      $min = 1;
      $max = $args['range'] + 1;
    } elseif ( $page >= ($count - $ceil) ) {
      $min = $count - $args['range'];
      $max = $count;
    } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
      $min = $page - $ceil;
      $max = $page + $ceil;
    }
  } else {
    $min = 1;
    $max = $count;
  }

  $echo = '';
  $previous = intval($page) - 1;
  $previous = esc_attr( get_pagenum_link($previous) );

  $firstpage = esc_attr( get_pagenum_link(1) );
  if ( $firstpage && (1 != $page) )
    $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( 'First', QGP_TEXT_DOMAIN ) . '</a></li>';

  if ( $previous && (1 != $page) )
    $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', QGP_TEXT_DOMAIN) . '">' . $args['previous_string'] . '</a></li>';

  if ( !empty($min) && !empty($max) ) {
    for( $i = $min; $i <= $max; $i++ ) {
      if ($page == $i) {
        $echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
      } else {
        $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
      }
    }
  }

  $next = intval($page) + 1;
  $next = esc_attr( get_pagenum_link($next) );
  if ($next && ($count != $page) )
    $echo .= '<li><a href="' . $next . '" title="' . __( 'next', QGP_TEXT_DOMAIN) . '">' . $args['next_string'] . '</a></li>';

  $lastpage = esc_attr( get_pagenum_link($count) );
  if ( $lastpage ) {
    $echo .= '<li class="next"><a href="' . $lastpage . '">' . __( 'Last', QGP_TEXT_DOMAIN ) . '</a></li>';
  }

  if ( isset($echo) )
    echo $args['before_output'] . $echo . $args['after_output'];
}

/**
*
* Custom excerpt limit
*
**/

function foundation_q_the_excerpt_limit( $limit = 10 ) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    echo $excerpt;
}


/**
*
* Text limit
*
**/

function foundation_q_the_content_limit( $text = '', $limit = 10 ) {
  $text = apply_filters('the_content', $text);
  $text = str_replace(']]>', ']]&gt;', $text);
  $text = strip_tags($text);
  $excerpt = explode(' ', $text, $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    $result = $excerpt;
  } else {
    $excerpt = implode(" ",$excerpt);
    $result = $excerpt;
  }
  echo $result;
}

/**
*
* Taxonomy terms dropdown
*
**/

function foundation_q_the_terms_dropdown($taxonomy = 'category', $label = null, $get_terms_args = null){
  $terms = get_terms( $taxonomy, $get_terms_args );
  $dropdown = '<form action="#" class="foundation-q-list-terms">';
  $dropdown .= '<select name="dropdown-menu-terms" class="dropdown-menu-terms" id="dropdown-menu-terms">';
  $dropdown .= '<option value="">'.$label.'</option>';
  foreach ($terms as $term):
    $dropdown .='<option value="'.get_term_link($term->slug,$taxonomy).'">'.$term->name.'</option>';
  endforeach;
  $dropdown .='</select>';
  $dropdown .='</form>';
  echo $dropdown;
}

/**
*
* Get post views
*
* Return the views number of a post or page, if your theme is calling the funcion foundation_q_set_post_views()
* in your single or page template
**/

function foundation_q_get_post_views( $post_id ){
  $count_key = 'post_views_count';
  $count = get_post_meta($post_id, $count_key, true);
  if($count==''){
    delete_post_meta($post_id, $count_key);
    add_post_meta($post_id, $count_key, '0');
    return "0 Visualizações";
  }
  return $count.' Visualizações';
}

/**
*
* Set post views
*
* For register the views number of a post, call this function in the single or page template
**/

function foundation_q_set_post_views( $post_id ) {
  $count_key = 'post_views_count';
  $count = get_post_meta($post_id, $count_key, true);
  if($count==''){
    $count = 0;
    delete_post_meta($post_id, $count_key);
    add_post_meta($post_id, $count_key, '0');
  }else{
    $count++;
    update_post_meta($post_id, $count_key, $count);
  }
}

/**
*
* Get attached images from post type qd_images
*
**/

function foundation_q_get_gallery_images( $gallery_limit = 999, $post_gallery_id = null, $thumbnail_size = 'thumbnail') {
  $last_gallery_post = get_posts( array('post_type' => 'qd_gallery', 'numberpots' => 1) );
  if( !isset($post_gallery_id) ):
    $post_gallery_id = $last_gallery_post[0]->ID;
  endif;
  $gallery_images = get_post_meta( $post_gallery_id, 'foundation_q_vdw_gallery_id', true );

  if( $gallery_images ):
    $count = 1;
    foreach( $gallery_images as $image_id ):
      $image_thumb_data = wp_get_attachment_image_src($image_id, $thumbnail_size);
      $image_thumb_src = $image_thumb_data[0];
      $image_large_data = wp_get_attachment_image_src($image_id,'large');
      $image_large_src = $image_large_data[0];

      $image_custom_data = new stdClass;
      $image_custom_data->id = $image_id;
      $image_custom_data->image_thumbnail_src = $image_thumb_src;
      $image_custom_data->image_large_src = $image_large_src;

      //$gallery_merge[] = (object) array_merge((array)$gallery_images, (array)$image_custom_data);
      $gallery_object[] = (object) $image_custom_data;
      $count++;
      if( $count > $gallery_limit ){ break; }
    endforeach;
    return $gallery_object;
  else:
    return false;
  endif;
}

/**
*
* Show breadcrumbs
*
**/

function foundation_q_the_breadcrumbs( $defaults = Null ){
  if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail( $defaults );
}

/**
*
* Add OG tags
*
**/

function foundation_q_add_ogg_tags() {
  $blog_description = get_bloginfo( 'description' );
  $blog_url = get_bloginfo( 'url' );
  $blog_name = get_bloginfo('name');

  echo PHP_EOL;
  echo '<!-- Facebook OG Tags -->'.PHP_EOL;
  echo '<meta property="og:image" content="'.get_template_directory_uri().'/screenshot.png"/>'.PHP_EOL;
  echo '<meta property="og:title" content="'.$blog_description.'"/>'.PHP_EOL;
  echo '<meta property="og:type" content="website" />'.PHP_EOL;
  echo '<meta property="og:url" content="'.$blog_url.'"/>'.PHP_EOL;
  echo '<meta property="og:site_name" content="'.$blog_name.'"/>'.PHP_EOL;
  echo '<!-- ================ -->'.PHP_EOL;
  echo PHP_EOL;
}

/**
*
* Show the website logo from options theme
*
**/

function foundation_q_the_logo($place){
  if ( $place == 'header' )
    $new_logo = foundation_q_get_option('website_logo_header');
  if ( $place == 'footer' )
    $new_logo = foundation_q_get_option('website_logo_footer');

  if( isset( $new_logo ) && $new_logo['url'] != '' ):
    $logo_src = $new_logo['url'];
    $logo_width = $new_logo['width'];
    $logo_height = $new_logo['height'];
    echo '<img src="' . $logo_src . '" class="img-responsive">';
  else:
    echo '<p>Faça o upload da imagem do logo, nas <a href="' . get_admin_url() . 'admin.php?page=_options&tab=0">opções do tema</a>.</p>';
  endif;
}

/**
*
* Change WordPress login logo
*
**/
$new_logo = foundation_q_get_option('website_logo_header');
if( isset( $new_logo ) && $new_logo['url'] != '' ):
function foundation_q_login_logo() {
  global $new_logo;
  $logo_src = $new_logo['url'];
  $logo_width = $new_logo['width'];
  $logo_height = $new_logo['height'];
  ?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url( <?php echo $logo_src; ?> );
      padding-bottom: 30px;
      width: <?php echo $logo_width . 'px'; ?>;
      height: <?php echo $logo_height. 'px'; ?>;
      background-size: <?php echo $logo_width . 'px '; echo $logo_height. 'px'; ?>;
    }
  </style>
  <?php
}
add_action( 'login_enqueue_scripts', 'foundation_q_login_logo' );
endif;

/**
*
* Add http:// to url string with no http://
*
**/

function foundation_q_addhttp($url) {
  if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
    $url = "http://" . $url;
  }
  return $url;
}

/**
*
* Newsletter register
*
**/

add_action("wp_ajax_foundation_q_newsletter_register_mail", "foundation_q_newsletter_register_mail");
add_action('wp_ajax_nopriv_foundation_q_newsletter_register_mail', 'foundation_q_newsletter_register_mail'); // Action para dar permissao a usuarios nao logados a execução do wp_ajax
function foundation_q_newsletter_register_mail() {
  $email = $_POST["email"];
  if( $email && $email != 'Seu email' ):
    // Criando o objeto do post
    $post = array(
      'post_title' => $email,
      'post_type' => 'qd_newsletter',
      'post_status' => 'private',
      );
    // Inserindo os dados no banco
    if( wp_insert_post($post) ):
      $result['type'] = "success";
      $result['message'] = '<strong>Obrigado!</strong> Email cadastrado com sucesso!';
    endif;
  else:
    // Campo em branco
    $result['type'] = "error";
    $result['message'] = 'Insira seu endereço de e-mail.';
  endif;

  // Ajax
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
    $result = json_encode($result);
    echo $result;
  else:
    header("Location: ".$_SERVER["HTTP_REFERER"]);
  endif;

  die();
}


/**
*
* Remove post formats support
*
**/

add_action('after_setup_theme', 'foundation_q_remove_post_formats', 11);
function foundation_q_remove_post_formats() {
  remove_theme_support('post-formats');
}


/**
*
* retrieves the attachment ID from the file URL
*
**/

function foundation_q_get_image_id($image_url) {
  global $wpdb;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
  return $attachment[0];
}


/**
*
* Listando posts como array
*
**/

function foundation_q_list_posts_as_array( $post_type, $tax, $tax_term ){
  $output = array();
  $output[0] = '';
  if ($tax && $tax_term) {
  $args = array(
    'post_type' => $post_type,
    'numberposts' => -1,
    'tax_query' => array(
    array(
      'taxonomy' => $tax,
      'field' => 'slug',
      'terms' => $tax_term
      )
    )
  );
  } else {
  $args = array(
    'post_type' => $post_type,
    'numberposts' => -1,
  );
  }

  $posts_data = get_posts( $args );

  if( $posts_data ):
  foreach( $posts_data as $post_data ):

    $post_id = $post_data->ID;
    $post_title = $post_data->post_title;
    $output[$post_id] = $post_title;

    endforeach;
  endif;

  return $output;
}

