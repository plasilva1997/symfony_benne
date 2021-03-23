<?php

namespace App\Controller;

use App\Entity\Ticket;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class LegalController extends AbstractController
{
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }
    private $manager;

    /**
     * @Route("/mentionslegales", name="legal")
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function index( Request $request, TranslatorInterface $translator): Response
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

        return $this->render('legal/index.html.twig', [
            'controller_name' => 'legal',
        ]);
    }
}
