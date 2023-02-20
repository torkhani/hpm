<?php

namespace App\Entity;

use App\Repository\BrokerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrokerRepository::class)]
class Broker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $code = null;

    #[ORM\ManyToOne(inversedBy: 'brokers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BrokerEntity $brokerEntity = null;

    #[ORM\Column(length: 20)]
    private ?string $corporateName = null;

    #[ORM\Column(nullable: true)]
    private ?int $type = null;

    #[ORM\Column]
    private ?bool $IsForBnpParibas = null;

    #[ORM\Column]
    private ?bool $isForHelloBank = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $passphrase = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getBrokerEntity(): ?BrokerEntity
    {
        return $this->brokerEntity;
    }

    public function setBrokerEntity(?BrokerEntity $brokerEntity): self
    {
        $this->brokerEntity = $brokerEntity;

        return $this;
    }

    public function getCorporateName(): ?string
    {
        return $this->corporateName;
    }

    public function setCorporateName(string $corporateName): self
    {
        $this->corporateName = $corporateName;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function isIsForBnpParibas(): ?bool
    {
        return $this->IsForBnpParibas;
    }

    public function setIsForBnpParibas(bool $IsForBnpParibas): self
    {
        $this->IsForBnpParibas = $IsForBnpParibas;

        return $this;
    }

    public function isIsForHelloBank(): ?bool
    {
        return $this->isForHelloBank;
    }

    public function setIsForHelloBank(bool $isForHelloBank): self
    {
        $this->isForHelloBank = $isForHelloBank;

        return $this;
    }

    public function getPassphrase(): ?string
    {
        return $this->passphrase;
    }

    public function setPassphrase(?string $passphrase): self
    {
        $this->passphrase = $passphrase;

        return $this;
    }
}
