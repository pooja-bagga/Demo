<?php get_header(); ?>

<!-- Post -->
<div <?php post_class(''); ?> id="post-<?php the_ID(); ?>" >
    <div class="container">
        <div class="section">
            <?php while (have_posts()) : the_post(); ?>
                <div class="section">
                    <div class="post_description">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php wp_link_pages(); ?>
            <?php endwhile; // Loop End   ?>
        </div>
    </div>
</div>
<!-- Post :: END -->	  


<?php get_footer(); ?>	