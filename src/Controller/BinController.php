<?php

namespace App\Controller;

use App\Entity\Bin;
use App\Repository\BinRepository;
use App\Service\ApiLyon;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BinController extends AbstractController
{
    private HttpClientInterface $glassContainer;

    public function __construct(HttpClientInterface $glassContainer )
    {
        $this->glassContainer = $glassContainer;
    }

    /**
     * @Route("/api/lyon/update", name="UpdateLyon")
     * @param EntityManagerInterface $entityManager
     * @param BinRepository $BinRepository
     * @return Response
     */
    public function update(EntityManagerInterface $entityManager, BinRepository $BinRepository)
    {
        $get = new ApiLyon();
        $i = $get->getApi($entityManager, $BinRepository);
        $total = $i[0] + $i[1];
        return new Response(
            '<h1>Un total de ' . $total . ' requêtes on été faites</h1><h2>' . $i[0] . ' ajouts</h2><h2>' . $i[1] . ' updates</h2>'
        );
    }
}
