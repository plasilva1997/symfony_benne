<?php

namespace App\Controller;

use App\Repository\BinRepository;
use App\Service\SerializerService;
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
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

        $bins = $binRepository->findAll();



        return $this->render('map/index.html.twig', [
            'controller_name' => 'MapController',
            'bin' => $bins
        ]);
    }
}
