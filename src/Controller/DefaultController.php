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
                'submitted' => 'ok',
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
     * @Route("/all-questions", name="all_questions")
     */
    public function getAllQuestions()
    {

        $em = $this->getDoctrine()->getManager();

        $data = $em->getRepository(Vraag::class)->findAll();

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

    /**
     * @Route("/add-question", name="add_question",  methods={"post"})
     */
    public function addQuestion(Request $request){

        $data = json_decode($request->getContent(),
            true);
        $question = new Vraag();
        $question->setQuestion($data['question']);
        $question->setOption1($data['option1']);
        $question->setOption2($data['option2']);
        $question->setOption3($data['option3']);
        $question->setOption4($data['option4']);
        $question->setAnswer($data['answer']);

        $em =$this->getDoctrine()->getManager();
        $em->persist($question);
        $em->flush();

        $response = new JsonResponse(
            [
                'addedQuestion' => 'ok',
            ],
            JsonResponse::HTTP_CREATED
        );

        $response->headers->set('Access-Control-Allow-Origin', '*');
//        dd($data);
        return $response;
    }

}