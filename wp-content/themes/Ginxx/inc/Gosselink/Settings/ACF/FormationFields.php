<?php

namespace Gosselink\Settings\ACF;

/**
 * Class FormationFields
 * Gestion des ACF pour les formations
 * @package Gosselink\Settings\ACF
 */
class FormationFields
{
    function __construct()
    {
        add_action('init', array($this, 'register_fields'), 50);
    }

    function register_fields()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group(array(
                'key' => 'group_6400aedcd217a',
                'title' => 'Formations',
                'fields' => array(
                    array(
                        'key' => 'field_64021e051a4ae',
                        'label' => 'Détail du programme',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'top',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_64ee5db68dbbd',
                        'label' => 'Présentation de la formation',
                        'name' => 'course_presentation',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_64ee5e448dbbf',
                        'label' => 'Contenu de la formation',
                        'name' => 'presentation_content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_64ee5e298dbbe',
                        'label' => 'Les + de cette formation',
                        'name' => 'presentation_benefits',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_64021e1a1a4af',
                        'label' => 'Détail du programme',
                        'name' => 'program_detail',
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
                                'key' => 'field_64021e631a4b0',
                                'label' => 'Titre de l\'étape',
                                'name' => 'step_title',
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
                                'key' => 'field_64021e8e1a4b1',
                                'label' => 'Détail de l\'étape',
                                'name' => 'step_detail',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                            array(
                                'key' => 'field_6402207b06a23',
                                'label' => 'Image de présentation',
                                'name' => 'step_img',
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
                                'key' => 'field_6405e4e818076',
                                'label' => 'Afficher des infos complémentaires ?',
                                'name' => 'display',
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
                                'ui' => 1,
                                'ui_on_text' => '',
                                'ui_off_text' => '',
                            ),
                            array(
                                'key' => 'field_6405a734a6f24',
                                'label' => 'Informations (sous forme d\'accordéon)',
                                'name' => 'info_accordion',
                                'type' => 'repeater',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_6405e4e818076',
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
                                'collapsed' => '',
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'row',
                                'button_label' => '',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_6405af3ba6f25',
                                        'label' => 'Titre',
                                        'name' => 'accordion_title',
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
                                        'key' => 'field_6405af57a6f26',
                                        'label' => 'Description',
                                        'name' => 'accordion_desc',
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
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_6400b713b246b',
                        'label' => 'En bref',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'top',
                        'endpoint' => 0,
                    ),

                    array(
                        'key' => 'gk_courses_infos_supp',
                        'label' => __('Infos complémentaires', 'gosselink'),
                        'name' => 'more_info',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'gk_courses_infos_supp_title',
                                'label' => __('Titre', 'gosselink'),
                                'name' => 'title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'gk_courses_infos_supp_text',
                                'label' => __('Complément d\'informations', 'gosselink'),
                                'name' => 'detail_info',
                                'type' => 'wysiwyg',
                            ),
                        ),
                    ),

                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'formation',
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