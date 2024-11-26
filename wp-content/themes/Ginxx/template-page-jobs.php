<?php
/**
 * Template Name: Page Offres d'emplois
 * Description: Page Offres d'emplois
 */

use Gosselink\Entity\GKPage;

/**
 * Page template Offres d'emplois.
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$page = new GKPage(array(
	'pages/template-page-jobs.twig'
));

$args = array(
	'post_type' => 'gkj_jobs',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
);

$jobs = new Timber\PostQuery($args);
$page->add_to_context('jobs', $jobs->get_posts());

$page->render();