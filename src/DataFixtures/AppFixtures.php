<?php

namespace App\DataFixtures;

use App\Entity\Bin;
use App\Controller\APIController;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bin = new Bin();
        $bin->setGmlId('GMLID1');
        $bin->setCity('Rouen');
        $bin->setStreet('Saint Marc');
        $bin->setStreetNum('28');
        $bin->setPostalCode('76000');
        $bin->setBinType('Verre');
        $bin->setCreatedAt(new \DateTime());

        $manager->persist($bin);

        $bin = new Bin();
        $bin->setGmlId('GMLID2');
        $bin->setCity('Paris');
        $bin->setStreet('Champs Elysées');
        $bin->setStreetNum('01');
        $bin->setPostalCode('92000');
        $bin->setBinType('Verre');
        $bin->setCreatedAt(new \DateTime());

        $manager->persist($bin);

        $bin = new Bin();
        $bin->setGmlId('GMLID3');
        $bin->setCity('Le Havre');
        $bin->setStreet('Rue Général de Gaulle');
        $bin->setStreetNum('52');
        $bin->setPostalCode('76600');
        $bin->setBinType('Verre');
        $bin->setCreatedAt(new \DateTime());

        $manager->persist($bin);

        $bin = new Bin();
        $bin->setGmlId('GMLID4');
        $bin->setCity('Caen');
        $bin->setStreet('Rue Ecuillère');
        $bin->setStreetNum('16');
        $bin->setPostalCode('14000');
        $bin->setBinType('Verre');
        $bin->setCreatedAt(new \DateTime());

        $manager->persist($bin);


        $manager->flush();
    }
}
