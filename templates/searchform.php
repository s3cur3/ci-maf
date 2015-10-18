<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'ci-modern-accounting-firm'); ?> <?php get_bloginfo('name'); ?>">
        <label class="hide"><?php _e('Search for:', 'ci-modern-accounting-firm'); ?></label>
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default"><?php _e('Search', 'ci-modern-accounting-firm'); ?></button>
    </span>
    </div>
</form>
