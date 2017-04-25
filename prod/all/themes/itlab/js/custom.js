(function($){
	Drupal.behaviors.aplly_recipients = {
	  attach: function (context, settings) {
	    var recipients = [];
	    $('.view-content').find('a').each(function(k, e){
	      var $e = $(e);
	      recipients.push($e.text());
	    });
	    $('#edit-recipient').val(recipients.join(', '));
	  }
	};
}(jQuery));