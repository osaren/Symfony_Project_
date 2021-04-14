<?php

namespace App\Entity;

use App\Repository\MonthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MonthRepository::class)
 */
class Month
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
    private $monthName;

    /**
     * @ORM\OneToMany(targetEntity=BookClubMonth::class, mappedBy="month")
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

    public function getMonthName(): ?string
    {
        return $this->monthName;
    }

    public function setMonthName(string $monthName): self
    {
        $this->monthName = $monthName;

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
            $bookClubMonth->setMonth($this);
        }

        return $this;
    }

    public function removeBookClubMonth(BookClubMonth $bookClubMonth): self
    {
        if ($this->bookClubMonths->removeElement($bookClubMonth)) {
            // set the owning side to null (unless already changed)
            if ($bookClubMonth->getMonth() === $this) {
                $bookClubMonth->setMonth(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->monthName;
    }
}
