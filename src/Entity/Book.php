<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity=BookClubMonth::class, mappedBy="book")
     */
    private $bookClubMonths;

    public function __construct()
    {
        $this->bookClubMonths = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|BookClubMonth[]
     */
    public function getBookClubMonths(): Collection
    {
        return $this->bookClubMonths;
    }

    public function addBookClubMonth(BookClubMonth $bookClubMonth): self
    {
        if (!$this->bookClubMonths->contains($bookClubMonth)) {
            $this->bookClubMonths[] = $bookClubMonth;
            $bookClubMonth->setBook($this);
        }

        return $this;
    }

    public function removeBookClubMonth(BookClubMonth $bookClubMonth): self
    {
        if ($this->bookClubMonths->removeElement($bookClubMonth)) {
            // set the owning side to null (unless already changed)
            if ($bookClubMonth->getBook() === $this) {
                $bookClubMonth->setBook(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->title;
    }
}
