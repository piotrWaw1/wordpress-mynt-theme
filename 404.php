<?php
$title_404 = esc_html(get_field("title_404","option"));
$description_404= esc_html(get_field("description_404", "option"));
?>

<?php get_header(); ?>
    
<?php get_template_part( 'template-parts/site-nav' );?>

<main>
    <section>
        <div class="wrap">
            <div class="error-inner">
                <div>
                    <div class="error-code">404</div>
                    <h2><?php echo $title_404?></h2>
                    <p class="lead"><?php echo $description_404?></p>
                    <div class="error-ctas">
                        <a href="/" class="btn btn-mint">Wróć na stronę główną</a>
                        <a href="/#kontakt" class="btn btn-ghost">Skontaktuj się z nami →</a>
                    </div>
                    <?php if ( have_rows('links_404', 'option') ) : ?>
                        <div class="quick-links">
                            <span class="lbl">MOŻE SZUKASZ:</span>
                            <?php while ( have_rows('links_404', 'option') ) : the_row();
                                $link = get_sub_field('link_404');
                            ?>
                                <a href="<?php echo esc_url($link["url"])?>"><?php echo esc_html($link["title"])?></a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>