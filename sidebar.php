<div class="sidebar">
            <div class="sidebar-block">
              <h3 class="sidebar-title">Search</h3>
               <?php get_search_form();?>
            </div>
            <!-- categories -->
            <?php get_template_part( 'template-parts/parent', 'category' );?>
            <!-- latest news -->
            <?php get_template_part( 'template-parts/sidebar', 'latest-news' );?>
            <!-- sidebar -->
            <?php get_template_part( 'template-parts/post', 'tags' );?>

            <div class="sidebar-block">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
          </div>
