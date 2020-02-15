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
        $uitslag->setQuestion1($data['vragen'][0]);
        $uitslag->setQuestion2($data['vragen'][1]);
        $uitslag->setQuestion3($data['vragen'][2]);
        $uitslag->setQuestion4($data['vragen'][3]);
        $uitslag->setQuestion5($data['vragen'][4]);
        $uitslag->setQuestion6($data['vragen'][5]);

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
        $em = $this->getDoctrine()->getManager();

        $data = $em->getRepository(Vraag::class)->findAll();
        shuffle($data);
        $data = array_slice($data, 0, 6, true);

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

}