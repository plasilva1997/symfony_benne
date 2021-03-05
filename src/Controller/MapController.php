<?php

namespace App\Controller;

use App\Repository\BinRepository;
use App\Service\SerializerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapController extends AbstractController
{
    private SerializerService $serializerService;
    private EntityManagerInterface $em;

    public function __construct(serializerService $serializer, EntityManagerInterface $entityManager)
    {
        $this->serializerService = $serializer;
        $this->em = $entityManager;
    }

    /**
     * @Route("/map", name="map")
     * @param BinRepository $binRepository
     * @return Response
     */
    public function index(BinRepository $binRepository): Response
    {
        $query = $binRepository->findAll();
        $json = JsonResponse::fromJsonString($this->serializerService->RelationSerializer($query, 'json'));

        return $this->render('map/index.html.twig', [
            'controller_name' => 'MapController',
            'bins' => $json
        ]);
    }
}
