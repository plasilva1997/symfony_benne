<?php

namespace App\Entity;

use App\Repository\BinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BinRepository::class)
 */
class Bin
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $idBin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private float $long;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private float $lat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $city;

    /**
     * @ORM\Column(type="integer")
     */
    private int $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $street;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $collect;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private string $binType;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifiedAt;

    /**
     * @ORM\ManyToOne(targetEntity=AdminHasTicket::class, inversedBy="idBin")
     */
    private $idAdminHasTickets;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $streetNum;


    public function __construct()
    {
        $this->idAdminHasTicket = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->idBin;
    }

    public function getIdBin(): ?int
    {
        return $this->idBin;
    }

    public function setIdBin(int $idBin): self
    {
        $this->idBin = $idBin;

        return $this;
    }

    public function getLong(): ?float
    {
        return $this->long;
    }

    public function setLong(float $long): self
    {
        $this->long = $long;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCollect(): ?string
    {
        return $this->collect;
    }

    public function setCollect(string $collect): self
    {
        $this->collect = $collect;

        return $this;
    }

    public function getBinType(): ?string
    {
        return $this->binType;
    }

    public function setBinType(string $binType): self
    {
        $this->binType = $binType;

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

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(\DateTimeInterface $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * @return Collection|AdminHasTicket[]
     */
    public function getIdAdminHasTicket(): Collection
    {
        return $this->idAdminHasTicket;
    }

    public function addIdAdminHasTicket(AdminHasTicket $idAdminHasTicket): self
    {
        if (!$this->idAdminHasTicket->contains($idAdminHasTicket)) {
            $this->idAdminHasTicket[] = $idAdminHasTicket;
            $idAdminHasTicket->setIdBin($this);
        }

        return $this;
    }

    public function removeIdAdminHasTicket(AdminHasTicket $idAdminHasTicket): self
    {
        if ($this->idAdminHasTicket->removeElement($idAdminHasTicket)) {
            // set the owning side to null (unless already changed)
            if ($idAdminHasTicket->getIdBin() === $this) {
                $idAdminHasTicket->setIdBin(null);
            }
        }

        return $this;
    }

    public function getIdAdminHasTickets(): ?AdminHasTicket
    {
        return $this->idAdminHasTickets;
    }

    public function setIdAdminHasTickets(?AdminHasTicket $idAdminHasTickets): self
    {
        $this->idAdminHasTickets = $idAdminHasTickets;

        return $this;
    }

    public function getStreetNum(): ?int
    {
        return $this->streetNum;
    }

    public function setStreetNum(?int $streetNum): self
    {
        $this->streetNum = $streetNum;

        return $this;
    }
}
