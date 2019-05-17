<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table(name="Catalogue.Livres", indexes={@ORM\Index(name="IDX_6410C3536F052AB4", columns={"code_genre"})})
 * @ORM\Entity
 */
class Livre
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=10, nullable=false)
     * @ORM\Id
     * ORM\GeneratedValue(strategy="SEQUENCE")
     * ORM\SequenceGenerator(sequenceName="catalogue.livres_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=false)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="auteur", type="string", length=100, nullable=true)
     */
    private $auteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editeur", type="string", length=100, nullable=true)
     */
    private $editeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collection", type="string", length=100, nullable=true)
     */
    private $collection;

    /**
     * @var int|null
     *
     * @ORM\Column(name="annee", type="integer", nullable=true)
     */
    private $annee = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="support", type="string", length=8, nullable=true)
     */
    private $support;

    /**
     * @var string|null
     *
     * @ORM\Column(name="format", type="string", length=15, nullable=true)
     */
    private $format;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="pages", type="integer", nullable=false)
     */
    private $pages = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="poids", type="decimal", precision=5, scale=3, nullable=false, options={"default"="0.000"})
     */
    private $poids = '0.000';

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=5, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $prix = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="port", type="decimal", precision=5, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $port = '0.00';

    /**
     * @var int|null
     *
     * @ORM\Column(name="delai_de_livraison", type="integer", nullable=true)
     */
    private $delaiDeLivraison = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="string", length=50, nullable=true)
     */
    private $photo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nouveaute", type="integer", nullable=true)
     */
    private $nouveaute = '0';

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="code_genre", referencedColumnName="code")
     * })
     */
    private $codeGenre;


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(?string $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(?string $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getSupport(): ?string
    {
        return $this->support;
    }

    public function setSupport(?string $support): self
    {
        $this->support = $support;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(int $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function setPoids($poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function setPort($port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getDelaiDeLivraison(): ?int
    {
        return $this->delaiDeLivraison;
    }

    public function setDelaiDeLivraison(?int $delaiDeLivraison): self
    {
        $this->delaiDeLivraison = $delaiDeLivraison;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getNouveaute(): ?int
    {
        return $this->nouveaute;
    }

    public function setNouveaute(?int $nouveaute): self
    {
        $this->nouveaute = $nouveaute;

        return $this;
    }

    public function getCodeGenre(): ?Genre
    {
        return $this->codeGenre;
    }

    public function setCodeGenre(?Genre $codeGenre): self
    {
        $this->codeGenre = $codeGenre;

        return $this;
    }


}
