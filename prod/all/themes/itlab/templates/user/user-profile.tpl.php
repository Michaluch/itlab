<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 */
?>
<div class="profile container bg-white"<?php print $attributes; ?>>
	<div class="col-md-3 col-sm-4 col-xs-12">
		<div class="text-center"><h3><?php print $elements['#account']->name; ?></h3></div>
    <?php print render($user_profile['user_picture']); ?>
    <div class="list-group">
			<a class="list-group-item" href="/user/<?php print $elements['#account']->uid; ?>/edit/student"><i class="fa fa-cog" aria-hidden="true"></i> My profile</a>
			<a class="list-group-item" href="/messages"><i class="fa fa-user" aria-hidden="true"></i> Messages</a>
		</div>
  </div>
  <div class="col-md-9 col-sm-8 col-xs-12">
  	<div class="profile-header">
    	<h3 class="pull-left">Profile</h3>
      <div class="btn-group action-links pull-right" role="group">
      	<a class="btn btn-warning" href="/user/<?php print $elements['#account']->uid; ?>/edit">Edit profile</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="page-content">
    	<table class="table">
  		  <?php print render($user_profile['profile_student']); ?>
  		</table>
  	</div>
  </div>
</div>
