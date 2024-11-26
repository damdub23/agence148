<?php
namespace Gosselink\Settings\ACF;

/**
 * Class FormationFields
 * Gestion des ACF pour les références
 * @package Gosselink\Settings\ACF
 */
class ReferenceFields
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
                    'key' => 'group_6408b73159043',
                    'title' => 'Références',
                    'fields' => array(
                        array(
                            'key' => 'field_6408b7416ffbc',
                            'label' => 'Client',
                            'name' => 'client',
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
                            'key' => 'field_6408b75d6ffbd',
                            'label' => 'Date de conception',
                            'name' => 'date',
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
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'reference',
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

        endif;
	}
}