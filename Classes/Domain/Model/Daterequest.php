<?php
namespace Nwsnet\NwsTripmanage\Domain\Model;

/***
 *
 * This file is part of the "NetzWerkstatt Trip Management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * Contactperson
 */
class Daterequest extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * gender
     *
     * @var string
     */
    protected $gender = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * firstname
     *
     * @var string
     */
    protected $firstname = '';

    /**
     * lastname
     *
     * @var string
     */
    protected $lastname = '';

    /**
     * street
     *
     * @var string
     */
    protected $street = '';

    /**
     * zip
     *
     * @var string
     */
    protected $zip = '';

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * telephone
     *
     * @var string
     */
    protected $telephone = '';

    /**
     * startdate
     *
     * @var string
     */
    protected $startdate = null;

    /**
     * enddate
     *
     * @var string
     */
    protected $enddate = null;

    /**
     * trip
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Trip
     */
    protected $trip = null;

    
    /**
     * Returns the gender
     *
     * @return string $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the gender
     *
     * @param string $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


    /**
     * Returns the firstname
     *
     * @return string $firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets the firstname
     *
     * @param string $firstname
     * @return void
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Returns the lastname
     *
     * @return string $lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets the lastname
     *
     * @param string $lastname
     * @return void
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Returns the street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the street
     *
     * @param string $street
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }


    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the telephone
     *
     * @return string $telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets the telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Returns the startdate
     *
     * @return string $startdate
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Sets the startdate
     *
     * @param string $startdate
     * @return void
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * Returns the enddate
     *
     * @return string $enddate
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Sets the enddate
     *
     * @param string $enddate
     * @return void
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }
   

    /**
     * Returns the trip
     *
     * @return \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     */
    public function getTrip()
    {
        return $this->trip;
    }

    /**
     * Sets the trip
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function setTrip(\Nwsnet\NwsTripmanage\Domain\Model\trip $trip)
    {
        $this->trip = $trip;
    }
}
