<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="form-div">
        <label>
            <span class="screen-reader-text"><?php echo esc_html('Search for:', 'blog-reflection'); ?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr('Search …', 'blog-reflection'); ?>" value="<?php echo esc_html(get_search_query()); ?>" name="s" />
        </label>
        <button type="submit" class="search-submit"><?php echo esc_html('Search', 'blog-reflection'); ?></button>
    </div>
</form>