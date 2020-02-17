<?php

namespace App\Controller;

use App\Entity\Uitslag;
use App\Entity\Vraag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/post/vragen", name="post_vragen", methods={"post"})
     */
    public function post(Request $request)
    {
//        $request->headers->set('Access-Control-Allow-Origin', '*');
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(),
            true);

        $uitslag = new Uitslag();

        $uitslag->setNaam($data['name']);
        $uitslag->setQuestions($data['vragen']);

        $em->persist($uitslag);
        $em->flush();

        $response = new JsonResponse(
            [
                'status' => 'ok',
            ],
            JsonResponse::HTTP_CREATED
        );

        $response->headers->set('Access-Control-Allow-Origin', '*');
//        dd($data);
        return $response;

    }

    /**
     * @Route("/vragen", name="vragen")
     */
    public function getVragen()
    {
        $lenght = 6;
        $em = $this->getDoctrine()->getManager();

        $data = $em->getRepository(Vraag::class)->findAll();
        shuffle($data);
        $data = array_slice($data, 0, $lenght, true);

        //dd($data);

        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/history", name="get_vragen")
     */
    public function getHistory(){
        $em = $this->getDoctrine()->getManager();

        $data = $em->getRepository(Uitslag::class)->findAll();

        //dd($data);

        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }


    /**
     * @Route("/history-details/{id}", name="get_vragen_details")
     */
    public function getHistoryDetails($id){
        $em = $this->getDoctrine()->getManager();

        $data = $em->getRepository(Uitslag::class)->find($id);

//        dd($data);

        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

}