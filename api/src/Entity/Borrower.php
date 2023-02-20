<?php

namespace App\Entity;

use App\Repository\BorrowerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;

#[ORM\Entity(repositoryClass: BorrowerRepository::class)]
class Borrower
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4)]
    #[Groups(['read'])]
    private ?string $civility = null;

    #[ORM\Column(length: 50)]
    #[Groups(['read'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 50)]
    #[Groups(['read'])]
    private ?string $lastname = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['read'])]
    private ?string $maritalName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['read'])]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 4, nullable: true)]
    #[Groups(['read'])]
    private ?string $departmentOfBirth = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups(['read'])]
    private ?string $birthCity = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups(['read'])]
    private ?string $countryOfBirth = null;

    #[ORM\Column(length: 20)]
    #[Groups(['read'])]
    private ?string $countryOfNationality = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $familySituation = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read'])]
    private ?string $matrimonialRegime = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['read'])]
    private ?\DateTimeInterface $weddingDate = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read'])]
    private ?Job $job = null;

    #[ORM\OneToMany(cascade: ['persist', 'remove'], mappedBy: 'borrower', targetEntity: Income::class, orphanRemoval: true)]
    #[Groups(['read'])]
    private Collection $incomes;

    #[ORM\OneToMany(cascade: ['persist', 'remove'], mappedBy: 'borrower', targetEntity: Asset::class)]
    #[Groups(['read'])]
    private Collection $assets;

    #[ORM\ManyToOne(inversedBy: 'borrowers', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Ignore()]
    private ?Profile $profile = null;

    public function __construct()
    {
        $this->incomes = new ArrayCollection();
        $this->assets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMaritalName(): ?string
    {
        return $this->maritalName;
    }

    public function setMaritalName(?string $maritalName): self
    {
        $this->maritalName = $maritalName;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getDepartmentOfBirth(): ?string
    {
        return $this->departmentOfBirth;
    }

    public function setDepartmentOfBirth(?string $departmentOfBirth): self
    {
        $this->departmentOfBirth = $departmentOfBirth;

        return $this;
    }

    public function getBirthCity(): ?string
    {
        return $this->birthCity;
    }

    public function setBirthCity(?string $birthCity): self
    {
        $this->birthCity = $birthCity;

        return $this;
    }

    public function getCountryOfBirth(): ?string
    {
        return $this->countryOfBirth;
    }

    public function setCountryOfBirth(?string $countryOfBirth): self
    {
        $this->countryOfBirth = $countryOfBirth;

        return $this;
    }

    public function getCountryOfNationality(): ?string
    {
        return $this->countryOfNationality;
    }

    public function setCountryOfNationality(string $countryOfNationality): self
    {
        $this->countryOfNationality = $countryOfNationality;

        return $this;
    }

    public function getFamilySituation(): ?string
    {
        return $this->familySituation;
    }

    public function setFamilySituation(string $familySituation): self
    {
        $this->familySituation = $familySituation;

        return $this;
    }

    public function getMatrimonialRegime(): ?string
    {
        return $this->matrimonialRegime;
    }

    public function setMatrimonialRegime(?string $matrimonialRegime): self
    {
        $this->matrimonialRegime = $matrimonialRegime;

        return $this;
    }

    public function getWeddingDate(): ?\DateTimeInterface
    {
        return $this->weddingDate;
    }

    public function setWeddingDate(?\DateTimeInterface $weddingDate): self
    {
        $this->weddingDate = $weddingDate;

        return $this;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(Job $job): self
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return Collection<int, Income>
     */
    public function getIncomes(): Collection
    {
        return $this->incomes;
    }

    public function addIncome(Income $income): self
    {
        if (!$this->incomes->contains($income)) {
            $this->incomes->add($income);
            $income->setBorrower($this);
        }

        return $this;
    }

    public function removeIncome(Income $income): self
    {
        if ($this->incomes->removeElement($income)) {
            // set the owning side to null (unless already changed)
            if ($income->getBorrower() === $this) {
                $income->setBorrower(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Asset>
     */
    public function getAssets(): Collection
    {
        return $this->assets;
    }

    public function addAsset(Asset $asset): self
    {
        if (!$this->assets->contains($asset)) {
            $this->assets->add($asset);
            $asset->setBorrower($this);
        }

        return $this;
    }

    public function removeAsset(Asset $asset): self
    {
        if ($this->assets->removeElement($asset)) {
            // set the owning side to null (unless already changed)
            if ($asset->getBorrower() === $this) {
                $asset->setBorrower(null);
            }
        }

        return $this;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }
}
