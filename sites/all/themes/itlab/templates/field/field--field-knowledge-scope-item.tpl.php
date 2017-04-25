<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 */
?>
<?php foreach ($custom_vars as $delta => $item): ?>
    <div class="panel knowladge-item-cont panel-default" item-delta="<?php print $delta; ?>">
        <div class="panel-heading">
            <?php if (isset($item['title'])): ?>
                <h3 class="panel-title accordion-toggle pull-left"><?php print render($item['title']); ?></h3>
            <?php endif; ?>
            <button class="pull-right btn btn-xs btn-primary start-learn">Почав читати</button>
            <div class="clearfix"></div>
        </div>
        <?php if (isset($item['links']) || isset($item['books']) ): ?>
        <ul class="list-group">
            <?php if (isset($item['books'])): ?>
              <?php foreach ($item['books'] as $book): ?>
                <li class="list-group-item">
                    <?php if (isset($book['file'])): ?>
                        <?php print render($book['file']); ?>
                    <?php endif; ?>
                    <?php if (isset($book['note'])): ?>
                        <span class="badge"><?php print render($book['note']); ?></span>
                    <?php endif; ?>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if (isset($item['links'])): ?>
                <?php foreach ($item['links'] as $links): ?>
                    <li class="list-group-item"><?php  print render($links); ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </div>
<?php endforeach; ?>