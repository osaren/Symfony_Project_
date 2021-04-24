<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $book1 = $this->createBook("title1","author1");

        $manager->persist($book1);
        $manager->flush();
    }

    private function createBook($title, $author):Book
    {
        $book = new Book();
        $book->setTitle($title);
        $book->setAuthor($author);

        return $book;
    }

}
