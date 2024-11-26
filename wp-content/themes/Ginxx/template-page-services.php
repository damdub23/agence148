<?php
/**
 * Template Name: Page services
 * Description: Page services
 */

use Gosselink\Entity\GKPage;

/**
 * Page template example.
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$page = new GKPage(array(
    'pages/template-page-services.twig'
));

$args = array(
    "post_type" => "service",
    "posts_per_page"=> -1,
    "show_in_rest" => true,
    "supports" => 'editor',
);

$query = new \Timber\PostQuery($args);
$services = $query->get_posts();

$page->add_to_context('service', $services);

$page->render();