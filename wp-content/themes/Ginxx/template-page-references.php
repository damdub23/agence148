<?php
/**
 * Template Name: Page references
 * Description: Page references
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
    'pages/template-page-references.twig'
));

$args = array(
    "post_type" => "reference",
    "posts_per_page" => -1,
    "show_in_rest" => true,
    "supports" => 'editor',
);

$query = new \Timber\PostQuery($args);
$references = $query->get_posts();

$page->add_to_context('reference', $references);

$page->render();