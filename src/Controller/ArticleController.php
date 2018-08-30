<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function random_int;
use function str_replace;
use function ucwords;

/**
 * Class ArticleController.
 */
class ArticleController extends AbstractController
{
    /**
     * @Route(path="/", name="app_homepage")
     */
    public function homepage() : Response
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     *
     * @param string $slug Slug for a news article
     */
    public function show(string $slug) : Response
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        return $this->render(
            'article/show.html.twig',
            [
                'title' => ucwords(str_replace('-', ' ', $slug)),
                'comments' => $comments,
                'slug' => $slug,
            ]
        );
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     *
     * @param string          $slug   Slug for a news article
     * @param LoggerInterface $logger Logger instance
     *
     * @throws \Exception
     */
    public function toggleArticleHeart(string $slug, LoggerInterface $logger) : JsonResponse
    {
        $logger->info('Article is being hearted!');

        // TODO - actually heart/unheart the article!
        return $this->json(['hearts' => random_int(5, 100)]);
    }
}
