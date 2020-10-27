<?php

namespace App\Entity;

use App\Repository\Doctrine\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"offer_show", "offer_list"})
     * @Assert\NotBlank(
     *     message = "title is required"
     * )
     */
    private ?string $title;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"offer_show", "offer_list"})
     * @Assert\NotBlank(
     *     message = "price is required"
     * )
     */
    private ?int $price;

    /**
     * @ORM\Column(type="text")
     * @Groups({"offer_show"})
     * @Assert\NotBlank(
     *     message = "description is required"
     * )
     */
    private ?string $description;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"offer_show", "offer_list"})
     * @Assert\NotNull(
     *     message = "define company or not is required"
     * )
     */
    private ?bool $isCompany;

    /**
     * @ORM\Column(type="json")
     * @Groups({"offer_show"})
     */
    private array $images = [];

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"offer_show", "offer_list"})
     * @Assert\NotNull(
     *     message = "enable/disable propositions is required"
     * )
     */
    private ?bool $enablePropositions;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"offer_show", "offer_list"})
     */
    private bool $isPublished = false;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"offer_show", "offer_list"})
     */
    private bool $isDeleted = false;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"offer_show", "offer_list"})
     */
    private bool $isEnded = false;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"offer_show", "offer_list"})
     */
    private ?\DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"offer_show", "offer_list"})
     */
    private ?\DateTimeInterface $updatedAt = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"offer_show", "offer_list"})
     * @Groups({"offer_show", "offer_list"})
     */
    private ?\DateTimeInterface $publishedAt = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"offer_show", "offer_list"})
     */
    private ?\DateTimeInterface $deletedAt = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"offer_show", "offer_list"})
     */
    private ?\DateTimeInterface $endedAt = null;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="offers", cascade={"persist"}, fetch="EAGER")
     * @Groups({"offer_show", "offer_list"})
     * @Assert\Valid
     * @Assert\NotBlank(
     *     message="Category is required"
     * )
     */
    private ?Category $category;

    /**
     * @ORM\Column(type="array")
     * @Groups({"offer_show"})
     */
    private array $params = [];

    /**
     * @ORM\OneToMany(targetEntity=Proposition::class, mappedBy="offer", orphanRemoval=true, cascade={"persist"}, fetch="EAGER")
     */
    private Collection $propositions;

    public function __clone()
    {
        $this->id = null;
        $this->propositions = new ArrayCollection();
        $this->endedAt = null;
        $this->isEnded = false;
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = null;
    }

    public function reActive()
    {
        return clone $this;
    }

    public function __construct()
    {
        $this->propositions = new ArrayCollection();
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

    /**
     * @return Collection|Proposition[]
     */
    public function getPropositions(): Collection
    {
        return $this->propositions;
    }

    public function addProposition(Proposition $proposition): self
    {
        if (!$this->propositions->contains($proposition)) {
            $this->propositions[] = $proposition;
            $proposition->setOffer($this);
        }

        return $this;
    }

    public function removeProposition(Proposition $proposition): self
    {
        if ($this->propositions->contains($proposition)) {
            $this->propositions->removeElement($proposition);
            // set the owning side to null (unless already changed)
            if ($proposition->getOffer() === $this) {
                $proposition->setOffer(null);
            }
        }

        return $this;
    }
}
