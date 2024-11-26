<?php

namespace Gosselink\Blocks\TeamBlock;

use Gosselink\Entity\GKBlock;
use Gosselink\Settings\ACF\TechnicalOptions;

class TeamBlock
{

    /** @var GKBlock */
    private $block;

    /**
     * TeamBlock constructor.
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
            'key' => 'gk_flexi_teamblock',
            'title' => 'teamblock',
            'name' => 'teamblock_block',
            'label' => __('Bloc teamblock', 'gosselink'),
            'display' => 'block',
            'fields' => array(
                array(
                    'key' => 'field_team_slider_or_grid',
                    'label' => 'Afficher le bloc sous forme de slider',
                    'name' => 'team_display',
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
                    'key' => 'field_gk_teams_to_show',
                    'label' => 'Nombre de personnes à afficher simultanément',
                    'name' => 'gk_teams_to_show',
                    'type' => 'number',
                    'instructions' => 'Doit être inférieur au nombre de slides',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_team_slider_or_grid',
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
                    'key' => 'field_6511c85bead0b',
                    'label' => 'Team block',
                    'name' => 'teamblock',
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
                        0 => 'team',
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
