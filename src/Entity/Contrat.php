<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat")
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
     * @var int|null
     *
     * @ORM\Column(name="utilisateur_prod_id", type="integer", nullable=true)
     */
    private $utilisateurProdId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="utilisateur_adher_id", type="integer", nullable=true)
     */
    private $utilisateurAdherId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="amap_amap_id", type="integer", nullable=true)
     */
    private $amapAmapId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Panier", inversedBy="cont")
     * @ORM\JoinTable(name="concerner",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cont_id", referencedColumnName="cont_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="panier_id", referencedColumnName="panier_id")
     *   }
     * )
     */
    private $panier;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->panier = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getUtilisateurProdId(): ?int
    {
        return $this->utilisateurProdId;
    }

    public function setUtilisateurProdId(?int $utilisateurProdId): self
    {
        $this->utilisateurProdId = $utilisateurProdId;

        return $this;
    }

    public function getUtilisateurAdherId(): ?int
    {
        return $this->utilisateurAdherId;
    }

    public function setUtilisateurAdherId(?int $utilisateurAdherId): self
    {
        $this->utilisateurAdherId = $utilisateurAdherId;

        return $this;
    }

    public function getAmapAmapId(): ?int
    {
        return $this->amapAmapId;
    }

    public function setAmapAmapId(?int $amapAmapId): self
    {
        $this->amapAmapId = $amapAmapId;

        return $this;
    }

    /**
     * @return Collection|Panier[]
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->panier->contains($panier)) {
            $this->panier[] = $panier;
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->panier->contains($panier)) {
            $this->panier->removeElement($panier);
        }

        return $this;
    }

}
