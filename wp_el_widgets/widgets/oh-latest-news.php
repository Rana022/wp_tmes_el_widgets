<?php
class OH_latest_news extends \Elementor\Widget_Base {

	public function get_name() {
		return 'oh-latest-news';
	}

	public function get_title() {
		return __( 'OH Latest News', 'plugin-name' );
	}

	public function get_icon() {
		return 'fa fa-vimeo';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'title',
			[
				'label' => __( 'Section Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Latest News', 'plugin-domain' ),
				'placeholder' => __( 'Section Title Here', 'plugin-domain' ),
			]
		);

        $this->add_control(
			'oh_blog_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				
			]
		);

       

		$this->end_controls_section();

		

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
        $link = $settings['oh_blog_link'];
    
		echo '
        <div class="page-section bg-light">
        <div class="container">
          <h1 class="text-center wow fadeInUp">'.$settings['title'].'</h1>
          <div class="row mt-5">';

          

    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3, // Number of recent posts thumbnails to display
        'post_status' => 'publish' // Show only the published posts
    ));

    foreach($recent_posts as $post_item ){
        
       echo '
       <div class="col-lg-4 py-2 wow zoomIn">
              <div class="card-blog">
                <div class="header">
                  <div class="post-category">';
                  $cats = get_the_category($post_item['ID']);
                      foreach($cats as $cat){
                          echo '<a href="#">'.$cat->cat_name.'</a>';
                        }
                  echo'
                  </div>
                  <a href="'.get_permalink($post_item['ID']).'" class="post-thumb">
                    <img src="'.get_the_post_thumbnail_url($post_item['ID'],'full').'" alt="">
                  </a>
                </div>
                <div class="body">
                  <h5 class="post-title"><a href="'.get_permalink($post_item['ID']).'">'.$post_item['post_title'].'</a></h5>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="../assets/img/person/person_1.jpg" alt="">
                      </div>
                      <span>'.get_the_author().'</span>
                    </div>
                    <span class="mai-time"></span>'.get_the_date('Y-m-d' ).'
                  </div>
                </div>
              </div>
            </div>
       ';
    }
    

            
    echo '
            <div class="col-12 text-center mt-4 wow zoomIn">
              <a href="" class="btn btn-primary">Read More</a>
            </div>
    
          </div>
        </div>
      </div> <!-- .page-section -->
        ';

		

	}

}