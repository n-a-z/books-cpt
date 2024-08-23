<?php get_header(); ?>
<?php

$args = array(
    'post_type' => 'books',
    'name'      => get_post_field('post_name', get_post()),
    'post_status' => 'publish',
);

$book_query  = new WP_Query($args);
?>

<?php if ($book_query->have_posts()) : while ($book_query->have_posts()) : $book_query->the_post(); ?>

        <div class="book-single section-inner">
            <h1><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()) : ?>
                <div class="book-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="book-genre">
                <strong><?php esc_html_e('Genre:', 'your-text-domain'); ?></strong>
                <?php
                $terms = get_the_terms(get_the_ID(), 'genre');
                if ($terms && ! is_wp_error($terms)) :
                    foreach ($terms as $term) {
                        echo '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a>';
                    }
                endif;
                ?>
            </div>

            <div class="book-date">
                <strong><?php esc_html_e('Published on:', 'your-text-domain'); ?></strong>
                <?php echo get_the_date(); ?>
            </div>

            <div class="book-content">
                <?php the_content(); ?>
            </div>
        </div>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>