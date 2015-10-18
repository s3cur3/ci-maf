<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php _e('Sorry, but the page you were trying to view does not exist.', 'ci-modern-accounting-firm'); ?>
</div>

<p><?php _e('It looks like this was the result of either:', 'ci-modern-accounting-firm'); ?></p>
<ul>
  <li><?php _e('a mistyped address', 'ci-modern-accounting-firm'); ?></li>
  <li><?php _e('an out-of-date link', 'ci-modern-accounting-firm'); ?></li>
</ul>

<?php get_search_form(); ?>
