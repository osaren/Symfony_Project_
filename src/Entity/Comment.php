<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
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
    private $commentValue;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     */
    private $comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentValue(): ?string
    {
        return $this->commentValue;
    }

    public function setCommentValue(string $commentValue): self
    {
        $this->commentValue = $commentValue;

        return $this;
    }

    public function getComment(): ?User
    {
        return $this->comment;
    }

    public function setComment(?User $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
