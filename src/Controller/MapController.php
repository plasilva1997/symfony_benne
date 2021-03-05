<?php

namespace App\Controller;

use App\Repository\BinRepository;
use App\Service\SerializerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MapController extends AbstractController
{
    private SerializerService $serializerService;


    public function __construct(SerializerService $serializerService){
        $this->serializerService = $serializerService;
    }

    /**
     * @Route("/map", name="map")
     * @param BinRepository $binRepository
     * @return Response
     */
    public function index(BinRepository $binRepository): Response
    {
        //recuperation donnes BDD
        $bin = $binRepository->findAll();

        //Seriallization
        $jsonContent = $this->serializerService->serialize($bin);


        return $this->render('map/index.html.twig', [
            'controller_name' => 'MapController',
            'bins' => $jsonContent
        ]);
    }
}
