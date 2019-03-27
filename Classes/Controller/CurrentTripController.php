<?php
namespace Nwsnet\NwsTripmanage\Controller;

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

use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * CurrentTripController
 */
class CurrentTripController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * tripRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\TripRepository
     * @inject
     */
    protected $tripRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $trips = $this->tripRepository->getCurrentTrips();
        $this->view->assign('trips', $trips);
    }

    /**
     * action show
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function showAction(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $this->view->assign('trip', $trip);
    }
}
