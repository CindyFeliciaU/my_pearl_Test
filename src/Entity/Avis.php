<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $msg;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $etat;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Administrateur", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="mailAdministrateur", referencedColumnName="mail")
     */
    private $mailAdministrateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMsg(): ?string
    {
        return $this->msg;
    }

    public function setMsg(string $msg): self
    {
        $this->msg = $msg;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getMailAdministrateur(): ?Administrateur
    {
        return $this->mailAdministrateur;
    }

    public function setMailAdministrateur(?Administrateur $mailAdministrateur): self
    {
        $this->mailAdministrateur = $mailAdministrateur;

        return $this;
    }
}
