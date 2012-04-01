<?php

namespace Tuto\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tuto\BookBundle\Entity\Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity
 */
class Book
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $name
     * 
     * @ORM\Column(name="name", type="string", length=255, unique=false, nullable=false)
     */
    protected $name;
    
    /**
     * @var string $price
     * 
     * @ORM\Column(name="price", type="decimal", precision=9, scale=2, unique=false, nullable=false)
     */
    protected $price;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $authors
     * 
     * @ORM\ManyToMany(targetEntity="Tuto\BookBundle\Entity\Author", mappedBy="books")
     */
    protected $authors;

    /**
     * Get id.
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Constructor. 
     */
    public function __construct()
    {
        $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * @return string 
     */
    public function __toString(){
        return $this->getName();
    }
    
    /**
     * Set name.
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name.
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price.
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price.
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add author.
     * @param \Tuto\BookBundle\Entity\Author $author
     */
    public function addAuthor(\Tuto\BookBundle\Entity\Author $author)
    {
        $this->authors[] = $author;
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}