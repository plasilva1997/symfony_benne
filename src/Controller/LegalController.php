<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class LegalController extends AbstractController
{
    /**
     * @Route("/mentionslegales", name="legal")
     * @param TranslatorInterface $translator
     */
    public function index( TranslatorInterface $translator): Response
    {
        return $this->render('legal/index.html.twig', [
            'controller_name' => 'legal',
        ]);
    }
}
