
<?php

/**
 * @file
* Default simple view template to all the fields as a row.
*/
?>
<dd class="<?php print ($zebra === 'odd') ? 'pos-right' : 'pos-left'; ?> clearfix">
	<div class="circ"></div>
	<?php if (isset($fields['field_event_start'])): ?>
	  <div class="time"><?php print $fields['field_event_start']->content; ?></div>
  <?php endif; ?>
  <div class="events">
  	<?php if (isset($fields['field_event_image'])): ?>
	  	<div class="pull-left">
		  	<?php print $fields['field_event_image']->content; ?>
	  	</div>
	  <?php endif; ?>
	  <?php if (isset($fields['field_event_description']) || isset($fields['title'])): ?>
	  	<div class="events-body">
	  		<?php if (isset($fields['title'])): ?>
		  		<h4 class="events-heading"><?php print $fields['title']->content; ?></h4>
		  	<?php endif; ?>
		  	<?php if (isset($fields['field_event_description'])): ?>
		  		<?php print $fields['field_event_description']->content; ?>
	  		<?php endif; ?>
	  		<?php if (isset($fields['field_event_link'])): ?>
	  			<?php print $fields['field_event_link']->content; ?>
	  		<?php endif; ?>
	  	</div>
	  <?php endif; ?>
  </div>
</dd>