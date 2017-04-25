<div class="form-group">
  <div class="col-sm-5">
  	<?php print theme('form_element_label', $vars); ?>
  </div>
  <div class="col-sm-7">
  	<?php print $prefix . $vars['element']['#children'] . $suffix; ?>
  </div>
  <?php if(!empty($vars['element']['#description'])): ?>
  	<div class="col-sm-12">
  	  <?php print $vars['element']['#description']; ?>
  	</div>
  <?php endif; ?>
  <div class="clearfix"></div>
</div>