<?php
/**
 * The search result template file
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
            <?php get_template_part( 'template-parts/post', 'content' );?>

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

