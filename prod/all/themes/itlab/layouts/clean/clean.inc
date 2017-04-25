<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Clean No-Wrapp'),
  'category' => t('Custom'),
  'icon' => 'clean.png',
  'theme' => 'panels_clean',
  'css' => 'clean.css',
  'regions' => array(
  	'content' => t('Content'),
  ),
);
