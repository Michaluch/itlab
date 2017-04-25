<?php

function itlab_css_alter(&$css) {
  // Remove Drupal core css

  $exclude = array(
    'modules/aggregator/aggregator.css' => FALSE,
    'modules/block/block.css' => FALSE,
    'modules/book/book.css' => FALSE,
    'modules/comment/comment.css' => FALSE,
    'modules/dblog/dblog.css' => FALSE,
    'modules/field/theme/field.css' => FALSE,
    'modules/file/file.css' => FALSE,
    'modules/filter/filter.css' => FALSE,
    'modules/forum/forum.css' => FALSE,
    'modules/help/help.css' => FALSE,
    'modules/menu/menu.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/openid/openid.css' => FALSE,
    'modules/poll/poll.css' => FALSE,
    'modules/profile/profile.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/statistics/statistics.css' => FALSE,
    'modules/syslog/syslog.css' => FALSE,
    'modules/system/admin.css' => FALSE,
    'modules/system/maintenance.css' => FALSE,
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    'modules/system/system.base.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    'modules/system/system.theme.css' => FALSE,
    'modules/taxonomy/taxonomy.css' => FALSE,
    'modules/tracker/tracker.css' => FALSE,
    'modules/update/update.css' => FALSE,
    'modules/user/user.css' => FALSE,
    'misc/vertical-tabs.css' => FALSE,

    // Remove contrib module CSS
    drupal_get_path('module', 'views') . '/css/views.css' => FALSE, );
  $css = array_diff_key($css, $exclude);

}

/**
 * Add body classes if certain regions have content.
 */
function itlab_preprocess_html(&$variables) {
  
  global $user;
  $profile = profile2_load_by_user($user, 'student');
  $mapping = array(
    57 => 'c++',
    61 => 'net',
    63 => 'java',
    62 => 'python',
    60 => 'webui',
    53 => 'devops',
    // => 'ios'. 
    // => 'qa',
  );
  if ($profile) {
    $tech = array();
    $preferences = field_get_items('profile2', $profile, 'field_custom_profile_preferences');
    $technology = field_get_items('profile2', $profile, 'field_custom_profile_technology');
    $technologies = array_merge_recursive($preferences, $technology);
    foreach($technologies as $item => $value){
      $tech[] = $value['value'];
    }
    //$cur_tech = $mapping[$row->tid];
    //return !in_array($cur_tech, $tech);
  } else {
    //return FALSE;
  }
 /* if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }
*/
  drupal_add_css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('type' => 'external'));
  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
}


  
function itlab_preprocess_panels_pane(&$vars) {
  $classes = array_pop($vars['classes_array']);
  $vars['classes_array'] = array($classes);
  
  
  // User profile edit link
  $path = current_path();
  $path_alias = drupal_lookup_path('alias', $path);
  if ($path_alias !== null){
    $path = $path_alias;
  } 
  $pattern = 'user/*';
  
  if (drupal_match_path($path, $pattern)) {
    $vars['edit_profile_link'] = $path_alias . '/edit';
  }
}

function itlab_preprocess_block(&$variables) {
	
}

/**
 * Implements template_preprocess_HOOK() for theme_menu_tree().
 */
