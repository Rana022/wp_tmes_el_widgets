<div class="sidebar-block">
              <h3 class="sidebar-title">Categories</h3>
              <ul class="categories">
                  <?php
                  $cat = get_categories(array(
                    'orderby' => 'name',
                    'parent' => 0, //this will return top level categories
                    'exclude' => 1
                  ));
                 
                foreach($cat as $category){
                    printf('<li><a href="%1$s">%2$s <span>%3$s</span></a></li>', 
                    esc_url(get_category_link($category->term_id)),
                    esc_html($category->name), $category->count);//get name
                }
                  ?>
              </ul>
            </div>