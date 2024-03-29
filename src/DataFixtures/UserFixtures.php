<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // create objects
        $userUser = $this->createUser('member@member.com', 'member');
        $userMember = $this->createUser('member1@member1.com', 'member1', 'ROLE_MEMBER');
        $userAdmin = $this->createUser('admin@admin.com', 'admin', 'ROLE_ADMIN');
        $userMatt = $this->createUser('matt@matt.com', 'matt', 'ROLE_SUPER_ADMIN');
        $userStaff = $this->createUser('staff@staff.com', 'staff', 'ROLE_STAFF');

        // add to DB queue
        $manager->persist($userUser);
        $manager->persist($userAdmin);
        $manager->persist($userMatt);
        $manager->persist($userStaff);
        $manager->persist($userMember);

        // send query to DB
        $manager->flush();

    }

    private function createUser($username, $plainPassword, $role = 'ROLE_USER'):User
    {
        $user = new User();
        $user->setEmail($username);
        $user->setRole($role);

        // password - and encoding
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);

        return $user;
    }

}