<tr>
  <?php if (!$label_hidden): ?>
    <th><?php print $label ?></th>
  <?php endif; ?>
  <td>
      <?php foreach ($items as $delta => $item): ?>
        <?php print render($item); ?>
      <?php endforeach; ?>

   </td>
</tr>