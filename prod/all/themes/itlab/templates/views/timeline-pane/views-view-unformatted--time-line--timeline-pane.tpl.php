<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="text-center">
  	<h3><?php print t('Coming events'); ?></h3>
</div>
<div class="timeline">
	<dl>
		<?php foreach ($rows as $id => $row): ?>
		  <?php print $row; ?>
		<?php endforeach; ?>
	</dl>
</div>