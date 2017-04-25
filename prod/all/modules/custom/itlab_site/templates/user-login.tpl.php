<?php if (isset($form['name'])): ?>
	<?php print render($form['name']); ?>
<?php endif; ?>
<?php if (isset($form['pass'])): ?>
  <?php print render($form['pass']); ?>
<?php endif; ?>
<div class="bottom-form-action">
    <?php print drupal_render_children($form); ?>
</div>
    