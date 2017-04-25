<div class="form-group">
  <div class="col-sm-6 col-xs-12">
    <?php print theme('form_element_label', $vars); ?>
    <?php print $prefix . $vars['element']['#children'] . $suffix; ?>
    <?php if(!empty($vars['element']['#description'])): ?>
      <div class="col-sm-12">
        <?php print $vars['element']['#description']; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="clearfix"></div>
</div>