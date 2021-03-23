<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Repository\BinRepository;
use App\Service\SerializerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;

class MapController extends AbstractController
{




    private SerializerService $serializerService;


    public function __construct(SerializerService $serializerService, EntityManagerInterface $manager){
        $this->serializerService = $serializerService;
        $this->manager = $manager;
    }

    private $manager;

    /**
     * @Route("/map/lyon", name="map_lyon")
     * @param Request $request
     * @param BinRepository $binRepository
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function index(BinRepository $binRepository, TranslatorInterface $translator, Request $request): Response
    {

        $bins = $binRepository->findAll();


        if ($request->request->count() > 0){
            $ticket = new Ticket();
            $ticket->setName($request->request->get('name'))
                ->setMail($request->request->get('mail'))
                ->setMessage($request->request->get('message'))
                ->setCreatedAtDate(new \DateTime())
                ->setModifiedAtDate(new \DateTime())
                ->setStatus(0);

            $this->manager->persist($ticket);
            $this->manager->flush();


        }



        return $this->render('map/index.html.twig', [
            'controller_name' => 'MapController',
            'bin' => $bins
        ]);
    }
}
