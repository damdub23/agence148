<?php
/**
 * Created by Jerome GROSDENIER <jerome.grosdenier@gosselink.fr>
 * Date: 30/08/2018
 * Time: 10:00
 */

namespace Gosselink\Service;

use Gosselink\Entity\GKPage;
use Gosselink\GKSite;
use Timber\Post;
use Timber\PostQuery;
use Timber\Timber;

class OnePageService
{
	private $site;

	function __construct() {

		$service_manager = ServiceManager::get_instance();
		$this->site = $service_manager->get_site();

		if (!self::is_active())
			return;

		if(!function_exists('get_field'))
			return;

		if (!GKSite::ONE_PAGE_ENABLED || !get_field('is_one_page', 'option'))
			return;

		// One page actions & filters
		add_action( 'template_redirect', array($this, 'one_page_redirect') );
		add_action( 'template_redirect', array($this, 'set_home_url') );
	}


	/**
	 * Tells wether OnePage mode is enabled
	 * @return bool
	 */
	public static function is_active(){
		return function_exists('get_field') && GKSite::ONE_PAGE_ENABLED && get_field('is_one_page', 'option') ;
	}

	/**
	 * Redirects all requests to the home page if requested
	 */
	function one_page_redirect(){

		if (is_front_page())
			return;

		// If current page is a homepage section => redirect to home
		if (!is_404() && self::is_page_a_section(new Post())){

			wp_redirect(esc_url(home_url('/')), 301);
			exit();

		}
	}

	/**
	 * Set Url for homepage (scroll top when onepage)
	 */
	function set_home_url(){

		// Home is now the top of the page
		if (is_front_page())
		{
			$this->site->url = home_url("/") . "#" . GKSite::TOP_ANCHOR;
		}
	}

	/**
	 * Tells if the page is a chosen section
	 * @param $page
	 * @return bool
	 */
	static function is_page_a_section($page){

		$one_page_sections = get_field('one_page_sections', 'option');
		foreach ($one_page_sections as $section) {

			$page_in_section = $section['one_page_section_page'];

			if ($page_in_section->ID === $page->ID){
				return true;
			}
		}

		return false;
	}

}
