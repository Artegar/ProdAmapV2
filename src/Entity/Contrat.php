<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat", indexes={@ORM\Index(name="contrat_producteur_FK", columns={"prod_id"}), @ORM\Index(name="contrat_amap0_FK", columns={"amap_id"}), @ORM\Index(name="contrat_adherant1_FK", columns={"adher_id"})})
 * @ORM\Entity
 */
class Contrat
{
    /**
     * @var int
     *
     * @ORM\Column(name="cont_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="cont_date_recept", type="datetime", nullable=true)
     */
    private $contDateRecept;

    /**
     * @var float
     *
     * @ORM\Column(name="cont_montant", type="float", precision=10, scale=0, nullable=false)
     */
    private $contMontant;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="cont_date_debut", type="datetime", nullable=true)
     */
    private $contDateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="cont_date_fin", type="datetime", nullable=true)
     */
    private $contDateFin;

    /**
     * @var \Adherant
     *
     * @ORM\ManyToOne(targetEntity="Adherant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="adher_id", referencedColumnName="adher_id")
     * })
     */
    private $adher;

    /**
     * @var \Amap
     *
     * @ORM\ManyToOne(targetEntity="Amap")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="amap_id", referencedColumnName="amap_id")
     * })
     */
    private $amap;

    /**
     * @var \Producteur
     *
     * @ORM\ManyToOne(targetEntity="Producteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prod_id", referencedColumnName="prod_id")
     * })
     */
    private $prod;

    public function getContId(): ?int
    {
        return $this->contId;
    }

    public function getContDateRecept(): ?\DateTimeInterface
    {
        return $this->contDateRecept;
    }

    public function setContDateRecept(?\DateTimeInterface $contDateRecept): self
    {
        $this->contDateRecept = $contDateRecept;

        return $this;
    }

    public function getContMontant(): ?float
    {
        return $this->contMontant;
    }

    public function setContMontant(float $contMontant): self
    {
        $this->contMontant = $contMontant;

        return $this;
    }

    public function getContDateDebut(): ?\DateTimeInterface
    {
        return $this->contDateDebut;
    }

    public function setContDateDebut(?\DateTimeInterface $contDateDebut): self
    {
        $this->contDateDebut = $contDateDebut;

        return $this;
    }

    public function getContDateFin(): ?\DateTimeInterface
    {
        return $this->contDateFin;
    }

    public function setContDateFin(?\DateTimeInterface $contDateFin): self
    {
        $this->contDateFin = $contDateFin;

        return $this;
    }

    public function getAdher(): ?Adherant
    {
        return $this->adher;
    }

    public function setAdher(?Adherant $adher): self
    {
        $this->adher = $adher;

        return $this;
    }

    public function getAmap(): ?Amap
    {
        return $this->amap;
    }

    public function setAmap(?Amap $amap): self
    {
        $this->amap = $amap;

        return $this;
    }

    public function getProd(): ?Producteur
    {
        return $this->prod;
    }

    public function setProd(?Producteur $prod): self
    {
        $this->prod = $prod;

        return $this;
    }


}
