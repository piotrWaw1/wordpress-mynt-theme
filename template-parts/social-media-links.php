<?php
  $instagram = get_field('instagram');
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
    </div>
<?php endif; ?>