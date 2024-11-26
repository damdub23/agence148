<?php
namespace Gosselink\Service;

use Timber\Post;

class HomepageOnlyService {

	function __construct() {

		add_action('updated_option', array($this, 'change_seo_settings'), 10, 3);
		add_action('template_redirect', array($this, 'redirect_to_home'));
		add_action('wp_insert_post', array($this, 'change_seo_settings_post'), 10, 3);

	}

	/**
	 * Tells if the site should be in homepage only mode when enabled
	 * @return bool
	 */
	public function is_active() {

		// Check du mode homepage only
		if (function_exists('get_field') && get_field('homepage_mode', 'option')) {

			if (is_user_logged_in() && current_user_can('edit_pages')) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Change SEO settings (nofollow, noindex)
	 * @param $option_name
	 * @param $old_value
	 * @param $value
	 */
	function change_seo_settings($option_name, $old_value, $value) {

		if ($option_name === "options_homepage_mode" && $old_value !== $value) {
			$pages = get_pages();
			if ($old_value === "1" && $value === "0") { // Deactivate
				$value = "0";
			} else { // Activate
				$value = "1";
			}

			foreach ($pages as $page) {
				$page = new Post($page);

				if (home_url("/") !== $page->link()) {
					update_post_meta($page->ID, '_yoast_wpseo_meta-robots-noindex', $value);
					update_post_meta($page->ID, '_yoast_wpseo_meta-robots-nofollow', $value);
				}
			}
		}
	}

	/**
	 * On new post, change SEO settings (nofollow, noindex) of this post
	 * @param $post_id
	 * @param $post
	 * @param $update
	 */
	function change_seo_settings_post($post_id, $post, $update ) {
		if (!$this->is_active() || $update)
			return;

		if (home_url("/") !== get_permalink( $post_id )) {
			update_post_meta($post_id, '_yoast_wpseo_meta-robots-noindex', "1");
			update_post_meta($post_id, '_yoast_wpseo_meta-robots-nofollow', "1");
		}
	}

	/**
	 * Redirects all requests to the home page
	 */
	function redirect_to_home() {
		if (!$this->is_active() || is_front_page())
			return;

		// If not 404, redirect to home
		if (!is_404()) {
			wp_redirect(home_url("/"), 301);
			die();
		}
	}
}
