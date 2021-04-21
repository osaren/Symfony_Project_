<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255)
     */
    private $clubName;

    /**
     * @ORM\OneToMany(targetEntity=BookClubMonth::class, mappedBy="club")
     */
    private $bookClubMonths;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="club")
     */
    private $users;

    public function __construct()
    {
        $this->bookClubMonths = new ArrayCollection();
        $this->users = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubName(): ?string
    {
        return $this->clubName;
    }

    public function setClubName(string $clubName): self
    {
        $this->clubName = $clubName;

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
            $bookClubMonth->setClub($this);
        }

        return $this;
    }

    public function removeBookClubMonth(BookClubMonth $bookClubMonth): self
    {
        if ($this->bookClubMonths->removeElement($bookClubMonth)) {
            // set the owning side to null (unless already changed)
            if ($bookClubMonth->getClub() === $this) {
                $bookClubMonth->setClub(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->clubName;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setClub($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClub() === $this) {
                $user->setClub(null);
            }
        }

        return $this;
    }
}
