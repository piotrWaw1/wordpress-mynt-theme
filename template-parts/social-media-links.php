<?php
  $instagram = get_field('instagram');
  $facebook = get_field('facebook')
?>

<?php if ( ! empty( $instagram['instagram_url'] ) && is_array( $instagram['instagram_url'] ) ) : ?>
    <div class="socials" aria-label="Media społecznościowe">
        <a 
            class="social-link" 
            href="<?php echo esc_url( $instagram['instagram_url']['url'] ); ?>" 
            target="<?php echo esc_attr( $instagram['instagram_url']['target'] ?: '_self' ); ?>"
            <?php if ( $instagram['instagram_url']['target'] === '_blank' ) : ?>
               rel="noopener noreferrer"
            <?php endif; ?>
            aria-label="<?php echo esc_attr( $instagram['instagram_url']['title'] ); ?>"
        >
            <?php echo $instagram['icon']; ?>
        </a>
        <a 
            class="social-link" 
            href="<?php echo esc_url( $facebook['facebook_url']['url'] ); ?>" 
            target="<?php echo esc_attr( $facebook['facebook_url']['target'] ?: '_self' ); ?>"
            <?php if ( $facebook['facebook_url']['target'] === '_blank' ) : ?>
               rel="noopener noreferrer"
            <?php endif; ?>
            aria-label="<?php echo esc_attr( $facebook['facebook_url']['title'] ); ?>"
        >
            <?php echo $facebook['facebook_icon']; ?>
        </a>
    </div>
<?php endif; ?>