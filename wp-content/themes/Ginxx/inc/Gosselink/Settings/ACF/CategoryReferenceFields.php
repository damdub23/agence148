<?php

namespace Gosselink\Settings\ACF;

use Gosselink\GKSite;

class CategoryReferenceFields
{
    function __construct()
    {
	    add_action('init', array($this, 'register_fields'));
    }

    function register_fields()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group(array(
                'key' => 'gk_categoryReferences_fields',
                'title' => __('Catégorie', 'gosselink'),
	            'fields' => array(
		            array(
			            'key' => 'gk_categoryReferences_logo',
			            'label' => __('Logo', 'gosselink'),
			            'instructions' => __('Taille : 100x60px', 'gosselink'),
			            'name' => 'logo',
			            'type' => 'image',
		            ),
	            ),
                'location' => array(
                    array(
	                    array(
		                    'param' => 'taxonomy',
		                    'operator' => '==',
		                    'value' => 'cat-reference',
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