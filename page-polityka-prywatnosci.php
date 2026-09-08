<?php
/**
 * Template Name: Polityka Prywatności
 */
get_header();
?>
    <?php get_template_part( 'template-parts/site-nav' );?>
    <main class="policy-section">
        <div class="wrap">
            <?php while ( have_posts() ) : the_post(); ?>
                <h1 class="policy-header"><?php the_title(); ?></h1>
                <div class="policy-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
<?php get_footer(); ?>