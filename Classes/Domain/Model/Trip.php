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
 * Trip
 */
class Trip extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $image = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * itinerary
     *
     * @var string
     */
    protected $itinerary = '';

    /**
     * hotelpricedetails
     *
     * @var string
     */
    protected $hotelpricedetails = '';

    /**
     * hotelimages
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $hotelimages = null;

    /**
     * travelperiodstart
     *
     * @var \DateTime
     */
    protected $travelperiodstart = null;

    /**
     * travelperiodend
     *
     * @var \DateTime
     */
    protected $travelperiodend = null;

    /**
     * priceperperson
     *
     * @var float
     */
    protected $priceperperson = 0.0;

    /**
     * timeprice
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Price>
     * @cascade remove
     */
    protected $timeprice = null;

    /**
     * abflugort
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Abflugort>
     * @cascade remove
     */
    protected $abflugort = null;

    /**
     * tourguide
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\TourGuide>
     * @cascade remove
     */
    protected $tourguide = null;

    /**
     * ziel
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Ziel>
     * @cascade remove
     */
    protected $ziel = null;

    /**
     * currenttrip
     * 
     * @var int
     */
    protected $currenttrip = 0;

    /**
     * triptype
     *
     * @var string
     */
    protected $triptype = '';

    /**
     * studentdiscount
     *
     * @var string
     */
    protected $studentdiscount = '';

    /**
     * gesonderteReisen
     *
     * @var string
     */
    protected $gesonderteReisen = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Travelperiod>
     * @cascade remove
     */
    protected $travelPeriod = null;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the triptype
     *
     * @return string $triptype
     */
    public function getTriptype()
    {
        return $this->triptype;
    }

    /**
     * Sets the triptype
     *
     * @param string $triptype
     * @return void
     */
    public function setTriptype($triptype)
    {
        $this->triptype = $triptype;
    }

    /**
     * Returns the studentdiscount
     *
     * @return string $studentdiscount
     */
    public function getStudentdiscount()
    {
        return $this->studentdiscount;
    }

    /**
     * Sets the studentdiscount
     *
     * @param string $studentdiscount
     * @return void
     */
    public function setStudentdiscount($studentdiscount)
    {
        $this->studentdiscount = $studentdiscount;
    }

    /**
     * Returns the gesonderteReisen
     *
     * @return string $gesonderteReisen
     */
    public function getGesonderteReisen()
    {
        return $this->gesonderteReisen;
    }

    /**
     * Sets the gesonderteReisen
     *
     * @param string $gesonderteReisen
     * @return void
     */
    public function setGesonderteReisen($gesonderteReisen)
    {
        $this->gesonderteReisen = $gesonderteReisen;
    }


    /**
     * Adds a image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image->attach($image);
    }

    /**
     * Removes a image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image The Price to be removed
     * @return void
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image->detach($image);
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the itinerary
     *
     * @return string $itinerary
     */
    public function getItinerary()
    {
        return $this->itinerary;
    }

    /**
     * Sets the itinerary
     *
     * @param string $itinerary
     * @return void
     */
    public function setItinerary($itinerary)
    {
        $this->itinerary = $itinerary;
    }

    /**
     * Adds a hotelimages
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $hotelimages
     * @return void
     */
    public function addHotelimages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $hotelimages)
    {
        $this->hotelimages->attach($hotelimages);
    }

    /**
     * Removes a hotelimages
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $hotelimages The Price to be removed
     * @return void
     */
    public function removeHotelimages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $hotelimages)
    {
        $this->hotelimages->detach($hotelimages);
    }

    /**
     * Returns the hotelimages
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $hotelimages
     */
    public function getHotelimages()
    {
        return $this->hotelimages;
    }

    /**
     * Sets the hotelimages
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $hotelimages
     * @return void
     */
    public function setHotelimages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $hotelimages)
    {
        $this->hotelimages = $hotelimages;
    }

    /**
     * Returns the travelperiodstart
     *
     * @return \DateTime $travelperiodstart
     */
    public function getTravelperiodstart()
    {
        return $this->travelperiodstart;
    }

    /**
     * Sets the travelperiodstart
     *
     * @param \DateTime $travelperiodstart
     * @return void
     */
    public function setTravelperiodstart(\DateTime $travelperiodstart)
    {
        $this->travelperiodstart = $travelperiodstart;
    }

    /**
     * Returns the travelperiodend
     *
     * @return \DateTime $travelperiodend
     */
    public function getTravelperiodend()
    {
        return $this->travelperiodend;
    }

    /**
     * Sets the travelperiodend
     *
     * @param \DateTime $travelperiodend
     * @return void
     */
    public function setTravelperiodend(\DateTime $travelperiodend)
    {
        $this->travelperiodend = $travelperiodend;
    }

    /**
     * Returns the priceperperson
     *
     * @return float $priceperperson
     */
    public function getPriceperperson()
    {
        return $this->priceperperson;
    }

    /**
     * Sets the priceperperson
     *
     * @param float $priceperperson
     * @return void
     */
    public function setPriceperperson($priceperperson)
    {
        $this->priceperperson = $priceperperson;
    }

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
        $this->timeprice = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->abflugort = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tourguide = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->hotelimages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->ziel = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->travelPeriod = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Price
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Price $timeprice
     * @return void
     */
    public function addTimeprice(\Nwsnet\NwsTripmanage\Domain\Model\Price $timeprice)
    {
        $this->timeprice->attach($timeprice);
    }

    /**
     * Removes a Price
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Price $timepriceToRemove The Price to be removed
     * @return void
     */
    public function removeTimeprice(\Nwsnet\NwsTripmanage\Domain\Model\Price $timepriceToRemove)
    {
        $this->timeprice->detach($timepriceToRemove);
    }

    /**
     * Returns the timeprice
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Price> $timeprice
     */
    public function getTimeprice()
    {
        return $this->timeprice;
    }

    /**
     * Sets the timeprice
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Price> $timeprice
     * @return void
     */
    public function setTimeprice(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $timeprice)
    {
        $this->timeprice = $timeprice;
    }

    /**
     * Adds a Abflugort
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Abflugort $abflugort
     * @return void
     */
    public function addAbflugort(\Nwsnet\NwsTripmanage\Domain\Model\Abflugort $abflugort)
    {
        $this->abflugort->attach($abflugort);
    }

    /**
     * Removes a Abflugort
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Abflugort $abflugortToRemove The Price to be removed
     * @return void
     */
    public function removeAbflugort(\Nwsnet\NwsTripmanage\Domain\Model\Abflugort $abflugortToRemove)
    {
        $this->abflugort->detach($abflugortToRemove);
    }

    /**
     * Returns the abflugort
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Abflugort> $abflugort
     */
    public function getAbflugort()
    {
        return $this->abflugort;
    }

    /**
     * Sets the abflugort
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Abflugort> $abflugort
     * @return void
     */
    public function setAbflugort(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $abflugort)
    {
        $this->abflugort = $abflugort;
    }

    /**
     * Adds a TourGuide
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\TourGuide $tourguide
     * @return void
     */
    public function addTourguide(\Nwsnet\NwsTripmanage\Domain\Model\TourGuide $tourguide)
    {
        $this->tourguide->attach($tourguide);
    }

    /**
     * Removes a TourGuide
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\TourGuide $tourguideToRemove The TourGuide to be removed
     * @return void
     */
    public function removeTourguide(\Nwsnet\NwsTripmanage\Domain\Model\TourGuide $tourguideToRemove)
    {
        $this->tourguide->detach($tourguideToRemove);
    }

    /**
     * Returns the tourguide
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\TourGuide> $tourguide
     */
    public function getTourguide()
    {
        return $this->tourguide;
    }

    /**
     * Sets the tourguide
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\TourGuide> $tourguide
     * @return void
     */
    public function setTourguide(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tourguide)
    {
        $this->tourguide = $tourguide;
    }

    /**
     * Adds a TourGuide
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Ziel $ziel
     * @return void
     */
    public function addZiel(\Nwsnet\NwsTripmanage\Domain\Model\Ziel $ziel)
    {
        $this->ziel->attach($ziel);
    }

    /**
     * Removes a TourGuide
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Ziel $ziel The TourGuide to be removed
     * @return void
     */
    public function removeZiel(\Nwsnet\NwsTripmanage\Domain\Model\Ziel $ziel)
    {
        $this->ziel->detach($ziel);
    }

    /**
     * Returns the ziel
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Ziel> $ziel
     */
    public function getZiel()
    {
        return $this->ziel;
    }

    /**
     * Sets the tourguide
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Ziel> $ziel
     * @return void
     */
    public function setZiel(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ziel)
    {
        $this->ziel = $ziel;
    }

    /**
     * Adds a Travelperiod
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Travelperiod $travelPeriod
     * @return void
     */
    public function addTravelPeriod(\Nwsnet\NwsTripmanage\Domain\Model\Travelperiod $travelPeriod)
    {
        $this->travelPeriod->attach($travelPeriod);
    }

    /**
     * Removes a Price
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Travelperiod $travelPeriodToRemove The Price to be removed
     * @return void
     */
    public function removeTravelPeriod(\Nwsnet\NwsTripmanage\Domain\Model\Travelperiod $travelPeriodToRemove)
    {
        $this->travelPeriod->detach($travelPeriodToRemove);
    }

    /**
     * Returns the travelPeriod
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Travelperiod> $travelPeriod
     */
    public function getTravelPeriod()
    {
        return $this->travelPeriod;
    }

    /**
     * Sets the travelPeriod
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Nwsnet\NwsTripmanage\Domain\Model\Travelperiod> $travelPeriod
     * @return void
     */
    public function setTravelPeriod(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $travelPeriod)
    {
        $this->travelPeriod = $travelPeriod;
    }

    /**
     * Returns the hotelpricedetails
     *
     * @return string $hotelpricedetails
     */
    public function getHotelpricedetails()
    {
        return $this->hotelpricedetails;
    }

    /**
     * Sets the hotelpricedetails
     *
     * @param string $hotelpricedetails
     * @return void
     */
    public function setHotelpricedetails($hotelpricedetails)
    {
        $this->hotelpricedetails = $hotelpricedetails;
    }
}
