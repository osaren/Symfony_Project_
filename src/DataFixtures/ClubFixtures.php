<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Club;

class ClubFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $club1 = $this->createClub("club1");

        $manager->persist($club1);
        $manager->flush();
    }

    private function createClub($clubName):Club
    {
        $club1 = new Club();
        $club1->setClubName($clubName);

        return $club1;
    }
}
