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
 * Booking
 */
class Booking extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * telephone
     *
     * @var string
     */
    protected $telephone = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * street
     *
     * @var string
     */
    protected $street = '';

    /**
     * housenumber
     *
     * @var string
     */
    protected $housenumber = '';

    /**
     * plz
     *
     * @var string
     */
    protected $plz = '';

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * country
     *
     * @var string
     */
    protected $country = '';

    /**
     * abflugort
     *
     * @var string
     */
    protected $abflugort = '';

    /**
     * referenz
     *
     * @var string
     */
    protected $referenz = '';

    /**
     * trip
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Trip
     */
    protected $trip = null;


    /**
     * contactperson
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Contactperson>
     * @cascade remove
     */
    protected $contactperson = null;

    /**
     * contactpersondetail
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Contactperson
     */
    protected $contactpersondetail = null;


    /**
     * @var int
     */
    protected $travelguidance = 0;
    
    /**
     * @var string
     */
    protected $travelguidanceother = '';
    
    /**
     * @var int
     */
    protected $seminarparticipation = 0;
    
    /**
     * @var int
     */
    protected $additionalinformation = 0;

    /**
     * paymentstatus
     *
     * @var string
     */
    protected $paymentstatus = '';

    /**
     * paymentdate
     *
     * @var string
     */
    protected $paymentdate = '';

    /**
     * verifysign
     *
     * @var string
     */
    protected $verifysign = '';

    /**
     * payeremail
     *
     * @var string
     */
    protected $payeremail = '';

    /**
     * txnid
     *
     * @var string
     */
    protected $txnid = '';

    /**
     * paymentmethod
     *
     * @var string
     */
    protected $paymentmethod = '';

    /**
     * timeandprice
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Price
     */
    protected $timeandprice = null;

    /**
     * travelPeriod
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Travelperiod
     */
    protected $travelPeriod = null;

    /**
     * totalprice
     *
     * @var string
     */
    protected $totalprice = '';

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->contactperson = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the totalprice
     *
     * @return string $totalprice
     */
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     * Sets the totalprice
     *
     * @param string $totalprice
     * @return void
     */
    public function setTotalprice($totalprice)
    {
        $this->totalprice = $totalprice;
    }

    /**
     * Returns the housenumber
     *
     * @return string $housenumber
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * Sets the housenumber
     *
     * @param string $housenumber
     * @return void
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;
    }

    /**
     * Returns the plz
     *
     * @return string $plz
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Sets the plz
     *
     * @param string $plz
     * @return void
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
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
     * Returns the country
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the country
     *
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }


    /**
     * Adds a contactperson
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Contactperson $contactperson
     * @return void
     */
    public function addContactperson(\Nwsnet\NwsTripmanage\Domain\Model\Contactperson $contactperson)
    {
        $this->contactperson->attach($contactperson);
    }

    /**
     * Removes a contactperson
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Contactperson $timepriceToRemove The Price to be removed
     * @return void
     */
    public function removeContactperson(\Nwsnet\NwsTripmanage\Domain\Model\Contactperson $timepriceToRemove)
    {
        $this->contactperson->detach($timepriceToRemove);
    }

    /**
     * Returns the contactperson
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Contactperson> $contactperson
     */
    public function getContactperson()
    {
        return $this->contactperson;
    }

    /**
     * Sets the contactperson
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Contactperson> $contactperson
     * @return void
     */
    public function setContactperson(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $contactperson)
    {
        $this->contactperson = $contactperson;
    }



    /**
     * Returns the contactpersondetail
     *
     * @return \Nwsnet\NwsTripmanage\Domain\Model\Contactperson $contactpersondetail
     */
    public function getContactpersondetail()
    {
        return $this->contactpersondetail;
    }

    /**
     * Sets the contactpersondetail
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Contactperson $contactpersondetail
     * @return void
     */
    public function setContactpersondetail(\Nwsnet\NwsTripmanage\Domain\Model\Contactperson $contactpersondetail)
    {
        $this->contactpersondetail = $contactpersondetail;
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
    public function setTrip(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $this->trip = $trip;
    }





    /**
     * Returns the travelguidance
     *
     * @return int $travelguidance
     */
    public function getTravelguidance()
    {
        return $this->travelguidance;
    }

    /**
     * Sets the travelguidance
     *
     * @param int $travelguidance
     * @return void
     */
    public function setTravelguidance($travelguidance)
    {
        $this->travelguidance = $travelguidance;
    }


    /**
     * Returns the travelguidanceother
     *
     * @return string $travelguidanceother
     */
    public function getTravelguidanceother()
    {
        return $this->travelguidanceother;
    }

    /**
     * Sets the travelguidanceother
     *
     * @param string $travelguidanceother
     * @return void
     */
    public function setTravelguidanceother($travelguidanceother)
    {
        $this->travelguidanceother = $travelguidanceother;
    }


    /**
     * Returns the seminarparticipation
     *
     * @return int $seminarparticipation
     */
    public function getSeminarparticipation()
    {
        return $this->seminarparticipation;
    }

    /**
     * Sets the seminarparticipation
     *
     * @param int $seminarparticipation
     * @return void
     */
    public function setSeminarparticipation($seminarparticipation)
    {
        $this->seminarparticipation = $seminarparticipation;
    }


    /**
     * Returns the additionalinformation
     *
     * @return int $additionalinformation
     */
    public function getAdditionalinformation()
    {
        return $this->additionalinformation;
    }

    /**
     * Sets the additionalinformation
     *
     * @param int $additionalinformation
     * @return void
     */
    public function setAdditionalinformation($additionalinformation)
    {
        $this->additionalinformation = $additionalinformation;
    }


    /**
     * Returns the paymentstatus
     *
     * @return string $paymentstatus
     */
    public function getPaymentstatus()
    {
        return $this->paymentstatus;
    }

    /**
     * Sets the paymentstatus
     *
     * @param string $paymentstatus
     * @return void
     */
    public function setPaymentstatus($paymentstatus)
    {
        $this->paymentstatus = $paymentstatus;
    }

    /**
     * Returns the paymentdate
     *
     * @return string $paymentdate
     */
    public function getPaymentdate()
    {
        return $this->paymentdate;
    }

    /**
     * Sets the paymentdate
     *
     * @param string $paymentdate
     * @return void
     */
    public function setPaymentdate($paymentdate)
    {
        $this->paymentdate = $paymentdate;
    }

    /**
     * Returns the verifysign
     *
     * @return string $verifysign
     */
    public function getVerifysign()
    {
        return $this->verifysign;
    }

    /**
     * Sets the verifysign
     *
     * @param string $verifysign
     * @return void
     */
    public function setVerifysign($verifysign)
    {
        $this->verifysign = $verifysign;
    }

    /**
     * Returns the txnid
     *
     * @return string $txnid
     */
    public function getTxnid()
    {
        return $this->txnid;
    }

    /**
     * Sets the txnid
     *
     * @param string $txnid
     * @return void
     */
    public function setTxnid($txnid)
    {
        $this->txnid = $txnid;
    }

    /**
     * Returns the payeremail
     *
     * @return string $payeremail
     */
    public function getPayeremail()
    {
        return $this->payeremail;
    }

    /**
     * Sets the payeremail
     *
     * @param string $payeremail
     * @return void
     */
    public function setPayeremail($payeremail)
    {
        $this->payeremail = $payeremail;
    }


    /**
     * Returns the paymentmethod
     *
     * @return string $paymentmethod
     */
    public function getPaymentmethod()
    {
        return $this->paymentmethod;
    }

    /**
     * Sets the paymentmethod
     *
     * @param string $paymentmethod
     * @return void
     */
    public function setPaymentmethod($paymentmethod)
    {
        $this->paymentmethod = $paymentmethod;
    }


    /**
     * Returns the timeandprice
     *
     * @return \Nwsnet\NwsTripmanage\Domain\Model\Price $timeandprice
     */
    public function getTimeandprice()
    {
        return $this->timeandprice;
    }

    /**
     * Sets the timeandprice
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Price $timeandprice
     * @return void
     */
    public function setTimeandprice(\Nwsnet\NwsTripmanage\Domain\Model\Price $timeandprice)
    {
        $this->timeandprice = $timeandprice;
    }

    /**
     * Returns the travelPeriod
     *
     * @return \Nwsnet\NwsTripmanage\Domain\Model\Travelperiod $travelPeriod
     */
    public function getTravelPeriod()
    {
        return $this->travelPeriod;
    }

    /**
     * Sets the travelPeriod
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Travelperiod $travelPeriod
     * @return void
     */
    public function setTravelPeriod(\Nwsnet\NwsTripmanage\Domain\Model\Travelperiod $travelPeriod)
    {
        $this->travelPeriod = $travelPeriod;
    }

    /**
     * Returns the abflugort
     *
     * @return string $abflugort
     */
    public function getAbflugort()
    {
        return $this->abflugort;
    }

    /**
     * Sets the abflugort
     *
     * @param string $abflugort
     * @return void
     */
    public function setAbflugort($abflugort)
    {
        $this->abflugort = $abflugort;
    }

    /**
     * Returns the referenz
     *
     * @return string $referenz
     */
    public function getReferenz()
    {
        return $this->referenz;
    }

    /**
     * Sets the referenz
     *
     * @param string $referenz
     * @return void
     */
    public function setReferenz($referenz)
    {
        $this->referenz = $referenz;
    }
}
