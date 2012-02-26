<?php
namespace MyApp\FilmothequeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Film
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string",length="255")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     */    
    private $titre;

    /**
     * @ORM\Column(type="string",length="500")
     */    
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @Assert\NotBlank()
     */    
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="Acteur")
     */    
    private $acteurs;
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param MyApp\FilmothequeBundle\Entity\Categorie $categorie
     */
    public function setCategorie(\MyApp\FilmothequeBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Get categorie
     *
     * @return MyApp\FilmothequeBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add acteurs
     *
     * @param MyApp\FilmothequeBundle\Entity\Acteur $acteurs
     */
    public function addActeur(\MyApp\FilmothequeBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs[] = $acteurs;
    }

    /**
     * Get acteurs
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }
}