<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function str_replace;
use function ucwords;

/**
 * Class ArticleController.
 */
class ArticleController extends AbstractController
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
        $comments = [
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit!',
            'Lorem ipsum dolor sit amet.',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, iure?',
        ];

        return $this->render(
            'article/show.html.twig',
            ['title' => ucwords(str_replace('-', ' ', $slug)), 'comments' => $comments]
        );
    }
}
