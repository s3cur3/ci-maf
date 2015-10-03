<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="entry-content"><?php
            $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), CI_FULL_WIDTH_WITH_SIDEBAR_IMG);
            $thumbnail = $post_thumb[0];
            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(2048, 2048))[0];

            if ($thumbnail != NULL) {
                ?>
                <div class="featured-img">
                <a class="featured-img" href="<?php echo $large_image_url; ?>" title="<?php the_title_attribute(); ?>" rel="prettyPhoto[<?php echo $post->ID; ?>]">
                    <img class="mb10" src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>"
                         width="<?php echo $post_thumb[1]; ?>" height="<?php echo $post_thumb[2]; ?>"/>
                </a>
                <?php fia_featured_img_attribution(); ?>
                </div><?php
            }

            the_content(); ?>
        </div>
        <?php get_template_part('templates/entry-meta'); ?>
        <div class="clr"></div>
        <?php comments_template('/templates/comments.php'); ?>
    </article>
<?php endwhile; ?>
