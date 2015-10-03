<?php
/*
Default blog template
If you use the WP backend to set a page as your "Posts" page (similarly to the way you set a static front page),
this is the template that will apply. (It's identical to template-blog.php)
*/
?>

<!-- index.php -->
<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'blog'); ?>
