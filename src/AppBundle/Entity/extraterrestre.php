<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="extraterrestre")
 */
class extraterrestre extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $age;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $couleur;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $famille;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $nourriture;

    
    /**
	 * @ORM\ManyToMany(targetEntity="AppBundle\Entity\extraterrestre", cascade={"persist"})
	 */
    private $amis;
    
    
	/**
	 * Get amis
	 *
	 * @return string
	 */
	public function getAmis()
	{
		return $this->amis;
	}


     /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return extraterrestre
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return extraterrestre
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set nourriture
     *
     * @param string $nourriture
     *
     * @return extraterrestre
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return extraterrestre
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->amis = new ArrayCollection();
    }
    public function ajouterAmis(extraterrestre $ex)
	{
		if ($this->amis->contains($ex)) 
		{
			return;
		}
		$this->amis[] = $ex;
		$ex->ajouterAmis($this);
	}
	public function supprimerAmis(extraterrestre $ex)
	{
        // cette methode n'a pas marchée. elle genere une erreure
    }
}
