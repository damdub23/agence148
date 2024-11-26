<?php
namespace Gosselink\Settings\ACF;

/**
 * Class FormationFields
 * Gestion des ACF pour les formations
 * @package Gosselink\Settings\ACF
 */
class TestimonialFields
{
	function __construct()
	{
		add_action('init', array($this, 'register_fields'), 50);
	}

	function register_fields()
	{
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_640b5288e383c',
                'title' => 'Testimonials',
                'fields' => array(
                    array(
                        'key' => 'field_640b52efc76af',
                        'label' => 'Détail du témoignage',
                        'name' => 'testimonial_detail',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                    ),
                    array(
                        'key' => 'field_640b52a265009',
                        'label' => 'Fonction',
                        'name' => 'function',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_640b52ad6500a',
                        'label' => 'Note',
                        'name' => 'notation',
                        'type' => 'select',
                        'instructions' => 'Indiquez une note de 0 à 5 (Facultatif)',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            0 => '0',
                            '0.5' => '0.5',
                            1 => '1',
                            '1.5' => '1.5',
                            2 => '2',
                            '2.5' => '2.5',
                            3 => '3',
                            '3.5' => '3.5',
                            4 => '4',
                            '4.5' => '4.5',
                            5 => '5',
                        ),
                        'default_value' => false,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'testimonial',
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

        endif;
	}
}