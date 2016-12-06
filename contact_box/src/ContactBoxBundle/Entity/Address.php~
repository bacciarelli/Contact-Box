<?php

namespace ContactBoxBundle\Entity;

use ContactBoxBundle\Entity\Person;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="ContactBoxBundle\Repository\AddressRepository")
 */
class Address
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="addresses")
     * 
     */
    private $person;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="house_number", type="integer")
     */
    private $houseNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="apartment_number", type="integer")
     */
    private $apartmentNumber;


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
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNumber
     *
     * @param integer $houseNumber
     * @return Address
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * Get houseNumber
     *
     * @return integer 
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set apartmentNumber
     *
     * @param integer $apartmentNumber
     * @return Address
     */
    public function setApartmentNumber($apartmentNumber)
    {
        $this->apartmentNumber = $apartmentNumber;

        return $this;
    }

    /**
     * Get apartmentNumber
     *
     * @return integer 
     */
    public function getApartmentNumber()
    {
        return $this->apartmentNumber;
    }

    /**
     * Set person
     *
     * @param \ContactBoxBundle\Entity\Person $person
     * @return Address
     */
    public function setPerson(\ContactBoxBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \ContactBoxBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
}
