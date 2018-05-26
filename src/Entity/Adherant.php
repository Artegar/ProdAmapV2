<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adherant
 *
 * @ORM\Table(name="adherant")
 * @ORM\Entity
 */
class Adherant
{
    /**
     * @var int
     *
     * @ORM\Column(name="adher_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adherId;

    /**
     * @var bool
     *
     * @ORM\Column(name="adher_tresorier", type="boolean", nullable=false)
     */
    private $adherTresorier;

    public function getAdherId(): ?int
    {
        return $this->adherId;
    }

    public function getAdherTresorier(): ?bool
    {
        return $this->adherTresorier;
    }

    public function setAdherTresorier(bool $adherTresorier): self
    {
        $this->adherTresorier = $adherTresorier;

        return $this;
    }


}
