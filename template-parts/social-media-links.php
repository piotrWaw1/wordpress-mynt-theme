<?php if ( have_rows('social_media') ) : ?>
    <div class="socials">
        <?php while ( have_rows('social_media') ) : the_row();
                    $link = get_sub_field('link');
                    $icon = get_sub_field('icon');
                    if ( ! $link || ! $icon ) continue;
                ?>
                     <a 
                        class="social-link" 
                        href="<?php echo esc_url( $link['url'] ); ?>" 
                        target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>"
                        <?php if ( $link['target'] === '_blank' ) : ?>
                        rel="noopener noreferrer"
                        <?php endif; ?>
                        aria-label="<?php echo esc_attr( $link['title'] ); ?>"
                    >
                        <?php echo $icon; ?>
                    </a>
        <?php endwhile; ?>
    </div>
<?php endif; ?>