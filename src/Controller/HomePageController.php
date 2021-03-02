<?php

namespace App\Controller;

use App\Entity\Ticket;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{


    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }
    private $manager;
    /**
     * @Route("/", name="home_page")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {

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


        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }



}
