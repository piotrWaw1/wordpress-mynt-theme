<?php
$blog_title = esc_html(get_field('blog_title', 'option'));
$blog_description = esc_html(get_field('blog_description', 'option'));

$categories = get_categories( array(
    'orderby'    => 'name',
    'hide_empty' => true,
) );

$featured_query = new WP_Query( array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 1,
    'ignore_sticky_posts'  => true,
) );

$featured_id = 0;
if ( $featured_query->have_posts() ) {
    $featured_query->the_post();
    $featured_id = get_the_ID();
}

$grid_query = new WP_Query( array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => get_option( 'posts_per_page' ),
    'post__not_in'        => $featured_id ? array( $featured_id ) : array(),
    'ignore_sticky_posts' => true,
    'paged'               => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
) );

$max_pages = $grid_query->max_num_pages;
?>

<?php get_header(); ?>    
<?php get_template_part( 'template-parts/site-nav' );?>

<main>
    <section class="hero blog-section-hero">
      <div class="hero-inner wrap">
        <div>
            <h1><?php echo($blog_title)?></h1>
            <p class="lead"><?php echo($blog_description)?></p>
        </div>
      </div>
    </section>

    <section class="blog-section">
      <div class="wrap">
        <div class="filters reveal" id="filters" data-featured-id="<?php echo esc_attr( $featured_id ); ?>">
          <button class="chip active" data-filter="all">Wszystko</button>
          <?php if ($categories) :?>
            <?php foreach ( $categories as $category ) : ?>
              <button class="chip" data-filter="<?php echo esc_attr( $category->slug ); ?>">
                <?php echo esc_html( $category->name ); ?>
              </button>
            <?php endforeach; ?>
          <?php endif;?>
        </div>
        <div id="blogGrid">
          <?php get_template_part( 'template-parts/content-featured-post-card' ); ?>
          <div class="blog-grid" id="innerGrid">
            <?php while ( $grid_query->have_posts() ) : $grid_query->the_post(); ?>
              <?php get_template_part( 'template-parts/content-post-card' ); ?>
            <?php endwhile; ?>
          </div>
        </div>
        <?php if ($max_pages !== 1) : ?>
          <div class="load-more">
            <button class="btn btn-ghost" id="loadMoreBtn">
              Załaduj więcej wpisów
            </button>
          </div>
        <?php endif; ?>
      </div>
    </section>
</main>

<?php get_footer(); ?>