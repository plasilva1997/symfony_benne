<?php


namespace App\Controller;


use App\Entity\Bin;
use App\Repository\BinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TestController extends AbstractController
{

    private HttpClientInterface $glassContainer;

    public function __construct(HttpClientInterface $glassContainer )
    {
        $this->glassContainer = $glassContainer;
    }

    public function dataJsonGetfromApi()
    {
        $json = file_get_contents('https://download.data.grandlyon.com/ws/grandlyon/gic_collecte.gicsiloverre/all.json?maxfeatures=-1&start=1');
        /*$response =
            $this->glassContainer->request(
                'GET',
                'https://download.data.grandlyon.com/ws/grandlyon/gic_collecte.gicsiloverre/all.json?maxfeatures=-1&start=1'
            );*/
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