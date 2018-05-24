<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_TT_Testimonials extends Widget_Base {

	public function get_name() {
		return 'tt-testimonials';
	}

	public function get_title() {
		return __( 'Testimonials', 'elementor-custom-element' );
	}

	public function get_icon() {
		return 'eicon-editor-quote';
	}

	protected function _register_controls() {

		/**
		 * Tab Content
		 */
		$this->start_controls_section(
			'testimonials_section_content',
			[
				'label'      => __( 'Testimonials Items', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_image',
			array(
				'label'   => esc_html__( 'Image', 'elementor-custom-element' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url'   => Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'elementor-custom-element' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Title',
			)
		);
		$repeater->add_control(
			'item_icon_before',
			array(
				'label'       => esc_html__( 'Icon Before', 'elementor-custom-element' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'file'        => '',
				'default'     => 'fa fa-quote-left',
			)
		);
		$repeater->add_control(
			'item_comment',
			array(
				'label'   => esc_html__( 'Comment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::TEXTAREA,
			)
		);
		$repeater->add_control(
			'item_icon_after',
			array(
				'label'       => esc_html__( 'Icon After', 'elementor-custom-element' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'file'        => '',
				'default'     => 'fa fa-quote-right',
			)
		);
		$repeater->add_control(
			'item_name',
			array(
				'label'   => esc_html__( 'Name', 'elementor-custom-element' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'item_position',
			array(
				'label'   => esc_html__( 'Position', 'elementor-custom-element' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'item_date',
			array(
				'label'       => esc_html__( 'Date', 'elementor-custom-element' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Thursday, August 31, 2017', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'item_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'item_title'    => __('Title 1', 'elementor-custom-element' ),
						'item_comment'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'elementor-custom-element' ),
						'item_name'     => esc_html__( 'Boris Britva', 'elementor-custom-element' ),
						'item_position' => esc_html__( 'Administrator', 'elementor-custom-element' ),
						'item_date'     => esc_html__( 'Thursday, August 31, 2017', 'elementor-custom-element' ),
					),
					array(
						'item_title'    => __('Title 2', 'elementor-custom-element' ),
						'item_comment'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'elementor-custom-element' ),
						'item_name'     => esc_html__( 'Mickey Oneil', 'elementor-custom-element' ),
						'item_position' => esc_html__( 'Founder & SEO', 'elementor-custom-element' ),
						'item_date'     => esc_html__( 'Thursday, August 31, 2017', 'elementor-custom-element' ),
					),
					array(
						'item_title'    => __('Title 3', 'elementor-custom-element' ),
						'item_comment'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'elementor-custom-element' ),
						'item_name'     => esc_html__( 'John Browning', 'elementor-custom-element' ),
						'item_position' => esc_html__( 'Manager', 'elementor-custom-element' ),
						'item_date'     => esc_html__( 'Thursday, August 31, 2017', 'elementor-custom-element' ),
					),
				),
				'title_field' => '{{{ item_title }}}',
			)
		);
		$this->end_controls_section();

		/*
		* Settings carousel
		*/
		$this->start_controls_section(
			'section_settings',
			array(
				'label' => esc_html__( 'Settings', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);
		$this->add_responsive_control(
			'slides_to_show',
			array(
				'label'   => esc_html__( 'Slides to Show', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 10,
				'step'    => 1,
				'device_args'  => [
					Controls_Stack::RESPONSIVE_TABLET => [
						'default'  => 2,
						'max'      => 6,
						'required' => false,
					],
					Controls_Stack::RESPONSIVE_MOBILE => [
						'default'  => 1,
						'max'      => 3,
						'required' => false,
					],
				],
			)
		);
		$this->add_control(
			'autoplay',
			array(
				'label'        => esc_html__( 'Autoplay', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-custom-element' ),
				'label_off'    => esc_html__( 'No', 'elementor-custom-element' ),
				'return_value' => 'true',
				'default'      => 'false',
			)
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'     => esc_html__( 'Autoplay Timeout', 'elementor-custom-element' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5000,
				'condition' => array(
					'autoplay' => 'true',
				),
			)
		);
		$this->add_control(
			'speed',
			array(
				'label'   => esc_html__( 'Animation Speed', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			)
		);
		$this->add_control(
			'margin_slide',
			[
				'label'     => __( 'Space Between Slides', 'elementor-custom-element' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 20,
				'step'      => 1,
				'min'       => 1,
				'max'       => 200,
			]
		);
		$this->add_control(
			'pause_on_hover',
			array(
				'label'        => esc_html__( 'Pause on Hover', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-custom-element' ),
				'label_off'    => esc_html__( 'No', 'elementor-custom-element' ),
				'return_value' => 'true',
				'default'      => 'false',
			)
		);
		$this->add_control(
			'infinite',
			array(
				'label'        => esc_html__( 'Infinite Loop', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-custom-element' ),
				'label_off'    => esc_html__( 'No', 'elementor-custom-element' ),
				'return_value' => 'true',
				'default'      => 'true',
			)
		);
		$this->add_control(
			'arrows',
			array(
				'label'        => esc_html__( 'Show Arrows Navigation', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-custom-element' ),
				'label_off'    => esc_html__( 'No', 'elementor-custom-element' ),
				'return_value' => 'true',
				'default'      => 'false',
			)
		);
		$this->add_control(
			'dots',
			array(
				'label'        => esc_html__( 'Show Dots Navigation', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-custom-element' ),
				'label_off'    => esc_html__( 'No', 'elementor-custom-element' ),
				'return_value' => 'true',
				'default'      => 'true',
			)
		);
		$this->add_control(
			'dots_each',
			[
				'label'        => __( 'Show Dots Each X Item', 'elementor-custom-element' ),
				'label_on'     => esc_html__( 'Yes', 'elementor-custom-element' ),
				'label_off'    => esc_html__( 'No', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
				'condition' => array(
					'dots' => 'true',
				),
			]
		);
		$this->end_controls_section();

		/**
		 * Tab Style
		 * 
		 * Section General
		 */
		$this->start_controls_section(
			'testimonials_section_general',
			array(
				'label'      => esc_html__( 'General', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'item_background',
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-inner',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'item_border',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-testimonials-inner',
			)
		);
		$this->add_control(
			'item_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'item_shadow',
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-inner',
			)
		);

		$this->add_control(
			'item_padding',
			array(
				'label'       => esc_html__( 'Item Padding', 'elementor-custom-element' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px' ),
				'render_type' => 'template',
				'selectors'   => array(
					'{{WRAPPER}} ' . '.tt-testimonials-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Image
		 */
		$this->start_controls_section(
			'testimonials_section_image',
			array(
				'label'      => esc_html__( 'Image', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'custom_image_size',
			array(
				'label'        => __( 'Custom size', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'elementor-custom-element' ),
				'label_off'    => __( 'No', 'elementor-custom-element' ),
				'return_value' => 'yes',
				'default'      => 'false',
			)
		);
		$this->add_responsive_control(
			'image_width',
			array(
				'label'      => __( 'Width', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 50,
						'max' => 1000,
					),
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-img'    => 'width: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'custom_image_size' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'image_height',
			array(
				'label'      => __( 'Height', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 50,
						'max' => 1000,
					),
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-img'    => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'custom_image_size' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'image_border',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-testimonials-img',
			)
		);
		$this->add_control(
			'image_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'image_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'image_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'image_shadow',
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-img',
			)
		);
		$this->add_responsive_control(
			'image_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'flex-start' => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-img-wrap' => 'align-self: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Title
		 */
		$this->start_controls_section(
			'testimonials_section_title',
			array(
				'label'      => esc_html__( 'Title', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'  => esc_html__( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-title',
			)
		);
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'title_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);$this->add_responsive_control(
			'title_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-title' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Comment
		 */
		$this->start_controls_section(
			'testimonials_section_comment',
			array(
				'label'      => esc_html__( 'Comment', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'comment_color',
			array(
				'label'     => esc_html__( 'Color', 'elementor-custom-element' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-comment' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'comment_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-comment',
			)
		);
		$this->add_responsive_control(
			'comment_width',
			array(
				'label'      => esc_html__( 'Width', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 1000,
					),
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default' => array(
					'size' => 350,
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-comment' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'comment_background',
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-comment',
				'fields_options' => array(
					'color' => array(
						'scheme' => array(
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_1,
						),
					),
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'comment_border',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-testimonials-comment',
			)
		);
		$this->add_control(
			'comment_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'top'    => 5,
					'right'  => 5,
					'bottom' => 5,
					'left'   => 5,
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-comment' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'comment_shadow',
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-comment',
			)
		);
		$this->add_responsive_control(
			'comment_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'top'    => 25,
					'right'  => 15,
					'bottom' => 25,
					'left'   => 15,
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-comment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'comment_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'comment_alignment',
			array(
				'label'   => esc_html__( 'Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'flex-start'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-comment' => 'align-self: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'comment_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-comment' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Icon
		 */
		$this->start_controls_section(
			'testimonials_section_icon',
			array(
				'label'      => esc_html__( 'Icons', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->start_controls_tabs( 'tabs_icon' );
		$this->start_controls_tab(
			'tab_icon_before',
			array(
				'label' => esc_html__( 'Icon Before', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'tab_icon_before_show',
			array(
				'label'        => __( 'Show Icon Before', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'elementor-custom-element' ),
				'label_off'    => __( 'No', 'elementor-custom-element' ),
				'return_value' => 'true',
				'default'      => 'true',
			)
		);
		$this->add_control(
			'icon_color_before',
			array(
				'label' => esc_html__( 'Icon Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' i' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_control(
			'icon_bg_color_before',
			array(
				'label' => esc_html__( 'Icon Background Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' ' . '.tt-testimonials-icon-inner' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_font_size_before',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_size_before',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' ' . '.tt-testimonials-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'icon_border_before',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' ' . '.tt-testimonials-icon-inner',
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_control(
			'icon_box_border_radius_before',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' ' . '.tt-testimonials-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_margin_before',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' ' . '.tt-testimonials-icon-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'icon_box_shadow_before',
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-icon-before' . ' ' . '.tt-testimonials-icon-inner',
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_alignment_before',
			array(
				'label'   => esc_html__( 'Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'flex-start'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-before' => 'align-self: {{VALUE}};',
				),
				'condition' => array(
					'tab_icon_before_show' => 'true',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_icon_after',
			array(
				'label' => esc_html__( 'Icon After', 'elementor-custom-element' ),
			)
		);
		$this->add_control(
			'tab_icon_after_show',
			array(
				'label'        => __( 'Show Icon After', 'elementor-custom-element' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'elementor-custom-element' ),
				'label_off'    => __( 'No', 'elementor-custom-element' ),
				'return_value' => 'true',
				'default'      => 'true',
			)
		);
		$this->add_control(
			'icon_color_after',
			array(
				'label' => esc_html__( 'Icon Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' i' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_control(
			'icon_bg_color_after',
			array(
				'label' => esc_html__( 'Icon Background Color', 'elementor-custom-element' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' ' . '.tt-testimonials-icon-inner' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_font_size_after',
			array(
				'label'      => esc_html__( 'Icon Font Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_size_after',
			array(
				'label'      => esc_html__( 'Icon Box Size', 'elementor-custom-element' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', '%',
				),
				'range'      => array(
					'px' => array(
						'min' => 18,
						'max' => 200,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' ' . '.tt-testimonials-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'icon_border_after',
				'label'       => esc_html__( 'Border', 'elementor-custom-element' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' ' . '.tt-testimonials-icon-inner',
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_control(
			'icon_box_border_radius_after',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' ' . '.tt-testimonials-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_margin_after',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' ' . '.tt-testimonials-icon-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'icon_box_shadow_after',
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-icon-after' . ' ' . '.tt-testimonials-icon-inner',
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->add_responsive_control(
			'icon_box_alignment_after',
			array(
				'label'   => esc_html__( 'Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'flex-start'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'flex-end' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-icon-after' => 'align-self: {{VALUE}};',
				),
				'condition' => array(
					'tab_icon_after_show' => 'true',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		/**
		 * Section Name
		 */
		$this->start_controls_section(
			'testimonials_section_name',
			array(
				'label'      => esc_html__( 'Name', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'name_color',
			array(
				'label'  => esc_html__( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-name' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'name_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-name',
			)
		);
		$this->add_responsive_control(
			'name_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'name_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);$this->add_responsive_control(
			'name_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-name' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Position
		 */
		$this->start_controls_section(
			'testimonials_section_position',
			array(
				'label'      => esc_html__( 'Position', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'position_color',
			array(
				'label'  => esc_html__( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-position' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'position_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-position',
			)
		);
		$this->add_responsive_control(
			'position_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-position' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'position_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);$this->add_responsive_control(
			'position_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-position' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Date
		 */
		$this->start_controls_section(
			'testimonials_section_date',
			array(
				'label'      => esc_html__( 'Date', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'date_color',
			array(
				'label'  => esc_html__( 'Color', 'elementor-custom-element' ),
				'type'   => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . '.tt-testimonials-date' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'date_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} ' . '.tt-testimonials-date',
			)
		);
		$this->add_responsive_control(
			'date_padding',
			array(
				'label'      => __( 'Padding', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'date_margin',
			array(
				'label'      => __( 'Margin', 'elementor-custom-element' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);$this->add_responsive_control(
			'date_text_alignment',
			array(
				'label'   => esc_html__( 'Text Alignment', 'elementor-custom-element' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'elementor-custom-element' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . '.tt-testimonials-date' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		/**
		 * Section Order
		 */
		$this->start_controls_section(
			'testimonials_section_order',
			array(
				'label'      => esc_html__( 'Order Content', 'elementor-custom-element' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		$this->add_control(
			'image_order',
			array(
				'label'   => esc_html__( 'Image Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-img-wrap' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'title_order',
			array(
				'label'   => esc_html__( 'Title Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-title' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'icon_before_order',
			array(
				'label'   => esc_html__( 'Icon Before Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-icon-before' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'comment_order',
			array(
				'label'   => esc_html__( 'Comment Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-comment' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'icon_after_order',
			array(
				'label'   => esc_html__( 'Icon After Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-icon-after' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'name_order',
			array(
				'label'   => esc_html__( 'Name Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-name' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'position_order',
			array(
				'label'   => esc_html__( 'Position Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 7,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-position' => 'order: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'date_order',
			array(
				'label'   => esc_html__( 'Date Order', 'elementor-custom-element' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8,
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'selectors' => array(
					'{{WRAPPER}} '. '.tt-testimonials-date' => 'order: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		echo $this->generate_setting_json( $this->get_content() );
	}

	public function generate_setting_json( $content = null ) {
		$settings = $this->get_settings();

		$opts_array = array(
			'responsive'   => array(
				'0'     => array('items' => absint( $settings['slides_to_show_mobile'] ) ),
				'767'   => array('items' => absint( $settings['slides_to_show_tablet'] ) ),
				'1025'  => array('items' => absint( $settings['slides_to_show'] ) ),
			),
			'navText'            => '',
			'margin'             => absint( $settings['margin_slide'] ),
			'autoplayTimeout'    => absint( $settings['autoplay_speed'] ),
			'autoplay'           => filter_var( $settings['autoplay'], FILTER_VALIDATE_BOOLEAN ),
			'loop'               => filter_var( $settings['infinite'], FILTER_VALIDATE_BOOLEAN ),
			'autoplayHoverPause' => filter_var( $settings['pause_on_hover'], FILTER_VALIDATE_BOOLEAN ),
			'navSpeed'           => absint( $settings['speed'] ),
			'dotsSpeed'          => absint( $settings['speed'] ),
			'autoplaySpeed'      => absint( $settings['speed'] ),
			'nav'                => filter_var( $settings['arrows'], FILTER_VALIDATE_BOOLEAN ),
			'dots'               => filter_var( $settings['dots'], FILTER_VALIDATE_BOOLEAN ),
			'dotsEach'           => filter_var( $settings['dots_each'], FILTER_VALIDATE_BOOLEAN ),
		);

		return sprintf(
			'<div class="tt-testimonials owl-carousel owl-theme" data-testimonials-options="%1$s">%2$s</div>',
			htmlspecialchars( json_encode( $opts_array ) ), $content
		);
	}

	public function get_content() {
		ob_start();
		$settings     = $this->get_settings();
		$icon_before  = filter_var( $settings['tab_icon_before_show'], FILTER_VALIDATE_BOOLEAN );
		$icon_after   = filter_var( $settings['tab_icon_after_show'], FILTER_VALIDATE_BOOLEAN );
		$item_list    = $this->get_settings('item_list');
		foreach ($item_list as $item) {
			echo '<div class="tt-testimonials-inner">';
				echo '<div class="tt-testimonials-content">';
					echo sprintf( '<div class="tt-testimonials-img-wrap"><img class="tt-testimonials-img" src="%1$s" alt=""></div>', $item['item_image']['url'] );
					echo sprintf( '<div class="tt-testimonials-title">%1$s</div>', $item['item_title'] );
					if($icon_before) { echo sprintf( '<div class="tt-testimonials-icon-before"><div class="tt-testimonials-icon-inner"><i class="%1$s"></i></div></div>', $item['item_icon_before'] ); }
					echo sprintf( '<div class="tt-testimonials-comment"><span>%1$s</span></div>', $item['item_comment'] );
					if($icon_after) { echo sprintf( '<div class="tt-testimonials-icon-after"><div class="tt-testimonials-icon-inner"><i class="%1$s"></i></div></div>', $item['item_icon_after'] ); }
					echo sprintf( '<div class="tt-testimonials-name">%1$s</div>', $item['item_name'] );
					echo sprintf( '<div class="tt-testimonials-position">%1$s</div>', $item['item_position'] );
					echo sprintf( '<div class="tt-testimonials-date">%1$s</div>', $item['item_date'] );
				echo '</div>';
			echo '</div>';
		}
		return ob_get_clean();
	}

	protected function content_template() {}
	public function render_plain_content($instance = []) {}
}
	Plugin::instance()->widgets_manager->register_widget_type(new Widget_TT_Testimonials);
?>