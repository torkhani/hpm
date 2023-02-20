<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $family_situation = null;

    #[ORM\Column]
    #[Groups(['read'])]
    private ?bool $isLivingTogether = null;

    #[ORM\OneToMany(cascade: ['persist', 'remove'], mappedBy: 'profile', targetEntity: Credit::class)]
    #[Groups(['read'])]
    private Collection $credits;

    #[ORM\OneToMany(cascade: ['persist', 'remove'], mappedBy: 'profile', targetEntity: Borrower::class)]
    #[Groups(['read'])]
    private Collection $borrowers;

    public function __construct()
    {
        $this->credits = new ArrayCollection();
        $this->isLivingTogether = false;
        $this->borrowers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFamilySituation(): ?string
    {
        return $this->family_situation;
    }

    public function setFamilySituation(string $family_situation): self
    {
        $this->family_situation = $family_situation;

        return $this;
    }

    public function isIsLivingTogether(): ?bool
    {
        return $this->isLivingTogether;
    }

    public function setIsLivingTogether(bool $isLivingTogether): self
    {
        $this->isLivingTogether = $isLivingTogether;

        return $this;
    }

    /**
     * @return Collection<int, Credit>
     */
    public function getCredits(): Collection
    {
        return $this->credits;
    }

    public function addCredit(Credit $credit): self
    {
        if (!$this->credits->contains($credit)) {
            $this->credits->add($credit);
            $credit->setProfile($this);
        }

        return $this;
    }

    public function removeCredit(Credit $credit): self
    {
        if ($this->credits->removeElement($credit)) {
            // set the owning side to null (unless already changed)
            if ($credit->getProfile() === $this) {
                $credit->setProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Borrower>
     */
    public function getBorrowers(): Collection
    {
        return $this->borrowers;
    }

    public function addBorrower(Borrower $borrower): self
    {
        if (!$this->borrowers->contains($borrower)) {
            $this->borrowers->add($borrower);
            $borrower->setProfile($this);
        }

        return $this;
    }

    public function removeBorrower(Borrower $borrower): self
    {
        if ($this->borrowers->removeElement($borrower)) {
            // set the owning side to null (unless already changed)
            if ($borrower->getProfile() === $this) {
                $borrower->setProfile(null);
            }
        }

        return $this;
    }
}
