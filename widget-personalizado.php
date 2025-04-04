<?php
/**
 * Widget Personalizado Ejemplo
 * 
 * Un widget de ejemplo para usar en el área de widgets global
 */

// Evitar acceso directo al archivo
defined('ABSPATH') or die('No script kiddies please!');

// Clase del widget personalizado
class Widget_Personalizado extends WP_Widget {

    // Constructor
    public function __construct() {
        parent::__construct(
            'widget_personalizado', // ID del widget
            'Widget Personalizado', // Nombre que aparece en la interfaz de admin
            array(
                'description' => 'Un widget personalizado de ejemplo',
                'classname' => 'widget-personalizado',
            )
        );
    }
    
    // Crear el formulario de opciones en el admin
    public function form($instance) {
        // Valores por defecto
        $defaults = array(
            'titulo' => 'Mi Widget Personalizado',
            'contenido' => 'Este es un widget personalizado de ejemplo que puedes editar desde el administrador de WordPress.',
        );
        
        // Combinar valores guardados con valores por defecto
        $instance = wp_parse_args((array) $instance, $defaults);
        
        // Extraer valores
        $titulo = $instance['titulo'];
        $contenido = $instance['contenido'];
        ?>
        
        <p>
            <label for="<?php echo $this->get_field_id('titulo'); ?>"><?php _e('Título:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('titulo'); ?>" name="<?php echo $this->get_field_name('titulo'); ?>" type="text" value="<?php echo esc_attr($titulo); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('contenido'); ?>"><?php _e('Contenido:'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('contenido'); ?>" name="<?php echo $this->get_field_name('contenido'); ?>" rows="5"><?php echo esc_textarea($contenido); ?></textarea>
        </p>
        
        <?php
    }
    
    // Guardar las opciones del widget
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        
        $instance['titulo'] = sanitize_text_field($new_instance['titulo']);
        $instance['contenido'] = wp_kses_post($new_instance['contenido']);
        
        return $instance;
    }
    
    // Mostrar el widget en el frontend
    public function widget($args, $instance) {
        extract($args);
        
        $titulo = apply_filters('widget_title', $instance['titulo']);
        $contenido = $instance['contenido'];
        
        echo $before_widget;
        
        if (!empty($titulo)) {
            echo $before_title . $titulo . $after_title;
        }
        
        echo '<div class="widget-content">';
        echo wpautop($contenido); // Aplica formato de párrafo al contenido
        echo '</div>';
        
        echo $after_widget;
    }
}

// Función para registrar el widget
function registrar_widget_personalizado() {
    register_widget('Widget_Personalizado');
}
add_action('widgets_init', 'registrar_widget_personalizado'); 