<?php
/**
 * Template Name: Page formations
 * Description: Page formations
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
    'pages/template-page-formations.twig'
));

$args = array(
    "post_type" => "formation",
    "posts_per_page"=> -1,
);

$query = new \Timber\PostQuery($args);
$formations = $query->get_posts();

$page->add_to_context('formation', $formations);

$page->render();