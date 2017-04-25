<?php

/**
 * @file
* Main view template.
*/
?>
<div class="col-md-3 col-xs-12 archived-events">

	<div class="text-center">
    <h3><?php print t('Archive'); ?></h3>
  </div>

  <?php if ($rows): ?>
    <?php print $rows; ?>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>
</div>