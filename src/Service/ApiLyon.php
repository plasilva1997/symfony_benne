<?php


namespace App\Service;


use App\Entity\Bin;

class ApiLyon
{
    public function getApi($entityManager, $BinRepository): array
    {
        $url = file_get_contents('https://www.data.gouv.fr/fr/datasets/r/85ad9858-0f57-4ae0-9af4-e90165ee83ae');
        $json = json_decode($url, true);
        $time = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $insert = 0;
        $update = 0;

        foreach ($json['features'] as $value){
            if(isset($value['geometry']['coordinates'])){
                $city = $value['properties']['commune'];
                $postalCode = $value['properties']['code_postal'];
                $street = $value['properties']['voie'];
                if(isset($value['properties']['numerodansvoie']) && $value['properties']['numerodansvoie'] != null ){
                    $streetNum = $value['properties']['numerodansvoie'];
                }
                $lon = $value['geometry']['coordinates'][0];
                $lat = $value['geometry']['coordinates'][1];
                $gmlId = $value['properties']['gml_id'];
                $array = $BinRepository->findOneBy([
                    "gmlId" => $gmlId
                ]);
                if ($array)
                {
                    $array->setCity($city);
                    $array->setStreet($street);
                    $array->setStreetNum($streetNum);
                    $array->setPostalCode($postalCode);
                    $array->setLon($lon);
                    $array->setLat($lat);
                    $array->setModifiedAt($time);

                    $entityManager->persist($array);

                    $update++;
                } else {
                    $bin = new Bin();
                    $bin->setGmlId($gmlId);
                    $bin->setCity($value['properties']['commune']);
                    $bin->setStreet($value['properties']['voie']);
                    if (isset($value['properties']['numerodansvoie']) && $value['properties']['numerodansvoie'] != null) {
                        $bin->setStreetNum($value['properties']['numerodansvoie']);
                    }
                    $bin->setPostalCode($value['properties']['code_postal']);
                    $bin->setBinType('Verre');
                    $bin->setLon(($value['geometry']['coordinates'][0]));
                    $bin->setLat(($value['geometry']['coordinates'][1]));
                    $bin->setCreatedAt(new \DateTime());

                    $entityManager->persist($bin);
                    $insert++;
                }
            }
        }
        $entityManager->flush();
        return array($insert, $update);
    }
}