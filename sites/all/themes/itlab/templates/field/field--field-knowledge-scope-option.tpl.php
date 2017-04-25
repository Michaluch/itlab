<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 *
 * @ingroup themeable
 */
?>
<?php foreach ($items as $delta => $item): ?>
  <span class="label label-warning pull-right"><?php print render($item); ?></span>
<?php endforeach; ?>