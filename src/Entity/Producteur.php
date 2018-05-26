<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producteur
 *
 * @ORM\Table(name="producteur", indexes={@ORM\Index(name="producteur_produit_FK", columns={"produit_id"})})
 * @ORM\Entity
 */
class Producteur
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
     * @var bool
     *
     * @ORM\Column(name="prod_verif", type="boolean", nullable=false)
     */
    private $prodVerif;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_siren", type="string", length=100, nullable=false)
     */
    private $prodSiren;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="prod_date_verif", type="datetime", nullable=true)
     */
    private $prodDateVerif;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_nom_exploit", type="string", length=100, nullable=false)
     */
    private $prodNomExploit;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit_id", referencedColumnName="produit_id")
     * })
     */
    private $produit;

    public function getProdId(): ?int
    {
        return $this->prodId;
    }

    public function getProdVerif(): ?bool
    {
        return $this->prodVerif;
    }

    public function setProdVerif(bool $prodVerif): self
    {
        $this->prodVerif = $prodVerif;

        return $this;
    }

    public function getProdSiren(): ?string
    {
        return $this->prodSiren;
    }

    public function setProdSiren(string $prodSiren): self
    {
        $this->prodSiren = $prodSiren;

        return $this;
    }

    public function getProdDateVerif(): ?\DateTimeInterface
    {
        return $this->prodDateVerif;
    }

    public function setProdDateVerif(?\DateTimeInterface $prodDateVerif): self
    {
        $this->prodDateVerif = $prodDateVerif;

        return $this;
    }

    public function getProdNomExploit(): ?string
    {
        return $this->prodNomExploit;
    }

    public function setProdNomExploit(string $prodNomExploit): self
    {
        $this->prodNomExploit = $prodNomExploit;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }


}
