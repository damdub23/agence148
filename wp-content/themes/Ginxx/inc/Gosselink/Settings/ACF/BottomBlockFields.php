<?php

namespace Gosselink\Settings\ACF;

/**
 * Class BottomBlockFields
 * Gestion des ACF pour les blocs de bas de page
 * @package Gosselink\Settings\ACF
 */
class BottomBlockFields
{
    function __construct()
    {
        add_action('init', array($this, 'register_fields'), 50);
    }
    function register_fields()
    {
        if( function_exists('acf_add_local_field_group') ):
            if( function_exists('acf_add_local_field_group') ):
                acf_add_local_field_group(array(
                    'key' => 'group_64fdbdcd6f0ba',
                    'title' => 'options page',
                    'fields' => array(
                        array(
                            'key' => 'field_64fdbdcdab4b5',
                            'label' => 'Afficher un bloc en pied de page',
                            'name' => 'block_display',
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
                            'key' => 'field_64fdbe106101c',
                            'label' => 'options multiples',
                            'name' => 'multiples_options',
                            'aria-label' => '',
                            'type' => 'button_group',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => array(
                                array(
                                    array(
                                        'field' => 'field_64fdbdcdab4b5',
                                        'operator' => '==',
                                        'value' => '1',
                                    ),
                                ),
                            ),
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                'first_bottom_block' => 'Bloc 1',
                                'second_bottom_block' => 'Bloc 2',
                                'third_bottom_block' => 'Bloc 3',
                            ),
                            'default_value' => '',
                            'return_format' => 'value',
                            'allow_null' => 0,
                            'layout' => 'horizontal',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'page',
                            ),
                        ),
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'formation',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'side',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => true,
                    'description' => '',
                    'show_in_rest' => 0,
                ));
            endif;
        endif;
    }
}