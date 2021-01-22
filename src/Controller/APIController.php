<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class APIController extends AbstractController
{
    /**
     * @Route("/api/puteaux", name="api_puteaux")
     */
    public function index(): Response
    {

        $json = file_get_contents("https://ecoverre.paulosilva.xyz/benneverre.json");
        $datas = json_decode($json);
        dump($datas);

        foreach ($datas as $data){

            var_dump("La benne est situé :" . $data->fields->adresse);
            echo '<br>';
            var_dump("Jours de Collecte: " . $data->fields->frequence_de_collecte);
            echo '<br>';
            var_dump("Type de benne :" . $data->fields->type_colonne_aerien_enterre);
            echo '<br>';
            $coords = $data->fields->coordonnees_gps;

            foreach ($coords as $coord){
                var_dump("Voici les coordonnees de la benne : " . $coord);
                echo '<br>';
            }
            echo '<br>';
            echo '<br>';
        }

        return $this->render('api_puteaux/index.html.twig', [
            'controller_name' => 'APIController',
        ]);
    }
}
