<?php
class OH_heroarea extends \Elementor\Widget_Base {

	public function get_name() {
		return 'oh-heroarea';
	}

	public function get_title() {
		return __( 'OH Heroarea', 'plugin-name' );
	}

	public function get_icon() {
		return 'far fa-address-book';
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
			'hero-title',
			[
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Healthy Living', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'hero-description',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'LETS MAKE YOUR LIFE HAPPIER', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'hero-image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		

		


		

		$this->end_controls_section();

		

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '
		<div class="page-hero bg-image overlay-dark" style="background-image: url('.wp_get_attachment_image_url( $settings['hero-image']['id'], 'large' ).')">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">'.$settings['hero-description'].'</span>
        <h1 class="display-4">'.$settings['hero-title'].'</h1>
        <a href="#" class="btn btn-primary">Lets Consult</a>
      </div>
    </div>
  </div>
		';

		

	}

}