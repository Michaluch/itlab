<?php

/**
 * @file
 * Main view template.
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="col-md-3 col-sm-4 col-xs-12">
      <div class="list-group">
        <?php print $exposed; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content col-md-9 col-sm-8 col-xs-12 page-content">
    	<?php if (isset($current_filter_name)): ?>
    		<h1 class="text-center"><?php print $current_filter_name; ?></h1>
    	<?php else: ?>
    		<h1 class="text-center"><?php print t('All Catigories'); ?></h1>
    	<?php endif; ?>
    	
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-content col-md-9 col-sm-8 col-xs-12 page-content">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>

