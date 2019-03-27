<?php
namespace Nwsnet\NwsTripmanage\Tests\Unit\Controller;

/**
 * Test case.
 */
class TripControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Nwsnet\NwsTripmanage\Controller\TripController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Nwsnet\NwsTripmanage\Controller\TripController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTripsFromRepositoryAndAssignsThemToView()
    {

        $allTrips = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $tripRepository = $this->getMockBuilder(\Nwsnet\NwsTripmanage\Domain\Repository\TripRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $tripRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTrips));
        $this->inject($this->subject, 'tripRepository', $tripRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('trips', $allTrips);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTripToView()
    {
        $trip = new \Nwsnet\NwsTripmanage\Domain\Model\Trip();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('trip', $trip);

        $this->subject->showAction($trip);
    }
}
