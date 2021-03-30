<?php

namespace App\Entity;

use App\Repository\InspectionOrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

/**
 * @ORM\Entity(repositoryClass=InspectionOrderRepository::class)
 * @HasLifecycleCallbacks
 */
class InspectionOrder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assignee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="json")
     */
    private $realEstates = [];

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $inspectionDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    private function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Set creation_at date
     * @ORM\PrePersist
     */
    public function updatedTimestamp(): void
    {
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    public function getAssignee(): ?string
    {
        return $this->assignee;
    }

    public function setAssignee(string $assignee): self
    {
        $this->assignee = $assignee;

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

    public function getRealEstates(): ?array
    {
        return $this->realEstates;
    }

    public function setRealEstates(array $realEstates): self
    {
        $this->realEstates = $realEstates;

        return $this;
    }

    public function getInspectionDate(): ?string
    {
        return $this->inspectionDate;
    }

    public function setInspectionDate(?string $inspectionDate): self
    {
        $this->inspectionDate = $inspectionDate;

        return $this;
    }
}
