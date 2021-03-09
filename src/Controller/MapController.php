<?php

namespace App\Controller;

use App\Repository\BinRepository;
use App\Service\SerializerService;
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MapController extends AbstractController
{
    private SerializerService $serializerService;


    public function __construct(SerializerService $serializerService){
        $this->serializerService = $serializerService;
    }

    /**
     * @Route("/map", name="map")
     * @param BinRepository $binRepository
     * @return Response
     */
    public function index(BinRepository $binRepository): Response
    {
        //recuperation donnes BDD
        $bins = $binRepository->findAll();
        $geoJson = '{
        "type": "FeatureCollection",
        "features": [
            
                ]
            }';
        $geojson = json_decode($geoJson,true);

        foreach ($bins as $bin)
        {

            $latLng = [$bin->getLon(),$bin->getLat()];
            $tet = new stdClass();
            $tet->type = "Feature";
            $geo = new stdClass();
            $geo->type = "Point";
            $geo->coordinates =$latLng;
            $tet->geometry =$geo;

            $properties = new stdClass();
            $properties->city = $bin->getCity();
            $tet->properties = $properties;

            array_push($geojson['features'],$tet);

        }

//        $geojson=json_encode($geojson);




        return $this->render('map/index.html.twig', [
            'controller_name' => 'MapController',
            'bins' => $geojson
        ]);
    }
}
