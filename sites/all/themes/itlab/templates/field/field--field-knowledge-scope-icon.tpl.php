<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 *
 * @ingroup themeable
 */
?>
<?php foreach ($items as $delta => $item): ?>
  <?php print render($item); ?>
<?php endforeach; ?>