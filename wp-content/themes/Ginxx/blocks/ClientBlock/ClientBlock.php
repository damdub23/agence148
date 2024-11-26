<?php

namespace Gosselink\Blocks\clientBlock;

use Gosselink\Entity\GKBlock;
use Gosselink\Settings\ACF\TechnicalOptions;

class clientBlock
{

    /** @var GKBlock */
    private $block;

    /**
     * clientBlock constructor.
     */
    public function __construct($block)
    {
        $this->block = $block;

        $this->add_acf_fields();
    }

    /**
     * Deal with ACF fields for this block
     */
    function add_acf_fields()
    {
        acf_add_local_field_group(array(
            'key' => 'gk_flexi_clientblock',
            'title' => 'clientblock',
            'name' => 'clientblock_block',
            'label' => __('Bloc clientblock', 'gosselink'),
            'display' => 'block',
            'fields' => array(
                array(
                    'key' => 'field_client_slider_or_grid',
                    'label' => 'Afficher le bloc sous forme de slider',
                    'name' => 'client_display',
                    'aria-label' => '',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_gk_client_to_show',
                    'label' => 'Nombre de client à afficher simultanément',
                    'name' => 'gk_client_to_show',
                    'type' => 'number',
                    'instructions' => 'Doit être inférieur au nombre de slides',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_client_slider_or_grid',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'default_value' => '1',
                    'min' => '1',
                    'max' => '4'
                ),
                array(
                    'key' => 'field_651111ihtad0b',
                    'label' => 'client block',
                    'name' => 'clientblock',
                    'aria-label' => '',
                    'type' => 'post_object',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array(
                        0 => 'partner',
                    ),
                    'post_status' => '',
                    'taxonomy' => '',
                    'return_format' => 'object',
                    'multiple' => 1,
                    'allow_null' => 0,
                    'bidirectional' => 0,
                    'ui' => 1,
                    'bidirectional_target' => array(),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/' . $this->block->slug,
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    }
}
