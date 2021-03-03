<?php

namespace App\Controller;

use App\Entity\Bin;
use App\Repository\BinRepository;
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

    public function dataJsonGetfromApi( )
    {
        $json = file_get_contents('https://www.data.gouv.fr/fr/datasets/r/85ad9858-0f57-4ae0-9af4-e90165ee83ae');
        return json_decode($json, true);
    }

    /**
     * @Route("/api/lyon", name="ApiLyon")
     * @param EntityManagerInterface $manager
     */
    public function insertBins(EntityManagerInterface $manager): void
    {
        $datas = $this->dataJsonGetfromApi();
        foreach ($datas['features'] as $k => $v) {
            $bin = new Bin();
            $bin->setCity($v['properties']['commune']);
            $bin->setStreet($v['properties']['voie']);
            if (isset($v['properties']['numerodansvoie']) && $v['properties']['numerodansvoie'] != null) {
                $bin->setStreetNum($v['properties']['numerodansvoie']);
            }
            $bin->setPostalCode($v['properties']['code_postal']);
            $bin->setBinType('Verre');
            $bin->setLon(($v['geometry']['coordinates'][0]));
            $bin->setLat(($v['geometry']['coordinates'][1]));
            $bin->setCreatedAt(new \DateTime());

            $manager->persist($bin);
        }

        $manager->flush();
    }

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