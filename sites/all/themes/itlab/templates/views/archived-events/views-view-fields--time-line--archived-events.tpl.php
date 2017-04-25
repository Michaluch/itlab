<?php

/**
 * @file
* Default simple view template to display a list of rows.
*
* @ingroup views_templates
*/
?>
<div class="events">
    <?php if (isset($fields['field_event_image'])): ?>
	  	<div class="pull-left">
		  	<?php print $fields['field_event_image']->content; ?>
	  	</div>
	  <?php endif; ?>
	  <?php if (isset($fields['title']) || isset($fields['field_event_start'])): ?>
      <div class="events-body">
      		<?php if (isset($fields['title'])): ?>
  		  		<h4 class="events-heading"><?php print $fields['title']->content; ?></h4>
  		  	<?php endif; ?>
  				<?php if (isset($fields['field_event_start'])): ?>
  		  		<div class="time"><?php print $fields['field_event_start']->content; ?></div>
  		  	<?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($fields['field_event_description'])): ?>
    	<?php print $fields['field_event_description']->content; ?>
    <?php endif; ?>
</div>