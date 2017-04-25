<div class="form-group">
  <?php print $prefix . $vars['element']['#children'] . $suffix; ?>
  <?php if(!empty($vars['element']['#description'])): ?>
  	<div class="col-sm-12">
  	  <?php print $vars['element']['#description']; ?>
  	</div>
  <?php endif; ?>
  <div class="clearfix"></div>
</div>