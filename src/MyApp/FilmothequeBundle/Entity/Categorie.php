<?php
namespace MyApp\FilmotequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
*/

class Categorie {

	/**
	 * @ORM\GenerateValue
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
     * @ORM\Column(type="string",length="255")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     */    
    private $nom;

}
