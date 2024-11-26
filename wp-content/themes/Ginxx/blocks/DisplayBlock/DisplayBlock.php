<?php

namespace Gosselink\Blocks\DisplayBlock;

use Gosselink\Entity\GKBlock;
use Gosselink\Settings\ACF\TechnicalOptions;

class DisplayBlock {

    /** @var GKBlock */
    private $block;

    /**
     * DisplayBlock constructor.
     */
    public function __construct($block) {
        $this->block = $block;

        $this->add_acf_fields();
    }

    /**
     * Deal with ACF fields for this block
     */
    function add_acf_fields() {

        acf_add_local_field_group(array(
            'key' => 'column_display',
            'title' => 'Mise en avant',
            'fields' => array(
                array(
                    'key' => 'field_column_slider_or_grid',
                    'label' => 'Afficher le bloc sous forme de slider',
                    'name' => 'column_display',
                    'aria-label' => '',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50%',
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
                    'key' => 'field_css_class',
                    'label' => 'Mode d\'affichage',
                    'name' => 'css_class',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => 'Choisissez une classe CSS à appliquer au bloc',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50%',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        '-teamStyle1' => 'Affichage 1',
                        '-teamStyle2' => 'Affichage 2',
                        '-teamStyle3' => 'Affichage 3',
                        '-teamStyle4' => 'Affichage 4',
                    ),
                    'default_value' => array(),
                    'allow_null' => 1,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_gk_column_to_show',
                    'label' => 'Nombre de slides à afficher simultanément',
                    'name' => 'gk_column_to_show',
                    'type' => 'number',
                    'instructions' => 'Doit être inférieur au nombre de slides',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_column_slider_or_grid',
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
                    'key' => 'gk_flexi_promoteblock',
                    'label' => 'Bloc promotion',
                    'name' => 'promote_block',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'block',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_66b21d37fc320',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'preview_size' => 'medium',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_66b21d47fc321',
                            'label' => 'Titre',
                            'name' => 'title',
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
                            'key' => 'field_66b21d52fc322',
                            'label' => 'Description',
                            'name' => 'description',
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
                            'key' => 'field_66b21d5ffc323',
                            'label' => 'Lien',
                            'name' => 'link',
                            'type' => 'link',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                        ),
                    ),
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
