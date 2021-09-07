<?php
function customizer_settings($customizer){
    $customizer->add_section('header', array(
       'title' => __('Top Menu', 'e_commerce'),
       'priority' => 70
    ));
    //top header contact control
	$customizer->add_setting('header_contact_field', array(
        'capability' => 'edit_theme_options',
        'default' => '+00 123 4455 6666 '
	));

	$customizer->add_control('header_contact_control', array(
        'label' => __('Contact Number', 'e_commerce'),
        'description' => 'change Contact Number',
        'section' => 'header',
        'settings' => 'header_contact_field'
    ));
    //top header email control
	$customizer->add_setting('header_email_field', array(
        'capability' => 'edit_theme_options',
        'default' => 'mail@example.com'
	));

	$customizer->add_control('header_email_control', array(
        'label' => __('Email Here', 'e_commerce'),
        'description' => 'change Your Email',
        'section' => 'header',
        'settings' => 'header_email_field'
    ));

	//top header social icons
	//social media one
	$customizer->add_setting('social_icon_field1', array(
        'capability' => 'edit_theme_options',
		'default' => 'mai-logo-facebook-f',
	));

	$customizer->add_control('header_icon_control1', array(
		'type' => 'select',
		'section' => 'header', // Add a default or your own section
		'label' => __( 'Social Media 1' ),
		'description' => __( 'Please select your social media' ),
		'choices' => array(
		  'mai-logo-facebook-f' => __( 'Facebook' ),
		  'mai-logo-twitter' => __( 'Twitter' ),
		  'mai-logo-dribbble' => __( 'Dribbble' ),
		  'mai-logo-instagram' => __( 'Instagram' ),
		),
        'settings' => 'social_icon_field1'

    ));
	//social media one link
	$customizer->add_setting('social_link1', array(
        'capability' => 'edit_theme_options',
        'default' => '#'
	));

	$customizer->add_control('link_control1', array(
        'label' => __('Link 1', 'e_commerce'),
        'description' => 'Link for social media 1',
        'section' => 'header',
        'settings' => 'social_link1'
    ));

		//social media two
		$customizer->add_setting('social_icon_field2', array(
			'capability' => 'edit_theme_options',
			'default' => 'mai-logo-twitter',
		));
	
		$customizer->add_control('header_icon_control2', array(
			'type' => 'select',
			'section' => 'header', // Add a default or your own section
			'label' => __( 'Social Media 2' ),
			'description' => __( 'Please select your social media' ),
			'choices' => array(
			  'mai-logo-facebook-f' => __( 'Facebook' ),
			  'mai-logo-twitter' => __( 'Twitter' ),
			  'mai-logo-dribbble' => __( 'Dribbble' ),
			  'mai-logo-instagram' => __( 'Instagram' ),
			),
			'settings' => 'social_icon_field2'
	
		));
		//social media two link
		$customizer->add_setting('social_link2', array(
			'capability' => 'edit_theme_options',
			'default' => '#'
		));
	
		$customizer->add_control('link_control2', array(
			'label' => __('Link 2', 'e_commerce'),
			'description' => 'Link for social media 2',
			'section' => 'header',
			'settings' => 'social_link2'
		));

				//social media three
				$customizer->add_setting('social_icon_field3', array(
					'capability' => 'edit_theme_options',
					'default' => 'mai-logo-dribbble',
				));
			
				$customizer->add_control('header_icon_control3', array(
					'type' => 'select',
					'section' => 'header', // Add a default or your own section
					'label' => __( 'Social Media 3' ),
					'description' => __( 'Please select your social media' ),
					'choices' => array(
					  'mai-logo-facebook-f' => __( 'Facebook' ),
					  'mai-logo-twitter' => __( 'Twitter' ),
					  'mai-logo-dribbble' => __( 'Dribbble' ),
					  'mai-logo-instagram' => __( 'Instagram' ),
					),
					'settings' => 'social_icon_field3'
			
				));
				//social media three link
				$customizer->add_setting('social_link3', array(
					'capability' => 'edit_theme_options',
					'default' => '#'
				));
			
				$customizer->add_control('link_control3', array(
					'label' => __('Link 3', 'e_commerce'),
					'description' => 'Link for social media 3',
					'section' => 'header',
					'settings' => 'social_link3'
				));

								//social media four
								$customizer->add_setting('social_icon_field4', array(
									'capability' => 'edit_theme_options',
									'default' => 'mai-logo-instagram',
								));
							
								$customizer->add_control('header_icon_contro4', array(
									'type' => 'select',
									'section' => 'header', // Add a default or your own section
									'label' => __( 'Social Media 4' ),
									'description' => __( 'Please select your social media' ),
									'choices' => array(
									  'mai-logo-facebook-f' => __( 'Facebook' ),
									  'mai-logo-twitter' => __( 'Twitter' ),
									  'mai-logo-dribbble' => __( 'Dribbble' ),
									  'mai-logo-instagram' => __( 'Instagram' ),
									),
									'settings' => 'social_icon_field4'
							
								));
								//social media four link
								$customizer->add_setting('social_link4', array(
									'capability' => 'edit_theme_options',
									'default' => '#'
								));
							
								$customizer->add_control('link_control4', array(
									'label' => __('Link 4', 'e_commerce'),
									'description' => 'Link for social media 4',
									'section' => 'header',
									'settings' => 'social_link4'
								));

				

				

}
add_action('customize_register', 'customizer_settings');

?>