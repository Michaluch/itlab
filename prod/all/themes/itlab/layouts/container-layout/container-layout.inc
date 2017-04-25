<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Container'),
  'category' => t('Custom'),
  'icon' => 'container.png',
  'theme' => 'panels_container-layout',
  'css' => 'container.css',
  'regions' => array(
  	'content' => t('Content'),
  ),
);
