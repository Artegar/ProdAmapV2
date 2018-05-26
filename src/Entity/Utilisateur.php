<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="util_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $utilId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="util_nom", type="string", length=100, nullable=true)
     */
    private $utilNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="util_prenom", type="string", length=100, nullable=true)
     */
    private $utilPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="util_tel", type="string", length=100, nullable=false)
     */
    private $utilTel;

    /**
     * @var string
     *
     * @ORM\Column(name="util_mail", type="string", length=100, nullable=false)
     */
    private $utilMail;

    /**
     * @var string
     *
     * @ORM\Column(name="util_login", type="string", length=100, nullable=false)
     */
    private $utilLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="util_mdp", type="string", length=100, nullable=false)
     */
    private $utilMdp;

    /**
     * @var bool
     *
     * @ORM\Column(name="util_actif", type="boolean", nullable=false)
     */
    private $utilActif;

    /**
     * @var bool
     *
     * @ORM\Column(name="util_superadmin", type="boolean", nullable=false)
     */
    private $utilSuperadmin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="util_adresse1", type="string", length=25, nullable=true)
     */
    private $utilAdresse1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="util_adresse2", type="string", length=25, nullable=true)
     */
    private $utilAdresse2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="util_codepostal", type="string", length=25, nullable=true)
     */
    private $utilCodepostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="util_ville", type="string", length=25, nullable=true)
     */
    private $utilVille;

    /**
     * @var int|null
     *
     * @ORM\Column(name="producteur", type="integer", nullable=true)
     */
    private $producteur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="adherant", type="integer", nullable=true)
     */
    private $adherant;

    public function getUtilId(): ?int
    {
        return $this->utilId;
    }

    public function getUtilNom(): ?string
    {
        return $this->utilNom;
    }

    public function setUtilNom(?string $utilNom): self
    {
        $this->utilNom = $utilNom;

        return $this;
    }

    public function getUtilPrenom(): ?string
    {
        return $this->utilPrenom;
    }

    public function setUtilPrenom(?string $utilPrenom): self
    {
        $this->utilPrenom = $utilPrenom;

        return $this;
    }

    public function getUtilTel(): ?string
    {
        return $this->utilTel;
    }

    public function setUtilTel(string $utilTel): self
    {
        $this->utilTel = $utilTel;

        return $this;
    }

    public function getUtilMail(): ?string
    {
        return $this->utilMail;
    }

    public function setUtilMail(string $utilMail): self
    {
        $this->utilMail = $utilMail;

        return $this;
    }

    public function getUtilLogin(): ?string
    {
        return $this->utilLogin;
    }

    public function setUtilLogin(string $utilLogin): self
    {
        $this->utilLogin = $utilLogin;

        return $this;
    }

    public function getUtilMdp(): ?string
    {
        return $this->utilMdp;
    }

    public function setUtilMdp(string $utilMdp): self
    {
        $this->utilMdp = $utilMdp;

        return $this;
    }

    public function getUtilActif(): ?bool
    {
        return $this->utilActif;
    }

    public function setUtilActif(bool $utilActif): self
    {
        $this->utilActif = $utilActif;

        return $this;
    }

    public function getUtilSuperadmin(): ?bool
    {
        return $this->utilSuperadmin;
    }

    public function setUtilSuperadmin(bool $utilSuperadmin): self
    {
        $this->utilSuperadmin = $utilSuperadmin;

        return $this;
    }

    public function getUtilAdresse1(): ?string
    {
        return $this->utilAdresse1;
    }

    public function setUtilAdresse1(?string $utilAdresse1): self
    {
        $this->utilAdresse1 = $utilAdresse1;

        return $this;
    }

    public function getUtilAdresse2(): ?string
    {
        return $this->utilAdresse2;
    }

    public function setUtilAdresse2(?string $utilAdresse2): self
    {
        $this->utilAdresse2 = $utilAdresse2;

        return $this;
    }

    public function getUtilCodepostal(): ?string
    {
        return $this->utilCodepostal;
    }

    public function setUtilCodepostal(?string $utilCodepostal): self
    {
        $this->utilCodepostal = $utilCodepostal;

        return $this;
    }

    public function getUtilVille(): ?string
    {
        return $this->utilVille;
    }

    public function setUtilVille(?string $utilVille): self
    {
        $this->utilVille = $utilVille;

        return $this;
    }

    public function getProducteur(): ?int
    {
        return $this->producteur;
    }

    public function setProducteur(?int $producteur): self
    {
        $this->producteur = $producteur;

        return $this;
    }

    public function getAdherant(): ?int
    {
        return $this->adherant;
    }

    public function setAdherant(?int $adherant): self
    {
        $this->adherant = $adherant;

        return $this;
    }


}
