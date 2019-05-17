<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="Catalogue.Genres")
 * @ORM\Entity
 */
class Genre
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     * @ORM\Id
     * ORM\GeneratedValue(strategy="SEQUENCE")
     * ORM\SequenceGenerator(sequenceName="catalogue.genres_code_seq", allocationSize=1, initialValue=1)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=30, nullable=false)
     */
    private $intitule;

    /**
     * Genre constructor.
     * @param string $code
     * @param string $intitule
     */
    public function __construct(string $code, string $intitule)
    {
        $this->code = $code;
        $this->intitule = $intitule;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }


}
