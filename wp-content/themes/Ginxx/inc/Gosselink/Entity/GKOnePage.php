<?php
/**
 * Created by Jerome GROSDENIER <jerome.grosdenier@gosselink.fr>
 * Date: 17/10/2018
 * Time: 09:36
 */

namespace Gosselink\Entity;

use Timber\Post;

class GKOnePage extends GKPage
{
	/**
	 * @var array $sections
	 */
	private $sections = array();

	public function __construct(array $templates)
	{
		parent::__construct($templates);

		if (function_exists('get_field')){
			$sectionsFromOptions = get_field('one_page_sections', 'option');

			foreach ($sectionsFromOptions as $index => $sectionFromOptions){

				/**
				 * @var \WP_Post $post
				 */
				$post = $sectionFromOptions['one_page_section_page'];

				// Do not include trashed or drafted sections
				if ($post->post_status !== 'publish')
					continue;

				$section = new GKPageSection(
					$post,
					$sectionFromOptions['one_page_section_id'],
					$sectionFromOptions['one_page_section_class']
				);

				// Set next link for when we need to go from one section to another
				$next_link = "";
				if ($index < count($sectionsFromOptions) - 1){
					$next_link = home_url('/') . "#" . $sectionsFromOptions[$index+1]['one_page_section_id'];
				}
				$section->set_next_link(home_url('/') . "#" . $next_link);

				$this->sections[$post->post_name] = $section;
			}
		}

		$this->add_to_context('sections', $this->sections);
	}
}