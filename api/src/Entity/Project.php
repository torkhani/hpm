<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProjectRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    #[Groups(['read'])]
    private ?string $reference = null;

    #[ORM\Column(length: 20)]
    #[Groups(['read'])]
    private ?string $externalReference = null;

    #[ORM\ManyToOne]
    #[Groups(['read'])]
    private ?Agency $agency = null;

    #[ORM\Column]
    #[Groups(['read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read'])]
    private ?\DateTimeImmutable $sendedToMvp5At = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read'])]
    private ?\DateTimeImmutable $receivedMvp5At = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read'])]
    private ?\DateTimeImmutable $sendedToDefiAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['read'])]
    private ?string $comment = null;

    #[ORM\Column(length: 5, nullable: true)]
    #[Groups(['read'])]
    private ?string $devise = null;

    #[ORM\Column]
    #[Groups(['read'])]
    private ?bool $isArchived = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read'])]
    private ?Advisor $advisor = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Attachment::class, orphanRemoval: true)]
    private Collection $attachments;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read'])]
    private ?Profile $profile = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read'])]
    private ?Workflow $workflow = null;

    public function __construct()
    {
        $this->attachments = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
        $this->isArchived = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getExternalReference(): ?string
    {
        return $this->externalReference;
    }

    public function setExternalReference(string $externalReference): self
    {
        $this->externalReference = $externalReference;

        return $this;
    }

    public function getAgency(): ?Agency
    {
        return $this->agency;
    }

    public function setAgency(?Agency $agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getSendedToMvp5At(): ?\DateTimeImmutable
    {
        return $this->sendedToMvp5At;
    }

    public function setSendedToMvp5At(?\DateTimeImmutable $sendedToMvp5At): self
    {
        $this->sendedToMvp5At = $sendedToMvp5At;

        return $this;
    }

    public function getReceivedMvp5At(): ?\DateTimeImmutable
    {
        return $this->receivedMvp5At;
    }

    public function setReceivedMvp5At(?\DateTimeImmutable $receivedMvp5At): self
    {
        $this->receivedMvp5At = $receivedMvp5At;

        return $this;
    }

    public function getSendedToDefiAt(): ?\DateTimeImmutable
    {
        return $this->sendedToDefiAt;
    }

    public function setSendedToDefiAt(?\DateTimeImmutable $sendedToDefiAt): self
    {
        $this->sendedToDefiAt = $sendedToDefiAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDevise(): ?string
    {
        return $this->devise;
    }

    public function setDevise(?string $devise): self
    {
        $this->devise = $devise;

        return $this;
    }

    public function isIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(bool $isArchived): self
    {
        $this->isArchived = $isArchived;

        return $this;
    }

    public function getAdvisor(): ?Advisor
    {
        return $this->advisor;
    }

    public function setAdvisor(?Advisor $advisor): self
    {
        $this->advisor = $advisor;

        return $this;
    }

    /**
     * @return Collection<int, Attachment>
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    public function addAttachment(Attachment $attachment): self
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments->add($attachment);
            $attachment->setProject($this);
        }

        return $this;
    }

    public function removeAttachment(Attachment $attachment): self
    {
        if ($this->attachments->removeElement($attachment)) {
            // set the owning side to null (unless already changed)
            if ($attachment->getProject() === $this) {
                $attachment->setProject(null);
            }
        }

        return $this;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(Profile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getWorkflow(): ?Workflow
    {
        return $this->workflow;
    }

    public function setWorkflow(Workflow $workflow): self
    {
        $this->workflow = $workflow;

        return $this;
    }
}