function itlab_menu_tree__user_menu($variables) {
	return '<ul class="menu nav navbar-nav navbar-right">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_form_element().
 */
function itlab_form_element($variables) {
  $element = &$variables['element'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add element #id for #type 'item'.
  if (isset($element['#markup']) && !empty($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  // Add element's #type and #name as class to aid with JS/CSS selectors.
  $attributes['class'] = array('form-item');
  // Bootstrap classes
  $attributes['class'][] = 'form-group';
  if (!empty($element['#type'])) {
    $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
  }
  if (!empty($element['#name'])) {
    $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
  }
  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }
  $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= '<div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";
  if (isset($element['#custom_theme'])) {
   return theme('form_field__' . $element['#custom_theme'], array(
     'vars' => $variables,
     'prefix' => $prefix,
     'suffix' => $suffix
   ));
  }
  return $output;
}

/**
 * Implements theme_fieldset().
 */

function itlab_fieldset($variables) {
  $element = $variables['element'];
  $output = '<div class="fieldset">';
  $output .= $element['#children'];
  if (isset($element['#value'])) {
    $output .= $element['#value'];
  }
  $output .= '</div>';
  return $output;
}

/**
 * Implements theme_textfield().
 */
function itlab_textfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'text';
  element_set_attributes($element, array('id', 'name', 'value', 'maxlength'));
  _form_set_class($element, array('form-text'));
  
  
  $extra = '';
  if ($element['#autocomplete_path'] && !empty($element['#autocomplete_input'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';

    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#autocomplete_input']['#id'];
    $attributes['value'] = $element['#autocomplete_input']['#url_value'];
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    
    // Bootstrap
    $element['#attributes']['class'][] = 'form-control';
    
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  return $output . $extra;
}

/**
 * Implements theme_form_element_label().
 */
function itlab_form_element_label($variables) {
  $element = $variables['element'];
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // If title and required marker are both empty, output no label.
  if ((!isset($element['#title']) || $element['#title'] === '') && empty($element['#required'])) {
    return '';
  }

  // If the element is required, a required marker is appended to the label.
  $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';

  $title = filter_xss_admin($element['#title']);
  
  $attributes = array();
  // Style the label as class option to display inline with the element.
  if ($element['#title_display'] == 'after') {
    $attributes['class'] = 'option';
  }
  // Show label only to screen readers to avoid disruption in visual flows.
  elseif ($element['#title_display'] == 'invisible') {
    $attributes['class'] = 'element-invisible';
  }

  if (!empty($element['#id'])) {
    $attributes['for'] = $element['#id'];
  }
  // Bootstrap
  if (!isset($attributes['class'])){
    $attributes['class'] = '';
  }
  
  // The leading whitespace helps visually separate fields from inline labels.
  return ' <label' . drupal_attributes($attributes) . '>' . $t('!title !required', array('!title' => $title, '!required' => $required)) . "</label>\n";
}

/**
 * Implements theme_select().
 */
function itlab_select($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'size'));
  _form_set_class($element, array('form-select'));
  
  return '<select' . drupal_attributes($element['#attributes']) . '>' . form_select_options($element) . '</select>';  
}
/**
 * Implements theme_password().
 */
function itlab_password($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'password';
  element_set_attributes($element, array('id', 'name', 'maxlength'));
  _form_set_class($element, array('form-text'));

  return '<input' . drupal_attributes($element['#attributes']) . ' />';
}


function itlab_menu_local_task($variables) {
  $link = $variables['element']['#link'];
  $link_text = $link['title'];
  if (empty($variables['element']['#active'])) {
    $link['localized_options']['attributes']['class'] = 'btn btn-default';
    return '<li >' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";
  }
}

function itlab_menu_local_tasks(&$variables) {
  $output = '';
  if (!empty($variables['primary']) || !empty($variables['secondary'])) {
    $output .= '<span>Actions:</span><ul>';
    if (!empty($variables['primary'])) {
      $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
      $output .= drupal_render($variables['secondary']);
    }
    $output .= '</ul>';
  }

  return $output;
}


function itlab_link($variables) {
  if ($variables['path'] === 'messages' && $variables['text'] === 'Messages' ) {
    $variables['text'] = '<i class="fa fa-user" aria-hidden="true"></i>' . $variables['text'];
    $variables['options']['html'] = TRUE;
  }
  if ($variables['path'] === 'user' && $variables['text'] === 'My account'){
    $variables['text'] = '<i class="fa fa-envelope" aria-hidden="true"></i>' . $variables['text'];
    $variables['options']['html'] = TRUE;
  }
  if ($variables['path'] === 'user/logout' && $variables['text'] === 'Logout'){
    $variables['text'] = '<i class="fa fa-sign-out" aria-hidden="true"></i>' . $variables['text'];
    $variables['options']['html'] = TRUE;
  }
  return '<a href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . '>' . ($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])) . '</a>';
}


function itlab_preprocess_views_view(&$vars) {
  $view = $vars['view'];
  global $user;
  //$vars['rows'] = 'Hello';
  if ($view->name === "knowledge_base"){
    if (isset($view->exposed_input) && isset($view->exposed_input['field_knowledge_scope_technology_tid'])){
      $term = taxonomy_term_load(filter_var( $view->exposed_input['field_knowledge_scope_technology_tid'], FILTER_SANITIZE_NUMBER_INT));
      $vars['current_filter_name'] = $term->name;
    }
  }
}


/**
 * Themes a select drop-down as a collection of links.
 *
 * @see http://api.drupal.org/api/function/theme_select/7
 *
 * @param array $vars
 *   An array of arrays, the 'element' item holds the properties of the element.
 *
 * @return string
 *   HTML representing the form element.
 */
function itlab_select_as_links($vars) {
  $element = $vars['element'];

  $output = '';
  $name = $element['#name'];

  // Collect selected values so we can properly style the links later.
  $selected_options = array();
  if (empty($element['#value'])) {
    if (!empty($element['#default_value'])) {
      $selected_options[] = $element['#default_value'];
    }
  }
  else {
    $selected_options[] = $element['#value'];
  }

  // Add to the selected options specified by Views whatever options are in the
  // URL query string, but only for this filter.
  $urllist = parse_url(request_uri());
  if (isset($urllist['query'])) {
    $query = array();
    parse_str(urldecode($urllist['query']), $query);
    foreach ($query as $key => $value) {
      if ($key != $name) {
        continue;
      }
      if (is_array($value)) {
        // This filter allows multiple selections, so put each one on the
        // selected_options array.
        foreach ($value as $option) {
          $selected_options[] = $option;
        }
      }
      else {
        $selected_options[] = $value;
      }
    }
  }

  // Clean incoming values to prevent XSS attacks.
  if (is_array($element['#value'])) {
    foreach ($element['#value'] as $index => $item) {
      unset($element['#value'][$index]);
      $element['#value'][check_plain($index)] = check_plain($item);
    }
  }
  elseif (is_string($element['#value'])) {
    $element['#value'] = check_plain($element['#value']);
  }

  // Go through each filter option and build the appropriate link or plain text.
  foreach ($element['#options'] as $option => $elem) {
    if (!empty($element['#hidden_options'][$option])) {
      continue;
    }
    // Check for Taxonomy-based filters.
    if (is_object($elem)) {
      $slice = array_slice($elem->option, 0, 1, TRUE);
      list($option, $elem) = each($slice);
    }

    // Check for optgroups.  Put subelements in the $element_set array and add
    // a group heading. Otherwise, just add the element to the set.
    $element_set = array();
    if (is_array($elem)) {
      $element_set = $elem;
    }
    else {
      $element_set[$option] = $elem;
    }

    $links = array();
    $multiple = !empty($element['#multiple']);

    // If we're in an exposed block, we'll get passed a path to use for the
    // Views results page.
    $path = '';
    if (!empty($element['#bef_path'])) {
      $path = $element['#bef_path'];
    }

    foreach ($element_set as $key => $value) {
      $element_output = '';
      // Custom ID for each link based on the <select>'s original ID.
      $id = drupal_html_id($element['#id'] . '-' . $key);
      $elem = array(
        '#id' => $id,
        '#markup' => '',
        '#type' => 'bef-link',
        '#name' => $id,
      );

      $link_options = array();
      // Add "active" class to the currently active filter link.
      $link_options['attributes'] = array('class' => array('list-group-item'));
      if (in_array((string) $key, $selected_options)) {
        // active on ajax only
        if ($urllist['path'] === '/views/ajax'){
          $link_options['attributes']['class'][] = 'active';
        }
      }
      $url = bef_replace_query_string_arg($name, $key, $multiple, FALSE, $path);
      $elem['#children'] = l($value, $url, $link_options);
      if (isset($element['#custom_theme'])) {
        $elem['#custom_theme'] = $element['#custom_theme'];
      }
      $element_output = theme('form_element', array('element' => $elem));
      
      if (!empty($element['#settings']['combine_param']) && $element['#name'] == $element['#settings']['combine_param'] && !empty($element['#settings']['toggle_links'])) {
        $sort_pair = explode(' ', $key);
        if (count($sort_pair) == 2) {
          // Highlight the link if it is the selected sort_by (can be either
          // asc or desc, it doesn't matter).
          if (strpos($selected_options[0], $sort_pair[0]) === 0) {
            $element_output = str_replace('form-item', 'form-item selected', $element_output);
          }
        }
      }
      $output .= $element_output;

    }
  }

  $properties = array(
    '#description' => isset($element['#bef_description']) ? $element['#bef_description'] : '',
    '#children' => $output,
  );

  $output = '<div class="bef-select-as-links">';
  $output .= theme('form_element', array('element' => $properties));

  // Add attribute that hides the select form element.
  $vars['element']['#attributes']['style'] = 'display: none;';
  $output .= theme('select', array('element' => $vars['element']));
  if (!empty($element['#value'])) {
    if (is_array($element['#value'])) {
      foreach ($element['#value'] as $value) {
        $output .= '<input type="hidden" class="bef-new-value" name="' . $name . '[]" value="' . $value . '" />';
      }
    }
    else {
      $output .= '<input type="hidden" class="bef-new-value" name="' . $name . '" value="' . $element['#value'] . '" />';
    }
  }
  $output .= '</div>';

  return $output;
}

function itlab_preprocess_field(&$variables) {
  if($variables['element']['#field_name'] == 'field_knowledge_scope_technology') {
    $tid = $variables['element']['#items']['0']['tid'];
    $variables['link'] = l($variables['element'][0]['#markup'], '/knowledge-base', array(
      'query' => array(
        'field_knowledge_scope_technology_tid' => $tid,
      ),
    ));
  } elseif ($variables['element']['#field_name'] == 'field_knowledge_scope_item') {
      $custom_vars = array();
      foreach ($variables['items'] as $item) {
          $custom_var = array();
          $collection_id = key($item['entity']['field_collection_item']);
          $collection = field_collection_item_load($collection_id);
          $field_items = field_get_items('field_collection_item', $collection, 'field_knowledge_item_title');
          if ($field_items){
              $custom_var['title'] = field_view_value('field_collection_item', $collection, 'field_knowledge_item_title', $field_items[0]);
          }
          $field_items = field_get_items('field_collection_item', $collection, 'field_knowledge_item_book');
          if ($field_items) {
              $fc_ids = field_collection_field_item_to_ids($field_items);
              $fc_items = field_collection_item_load_multiple($fc_ids);
              $custom_var['books'] = array();
              foreach($fc_items as $fc){
                  $book_item = array();
                  $field_file_items = field_get_items('field_collection_item', $fc, 'field_knowledge_item_book_file');
                  $field_note_items = field_get_items('field_collection_item', $fc, 'field_knowledge_item_book_note');
                  if ($field_file_items) {
                      $book_file = field_view_value('field_collection_item', $fc, 'field_knowledge_item_book_file', $field_file_items[0]);
                      $book_item['file'] = $book_file;
                  }
                  if ($field_note_items) {
                      $book_note = field_view_value('field_collection_item', $fc, 'field_knowledge_item_book_note', $field_note_items[0]);
                      $book_item['note'] = $book_note;
                  }
                  $custom_var['books'][] = $book_item;
              }
          }
          $field_items = field_get_items('field_collection_item', $collection, 'field_knowledge_item_link');
          if ($field_items){
              foreach($field_items as $field_item){
                  $custom_var['links'][] = field_view_value('field_collection_item', $collection, 'field_knowledge_item_link', $field_item);
              }
          }
          $custom_vars[] = $custom_var;
      }
      $variables['custom_vars'] = $custom_vars;
  }

}


function itlab_preprocess_entity(&$variables) {
  if ($variables['entity_type'] === 'field_collection_item'){
    switch($variables['elements']['#bundle']){
      case 'field_knowledge_scope_item':
        $variables['classes_array'] = array();
        $custom_vars = array();
        $custom_vars['profile_view'] = false;
        $fc_entity = $variables['elements']['#entity'];
        if (isset($variables['content']['field_knowledge_item_title'])){
          $field_items = field_get_items('field_collection_item', $fc_entity, 'field_knowledge_item_title');
          if ($field_items){
            $custom_vars['title'] = field_view_value('field_collection_item', $fc_entity, 'field_knowledge_item_title', $field_items[0]);
          }
        }
        $cur_page = page_manager_get_current_page();
        if ($cur_page['name'] === 'user_view'){
            $custom_vars['profile_view'] = true;
            $custom['nid'] = $fc_entity->hostEntityId();
        }
        
        $variables['custom_vars'] = $custom_vars;
        break;
    }
  }
}
