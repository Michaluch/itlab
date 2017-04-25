<div class="form-element">
  <?php print theme('form_element_label', $vars); ?>
  <?php print $prefix . $vars['element']['#children'] . $suffix; ?>
  <?php if(!empty($vars['element']['#description'])): ?>
  	<?php print $vars['element']['#description']; ?>
  <?php endif; ?>
</div>