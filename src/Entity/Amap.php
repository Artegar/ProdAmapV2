<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amap
 *
 * @ORM\Table(name="amap")
 * @ORM\Entity
 */
class Amap
{
    /**
     * @var int
     *
     * @ORM\Column(name="amap_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $amapId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amap_nom", type="string", length=100, nullable=true)
     */
    private $amapNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amap_adresse1", type="string", length=25, nullable=true)
     */
    private $amapAdresse1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amap_adresse2", type="string", length=25, nullable=true)
     */
    private $amapAdresse2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amap_codepostal", type="string", length=25, nullable=true)
     */
    private $amapCodepostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amap_ville", type="string", length=25, nullable=true)
     */
    private $amapVille;

    public function getAmapId(): ?int
    {
        return $this->amapId;
    }

    public function getAmapNom(): ?string
    {
        return $this->amapNom;
    }

    public function setAmapNom(?string $amapNom): self
    {
        $this->amapNom = $amapNom;

        return $this;
    }

    public function getAmapAdresse1(): ?string
    {
        return $this->amapAdresse1;
    }

    public function setAmapAdresse1(?string $amapAdresse1): self
    {
        $this->amapAdresse1 = $amapAdresse1;

        return $this;
    }

    public function getAmapAdresse2(): ?string
    {
        return $this->amapAdresse2;
    }

    public function setAmapAdresse2(?string $amapAdresse2): self
    {
        $this->amapAdresse2 = $amapAdresse2;

        return $this;
    }

    public function getAmapCodepostal(): ?string
    {
        return $this->amapCodepostal;
    }

    public function setAmapCodepostal(?string $amapCodepostal): self
    {
        $this->amapCodepostal = $amapCodepostal;

        return $this;
    }

    public function getAmapVille(): ?string
    {
        return $this->amapVille;
    }

    public function setAmapVille(?string $amapVille): self
    {
        $this->amapVille = $amapVille;

        return $this;
    }


}
