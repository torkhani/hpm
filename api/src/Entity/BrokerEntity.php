<?php

namespace App\Entity;

use App\Repository\BrokerEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrokerEntityRepository::class)]
class BrokerEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'brokerEntity', targetEntity: Broker::class)]
    private Collection $brokers;

    public function __construct()
    {
        $this->brokers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Broker>
     */
    public function getBrokers(): Collection
    {
        return $this->brokers;
    }

    public function addBroker(Broker $broker): self
    {
        if (!$this->brokers->contains($broker)) {
            $this->brokers->add($broker);
            $broker->setBrokerEntity($this);
        }

        return $this;
    }

    public function removeBroker(Broker $broker): self
    {
        if ($this->brokers->removeElement($broker)) {
            // set the owning side to null (unless already changed)
            if ($broker->getBrokerEntity() === $this) {
                $broker->setBrokerEntity(null);
            }
        }

        return $this;
    }
}
