<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Simple'),
  'category' => t('Custom'),
  'icon' => 'Simple.png',
  'theme' => 'panels_simple',
  'css' => 'simple.css',
  'regions' => array(
  	'header' => t('Header'),
  	'content' => t('Content'),
  	'footer' => t('Footer'),
  ),
);
