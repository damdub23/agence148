<?php

namespace Gosselink\Blocks\TestimonyBlock;

use Gosselink\Entity\GKBlock;
use Gosselink\Settings\ACF\TechnicalOptions;

class TestimonyBlock
{

    /** @var GKBlock */
    private $block;

    /**
     * TestimonyBlock constructor.
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
            'key' => 'group_gk_testimonyBlock',
            'title' => 'testimonyBlock',
            'name' => 'testimonyBlock_block',
            'label' => __('TestimonyBlock', 'gosselink'),
            'display' => 'block',
            'fields' => array(
                array(
                    'key' => 'field_gk_testimonials_to_show',
                    'label' => 'Nombre de témoignages à afficher simultanément',
                    'name' => 'gk_testimonials_to_show',
                    'type' => 'number',
                    'instructions' => 'Doit être inférieur au nombre de slides',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '1',
                    'min' => '1',
                    'max' => '4'
                ),
                array(
                    'key' => 'field_efr5c85bead9c',
                    'label' => 'Testimony block',
                    'name' => 'testimonyBlock',
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
                        0 => 'testimonial',
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
