<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
      $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $admin_user = new User();
        $admin_user->setEmail('admin@ecoverre.xyz');
        $admin_user->setPassword($this->passwordEncoder->encodePassword(
            $admin_user,
            'Admin123@'
        ));
        $admin_user->setRoles(array('ROLE_SUPER_ADMIN'));
        $manager->persist($admin_user);

        $manager->flush();
    }
}
