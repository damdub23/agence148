<?php

namespace Gosselink;
/**
 * Created by
 * Date: 09/08/2018
 * Time: 15:22
 *
 * The main Theme Class
 *
 */

namespace Gosselink;

use Gosselink\Service\AdminService;
use Gosselink\Service\AjaxService;
use Gosselink\Service\CommentsService;
use Gosselink\Service\BlocksService;
use Gosselink\Service\MaintenanceService;
use Gosselink\Service\OnePageService;
use Gosselink\Service\SecurityService;
use Gosselink\Service\ServiceManager;
use Gosselink\Service\TwigService;
use Gosselink\Service\WooCommerceService;
use Gosselink\Settings\ACF\ActusFields;
use Gosselink\Settings\ACF\TechnicalOptions;
use Gosselink\Settings\CustomPostTypes;
use Gosselink\Settings\ACF\OptionsPages;
use Gosselink\Settings\ACF\BlogOptions;
use Gosselink\Settings\ACF\HomepageFields;
use Gosselink\Settings\ACF\FormationFields;
use Gosselink\Settings\ACF\ReferenceFields;
use Gosselink\Settings\ACF\PartnerFields;
use Gosselink\Settings\ACF\BottomBlockFields;
use Gosselink\Settings\ACF\TestimonialFields;
use Gosselink\Settings\ACF\SupportOrganizationFields;
use Gosselink\Settings\ACF\CategoryReferenceFields;
use Gosselink\Settings\ACF\SocialMediasList;

use Timber\Site;

class GKSite extends Site
{

    // GLOBAL OPTIONS
    const ONE_PAGE_ENABLED = true; // One page features can be totally disabled here
    const WOOCOMMERCE_SUPPORT_ENABLED = true; // Woocommerce stuff
    const TOP_ANCHOR = "top"; // Anchor for the first section when one page is enabled
    const TRANSLATE_OPTIONS = false; // Sometimes you just need to translate option page, and sometimes you don't

    // SECURITY OPTIONS
    const AUTHOR_ARCHIVE_ENABLED = false;
    const SECURITY_KEY = '261973016549999147'; // Change it for every project !

    /**
     * GKSite constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->init_theme();
    }


    /**
     * Init stuff
     */
    private function init_theme()
    {

        // Gosselink Services
        ServiceManager::get_instance($this);
        new AdminService();
        new CustomPostTypes();
        new TwigService();
        new OptionsPages();
        new BlogOptions();
        new SecurityService();
        new AjaxService();
        new BlocksService();
        new HomepageFields();
        new ActusFields();
        new OnePageService();
        new WooCommerceService();
        new FormationFields();
        new TestimonialFields();
        new ReferenceFields();
        new PartnerFields();
        new SupportOrganizationFields();
        new CategoryReferenceFields();
        new BottomBlockFields();
        new SocialMediasList();


        if (function_exists('get_field') && get_field('disable_comments', 'option')) {
            $commentsService = new CommentsService();
            $commentsService->disable_comments();
        }

        // Theme generic support
        add_theme_support('post-formats', array());
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

        // Add excerpt in pages
        add_post_type_support('page', 'excerpt');
        add_post_type_support('reference', 'excerpt');
        add_post_type_support('service', 'excerpt');

        // Theme Gutenberg support
        remove_theme_support('core-block-patterns');

        add_action('wp_enqueue_scripts', array($this, 'load_scripts'));

        add_action('init', array($this, 'register_menus'));
        add_action('widgets_init', array($this, 'register_sidebars'));

        // Remove <br> and <p> in form7
        add_filter('wpcf7_autop_or_not', '__return_false');

        /* Remove meta tags with WordPress / WooCommerce versions */
        remove_action('wp_head', 'wp_generator');

        /* Disable Emojis */
        remove_action('wp_head', 'print_emoji_detection_script', 7); // Front-end browser support detection script
        remove_action('admin_print_scripts', 'print_emoji_detection_script'); // Admin browser support detection script
        remove_action('wp_print_styles', 'print_emoji_styles'); // Emoji styles
        remove_action('admin_print_styles', 'print_emoji_styles'); // Admin emoji styles
        remove_filter('the_content_feed', 'wp_staticize_emoji'); // Remove from feed, this is bad behaviour!
        remove_filter('comment_text_rss', 'wp_staticize_emoji'); // Remove from feed, this is bad behaviour!
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email'); // Remove from mail
        /* End Disable Emojis */

        // Once everything is loaded, check for maintenance mode
        MaintenanceService::check_for_maintenance();

        // Now we can make exceptions when in maintenance mode
        // if (!MaintenanceService::is_in_maintenance()){ // do some stuff }}
        //remove jquery migrate on front page
        add_action('wp_default_scripts', array($this, 'dequeue_jquery_migrate'));
    }

