<a href="<?php the_permalink(); ?>" class="featured">
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'medium_large', array(
            'class' => 'post-card__img',
            'loading' => 'lazy',
        ) ); ?>
    <?php else : ?>
        <div class="thumb"></div>
    <?php endif; ?>
    <div class="body">
            <?php if (!empty(get_the_category())) : ?>
                <?php foreach (get_the_category() as $cat) : ?>
                    <span class="tag">
                        <?php echo esc_html($cat->name); ?>
                    </span>
                <?php endforeach; ?>
            <?php endif; ?>
        <h2>
            <?php the_title(); ?>
        </h2>
        <p>
            <?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
        </p>
        <div class="meta">
            <span><?php echo get_the_date(); ?></span>
            <span class="read-more">Czytaj →</span>
        </div>
    </div>
</a>