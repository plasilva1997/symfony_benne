<?php

namespace App\Entity;

use App\Repository\AdminHasTicketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminHasTicketRepository::class)
 */
class AdminHasTicket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Bin::class, inversedBy="idAdminHasTicket")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idBin;

    /**
     * @ORM\OneToMany(targetEntity=Admin::class, mappedBy="idAdminHasTicket")
     */
    private $admins;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="idAdminHasTickets")
     */
    private $tickets;

    public function __construct()
    {
        $this->admins = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBin(): ?Bin
    {
        return $this->idBin;
    }

    public function setIdBin(?Bin $idBin): self
    {
        $this->idBin = $idBin;

        return $this;
    }

    /**
     * @return Collection|Admin[]
     */
    public function getAdmins(): Collection
    {
        return $this->admins;
    }

    public function addAdmin(Admin $admin): self
    {
        if (!$this->admins->contains($admin)) {
            $this->admins[] = $admin;
            $admin->setIdAdminHasTicket($this);
        }

        return $this;
    }

    public function removeAdmin(Admin $admin): self
    {
        if ($this->admins->removeElement($admin)) {
            // set the owning side to null (unless already changed)
            if ($admin->getIdAdminHasTicket() === $this) {
                $admin->setIdAdminHasTicket(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setIdAdminHasTickets($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getIdAdminHasTickets() === $this) {
                $ticket->setIdAdminHasTickets(null);
            }
        }

        return $this;
    }
}
