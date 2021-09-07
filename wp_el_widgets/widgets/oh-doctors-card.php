<?php
class OH_doctors_card extends \Elementor\Widget_Base {

	public function get_name() {
		return 'oh-doctors-card';
	}

	public function get_title() {
		return __( 'OH Doctors Card', 'plugin-name' );
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
			'name',
			[
				'label' => __( 'Name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Dr. Stein Albert', 'plugin-domain' ),
				'placeholder' => __( 'Type Name here', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'spatiality',
			[
				'label' => __( 'Spatiality', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Cardiology', 'plugin-domain' ),
				'placeholder' => __( 'Type doctors spatiality', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
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

		$this->add_control(
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

		$this->add_control(
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

		$this->add_control(
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


		

		


		

		$this->end_controls_section();

		

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$target1 = $settings['social_link_1']['is_external'] ? ' target="_blank"' : '';
		$nofollow1 = $settings['social_link_1']['nofollow'] ? ' rel="nofollow"' : '';
		$target2 = $settings['social_link_2']['is_external'] ? ' target="_blank"' : '';
		$nofollow2 = $settings['social_link_2']['nofollow'] ? ' rel="nofollow"' : '';

		echo '
		<div class="card-doctor">
                <div class="header">
                  <img src="'.$settings['image']['url'].'" alt="">
                  <div class="meta">
                    <a href="' . $settings['social_link_1']['url'] . '" ' . $target1 . $nofollow1 . '><span class="' . $settings['icon1'] . '"></span></a>
                    <a href="' . $settings['social_link_2']['url'] . '" ' . $target2 . $nofollow2 . '><span class="' . $settings['icon2'] . '"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">'.$settings['name'].'</p>
                  <span class="text-sm text-grey">'.$settings['spatiality'].'</span>
                </div>
              </div>
		';

		

	}

}