
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post();?>
<div class="col-sm-6 py-3">
              <div class="card-blog">
                <div class="header">
                   <?php
				   if(get_the_category()){
				   $cats = get_the_category();
				   foreach($cats as $cat)
				   echo '
				   <div class="post-category">
				   <a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.'</a>
				   </div>
				   ';
				   }
				   ?>
                  <a href="<?php echo get_permalink();?>" class="post-thumb">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" alt="">
                  </a>
                </div>
                <div class="body">
                  <h5 class="post-title"><a href="<?php echo get_permalink();?>"><?php the_title()?></a></h5>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta('ID') ) ); ?>" alt="">
                      </div>
                      <span><?php the_author()?></span>
                    </div>
                    <span class="mai-time"></span><?php echo get_the_date()?>
                  </div>
                </div>
              </div>
            </div>
<?php endwhile;?>
<?php else : ?>
 
<?php endif; ?>
