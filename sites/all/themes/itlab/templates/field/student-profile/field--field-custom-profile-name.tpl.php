<tr>
  <?php if (!$label_hidden): ?>
    <th><?php print $label ?></th>
  <?php endif; ?>
  <?php foreach ($items as $delta => $item): ?>
    <td><?php print render($item); ?></td>
  <?php endforeach; ?>
</tr>