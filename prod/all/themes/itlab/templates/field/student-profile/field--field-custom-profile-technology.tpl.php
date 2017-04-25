<tr>
  <?php if (!$label_hidden): ?>
    <th><?php print $label ?></th>
  <?php endif; ?>
  <td>
    <ul>
      <?php foreach ($items as $delta => $item): ?>
        <li><?php print render($item); ?></li>
      <?php endforeach; ?>
    </ul>
  </td>
</tr>