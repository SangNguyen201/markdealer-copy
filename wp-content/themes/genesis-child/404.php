<?php
// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'genesis_404' );
function genesis_404() {
   echo do_shortcode('[404_shortcode]');
}

genesis();