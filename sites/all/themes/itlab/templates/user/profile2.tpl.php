<?php

/**
 * @file
 * Default theme implementation for profiles.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<?php print render($content); ?>
<script>
  (function($){
	  $(document).ready(function(){
		  $('.done').click( function(e){
			  e.stopPropagation();
			  e.preventDefault();
			  var n = $(this).parents('.item-in-progress').attr('item-delta');
			  $.post('/action/done', {
				  delta: n,
			 }, function(){
				 location.reload();
			});
			 return false;
		  });
		 $('.verify-english').click(function(e){
		 	e.stopPropagation();
			e.preventDefault();
			$.get('/action/english-request', function(res){
				alert(res.data);
		 		location.reload();
			});
		 });
	  });
  }(jQuery));
</script>
<div class="modal fade" id="check-level" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Запит на перевірку рівня англійської від SoftServe</h4>
        </div>
        <div class="modal-body">
            <p>Перевірка рівня здійснюється згідно стандартів Мовної школи SoftServe</p>
            <strong>Надіслати запит на перевірку?</strong>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Скасувати</button>
            <button type="button" class="btn btn-primary verify-english">Надіслати запит</button>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
