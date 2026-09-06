<?php
/**
 * Template Name: Polityka Prywatności
 */
get_header();
?>

<main>
    <?php get_template_part( 'template-parts/site-nav' );?>
    <section class="policy-section">
        <div class="wrap">
            <?php while ( have_posts() ) : the_post(); ?>
                <h1 class="policy-header"><?php the_title(); ?></h1>
                <div class="policy-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>