<?php get_header(); ?>
<?php get_template_part( 'template-parts/site-nav' ); ?>

<main>
    <section>
        <div class="wrap">

            <a href="<?php echo esc_url( get_permalink( get_option('page_for_posts') ) ); ?>" class="back-to-blog">
                &larr; Wróć do spisu treści
            </a>

            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class('single-post'); ?>>

                    <div class="single-post-header">

                        <h1 class="single-post-title"><?php the_title(); ?></h1>

                        <?php
                        if ( function_exists('get_field') ) {
                            $subtitle = get_field('subtitle');
                            if ( $subtitle ) {
                                echo '<p class="single-post-subtitle">' . esc_html( $subtitle ) . '</p>';
                            }
                        }
                        ?>
                        <div class="single-post-meta">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </div>
                    </div>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="single-post-thumb">
                            <?php the_post_thumbnail( 'small' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    $tags = get_the_tags();
                    if ( $tags ) : ?>
                        <div class="single-post-tags">
                            <?php foreach ( $tags as $tag ) : ?>
                                <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tag-pill">
                                    #<?php echo esc_html( $tag->name ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </article>

                <nav class="single-post-nav">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    <?php if ( ! empty( $prev_post ) ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="post-nav-link post-nav-prev">
                            <span class="post-nav-label">&larr; Previous</span>
                            <span class="post-nav-title"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
                        </a>
                    <?php else : ?>
                        <span></span>
                    <?php endif; ?>

                    <?php if ( ! empty( $next_post ) ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="post-nav-link post-nav-next">
                            <span class="post-nav-label">Next &rarr;</span>
                            <span class="post-nav-title"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
                        </a>
                    <?php endif; ?>
                </nav>

            <?php endwhile; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>