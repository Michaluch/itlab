<div class="col-md-3 col-sm-4 col-xs-12">
  <div class="text-center">
    <h3><?php print $form['#user']->name; ?></h3>
  </div>
  
  <div class="thumbnail">
  	<?php if (isset($form['picture'])): ?>
    	<?php print render($form['picture']); ?>
    <?php else: ?>
    	<?php print theme('user_picture', array('account' => $form['#user'], 'style_name' => 'profile_250x250')) ?>
    <?php endif; ?>
  </div>
  
  <div class="list-group">
    <a class="list-group-item" href="/user/<?php print $form['#user']->uid;?>"><i class="fa fa-cog" aria-hidden="true"></i> My profile</a>
    <a class="list-group-item" href="/messages"><i class="fa fa-user" aria-hidden="true"></i> Messages</a>
  </div>
</div>
<div class="col-md-9 col-sm-8 col-xs-12">
  <div class="profile-header">
    <h3 class="pull-left">Profile</h3>
  	<div class="btn-group action-links pull-right" role="group">
    	<a class="btn btn-warning" href="/user/<?php print $form['#user']->uid;?>">View profile</a>
      <a class="btn <?php print !isset($form['profile_student']) ? 'btn-primary' : 'btn-warning'?>" href="/user/<?php print $form['#user']->uid;?>/edit">Settings</a>
      <a class="btn <?php print isset($form['profile_student']) ? 'btn-primary' : 'btn-warning'?>" href="/user/<?php print $form['#user']->uid;?>/edit/student">Edit info</a>
    </div>
  	<div class="clearfix"></div>
  </div>
  <div class="page-content row">
  	<?php print drupal_render_children($form); ?>
	</div>
</div>