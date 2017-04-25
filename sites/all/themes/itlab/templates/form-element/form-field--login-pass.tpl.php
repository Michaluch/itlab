<div class="form-group">
  <?php print theme('form_element_label', $vars); ?>
  <a href="/user/password" class="pull-right">Forgot?</a>
  <?php print $prefix . $vars['element']['#children'] . $suffix; ?>
</div>