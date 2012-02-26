
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
}

