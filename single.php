<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ECommerce
 */

get_header();
?>

<div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <!-- post content -->
			<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post();?>
			<article class="blog-details">
            <div class="post-thumb">
              <img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" alt="">
            </div>
            <div class="post-meta">
              <div class="post-author">
                <span class="text-grey">By</span> <a href="#"><?php the_author();?></a>  
              </div>
              <span class="divider">|</span>
              <div class="post-date">
                <a href="#"><?php echo get_the_date();?></a>
              </div>
              <span class="divider">|</span>
              <div>
				  <?php
			  if(get_the_category()){
				$cat = get_the_category();
                 
                foreach($cat as $category){
                    printf('<a href="%1$s">%2$s</a>', 
                    esc_url(get_category_link($category->term_id)),
                    esc_html($category->name), $category->count);//get name
                }

			}
                  ?>
              </div>
              <span class="divider">|</span>
              <div class="post-comment-count">
                <a href="#"><?php echo get_comments_number()?></a>
              </div>
            </div>
            <h2 class="post-title h1"><?php the_title()?></h2>
            <div class="post-content">
              <p><?php echo get_the_content()?></p>
            </div>
            <div class="post-tags">
			<?php
			if(get_the_tags()){
				$tags = get_the_tags();
                 
                foreach($tags as $tag){
                    printf('<a href="%1$s" class="tag-link">%2$s</a>', 
                    esc_url(get_category_link($tag->term_id)),
                    esc_html($tag->name), $tag->count);//get name
                }

			}
                  ?>
         </div>
          </article>
<?php endwhile;?>
<?php else : ?>
<?php endif; ?>

          <!-- comments -->
          <?php
          if (comments_open()){
            comments_template();
        }
          ?>
        <!-- paginnation -->
        <?php
        paginate_links(array(
          'mid_size' => 3,
          'prev_text' => __('Previous'),
          'next_text' => __('Next')
        ));
      
        ?>
            <div class="col-12 my-5">
              <nav aria-label="Page Navigation">
              <ul class="pagination justify-content-center">
              <?php
       echo paginate_links(array(
          'mid_size' => 2,
          'prev_text' => __('Previous'),
          'next_text' => __('Next')
        ));
      
        ?>
        </ul>
                <!-- <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                </ul> -->
              </nav>
            </div>
          </div> <!-- .row -->
        </div>
        <div class="col-lg-4">
            <!-- sidebar -->

         <?php get_sidebar(); ?>
    
        </div> 
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .page-section -->

<?php
get_footer();

