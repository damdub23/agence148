<?php
/**
 * Created by>
 * Date: 23/11/2018
 * Time: 17:31
 */

namespace Gosselink\Settings\ACF;


class SiteOptions
{
    function __construct()
    {
        add_action('acf/init', array($this, 'register_options'));
    }

    function register_options()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group(array(
                'key' => 'general_site_options',
                'title' => __('Options du site', 'gosselink'),
                'fields' => array(

                    // IDENTITY
                    array(
                        'key' => 'gk_site_coords',
                        'label' => __('Coordonnées', 'gosselink'),
                        'type' => 'tab',
                    ),
                    array(
                        'key' => 'gk_site_location',
                        'label' => __('Adresse de l\'établissement', 'gosselink'),
                        'name' => 'googlemap_location',
                        'type' => 'google_map',
                        'instructions' => __('Positionnez votre établissement.', 'gosselink')
                    ),
                    array(
                        'key' => 'gk_site_map_link',
                        'label' => __('Lien vers la carte', 'gosselink'),
                        'name' => 'link_map',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'gk_site_image',
                        'label' => __('Photo de la société', 'gosselink'),
                        'name' => 'agency_photo',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'gk_site_name',
                        'label' => __('Nom client', 'gosselink'),
                        'name' => 'name',
                        'type' => 'text',
                        'instructions' => __('50 caractères maximum', 'gosselink'),
                        'maxlength' => 50,
                    ),
                    array(
                        'key' => 'gk_site_address',
                        'label' => __('Adresse du client', 'gosselink'),
                        'name' => 'client_address',
                        'type' => 'textarea',
                        'instructions' => __('Saisissez l\'adresse telle que présente dans le pied de page(les retour chariot seront conservés tels quels).', 'gosselink'),

                    ),
                    array(
                        'key' => 'gk_site_telephone',
                        'label' => __('Téléphone', 'gosselink'),
                        'name' => 'phone',
                        'type' => 'text',
                        'instructions' => __('16 caractères maximum (exemple : 02 99 23 33 33).', 'gosselink'),
                        'maxlength' => 20,
                    ),
                    array(
                        'key' => 'gk_site_mail',
                        'label' => __('Mail de contact principal', 'gosselink'),
                        'name' => 'mail',
                        'type' => 'email',
                    ),
                    array(
                        'key' => 'gk_site_infos_supp',
                        'label' => __('Infos complémentaires', 'gosselink'),
                        'name' => 'complementary_info',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'gk_site_infos_supp_title',
                                'label' => __('Titre', 'gosselink'),
                                'name' => 'title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'gk_site_infos_supp_text',
                                'label' => __('Complément d\'informations', 'gosselink'),
                                'name' => 'detail_info',
                                'type' => 'wysiwyg',
                            ),
                        ),
                    ),

                    // SOCIAL NETWORKS
                    array(
                        'key' => 'gk_site_networks',
                        'label' => __('Réseaux sociaux', 'gosselink'),
                        'type' => 'tab',
                    ),
                    array(
                        'key' => 'gk_site_networks_youtube',
                        'label' => __('Youtube', 'gosselink'),
                        'name' => 'youtube',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'gk_site_networks_twitter',
                        'label' => __('Twitter', 'gosselink'),
                        'name' => 'twitter',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'gk_site_networks_facebook',
                        'label' => __('Facebook', 'gosselink'),
                        'name' => 'facebook',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'gk_site_networks_instagram',
                        'label' => __('Instagram', 'gosselink'),
                        'name' => 'instagram',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'gk_site_networks_linkedin',
                        'label' => __('Linkedin', 'gosselink'),
                        'name' => 'linkedin',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'gk_site_networks_tripadvisor',
                        'label' => __('Tripadvisor', 'gosselink'),
                        'name' => 'tripadvisor',
                        'type' => 'url',
                    ),

                    array(
                        'key' => 'gk_site_bottom_blocks',
                        'label' => __('Blocs bas de pages', 'gosselink'),
                        'type' => 'tab',
                    ),

                    array(
                        'key' => 'field_602cf37a45f59',
                        'label' => 'Bloc n°1',
                        'name' => '',
                        'type' => 'accordion',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'open' => 0,
                        'multi_expand' => 0,
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_602b9e44fd98c',
                        'label' => '',
                        'name' => 'first_bottom_block',
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_602b84fa2ff49',
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
                                'key' => 'field_602b84f89QA49',
                                'label' => 'Sous-titre',
                                'name' => 'subtitle',
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
                                'key' => 'field_602b85052ff4a',
                                'label' => 'Description',
                                'name' => 'description',
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
                                'key' => 'field_602b85192ff4b',
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
                                'return_format' => 'array',
                            ),
                            array(
                                'key' => 'field_602b8c453161c',
                                'label' => 'Choix de la couleur du bloc',
                                'name' => 'color',
                                'type' => 'color_picker',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                            ),

                            array(
                                'key' => 'field_52z91rr12b812cd0',
                                'label' => __('Image', 'gosselink'),
                                'name' => 'bg_image',
                                'type' => 'image',
                                'instructions' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_602cf40458e46',
                        'label' => 'Bloc n°2',
                        'name' => '',
                        'type' => 'accordion',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'open' => 0,
                        'multi_expand' => 0,
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_602cf36145f4f',
                        'label' => '',
                        'name' => 'second_bottom_block',
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_602cf36145f50',
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
                                'key' => 'field_602h67r89QA49',
                                'label' => 'Sous-titre',
                                'name' => 'subtitle',
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
                                'key' => 'field_602cf36145f51',
                                'label' => 'Description',
                                'name' => 'description',
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
                                'key' => 'field_602cf36145f52',
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
                                'return_format' => '',
                            ),
                            array(
                                'key' => 'field_602cf36145f53',
                                'label' => 'Choix de la couleur du bloc',
                                'name' => 'color',
                                'type' => 'color_picker',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                            ),

                            array(
                                'key' => 'field_52z91rr12b826fr90',
                                'label' => __('Image', 'gosselink'),
                                'name' => 'bg_image',
                                'type' => 'image',
                                'instructions' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_602cf40f58e47',
                        'label' => 'Bloc n°3',
                        'name' => '',
                        'type' => 'accordion',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'open' => 0,
                        'multi_expand' => 0,
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_602cf36e45f54',
                        'label' => '',
                        'name' => 'third_bottom_block',
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_602cf36e45f55',
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
                                'key' => 'field_908gt54f89QA49',
                                'label' => 'Sous-titre',
                                'name' => 'subtitle',
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
                                'key' => 'field_602cf36e45f56',
                                'label' => 'Description',
                                'name' => 'description',
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
                                'key' => 'field_602cf36e45f57',
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
                                'return_format' => 'array',
                            ),
                            array(
                                'key' => 'field_602cf36e45f58',
                                'label' => 'Choix de la couleur du bloc',
                                'name' => 'color',
                                'type' => 'color_picker',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                            ),

                            array(
                                'key' => 'field_52z91rr12c187cd0',
                                'label' => __('Image', 'gosselink'),
                                'name' => 'bg_image',
                                'type' => 'image',
                                'instructions' => '',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'gk-options-site',
                        ),
                    ),
                )
            ));

        endif;
    }
}
