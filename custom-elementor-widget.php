<?php
/**
 * Plugin Name: Expandir e Recolher Texto
 * Description: Widget para ocultar texto com Expandir/Recolher e personalizações.
 * Version: 2.0
 * Author: Usinagem de Ideias
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

function custom_elementor_widget_register( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/expandable-text-widget.php' );
    $widgets_manager->register( new \Custom_Expandable_Text_Widget() );
}
add_action( 'elementor/widgets/register', 'custom_elementor_widget_register' );

// Adiciona os estilos e scripts personalizados
function custom_elementor_widget_scripts() {
    wp_enqueue_style( 'custom-expandable-text-style', plugins_url( '/assets/style.css', __FILE__ ) );
    wp_enqueue_script( 'custom-expandable-text-script', plugins_url( '/assets/script.js', __FILE__ ), array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'custom_elementor_widget_scripts' );