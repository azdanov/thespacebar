<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function sprintf;

/**
 * Class ArticleController.
 */
class ArticleController
{
    /**
     * @Route(path="/", methods={"GET"})
     */
    public function homepage() : Response
    {
        return new Response("I'm on homepage!");
    }

    /**
     * @Route("/news/{slug}")
     *
     * @param string $slug A slug for a news article
     */
    public function show(string $slug) : Response
    {
        return new Response(sprintf('Future page that shows an article: "%s"', $slug));
    }
}
