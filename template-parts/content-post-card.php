<?php
$category = get_the_category();
?>

<article <?php post_class( 'blog-card' ); ?>>
    <a class="post-card-href" href="<?php the_permalink(); ?>" data-cat="video">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', array(
                'class' => 'post-card__img',
                'loading' => 'lazy',
            ) ); ?>
        <?php else : ?>
            <div class="blog-thumb"></div>
        <?php endif; ?>
        <div class="blog-card-body">
            <div>
                <div class="blog-tags">
                    <?php if (!empty($category)) : ?>
                        <?php foreach ($category as $cat) : ?>
                            <span class="tag-sm">
                                <?php echo esc_html($cat->name); ?>
                            </span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <h3><?php the_title(); ?></h3>
                <p>
                    <?php echo wp_trim_words( get_the_excerpt(), 25 ); ?>
                </p>
            </div>
            <div class="meta-row">
                <span><?php echo get_the_date(); ?></span>
                <span class="read-more">Czytaj →</span>
            </div>
        </div>
    </a>
</article>