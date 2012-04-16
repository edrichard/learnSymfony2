<?php

namespace Tuto\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(message = "book.error.name.blank")
     * @Assert\MinLength(
     *              limit = 3,
     *              message = "book.error.name.minlenght"
     * )
     * @Assert\MaxLength(
     *              limit = 255,
     *              message = "book.error.name.maxlenght"
     * )
     * 
     * @ORM\Column(name="name", type="string", length=255, unique=false, nullable=false)
     */
    protected $name;
    
    /**
     * @var string $price
     * 
     * @Assert\Regex(
     *              pattern="/^[0-9]*(\.)?[0-9]?[0-9]/",
     *              message = "Your price is not valid."
     * )
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
     *
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
    
    public function  __toString(){
        return $this->getName();
    }

        /**
     * Set name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name.
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price.
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price.
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add author.
     *
     * @param \Tuto\BookBundle\Entity\Author $author
     */
    public function addAuthor(\Tuto\BookBundle\Entity\Author $author)
    {
        $this->authors[] = $author;
    }

    /**
     * Get authors.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}