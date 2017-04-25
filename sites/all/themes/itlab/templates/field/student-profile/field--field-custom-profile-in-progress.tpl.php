<tr>
  <?php if (!$label_hidden): ?>
    <th><?php print $label ?></th>
  <?php endif; ?>
  <td>
      <?php foreach ($items as $delta => $item): ?>
        <div class="item-in-progress" item-delta="<?php print $delta; ?>">
            <?php print render($item); ?>
            <a href="#" class="btn btn-warning done">Вивчено</a>
        </div>
      <?php endforeach; ?>

   </td>
</tr>