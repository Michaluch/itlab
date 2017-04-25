<?php
/**
 * @file
 *
 * Theme implementation to display the messages area, which is normally
 * included roughly in the content area of a page.
 *
 * This utilizes the following variables that are normally found in
 * page.tpl.php:
 * - $tabs
 * - $messages
 * - $help
 *
 * The $action_links is loaded from CTools and is a cleaned up version of the
 * core functionality.
 *
 * Additional items can be added via theme_preprocess_pane_messages(). See
 * template_preprocess_pane_messages() for examples.
 */
?>

<?php if (!empty($messages)): ?>
  <div class="container">
    <div class="row">
  	  <div class="alert alert-success alert-dismissible" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <div class="alert alert-success">
	        <?php print $messages; ?>
	      </div>
	    <?php if (!empty($help)): ?><?php print $help; ?><?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>