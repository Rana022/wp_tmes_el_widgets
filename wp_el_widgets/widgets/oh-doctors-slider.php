<?php
class OH_doctors_slider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'oh-doctors-slider';
	}

	public function get_title() {
		return __( 'OH Doctors Slider', 'plugin-name' );
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
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Our Doctors', 'plugin-domain' ),
				'placeholder' => __( 'Section Name', 'plugin-domain' ),
			]
		);

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name',
			[
				'label' => __( 'Name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Dr. Stein Albert', 'plugin-domain' ),
				'placeholder' => __( 'Type Name here', 'plugin-domain' ),
			]
		);

		$repeater->add_control(
			'spatiality',
			[
				'label' => __( 'Spatiality', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Cardiology', 'plugin-domain' ),
				'placeholder' => __( 'Type doctors spatiality', 'plugin-domain' ),
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'icon1',
			[
				'label' => __( 'Social Icons 1', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' => [
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-google-plus',
					'fa fa-instagram',
					'fa fa-linkedin',
					'fa fa-pinterest',
					'fa fa-reddit',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-youtube',
				],
				'default' => 'fa fa-facebook',
			]
		);

		$repeater->add_control(
			'icon2',
			[
				'label' => __( 'Social Icons 2', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' => [
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-google-plus',
					'fa fa-instagram',
					'fa fa-linkedin',
					'fa fa-pinterest',
					'fa fa-reddit',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-youtube',
				],
				'default' => 'fa fa-twitter',
			]
		);

		$repeater->add_control(
			'social_link_1',
			[
				'label' => __( 'Social Link 1', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$repeater->add_control(
			'social_link_2',
			[
				'label' => __( 'Social Link 2', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

        $this->add_control(
			'card_items',
			[
				'label' => __( 'Card List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
                    [
						'list_title' => __( 'Title #1', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
                    [
						'list_title' => __( 'Title #1', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);


		

		


		

		$this->end_controls_section();

		

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
    
		echo '
		<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">'.$settings['title'].'</h1>
      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">';
      if ( $settings['card_items'] ) {
        foreach (  $settings['card_items'] as $item ) {
            $target1 = $item['social_link_1']['is_external'] ? ' target="_blank"' : '';
            $nofollow1 = $item['social_link_1']['nofollow'] ? ' rel="nofollow"' : '';
            $target2 = $item['social_link_2']['is_external'] ? ' target="_blank"' : '';
            $nofollow2 = $item['social_link_2']['nofollow'] ? ' rel="nofollow"' : '';
            echo '
            <div class="item">
          <div class="card-doctor">
            <div class="header">
            <img src="'.$item['image']['url'].'" alt="">

              <div class="meta">
                    <a href="' . $item['social_link_1']['url'] . '" ' . $target1 . $nofollow1 . '><span class="' . $item['icon1'] . '"></span></a>
                    <a href="' . $item['social_link_2']['url'] . '" ' . $target2 . $nofollow2 . '><span class="' . $item['icon2'] . '"></span></a>
                  </div>

            </div>
            <div class="body">
              <p class="text-xl mb-0">'.$item['name'].'</p>
              <span class="text-sm text-grey">'.$item['spatiality'].'</span>
            </div>
          </div>
        </div>
            ';
        }
      }
      echo'
      </div>
    </div>
  </div>
		';

		

	}

}