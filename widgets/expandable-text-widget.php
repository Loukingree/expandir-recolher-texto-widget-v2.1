<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Custom_Expandable_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'custom_expandable_text';
    }

    public function get_title() {
        return 'Texto Expandir/Recolher';
    }

    public function get_icon() {
        return 'eicon-editor-code';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        // Controle para o Texto
        $this->start_controls_section( 'content_section', [
            'label' => 'Texto',
            'tab'   => Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'text', [
            'label'       => 'Texto',
            'type'        => Controls_Manager::WYSIWYG,
            'default'     => 'Este é um texto de exemplo. Personalize-me no painel.',
            'label_block' => true,
        ] );

        $this->add_control( 'min_text_height', [
            'label'       => 'Altura mínima do texto recolhido (px)',
            'type'        => Controls_Manager::NUMBER,
            'default'     => 100,
        ] );

        $this->end_controls_section();

        // Controle para o Botão
        $this->start_controls_section( 'button_section', [
            'label' => 'Botão',
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'button_color', [
            'label'     => 'Cor do botão',
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [ '{{WRAPPER}} .expand-btn' => 'color: {{VALUE}};' ],
        ] );

        $this->add_control( 'button_hover_color', [
            'label'     => 'Cor do botão (hover)',
            'type'      => Controls_Manager::COLOR,
            'default'   => '#dddddd',
            'selectors' => [ '{{WRAPPER}} .expand-btn:hover' => 'color: {{VALUE}};' ],
        ] );

        $this->add_control( 'button_size', [
            'label'   => 'Tamanho do botão (px)',
            'type'    => Controls_Manager::NUMBER,
            'default' => 16,
            'selectors' => [ '{{WRAPPER}} .expand-btn' => 'font-size: {{VALUE}}px;' ],
        ] );

        $this->end_controls_section();

        // Controle para o Fading
        $this->start_controls_section( 'fading_section', [
            'label' => 'Fading',
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'fading_color', [
            'label'     => 'Cor do Fading',
            'type'      => Controls_Manager::COLOR,
            'default'   => '#000000',
            'selectors' => [ '{{WRAPPER}} .text-fade' => 'background: linear-gradient(to bottom, transparent, {{VALUE}});' ],
        ] );

        $this->add_control( 'fading_height', [
            'label'   => 'Altura do Fading (px)',
            'type'    => Controls_Manager::NUMBER,
            'default' => 50,
            'selectors' => [ '{{WRAPPER}} .text-fade' => 'height: {{VALUE}}px;' ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<div class="expandable-text-widget">';
        echo '<div class="text-content" style="max-height: ' . esc_attr( $settings['min_text_height'] ) . 'px;">';
        echo wp_kses_post( $settings['text'] );
        echo '<div class="text-fade"></div>';
        echo '</div>';
        echo '<button class="expand-btn">Expandir</button>';
        echo '</div>';
    }
}