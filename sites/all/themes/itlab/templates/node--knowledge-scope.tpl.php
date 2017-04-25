<?php

/**
 * @file
 * Node Template.
 *
 */
?>
<div class="container bg-white ">
	<h2><?php print $title; ?></h2>
  <div id="nid-<?php print $node->nid; ?>" class="content-knowledge clearfix"<?php print $content_attributes; ?>>
  	<?php if (isset($content['body'])): ?>
      <?php print render($content['body']); ?>
    <?php endif; ?>
    
    <?php if (isset($content['field_knowledge_scope_item'])): ?>
			<?php print render($content['field_knowledge_scope_item']); ?>
		<?php endif; ?>
    
  	<?php if (isset($content['field_knowledge_scope_technology'])): ?>
			<?php print render($content['field_knowledge_scope_technology']); ?>
		<?php endif; ?>
  </div>
</div>
<script>
  (function($){
	  $(document).ready(function(){
		  var nid = $('.content-knowledge').attr('id').match(/\d+/)[0];
		  $('.start-learn').click( function(e){
			  e.stopPropagation();
			  e.preventDefault();
			  var n = $(this).parents('.knowladge-item-cont').attr('item-delta');
			  $.post('/action/start', {
				  delta: n, 
				  nid: nid
			 }, function(){
			     location.reload();
		     });
			 return false;
		  });
	  });
  }(jQuery));
</script>