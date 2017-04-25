<tr>
  <?php if (!$label_hidden): ?>
    <th><?php print $label ?></th>
  <?php endif; ?>
  <?php foreach ($items as $delta => $item): ?>
    <td>
    	<?php print render($item); ?>
    	<button class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#check-level">Verify my level</button>
    </td>
  <?php endforeach; ?>
</tr>