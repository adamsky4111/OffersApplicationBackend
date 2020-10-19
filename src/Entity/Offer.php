<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private ?string $title;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $price;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $isCompany;

    /**
     * @ORM\Column(type="json")
     */
    private array $images = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $enablePropositions;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isPublished = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isDeleted = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isEnded = false;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $publishedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $deletedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $endedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="offers", cascade={"persist"}, fetch="EAGER")
     */
    private ?Category $category;

    /**
     * @ORM\Column(type="array")
     */
    private array $params = [];

    public function __construct()
    {

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsCompany(): ?bool
    {
        return $this->isCompany;
    }

    public function setIsCompany(bool $isCompany): self
    {
        $this->isCompany = $isCompany;

        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getEnablePropositions(): ?bool
    {
        return $this->enablePropositions;
    }

    public function setEnablePropositions(bool $enablePropositions): self
    {
        $this->enablePropositions = $enablePropositions;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getIsEnded(): ?bool
    {
        return $this->isEnded;
    }

    public function setIsEnded(bool $isEnded): self
    {
        $this->isEnded = $isEnded;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeInterface
    {
        return $this->endedAt;
    }

    public function setEndedAt(\DateTimeInterface $endedAt): self
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getParams(): ?array
    {
        return $this->params;
    }

    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }
}