    /**
     * Theme Scripts and Stylesheets
     */
    function load_scripts()
    {
        $theme = wp_get_theme();

        wp_enqueue_style('site-styles', get_template_directory_uri() . '/dist/app.min.css', array(), $theme->Version, 'all');

        wp_register_script('site-scripts', get_template_directory_uri() . '/dist/app.min.js', array('jquery'), $theme->Version, true);

        // Inject PHP Variables into Javascript
        $data_array = array(
            'assets_path' => get_stylesheet_directory_uri() . '/static/',
            'images_path' => get_stylesheet_directory_uri() . '/static/images/',
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('gk-nonce'),
        );

        $options = array();
        $options_keys = array(
            'is_one_page',
            'scroll_top_enabled',
            'smooth_scroll_enabled',
            'maps_google_api_key',
            'maps_snazzy',
            'maps_provider',
            'cookies_banner_enabled',
            'cookies_banner_bgcolor',
            'cookies_banner_button_color',
            'gtm_enabled',
            'gtm_id',
            'ga_enabled',
            'ga_id',
            'ga_domain',
        );
        if (function_exists('get_field')) {

            foreach ($options_keys as $key) {
                $options[$key] = get_field($key, 'options');
            }

            $maps_pin = get_field('maps_pin', 'options');
            if ($maps_pin) {
                $options['maps_pin'] = $maps_pin['url'];
                $options['maps_pin_width'] = round($maps_pin['width'] / 2);
                $options['maps_pin_height'] = round($maps_pin['height'] / 2);
            } else {
                $options['maps_pin'] = false;
            }
        }

        // Privacy Policy (WP 4.9.6+ only)
        $options['privacy_policy_url'] = '#';
        if (function_exists('get_privacy_policy_url')) {
            $options['privacy_policy_url'] = get_privacy_policy_url();
            $options['privacy_policy_id'] = get_option('wp_page_for_privacy_policy');
        }

        $data_array['options'] = $options;

        wp_localize_script('site-scripts', 'wp_data', $data_array);
        wp_enqueue_script('site-scripts');
    }

    /**
     * Declare Menus
     */
    function register_menus()
    {
        register_nav_menu('main-menu', __('Menu principal', 'gosselink'));

        if (!function_exists('get_field'))
            return;

        if (get_field('footer_menu_enabled', 'options')) {
            register_nav_menu('footer-menu', __('Menu Footer', 'gosselink'));
            register_nav_menu('footer-menu-2', __('Menu Footer 2', 'gosselink'));
            register_nav_menu('footer-menu-3', __('Menu Footer 3', 'gosselink'));
            register_nav_menu('footer-menu-4', __('Menu Footer 4', 'gosselink'));
        }

        if (get_field('sitemap_enabled', 'options')) {
            register_nav_menu('sitemap-menu', __('Menu Plan du site', 'gosselink'));
        }
    }

    /**
     * Declare Sidebars
     */
    function register_sidebars()
    {
        register_sidebar(array(
            'name' => __('Sidebar', 'gosselink'),
            'id' => 'sidebar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));

        if (self::WOOCOMMERCE_SUPPORT_ENABLED) {
            register_sidebar(array(
                'name' => __('Shop sidebar', 'gosselink'),
                'id' => 'shop-sidebar',
            ));
        }
    }

    /**
     * Remove jquery update in frontend
     */
    function dequeue_jquery_migrate($scripts)
    {
        if (!is_admin() && !empty($scripts->registered['jquery'])) {
            $scripts->registered['jquery']->deps = array_diff(
                $scripts->registered['jquery']->deps,
                ['jquery-migrate']
            );
        }
    }
}
