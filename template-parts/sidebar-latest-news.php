<div class="sidebar-block">
              <h3 class="sidebar-title">Recent Blog</h3>

              <?php

    // The Query
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page'=>3,
                    'paged' => $paged
                    );

    $loop = new WP_Query( $args );
    ?>
    <?php if($loop->have_posts()) : ?>
      <?php while($loop->have_posts()) : $loop->the_post();?>
      <div class="blog-item">
                <a class="post-thumb" href="<?php echo get_permalink();?>">
                  <img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" alt="">
                  <?php the_title();?>
                </a>
                <div class="content">
                  <h5 class="post-title"><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h5>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span><?php echo get_the_date();?></a>
                    <a href="#"><span class="mai-person"></span> <?php the_author();?></a>
                    <a href="#"><span class="mai-chatbubbles"></span> <?php echo get_comments_number()?></a>
                  </div>
                </div>
              </div>
      <?php endwhile;?>
      <?php else : ?>
        <?php echo wpautop('no post found!');?>
      <?php endif;?>

    <?php wp_reset_query();?>
    <?php wp_reset_postdata();?>

            </div>