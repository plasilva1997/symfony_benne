<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager as em;

class APIController extends AbstractController
{
    /**
     * @Route("/api/toulouse", name="ApiToulouse")
     * @return Response
     */
    public function dataJsonGet(): Response
    {
        $json = file_get_contents("https://data.toulouse-metropole.fr/api/records/1.0/search/?dataset=points-dapport-volontaire-dechets-et-moyens-techniques&q=&facet=commune&facet=flux&facet=centre_ville&facet=prestataire&facet=zone&facet=pole");
        $data = json_decode($json);

        return $this->render('map/mapview.html.twig', [
            'data' => $data,
        ]);
    }
}
