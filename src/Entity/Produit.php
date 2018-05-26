<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="FK_produit_prod_id_producteur", columns={"prod_id_producteur"}), @ORM\Index(name="FK_produit_fam_id", columns={"fam_id"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="prod_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prodId;

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
     * @var \Producteur
     *
     * @ORM\ManyToOne(targetEntity="Producteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prod_id_producteur", referencedColumnName="prod_id")
     * })
     */
    private $prodProducteur;

    public function getProdId(): ?int
    {
        return $this->prodId;
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

    public function getProdProducteur(): ?Producteur
    {
        return $this->prodProducteur;
    }

    public function setProdProducteur(?Producteur $prodProducteur): self
    {
        $this->prodProducteur = $prodProducteur;

        return $this;
    }


}
