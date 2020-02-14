<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="article_toggle_heart")
     */
    public function toggleArticleHeart()
    {
        // TODO - actually heart/unheart the article!
        return new JsonResponse(['hearts' => rand(5, 100)]);
    }

    /**
     * @Route("/news", name="article_toggle_heart")
     */
    public function toggleArticleHear()
    {
        // TODO - actually heart/unheart the article!
        $data = ['heats'=>rand(5,100)];
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
//        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}