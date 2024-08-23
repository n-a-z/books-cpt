<?php
get_header();

if (have_posts()) : ?>

    <div class="genre-page section-inner">
        <h1><?php echo single_term_title(); ?></h1>
        <div class="books-list">

            <?php while (have_posts()) : the_post(); ?>
                <div class="book-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <!-- Book Thumbnail -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="book-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php the_excerpt(); ?>
                </div>
            <?php endwhile; ?>

        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'prev_text' => __('« Previous'),
                'next_text' => __('Next »'),
            ));
            ?>
        </div>
    </div>

<?php else : ?>
    <p>No books found in this genre.</p>
<?php endif;

get_footer();
