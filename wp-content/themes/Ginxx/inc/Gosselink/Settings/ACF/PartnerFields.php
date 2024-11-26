<?php
namespace Gosselink\Settings\ACF;

/**
 * Class FormationFields
 * Gestion des ACF pour les références
 * @package Gosselink\Settings\ACF
 */
class PartnerFields
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
                    'key' => 'group_90167bg3159043',
                    'title' => 'Partenaires',
                    'fields' => array(
                        array(
                            'key' => 'field_650ca07b948ed',
                            'label' => 'Lien du partenaire',
                            'name' => 'partners_link',
                            'aria-label' => '',
                            'type' => 'url',
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
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'partner',
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