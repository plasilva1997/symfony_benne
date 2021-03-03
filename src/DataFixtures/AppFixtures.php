<?php

namespace App\DataFixtures;

use App\Entity\Ticket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i < 8; $i++) {
            $ticket = new Ticket();
            $ticket->setName("name $i")
                ->setMail('mail@test.com')
                ->setMessage('message')
                ->setCreatedAtDate(new \DateTime())
                ->setModifiedAtDate(new \DateTime())
                ->setStatus(false);

            $manager->persist($ticket);
        }


        $manager->flush();
    }
}
