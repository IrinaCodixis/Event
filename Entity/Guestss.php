<?php

namespace Test\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guestss
 */
class Guestss
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $isAttending;


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
     * Set name
     *
     * @param string $name
     * @return Guestss
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Guestss
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isAttending
     *
     * @param boolean $isAttending
     * @return Guestss
     */
    public function setIsAttending($isAttending)
    {
        $this->isAttending = $isAttending;
    
        return $this;
    }

    /**
     * Get isAttending
     *
     * @return boolean 
     */
    public function getIsAttending()
    {
        return $this->isAttending;
    }
}
