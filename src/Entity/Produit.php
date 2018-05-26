<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="produit_famille_FK", columns={"fam_id"}), @ORM\Index(name="produit_utilisateur0_FK", columns={"util_id"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="produit_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $produitId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prod_nom", type="string", length=100, nullable=true)
     */
    private $prodNom;

    /**
     * @var \Famille
     *
     * @ORM\ManyToOne(targetEntity="Famille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fam_id", referencedColumnName="fam_id")
     * })
     */
    private $fam;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="util_id", referencedColumnName="util_id")
     * })
     */
    private $util;

    public function getProduitId(): ?int
    {
        return $this->produitId;
    }

    public function getProdNom(): ?string
    {
        return $this->prodNom;
    }

    public function setProdNom(?string $prodNom): self
    {
        $this->prodNom = $prodNom;

        return $this;
    }

    public function getFam(): ?Famille
    {
        return $this->fam;
    }

    public function setFam(?Famille $fam): self
    {
        $this->fam = $fam;

        return $this;
    }

    public function getUtil(): ?Utilisateur
    {
        return $this->util;
    }

    public function setUtil(?Utilisateur $util): self
    {
        $this->util = $util;

        return $this;
    }


}
