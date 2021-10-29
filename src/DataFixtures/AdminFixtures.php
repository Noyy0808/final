<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdminFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      
        $admin = new Admin();
        $admin->setAvatar("avatar.png");
        $admin->setName("Luong Ngoc Thai");
        $admin->setAge("20");
        $admin->setDob(\DateTime::createFromFormat('Y-m-d', '2001-08-08'));
        $admin->setEmail("Noyydz@gmail.com");
        $admin->setNationality("VietNam");
        $manager->persist($admin);
       
        $manager->flush();
    }
}
