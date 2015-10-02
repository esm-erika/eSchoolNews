<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div id="<?php the_slug(); ?>" class="reveal-modal" data-reveal aria-labelledby="<?php the_slug(); ?>" aria-hidden="true" role="dialog">
  <h2 id="<?php the_slug(); ?>"><?php the_title(); ?></h2>
  <?php the_content(); ?>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>