<?php if (isset($custom_vars)): ?>
    <?php if ($custom_vars['profile_view'] ==  true): ?>
        <?php if (isset($custom_vars['title'])): ?>
    	    <?php print render($custom_vars['title']); ?>
	    <?php endif; ?>
    <?php else: ?>
        
    	  <?php if (isset($custom_vars['title'])): ?>
    	    <h4><?php print render($custom_vars['title']); ?></h4>
    	  <?php endif; ?>
    	  <?php if (isset($custom_vars['links']) || isset($custom_vars['books'])): ?>
    	  	<?php if (!empty($custom_vars['links']) || !empty($custom_vars['books'])): ?>
    	  		<div class="source">
          		<?php if(isset($custom_vars['books'])): ?>
          			<?php foreach($custom_vars['books'] as $book): ?>		
          				<div class="book">
            				<?php if (isset($book['file'])): ?>
            					<div class="book-file">
            						<?php print render($book['file']); ?>
            					</div>
            				<?php endif; ?>
            				<?php if (isset($book['note']) && !empty($book['note'])): ?>
            					<div class="book-note">
            						<?php print render($book['note']); ?>
            				  </div>
            				<?php endif; ?>
          				</div>
          			<?php endforeach; ?>
          		<?php endif; ?>
          		<?php if(isset($custom_vars['links'])): ?>
          			<?php foreach($custom_vars['links'] as $link): ?>
          				<div class="link">
          					<?php print render($link); ?>
          				</div>
          			<?php endforeach; ?>
        			<?php endif; ?>
      			</div>	
    			<?php endif; ?>
    		<?php endif; ?>
   
    <?php endif; ?>
<?php endif; ?>