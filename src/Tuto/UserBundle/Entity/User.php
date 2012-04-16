<?php

namespace Tuto\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="AUTO")
     * 
     * @var integer
     */
    protected $id;
    
    function __construct() {
        parent::__construct();
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
}