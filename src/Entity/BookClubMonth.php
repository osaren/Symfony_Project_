<?php

namespace App\Entity;

use App\Repository\BookClubMonthRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookClubMonthRepository::class)
 */
class BookClubMonth
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="bookClubMonths")
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="bookClubMonths")
     */
    private $club;

    /**
     * @ORM\ManyToOne(targetEntity=Month::class, inversedBy="bookClubMonths")
     * @ORM\JoinColumn(nullable=false)
     */
    private $month;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getMonth(): ?Month
    {
        return $this->month;
    }

    public function setMonth(?Month $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->book + $this->club + $this->month;
    }
}
