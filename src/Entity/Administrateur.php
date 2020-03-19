<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;//validation voir qlq chose egal a qlq chose d'autre
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AdministrateurRepository")
 * @UniqueEntity(
 *
 *     fields={"mail"},
 *     message="L'email que vous avez indiqué est déjà utilisé"
 * )
 */
class Administrateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de pase doit faire minimum 8 caractères")
     * */
    private $password;

    /**
      * @Assert\EqualTo(propertyPath="password",message="Vos mots de passe ne sont pas égaux")
     */
    public $confirm_mdp;

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        //explique quel est le role de l'utilisateur
        return ['ROLE_ADMIN'];
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
    }

    /**
     * @inheritDoc
     */
    public function getUsername(): string
    {
        return (string) $this->mail;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }



}
