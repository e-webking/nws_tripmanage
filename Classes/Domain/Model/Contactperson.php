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
class Contactperson extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * gender
     *
     * @var string
     */
    protected $gender = '';

    /**
     * birthdate
     *
     * @var string
     */
    protected $birthdate = '';

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
     * passportnumber
     *
     * @var string
     */
    protected $passportnumber = '';

    /**
     * nationality
     *
     * @var string
     */
    protected $nationality = '';

    /**
     * age
     *
     * @var string
     */
    protected $age = '';

    /**
     * roomprice
     *
     * @var string
     */
    protected $roomprice = '';

    /**
     * booking
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Booking
     */
    protected $booking = null;

    
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
     * Returns the birthdate
     *
     * @return string $birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Sets the birthdate
     *
     * @param string $birthdate
     * @return void
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
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
     * Returns the passportnumber
     *
     * @return string $passportnumber
     */
    public function getPassportnumber()
    {
        return $this->passportnumber;
    }

    /**
     * Sets the passportnumber
     *
     * @param string $passportnumber
     * @return void
     */
    public function setPassportnumber($passportnumber)
    {
        $this->passportnumber = $passportnumber;
    }


    /**
     * Returns the nationality
     *
     * @return string $nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Sets the nationality
     *
     * @param string $nationality
     * @return void
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * Returns the age
     *
     * @return string $age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Sets the age
     *
     * @param string $age
     * @return void
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Returns the roomprice
     *
     * @return string $roomprice
     */
    public function getRoomprice()
    {
        return $this->roomprice;
    }

    /**
     * Sets the roomprice
     *
     * @param string $roomprice
     * @return void
     */
    public function setRoomprice($roomprice)
    {
        $this->roomprice = $roomprice;
    }
   

    /**
     * Returns the booking
     *
     * @return \Nwsnet\NwsTripmanage\Domain\Model\Booking $booking
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * Sets the booking
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Booking $booking
     * @return void
     */
    public function setBooking(\Nwsnet\NwsTripmanage\Domain\Model\booking $booking)
    {
        $this->booking = $booking;
    }
}
