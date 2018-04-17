<?php
namespace Dev\Pub\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 
 *
 * @Table(name="author")
 * @Entity()
 */
class Author 
{
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @Column(name="biografie", type="text")
     */
    private $biografie;

    /**
     * @Column(name="email", type="string", length=50)
     */
    private $email;

     /**
     * @Column(name="website", type="string")
     */
    private $website;


    
   
    /**
     * 
     * Getters and setters
     */


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set biografie.
     *
     * @param string $biografie
     *
     * @return Post
     */
    public function setBiografie($biografie)
    {
        $this->biografie = $biografie;

        return $this;
    }


    /**
     * Get biografie.
     *
     * @return string
     */
    public function getBiografie()
    {
        return $this->biografie;
    }


    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Author
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set website.
     *
     * @param string $website
     *
     * @return Author
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    
}
