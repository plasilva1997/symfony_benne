<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager as em;

class APIController extends AbstractController
{
    /**
     * @Route("/api/lyon", name="ApiLyon")
     * @return Response
     */
    public function dataJsonGet(): Response
    {
        $json = file_get_contents("https://download.data.grandlyon.com/wfs/grandlyon?SERVICE=WFS&VERSION=2.0.0&request=GetFeature&typename=gic_collecte.gicsiloverre&outputFormat=application/json; subtype=geojson&SRSNAME=EPSG:4171&startIndex=0&count=100");
        $datas = json_decode($json);

        $bin = [];

        foreach ($datas as $data)
        {

        }



        return $this->render('map/mapview.html.twig', [
            'controller_name' => 'APIController',
            'data' => $datas,
        ]);
    }
}
