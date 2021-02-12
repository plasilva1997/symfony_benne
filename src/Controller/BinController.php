<?php

namespace App\Controller;

use App\Repository\BinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BinController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     * @param BinRepository $binRepository
     * @return Response
     */
    public function getBins(BinRepository $binRepository): Response
    {
        $bins = $binRepository->findAll();

        return $this->render('test/test.html.twig', [
            'bins' => $bins
        ]);
    }
}
