<?php

/**
 * @file
 * Custom simple view template to all the fields as a row.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($fields as $id => $field): ?>
  <?php print $field->content; ?>
<?php endforeach; ?>