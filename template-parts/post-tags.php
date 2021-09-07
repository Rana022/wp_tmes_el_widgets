<div class="sidebar-block">
              <h3 class="sidebar-title">Tag Cloud</h3>
              <div class="tagcloud">
              <?php
                  $tags = get_tags(array(
                    'orderby' => 'name',
                  ));
                 
                foreach($tags as $tag){
                    printf('<a href="%1$s" class="tag-cloud-link">%2$s</a>', 
                    esc_url(get_category_link($tag->term_id)),
                    esc_html($tag->name));//get name
                }
                  ?>
              </div>
            </div>