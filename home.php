<?php get_header(); ?>    
<?php get_template_part( 'template-parts/site-nav' );?>

<main>
    <section>
        <div class="wrap">
            <h1><?php echo get_the_title( get_option('page_for_posts') ); ?></h1>
            <?php if ( have_posts() ) : ?>
                <div class="post-grid">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article <?php post_class('post-card'); ?>>

                            <a href="<?php the_permalink(); ?>" class="post-card__link" aria-hidden="true" tabindex="-1">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array(
                                        'class' => 'post-card__img',
                                        'loading' => 'lazy',
                                    ) ); ?>
                                <?php else : ?>
                                    <div class="post-card__img post-card__img--placeholder"></div>
                                <?php endif; ?>
                            </a>

                            <div class="post-card-content">
                                <time class="post-card-date" datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>

                                <h2 class="post-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <div class="post-card-description">
                                    <?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
                                </div>
                                <div class="post-card-button">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-ghost">
                                        Read More
                                        <span aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>

                        </article>
                    <?php endwhile; ?>
                </div>

                <?php the_posts_pagination(); ?>

            <?php else : ?>
                <div class="no-posts">
                    <p>No posts found.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>