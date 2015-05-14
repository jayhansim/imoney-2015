<section class="content--home content__infographic">
  <div class="container">
    <div class="infographic--list__header">
      <h5><a href="/category/infographic">Infographic</a></h5>
    </div>
    <div class="infographic--list__body">
      <div class="slides slides--infographic">

        <?php // WP_Query arguments
          $args = array (
            'category_name'  => 'infographic',
            'posts_per_page' => '8'
          );

          // The Query
          $wp_query = new WP_Query( $args );

          // The Loop
          if ( $wp_query->have_posts() ) {
            while ( $wp_query->have_posts() ) {
              $wp_query->the_post(); ?>
              <div class="slide">
                <a href="<?php the_permalink(); ?>">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else: ?>
                    <img src="http://www.placehold.it/200x270" alt="">
                  <?php endif; ?>
                </a>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php if ( function_exists ( 'echo_tptn_post_count' ) ) : ?>
                    <div class="meta">
                      <div class="meta__views">
                        <i class="icon icon__meta icon__meta--views"></i>
                         <?php echo_tptn_post_count(); ?>
                      </div>
                    </div>
                  <?php endif; ?>
              </div>
            <?php }
          } else { ?>
            // no posts found
          <?php }

          // Restore original Post Data
        wp_reset_postdata(); ?>
      </div>
      <!-- <div class="slides__nav"><a href="#" class="nav__left"></a><a href="#" class="nav__right"></a></div> -->
      <!-- <div class="slides__pagination">
        <ul>
          <li><a href="#" class="active">a</a><a href="#">b</a><a href="#">c</a></li>
        </ul>
      </div> -->
    </div>
    <div class="infographic--list__footer a-right pt20"><a href="/category/infographic" class="btn btn-outline btn-outline--blue">View more infographics &raquo;</a></div>
  </div>
</section>