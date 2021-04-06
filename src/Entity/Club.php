<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $books;

    /**
     * @ORM\Column(type="integer")
     */
    private $months;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBooks(): ?int
    {
        return $this->books;
    }

    public function setBooks(int $books): self
    {
        $this->books = $books;

        return $this;
    }

    public function getMonths(): ?int
    {
        return $this->months;
    }

    public function setMonths(int $months): self
    {
        $this->months = $months;

        return $this;
    }
}
