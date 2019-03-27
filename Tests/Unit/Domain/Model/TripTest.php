<?php
namespace Nwsnet\NwsTripmanage\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class TripTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Trip
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Nwsnet\NwsTripmanage\Domain\Model\Trip();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );

    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getItineraryReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getItinerary()
        );

    }

    /**
     * @test
     */
    public function setItineraryForStringSetsItinerary()
    {
        $this->subject->setItinerary('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'itinerary',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getHotelimagesReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getHotelimages()
        );

    }

    /**
     * @test
     */
    public function setHotelimagesForFileReferenceSetsHotelimages()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setHotelimages($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'hotelimages',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTravelperiodstartReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getTravelperiodstart()
        );

    }

    /**
     * @test
     */
    public function setTravelperiodstartForDateTimeSetsTravelperiodstart()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setTravelperiodstart($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'travelperiodstart',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTravelperiodendReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getTravelperiodend()
        );

    }

    /**
     * @test
     */
    public function setTravelperiodendForDateTimeSetsTravelperiodend()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setTravelperiodend($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'travelperiodend',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPriceperpersonReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPriceperperson()
        );

    }

    /**
     * @test
     */
    public function setPriceperpersonForFloatSetsPriceperperson()
    {
        $this->subject->setPriceperperson(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'priceperperson',
            $this->subject,
            '',
            0.000000001
        );

    }

    /**
     * @test
     */
    public function getTimepriceReturnsInitialValueForPrice()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTimeprice()
        );

    }

    /**
     * @test
     */
    public function setTimepriceForObjectStorageContainingPriceSetsTimeprice()
    {
        $timeprice = new \Nwsnet\NwsTripmanage\Domain\Model\Price();
        $objectStorageHoldingExactlyOneTimeprice = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTimeprice->attach($timeprice);
        $this->subject->setTimeprice($objectStorageHoldingExactlyOneTimeprice);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTimeprice,
            'timeprice',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addTimepriceToObjectStorageHoldingTimeprice()
    {
        $timeprice = new \Nwsnet\NwsTripmanage\Domain\Model\Price();
        $timepriceObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $timepriceObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($timeprice));
        $this->inject($this->subject, 'timeprice', $timepriceObjectStorageMock);

        $this->subject->addTimeprice($timeprice);
    }

    /**
     * @test
     */
    public function removeTimepriceFromObjectStorageHoldingTimeprice()
    {
        $timeprice = new \Nwsnet\NwsTripmanage\Domain\Model\Price();
        $timepriceObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $timepriceObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($timeprice));
        $this->inject($this->subject, 'timeprice', $timepriceObjectStorageMock);

        $this->subject->removeTimeprice($timeprice);

    }

    /**
     * @test
     */
    public function getTourguideReturnsInitialValueForTourGuide()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTourguide()
        );

    }

    /**
     * @test
     */
    public function setTourguideForObjectStorageContainingTourGuideSetsTourguide()
    {
        $tourguide = new \Nwsnet\NwsTripmanage\Domain\Model\TourGuide();
        $objectStorageHoldingExactlyOneTourguide = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTourguide->attach($tourguide);
        $this->subject->setTourguide($objectStorageHoldingExactlyOneTourguide);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTourguide,
            'tourguide',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addTourguideToObjectStorageHoldingTourguide()
    {
        $tourguide = new \Nwsnet\NwsTripmanage\Domain\Model\TourGuide();
        $tourguideObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tourguideObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tourguide));
        $this->inject($this->subject, 'tourguide', $tourguideObjectStorageMock);

        $this->subject->addTourguide($tourguide);
    }

    /**
     * @test
     */
    public function removeTourguideFromObjectStorageHoldingTourguide()
    {
        $tourguide = new \Nwsnet\NwsTripmanage\Domain\Model\TourGuide();
        $tourguideObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tourguideObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tourguide));
        $this->inject($this->subject, 'tourguide', $tourguideObjectStorageMock);

        $this->subject->removeTourguide($tourguide);

    }
}
