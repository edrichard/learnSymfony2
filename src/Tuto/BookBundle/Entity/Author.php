<?php

namespace Tuto\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tuto\BookBundle\Entity\Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity
 */
class Author
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
     * @var string $email
     * 
     * @ORM\Column(name="email", type="string", length=255, unique=true, nullable=false)
     */
    protected $email;
    
    /**
     * @var string $website
     * 
     * @ORM\Column(name="website", type="string", length=255, unique=false, nullable=true)
     */
    protected $website;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $books
     * 
     * @ORM\ManyToMany(targetEntity="Tuto\BookBundle\Entity\Book", inversedBy="authors")
     * @ORM\JoinTable(name="author_book", 
     *     joinColumns={@ORM\JoinColumn(name="author_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")}
     * )
     */
    protected $books;


    /**
     * Get id.
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Constructor 
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set email.
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email.
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set website.
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * Get website.
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Add book.
     * @param \Tuto\BookBundle\Entity\Book $book
     */
    public function addBook(\Tuto\BookBundle\Entity\Book $book)
    {
        $this->books[] = $book;
    }

    /**
     * Get books
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getBooks()
    {
        return $this->books;
    }
}