<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", indexes={@ORM\Index(name="panier_contrat_FK", columns={"cont_id"}), @ORM\Index(name="panier_adherant0_FK", columns={"adher_id"})})
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="panier_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $panierId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="panier_date_prevue", type="datetime", nullable=true)
     */
    private $panierDatePrevue;

    /**
     * @var bool
     *
     * @ORM\Column(name="panier_recept", type="boolean", nullable=false)
     */
    private $panierRecept;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="panier_date_recept", type="datetime", nullable=false)
     */
    private $panierDateRecept;

    /**
     * @var bool
     *
     * @ORM\Column(name="panier_actif", type="boolean", nullable=false, options={"comment"="Le panier est il toujours prévu ?"})
     */
    private $panierActif;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="util_panier_probleme", type="boolean", nullable=true)
     */
    private $utilPanierProbleme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="util_panier_raison", type="string", length=25, nullable=true)
     */
    private $utilPanierRaison;

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
     * @var \Contrat
     *
     * @ORM\ManyToOne(targetEntity="Contrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cont_id", referencedColumnName="cont_id")
     * })
     */
    private $cont;

    public function getPanierId(): ?int
    {
        return $this->panierId;
    }

    public function getPanierDatePrevue(): ?\DateTimeInterface
    {
        return $this->panierDatePrevue;
    }

    public function setPanierDatePrevue(?\DateTimeInterface $panierDatePrevue): self
    {
        $this->panierDatePrevue = $panierDatePrevue;

        return $this;
    }

    public function getPanierRecept(): ?bool
    {
        return $this->panierRecept;
    }

    public function setPanierRecept(bool $panierRecept): self
    {
        $this->panierRecept = $panierRecept;

        return $this;
    }

    public function getPanierDateRecept(): ?\DateTimeInterface
    {
        return $this->panierDateRecept;
    }

    public function setPanierDateRecept(\DateTimeInterface $panierDateRecept): self
    {
        $this->panierDateRecept = $panierDateRecept;

        return $this;
    }

    public function getPanierActif(): ?bool
    {
        return $this->panierActif;
    }

    public function setPanierActif(bool $panierActif): self
    {
        $this->panierActif = $panierActif;

        return $this;
    }

    public function getUtilPanierProbleme(): ?bool
    {
        return $this->utilPanierProbleme;
    }

    public function setUtilPanierProbleme(?bool $utilPanierProbleme): self
    {
        $this->utilPanierProbleme = $utilPanierProbleme;

        return $this;
    }

    public function getUtilPanierRaison(): ?string
    {
        return $this->utilPanierRaison;
    }

    public function setUtilPanierRaison(?string $utilPanierRaison): self
    {
        $this->utilPanierRaison = $utilPanierRaison;

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

    public function getCont(): ?Contrat
    {
        return $this->cont;
    }

    public function setCont(?Contrat $cont): self
    {
        $this->cont = $cont;

        return $this;
    }


}
