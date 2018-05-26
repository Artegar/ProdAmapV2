<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Famille
 *
 * @ORM\Table(name="famille", indexes={@ORM\Index(name="famille_utilisateur_FK", columns={"util_id"})})
 * @ORM\Entity
 */
class Famille
{
    /**
     * @var int
     *
     * @ORM\Column(name="fam_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $famId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fam_nom", type="string", length=255, nullable=true)
     */
    private $famNom;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="util_id", referencedColumnName="util_id")
     * })
     */
    private $util;

    public function getFamId(): ?int
    {
        return $this->famId;
    }

    public function getFamNom(): ?string
    {
        return $this->famNom;
    }

    public function setFamNom(?string $famNom): self
    {
        $this->famNom = $famNom;

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
