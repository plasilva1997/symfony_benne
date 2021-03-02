<?php

namespace App\Controller;

use App\Entity\Bin;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\BinRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class APIController extends AbstractController
{

    private HttpClientInterface $glassContainer;

    public function __construct(HttpClientInterface $glassContainer )
    {
        $this->glassContainer = $glassContainer;
    }

    public function dataJsonGetfromApi()
    {
/*        $json = file_get_contents('https://download.data.grandlyon.com/ws/grandlyon/gic_collecte.gicsiloverre/all.json?maxfeatures=-1&start=1');*/
        $json = file_get_contents('https://download.data.grandlyon.com/wfs/grandlyon?SERVICE=WFS&VERSION=2.0.0&request=GetFeature&typename=gic_collecte.gicsiloverre&outputFormat=application/json; subtype=geojson&SRSNAME=EPSG:4171&startIndex=0&count=100');
        return json_decode($json, true);
    }

    /**
     * @Route("/api/lyon", name="ApiLyon")
     * @param EntityManagerInterface $manager
     */
    public function insertBins(EntityManagerInterface $manager): void
    {
        $datas = $this->dataJsonGetfromApi();
        foreach ($datas['values'] as $k => $v) {
            $bin = new Bin();
            $bin->setCity($v['commune']);
            $bin->setStreet($v['voie']);
            if ($v['numerodansvoie'] != null) {
                $bin->setStreetNum($v['numerodansvoie']);
            }
            $bin->setPostalCode($v['code_postal']);
            $bin->setBinType('Verre');
            $bin->setCreatedAt(new \DateTime());

            $manager->persist($bin);
        }
        $manager->flush();
    }
}
