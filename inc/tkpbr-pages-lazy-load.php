<?php
/**
 * Lazy Load functions
 */
function filter_lazy_load_callback( $parts ) {
  // add empty class attribute if no existing class attribute
  $class_attr = '';
  
  if ( !preg_match( '/class\s*=\s*"/i', $parts[0] ) ) {
    $class_attr = 'class="" ';
  }
  // rename original src attribute to "data-src"
  $replacement = $parts[1] . $class_attr . 'data-src' . substr( $parts[2], 3 ) . $parts[3];
  
  // add "lazy" class to existing class attribute
  $replacement = preg_replace( '/class\s*=\s*"/i', 'class="lazy ', $replacement );
  // rename original srcset attribute to "data-srcset"
  $replacement = preg_replace( '/srcset\s*=\s*"/i', 'data-srcset="', $replacement );
  
  // add noscript fallback with the original img
  $replacement .= '<noscript>' . $parts[0] . '</noscript>';
  return $replacement;
}

function filter_img_lazy_load( $content ) {
  if ( ! is_page() || is_attachment() || is_page( 'especiais' ) ) {
    return $content;
  }
  return preg_replace_callback( '/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'filter_lazy_load_callback', $content );
}
add_filter( 'the_content', 'filter_img_lazy_load' );
?>