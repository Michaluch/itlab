<?php

$plugin = array(
  'single' => TRUE,
  'title' => t('ITLab Custom Header Pane'),
  'description' => t('Provides Header for ITLab site'),
  'category' => t('Custom'),
  'render callback' => 'itlab_pane_header_pane_render',
);


/**
 * Run-time rendering of the body of the block (content type)
 * See ctools_plugin_examples for more advanced info
 */
function itlab_pane_header_pane_render($subtype, $conf, $args, $contexts) {

  $block = new stdClass();

  $main_menu = menu_tree('menu-main-site-menu');
  $user_menu = menu_tree('user-menu');
  $block->content = theme('custom_header_pane', array(
    'main_menu' => $main_menu,
    'user_menu' => $user_menu,
  ));
  
  return $block;
}

