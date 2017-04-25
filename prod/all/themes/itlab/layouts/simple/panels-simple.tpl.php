<?php
/**
 * @file
 * Template for a simple panel layout.
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   $content['middle']: The only panel in the layout.
 */
?>

<?php print $content['header']; ?>
<?php print $content['content']; ?>
<?php print $content['footer']; ?>
