<div class="text-center">
  <h3>Restore password</h3>
</div>
<?php if (isset($form['name'])): ?>
  <?php print render($form['name']); ?>
<?php endif; ?>
<div class="bottom-form-action">
    <?php print drupal_render_children($form); ?>
</div>
    