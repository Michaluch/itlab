<?php

/**
 * @file
* Default simple view template to all the fields as a row.
*
*
* @ingroup views_templates
*/
?>

<div class="category-item">
	<?php if (isset($fields['field_knowledge_scope_icon'])): ?>
    <div class="col-md-1 col-xs-12 category-item__avatar">
      <a href="#"><?php print $fields['field_knowledge_scope_icon']->content; ?></a>
    </div>
  <?php endif; ?>
  <div class="col-md-11 col-xs-12">
    <div class="category-item__title ">
    	<?php print $fields['title']->content; ?>
    	<?php if (isset($fields['field_knowledge_scope_option'])): ?>
    		<?php print $fields['field_knowledge_scope_option']->content; ?>
    	<?php endif; ?>
      <div class="clearfix"></div>
  	</div>
  	<?php if (isset($fields['field_knowledge_scope_desc'])): ?>
  		<?php print $fields['field_knowledge_scope_desc']->content; ?>
  	<?php endif; ?>
	</div>
	<div class="clearfix"></div>
</div>