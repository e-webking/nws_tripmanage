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

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/**
 * TripController
 */
class TripController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * tripRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\TripRepository
     * @inject
     */
    protected $tripRepository = null;

    /**
     * tripRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\TourGuideRepository
     * @inject
     */
    protected $tourGuideRepository = null;

    /**
     * tripRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\ZielRepository
     * @inject
     */
    protected $zielRepository = null;

    /**
     * contactpersonRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\ContactpersonRepository
     * @inject
     */
    protected $contactpersonRepository = null;

    /**
     * daterequestRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\DaterequestRepository
     * @inject
     */
    protected $daterequestRepository = null;

    /**
     * bookingRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\BookingRepository
     * @inject
     */
    protected $bookingRepository = null;

    /**
     * priceRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\PriceRepository
     * @inject
     */
    protected $priceRepository = null;

    /**
     * travelperiodRepository
     *
     * @var \Nwsnet\NwsTripmanage\Domain\Repository\TravelperiodRepository
     * @inject
     */
    protected $travelperiodRepository = null;


    /**
     * @var PersistenceManager
     */
    protected $persistenceManager = null;


    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     */
    protected $objectManager = null;

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
     */
    protected $uriBuilder = null;

    /**
     * @var array
     */
    public $travelguidanceValue = [
        1 => 'Deutsch',
        2 => 'Türkisch',
        4 => 'Arabisch'
    ];

    /**
     * @var array
     */
    public $seminarparticipationValue = [
        1 => 'Deutsch',
        2 => 'Türkisch',
        4 => 'Arabisch - Berbisch',
        8 => 'Keine Seminarteilnahme'
    ];

    /**
     * @var array
     */
    public $additionalinformationValue = [
        1 => 'Reiserücktrittsversicherung',
        2 => 'Auslandsversicherung'
    ];

    /**
     * @var string
     */
    protected $clientId = '';

    /**
     * @var string
     */
    protected $clientSecret = '';

    /**
     * @return void
     */
    public function initializeAction()
    {
        $this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $this->uriBuilder = $this->objectManager->get(\TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class);

        // $this->clientId = 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS';
        // $this->clientSecret = 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL';
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $trips = $this->tripRepository->findAll();
        $this->view->assign('trips', $trips);
    }

    /**
     * action filter
     *
     * @return void
     */
    public function filterAction()
    {
        $arguments = $this->request->getArguments();
        $guides = $this->tourGuideRepository->findAll();
        $ziels = $this->zielRepository->findAll();
        $AllTrips = $this->tripRepository->findAll();
        $selectedDuration = $arguments['duration'];
        $selectedType = $arguments['type'];
        $selectedgesonderteReisen = $arguments['gesonderteReisen'];
        $selectedTarget = $arguments['target'];
        $selectedGuide = $arguments['guide'];
        $selectedDate = $arguments['arrivedate'];
        $selectedKeyword = $arguments['keyword'];
        $durations = [];
        foreach ($AllTrips as $trip) {
            if(!$trip->getTravelperiodend())
            {
               $durations[1] = 1;
            }else{
                $date1 = $trip->getTravelperiodstart();
                $date2 = $trip->getTravelperiodend();
                $days  = $date2->diff($date1)->format('%a');
                $durations[$days+1] = $days+1;
            }
           
        }
        
        if($arguments['submitForm']){
            
            $matchedTrips = $this->tripRepository->findMatchedRecord($arguments['type'],$arguments['gesonderteReisen'],$arguments['arrivedate'],$arguments['keyword']);
            if($arguments['duration'])
            {
                $daysArray=[];
                foreach ($AllTrips as $key => $trip) {
                    if(!$trip->getTravelperiodend())
                    {
                       $duration = 1;
                    }else{
                        $date1 = $trip->getTravelperiodstart();
                        $date2 = $trip->getTravelperiodend();
                        $days  = $date2->diff($date1)->format('%a');
                        $duration = $days+1;
                    }
                    if($arguments['duration']>=$duration)
                        $daysArray[] =$trip;
                }
            }
            $trips = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
               if($matchedTrips){
                    foreach($matchedTrips as $matchedTrip)
                    {
                        $trips->attach($matchedTrip);
                    }
               }
               if($daysArray){
                    foreach($daysArray as $tipDays)
                    {
                        $trips->attach($tipDays);
                    }
               }
        }
        
        $this->view->assign('trips', $trips);      
        $this->view->assign('guides', $guides);
        $this->view->assign('durations', $durations);
        $this->view->assign('ziels', $ziels);
        $this->view->assign('submit', $arguments['submitForm']);
        $this->view->assign('selectedDuration', $selectedDuration);
        $this->view->assign('selectedType', $selectedType);
        $this->view->assign('selectedgesonderteReisen', $selectedgesonderteReisen);
        $this->view->assign('selectedTarget', $selectedTarget);
        $this->view->assign('selectedGuide', $selectedGuide);
        $this->view->assign('selectedDate', $selectedDate);
        $this->view->assign('selectedKeyword', $selectedKeyword);

    }

    /**
     * action show
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function showAction(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $salutation = [
            'herr' => 'Herr', 
            'frau' => 'Frau'
        ];
        $currentPid = $GLOBALS['TSFE']->id;

        $this->view->assign('trip', $trip);
        $this->view->assign('currentPid', $currentPid);
        $this->view->assign('salutation', $salutation);
    }

    /**
     * action roompricce
     *
     * @return void
     */
    public function roompricceAction()
    {
        $arguments = $_GET['tx_nwstripmanage_nwtripbooking'];
        $age = $arguments['age'];
        $selectedRoom = $arguments['selectedRoom'];
        $student = $arguments['student'];
        $trip = $this->tripRepository->findByUid($arguments['tripId']);
        $bedRoomPriceArr = $trip->getTimeprice();
        
        if ($student == '1' && $age >= '12' && $age <= '21') {
            foreach ($bedRoomPriceArr as $key => $value) {
                if ($value->getNumberofbeds() == $selectedRoom && $value->getStudentprice () == '1') {
                    $newBedRoomArr[] = $value;
                }
            }
        } else {
            foreach ($bedRoomPriceArr as $key => $value) {
                if ($value->getNumberofbeds() == $selectedRoom && $value->getStudentprice () != '1' ) {
                    $newBedRoomArr[] = $value;
                }
            }
        }
        
        foreach ($newBedRoomArr as $k => $v) {
            $ageArr = explode("-", $v->getAge());
            if ($age >= $ageArr['0'] && $age <= $ageArr['1']) {
                $roomPrice = $v->getPrice();
            }
        }
               
        if ($roomPrice == null) {
            foreach ($newBedRoomArr as $k => $v) {
                if (empty($v->getAge())) {
                   $roomPrice = $v->getPrice(); 
                }
            }
        }
        $aJson['roomPrice'] = $roomPrice;
        $json = json_encode($aJson);
        print $json;
        die;
    }

    /**
     * action dateRequest
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function dateRequestAction(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $arguments = $this->request->getArguments();
        $settings = $this->settings;

        $e = 0;
        if (empty($arguments['gender'])) {
            $e++;
            $this->addFlashMessage('Please select "Gender" field');
        } else if (empty($arguments['email'])) {
            $e++;
            $this->addFlashMessage('Please fill "Email" field');
        } else if (empty($arguments['firstname'])) {
            $e++;
            $this->addFlashMessage('Please fill "Firstname" field');
        } else if (empty($arguments['lastname'])) {
            $e++;
            $this->addFlashMessage('Please fill "Lastname" field');
        } else if (empty($arguments['street'])) {
            $e++;
            $this->addFlashMessage('Please fill "Street" field');
        } else if (empty($arguments['city'])) {
            $e++;
            $this->addFlashMessage('Please fill "City" field');
        } else if (empty($arguments['zip'])) {
            $e++;
            $this->addFlashMessage('Please fill "Zip" field');
        } else if (empty($arguments['telephone'])) {
            $e++;
            $this->addFlashMessage('Please fill "Telephone" field');
        } else if (empty($arguments['startdate'])) {
            $e++;
            $this->addFlashMessage('Please fill "StartDate" field');
        } else if (empty($arguments['enddate'])) {
            $e++;
            $this->addFlashMessage('Please fill "EndDate" field');
        }
        
        if ($e == 0) {
            $newDateRequest = new \Nwsnet\NwsTripmanage\Domain\Model\Daterequest();
            $newDateRequest->setPid($settings['flexform']['main']['pid']);
            $newDateRequest->setTrip($trip);
            $newDateRequest->setGender($arguments['gender']);
            $newDateRequest->setEmail($arguments['email']);
            $newDateRequest->setFirstname($arguments['firstname']);
            $newDateRequest->setLastname($arguments['lastname']);
            $newDateRequest->setStreet($arguments['street']);
            $newDateRequest->setCity($arguments['city']);
            $newDateRequest->setZip($arguments['zip']);
            $newDateRequest->setTelephone($arguments['telephone']);
            $newDateRequest->setStartdate($arguments['startdate']);
            $newDateRequest->setEnddate($arguments['enddate']);

            $this->daterequestRepository->add($newDateRequest);
            $this->persistenceManager->persistAll();

            $mailFrom = $arguments['email'];
            $mailFromName = $arguments['firstname'];
            $mailSubject = 'Booking Information - BALCOK Travel Agency GmbH';
            $variables = array('newDateRequest' => $newDateRequest);
            $mailBody = $this->getEmailBody('dateRequestMail', $variables);
            $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
            $mail->setSubject($mailSubject);
            $mail->setFrom(array($mailFrom => $mailFromName));
            $mail->setTo(array('info@balcok.com' => 'BALCOK Travel Agency GmbH'));
            $mail->setBody($mailBody,'text/html', 'utf-8');
            $success = $mail->send();
            if ($success == true) {
               $mailSend = true;
            }

        }
        $this->view->assign('success', $$success);
    }


    /**
     * action show
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function bookingFormAction(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $settings = $this->settings['flexform'];
        $salutation = [
            'herr' => 'Herr', 
            'frau' => 'Frau'
        ];
        $arguments = $this->request->getArguments();

        $this->view->assign('showBookingForm', true);
        $this->view->assign('trip', $trip);
        $this->view->assign('salutation', $salutation);
    }

    /**
     * action show
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function createBookingAction(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $arguments = $this->request->getArguments();
        $settings = $this->settings['flexform'];

        if ($this->request->hasArgument('submitButton') || $this->request->hasArgument('payViaPayPal'))
        {
            $errors = 0;
            $contactPersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            $contactPersonsArray = array();
            $cnt = intval($arguments['numberofpassenger']);
            // foreach ($arguments['firstname'] as $cp)
            for ($i = 0; $i < $cnt; $i++)
            {
                $e = 0;
                if (empty($arguments['gender'][$i]))  {
                    $e++;
                    $this->addFlashMessage('Please select "Gender" field for Passenger '. ($i+1) . '.');
                }
                else if (empty($arguments['birthdate'][$i])) {
                    $e++;
                    $this->addFlashMessage('Please fill "birthdate" field for Passenger '. ($i+1) . '.');
                }
                else if (empty($arguments['firstname'][$i])) {
                    $e++;
                    $this->addFlashMessage('Please fill "firstname" field for Passenger '. ($i+1) . '.');
                }
                else if (empty($arguments['lastname'][$i])) {
                    $e++;
                    $this->addFlashMessage('Please fill "lastname" field for Passenger '. ($i+1) . '.');
                }
                // else if (empty($arguments['passportnumber'][$i])) {
                //     $e++;
                //     $this->addFlashMessage('Please fill "passportnumber" field for Passenger '. ($i+1) . '.');
                // }
                // else if (empty($arguments['nationality'][$i])) {
                //     $e++;
                //     $this->addFlashMessage('Please fill "nationality" field for Passenger '. ($i+1) . '.');
                // }

                if ($e == 0)
                {
                    $contactPerson = new \Nwsnet\NwsTripmanage\Domain\Model\Contactperson();
                    $contactPerson->setPid($settings['bookings']['pid']);
                    $contactPerson->setGender($arguments['gender'][$i]);
                    $contactPerson->setBirthdate($arguments['birthdate'][$i]);
                    $contactPerson->setFirstname($arguments['firstname'][$i]);
                    $contactPerson->setLastname($arguments['lastname'][$i]);
                    $contactPerson->setPassportnumber($arguments['passportnumber'][$i]);
                    $contactPerson->setNationality($arguments['nationality'][$i]);
                    $contactPerson->setAge($arguments['age'][$i]);
                    $contactPerson->setRoomprice($arguments['bedroomprice'][$i]);

                    $this->contactpersonRepository->add($contactPerson);
                    $this->persistenceManager->persistAll();

                    $contactPersons->attach($contactPerson);
                    $contactPersonsArray[$i+1] = $contactPerson;
                }
                else 
                {
                    $errors++;
                }
            }

            if (empty($arguments['telephone'])) {
                $errors++;
                $this->addFlashMessage('Please select "telephone" field.');
            }
            else if (empty($arguments['email'])) {
                $errors++;
                $this->addFlashMessage('Please select "email" field.');
            }
            else if (empty($arguments['street'])) {
                $errors++;
                $this->addFlashMessage('Please select "street" field.');
            }
            else if (empty($arguments['housenumber'])) {
                $errors++;
                $this->addFlashMessage('Please select "housenumber" field.');
            }
            else if (empty($arguments['plz'])) {
                $errors++;
                $this->addFlashMessage('Please select "plz" field.');
            }
            else if (empty($arguments['city'])) {
                $errors++;
                $this->addFlashMessage('Please select "city" field.');
            }
            else if (empty($arguments['country'])) {
                $errors++;
                $this->addFlashMessage('Please select "country" field.');
            }
            /*else if (empty($arguments['abflugort'])) {
                $errors++;
                $this->addFlashMessage('Please select "abflugort" field.');
            }*/
            else if (empty($arguments['referenz'])) {
                $errors++;
                $this->addFlashMessage('Please select "referenz" field.');
            }
            
            if ($errors == 0)
            {
                $travelguidance = array_filter($arguments['travelguidance']);
                $travelguidanceObj = array_sum(array_keys($travelguidance));

                $seminarparticipation = array_filter($arguments['seminarparticipation']);
                $seminarparticipationObj = array_sum(array_keys($seminarparticipation));

                $additionalinformation = array_filter($arguments['additionalinformation']);
                $additionalinformationObj = array_sum(array_keys($additionalinformation));

                $newBooking = new \Nwsnet\NwsTripmanage\Domain\Model\Booking();
                $newBooking->setPid($settings['bookings']['pid']);
                $newBooking->setTelephone($arguments['telephone']);
                $newBooking->setEmail($arguments['email']);
                $newBooking->setStreet($arguments['street']);
                $newBooking->setHousenumber($arguments['housenumber']);
                $newBooking->setPlz($arguments['plz']);
                $newBooking->setCity($arguments['city']);
                $newBooking->setCountry($arguments['country']);
                $newBooking->setAbflugort($arguments['abflugort']);
                $newBooking->setReferenz($arguments['referenz']);
                $newBooking->setContactperson($contactPersons);
                /*if (!empty($arguments['timeprice'])) {
                    $timeandpriceObj = $this->priceRepository->findByUid($arguments['timeprice']);
                    $newBooking->setTimeandprice($timeandpriceObj);
                }*/
                // set Total Price
                $totalPrice = 0.00;
                foreach ($contactPersonsArray as $key => $value) {
                    $totalPrice = $value->getRoomprice() + $totalPrice;
                }
                //$finalPrice = $totalPrice + ($arguments['pricePerPerson']*$arguments['numberofpassenger']);
                $newBooking->setTotalprice($totalPrice);


                if (!empty($arguments['travelPeriod'])) {
                    $travelPeriodObj = $this->travelperiodRepository->findByUid($arguments['travelPeriod']);
                    $newBooking->setTravelPeriod($travelPeriodObj);
                }
                $newBooking->setTrip($trip);

                $contactpersondetailValue = $contactPersonsArray[1];
                if (array_key_exists($arguments['contactperson'], $contactPersonsArray)) {
                    $contactpersondetailValue = $contactPersonsArray[$arguments['contactperson']];
                }
                $newBooking->setContactpersondetail($contactpersondetailValue);

                $newBooking->setTravelguidance($travelguidanceObj);
                $newBooking->setTravelguidanceother($arguments['travelguidanceother']);
                $newBooking->setSeminarparticipation($seminarparticipationObj);
                $newBooking->setAdditionalinformation($additionalinformationObj);


                $this->bookingRepository->add($newBooking);
                $this->persistenceManager->persistAll();

                if ($arguments['payViaPayPal'] == true)
                {
                    $paypalFormUri = $this->uriBuilder
                        ->reset()
                        ->setTargetPageUid($settings['payPalForm']['pid'])
                        ->setCreateAbsoluteUri(true)
                        ->setUseCacheHash(true)
                        ->uriFor(
                            'paypalForm', 
                            array(
                                'trip' => $trip, 
                                'numberofpassenger' => $arguments['numberofpassenger'], 
                                'newBooking' => $newBooking
                            ),
                            'Trip',
                            'NwsTripmanage',
                            'Nwtripbooking'
                        );

                    $this->redirectToUri($paypalFormUri);

                    // $trip, $arguments['numberofpassenger'], $newBooking
                    /*$this->forward(
                        'paypalForm', 
                        'Trip', 
                        'NwsTripmanage', 
                        [
                            'trip' => $trip, 
                            'numberofpassenger' => $arguments['numberofpassenger'], 
                            'newBooking' => $newBooking
                        ]
                    );*/
                    // $this->payViaPayPal($trip, $arguments['numberofpassenger'], $newBooking);
                    // die;
                }
                else
                {
                    $this->sendBookingInformationEmail($newBooking);

                    $thankyouPageUri = $this->uriBuilder
                        ->reset()
                        ->setTargetPageUid($settings['thankyou']['pid'])
                        ->setCreateAbsoluteUri(true)
                        ->buildFrontendUri();

                    $this->redirectToUri($thankyouPageUri);
                }
            }
            $this->redirect('bookingForm', 'Trip', 'NwsTripmanage', ['trip' => $trip]);
        }
        $this->redirect('bookingForm', 'Trip', 'NwsTripmanage', ['trip' => $trip]);
    }

    /**
     * paypal payment form
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @param int $numberofpassenger
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Booking $newBooking
     * @return void
     */
    public function paypalFormAction($trip, $numberofpassenger, $newBooking)
    {
        $settings = $this->settings['flexform'];
        $paypalFormUrl = 'https://www.paypal.com/cgi-bin/webscr';
        if ($this->settings['paypalSandbox'] == 1) {
            $paypalFormUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        }
        $paypalBusinessEmailId = $this->settings['paypalBusinessEmailId'];
        /*$totalPrice = ($trip->getPriceperperson() * $numberofpassenger);*/
        $totalPrice = $newBooking->getTotalprice();
        
        $paypalReturnUri = $this->uriBuilder
            ->reset()
            ->setCreateAbsoluteUri(true)
            ->setTargetPageUid($settings['bookingpage']['pid'])
            // ->setArguments(
            //     array(
            //         'success' => 'true',
            //         'bookingID' => $newBooking->getUid()
            //     )
            // )
            ->setUseCacheHash(false)
            ->uriFor(
                'paypalExecutePayment', 
                array(
                    'success' => 'true',
                    'bookingID' => $newBooking->getUid(),
                    'trip' => $trip
                ),
                'Trip',
                'NwsTripmanage',
                'Nwtripbooking'
            );

        $paypalCancelUri = $this->uriBuilder
            ->reset()
            ->setCreateAbsoluteUri(true)
            ->setTargetPageUid($settings['bookingpage']['pid'])
            // ->setArguments(
            //     array(
            //         'success' => 'false',
            //         'bookingID' => $newBooking->getUid()
            //     )
            // )
            ->uriFor(
                'bookingForm', 
                array(
                    'success' => 'false',
                    'bookingID' => $newBooking->getUid(),
                    'trip' => $trip
                ),
                'Trip',
                'NwsTripmanage',
                'Nwtripbooking'
            );

        $paypalNotifyUrl = $this->uriBuilder
            ->reset()
            ->setCreateAbsoluteUri(true)
            ->setTargetPageUid($settings['payPalForm']['pid'])
            ->setArguments(
                array(
                    'notify' => 'true',
                    'bookingID' => $newBooking->getUid()
                )
            )
            ->uriFor(
                'bookingForm', 
                array(
                    'trip' => $trip
                ),
                'Trip',
                'NwsTripmanage',
                'Nwtripbooking'
            );

        $this->view->assign('paypalReturnUri', $paypalReturnUri);
        $this->view->assign('paypalCancelUri', $paypalCancelUri);
        $this->view->assign('paypalNotifyUrl', $paypalNotifyUrl);

        $this->view->assign('totalPrice', $totalPrice);
        $this->view->assign('paypalBusinessEmailId', $paypalBusinessEmailId);
        $this->view->assign('paypalFormUrl', $paypalFormUrl);
        $this->view->assign('sessionID', $GLOBALS['TSFE']->fe_user->id);        

        $this->view->assign('trip', $trip);
        $this->view->assign('numberofpassenger', $numberofpassenger);
        $this->view->assign('newBooking', $newBooking);
    }

    /**
     * paypalExecutePayment action
     *
     * @param boolean $success
     * @param int $bookingID
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function paypalExecutePaymentAction($success, $bookingID, \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $settings = $this->settings['flexform'];
        $booking = $this->bookingRepository->findByUid($bookingID);

        if ($this->request->getMethod() == 'POST')
        {
            $raw_post_data = file_get_contents('php://input');
            $raw_post_array = explode('&', $raw_post_data);
            $myPost = array();
            foreach ($raw_post_array as $keyval)
            {
                $keyval = explode ('=', $keyval);
                if (count($keyval) == 2)
                {
                    $myPost[$keyval[0]] = urldecode($keyval[1]);
                }
            }

            $booking->setPaymentmethod('PayPal');
            $booking->setPaymentstatus($myPost['payment_status']);
            $booking->setPaymentdate($myPost['payment_date']);
            $booking->setVerifysign($myPost['verify_sign']);
            $booking->setTxnid($myPost['txn_id']);
            $booking->setPayeremail($myPost['payer_email']);
            $this->bookingRepository->update($booking);
            $this->persistenceManager->persistAll();


            $this->sendBookingPaymentInformationEmail($booking);

            $sessionID = $GLOBALS['TSFE']->fe_user->id;
            // DebuggerUtility::var_dump($booking);
            // $trip = $booking->getTrip();
            $passengers = $booking->getContactperson()->count();
            $totalPrice = ($trip->getPriceperperson() * $passengers);
            // die;

            $returnURL = $this->uriBuilder
                ->reset()
                ->setCreateAbsoluteUri(true)
                ->uriFor(
                    'bookingForm', 
                    array(
                        'status' => 'completed',
                        'trip' => $trip
                    ),
                    'Trip',
                    'NwsTripmanage',
                    'Nwtripbooking'
                );
        }
        else
        {
            $returnURL = $this->uriBuilder
                ->reset()
                ->setCreateAbsoluteUri(true)
                ->setTargetPageUid($settings['bookingpage']['pid'])
                ->uriFor(
                    'bookingForm', 
                    array(
                        'status' => 'failed',
                        'newBooking' => $booking,
                        'trip' => $trip
                    ),
                    'Trip',
                    'NwsTripmanage',
                    'Nwtripbooking'
                )
                ->buildFrontendUri();
        }
        $this->redirectToUri($returnURL);
    }

    /**
     * Send Booking Information Email to customer
     * 
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Booking $booking
     * @return void
     */
    public function sendBookingInformationEmail(\Nwsnet\NwsTripmanage\Domain\Model\Booking $booking)
    {
        $mailTo = $booking->getEmail();
        $mailSubject = 'Booking Information - BALCOK Travel Agency GmbH';
        $variables = array('booking' => $booking);
        $mailBody = $this->getEmailBody('BookingInformation', $variables);

        $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
        $mail->setSubject($mailSubject);
        $mail->setFrom(array('info@balcok.com' => 'BALCOK Travel Agency GmbH'));
        $mail->setTo(array($mailTo, 'info@balcok.com' => 'BALCOK Travel Agency GmbH'));
        $mail->setBody($mailBody,'text/html', 'utf-8');
        return $mail->send();

        //return $this->sendMail($mailTo, $mailSubject, $mailBody, false, $mailFromEmail);
    }

    /**
     * Send Booking & Payment Information Email to customer
     * 
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Booking $booking
     * @return void
     */
    public function sendBookingPaymentInformationEmail(\Nwsnet\NwsTripmanage\Domain\Model\Booking $booking)
    {
        $mailTo = $booking->getEmail();
        $mailSubject = 'Booking & Payment Information - BALCOK Travel Agency GmbH';
        $variables = array('booking' => $booking);
        $mailBody = $this->getEmailBody('BookingAndPaymentInformation', $variables);

        $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
        $mail->setSubject($mailSubject);
        $mail->setFrom(array('info@balcok.com' => 'BALCOK Travel Agency GmbH'));
        $mail->setTo(array($mailTo, 'info@balcok.com' => 'BALCOK Travel Agency GmbH'));
        $mail->setBody($mailBody,'text/html', 'utf-8');
        return $mail->send();

        //return $this->sendMail($mailTo, $mailSubject, $mailBody, false, $mailFromEmail);
    }

    /**
     * send a mail with build-in swiftmailer
     * @param \mixed $to array(key1 => array('email' => 'jainish@domain.com', 'name' => 'Jainish'), key2 => array('email' => 'info@domain.com', 'name' => 'Admin')) or just a string with the email-address
     * @param \string $subject
     * @param \string $html
     * @param \string $plain
     * @param \string $fromEmail
     * @param \string $fromName
     * @param \string $replyToEmail
     * @param \string $replyToName
     * @param \string $returnPath
     * @param \array $attachements array('path/to/file-1.suffix' => 'Name Of File-1', 'path/to/file-2.suffix' => 'Name Of File-2', 'path/to/filen.suffix' => 'Name Of File N')
     * @return \boolean true, if mail should be send - false, if parameter errors are given
     */
     
    public static function sendMail($to, $subject, $html, $plain = false, $fromEmail = '', $fromName = '', $replyToEmail = '', $replyToName = '', $returnPath = '', $attachements = array())
    {

        // Make instance of swiftmailer
        $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
           
        // From
        if ($fromEmail) {
            $message->setFrom(array($fromEmail => $fromName));
        }
         
        // To
        $recipients = array();
        if (is_array($to)) {
            foreach ($to as $pair) {
                if (\TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($pair['email'], false)) {
                    if (trim($pair['name'])) {
                        $recipients[$pair['email']] = $pair['name'];
                    } else {
                        $recipients[] = $pair['email'];
                    }
                }
            }
        } else {
            $recipients[] = $to;
        }
         
        if (!count($recipients)) {
            return false;
        }
         
        $message->setTo($recipients);
         
        // Subject
        $message->setSubject($subject);
         
        // HTML
        $message->setBody($html, 'text/html', 'utf-8');
         
        // Plain
        if ($plain) {
            $message->addPart($plain, 'text/plain', 'utf-8');
        }
         
        // Return Path
        if (trim($returnPath)) {
            $message->setReturnPath($returnPath);
        }
         
        // Reply To
        if (trim($replyToEmail) && \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($replyToEmail)) {
            if (trim($replyToName)) {
                $message->setReplyTo(array($replyToEmail => $replyToName));
            } else {
                $message->setReplyTo(array($replyToEmail));
            }
        }
         
        // Attachements
        if (count($attachements)) {
            foreach ($attachements as $file => $name) {
                if (file_exists($file)) {
                    if (trim($name)) {
                        $message->attach(\Swift_Attachment::fromPath($file)->setFilename($name));
                    } else {
                        $message->attach(Swift_Attachment::fromPath($file));
                    }
                }
            }
        }
         
        // Mail Send
        $message->send();
         
        return $message->isSent();
    }

    /**
     * Get email body from template
     *
     * @param string $templateName
     * @param array $variables
     *
     * @return string
     */
    public function getEmailBody($templateName, $variables = array())
    {
        /** @var \TYPO3\CMS\Fluid\View\StandaloneView $emailView */
        $emailView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
     
        //$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        //$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
        $extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('nws_tripmanage');
            $templateRootPath = $extPath."/Resources/Private/Templates/";
            $templatePathAndFilename = $templateRootPath . 'Mail/' . $templateName . '.html';
        $emailView->setTemplatePathAndFilename($templatePathAndFilename);
        $emailView->assignMultiple($variables);
        //$emailBody = $emailView->render();
     
        // if you have an additional html Template //
        // $templatePathAndFilename = $templateRootPath . 'Email/' . $templateName . 'Html.html';
        // $emailView->setTemplatePathAndFilename($templatePathAndFilename);
        $emailHtmlBody = $emailView->render();
        return $emailHtmlBody;
    }

    /**
     * paypal payment
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @param int $numberofpassenger
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Booking $newBooking
     * @return void
     */
    public function payViaPayPal($trip, $numberofpassenger, $newBooking)
    {
        $totalPrice = ($trip->getPriceperperson() * $numberofpassenger);

        $paypalReturnUri = $this->uriBuilder
            ->reset()
            ->setCreateAbsoluteUri(true)
            ->setArguments(
                array(
                    'success' => 'true',
                    'bookingID' => $newBooking->getUid()
                )
            )
            ->setUseCacheHash(false)
            ->uriFor(
                'paypalExecutePayment', 
                array(
                    'trip' => $trip
                ),
                'Trip',
                'NwsTripmanage',
                'Nwtripbooking'
            );

        $paypalCancelUri = $this->uriBuilder
            ->reset()
            ->setCreateAbsoluteUri(true)
            ->setArguments(
                array(
                    'success' => 'false',
                    'bookingID' => $newBooking->getUid()
                )
            )
            ->uriFor(
                'bookingForm', 
                array(
                    'trip' => $trip
                ),
                'Trip',
                'NwsTripmanage',
                'Nwtripbooking'
            );
// die;
        require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('nws_tripmanage') . 'Resources/Private/PHP/PayPal-PHP-SDK/autoload.php');

        // $apiContext = new \PayPal\Rest\ApiContext(
        //     new \PayPal\Auth\OAuthTokenCredential(
        //         'AQdm6qVy19PlyTGsF_9JdY611jtdz_LLEtSo1-4GjiLaFr-kw-Nj2FgJPpN6YhI6qT76TBKOwWrqDJBl',     // ClientID
        //         'EGmEu4MMlqVrlUeRITwYlDe5cakvfmKegzfHdY9dii0KS7voTrNooc8mZN1kbdLk0DBW1w-ivWgEmYK4'      // ClientSecret
        //     )
        // );

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->clientId,            // ClientID
                $this->clientSecret         // ClientSecret
            )
        );

        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'cache.enabled' => true,
                //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
                // 'http.CURLOPT_CONNECTTIMEOUT' => 30
                // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
                //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
            )
        );

        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($totalPrice);
        $amount->setCurrency('EUR');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl($paypalReturnUri)
            ->setCancelUrl($paypalCancelUri);

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($apiContext);
            // echo $payment;

            echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
            // die;
            $this->redirectToUri($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
            die;
        }
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($apiContext);
        // die;
    }

    /**
     * @return void
     */
    public function paypalExecutePaymentOldAction()
    {
        $booking = $this->bookingRepository->findByUid(intval($_GET['bookingID']));
        // DebuggerUtility::var_dump($booking);
        $trip = $booking->getTrip();
        $passengers = $booking->getContactperson()->count();
        $totalPrice = ($trip->getPriceperperson() * $passengers);
        // die;

        $returnURL = $this->uriBuilder
            ->reset()
            ->setCreateAbsoluteUri(true)
            ->uriFor(
                'bookingForm', 
                array(
                    'trip' => $trip
                ),
                'Trip',
                'NwsTripmanage',
                'Nwtripbooking'
            );

        require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('nws_tripmanage') . 'Resources/Private/PHP/PayPal-PHP-SDK/autoload.php');

        // $apiContext = new \PayPal\Rest\ApiContext(
        //     new \PayPal\Auth\OAuthTokenCredential(
        //         'AQdm6qVy19PlyTGsF_9JdY611jtdz_LLEtSo1-4GjiLaFr-kw-Nj2FgJPpN6YhI6qT76TBKOwWrqDJBl',     // ClientID
        //         'EGmEu4MMlqVrlUeRITwYlDe5cakvfmKegzfHdY9dii0KS7voTrNooc8mZN1kbdLk0DBW1w-ivWgEmYK4'      // ClientSecret
        //     )
        // );

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->clientId,            // ClientID
                $this->clientSecret         // ClientSecret
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'cache.enabled' => true,
                //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
                // 'http.CURLOPT_CONNECTTIMEOUT' => 30
                // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
                //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
            )
        );

        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            // Get the payment Object by passing paymentId
            // payment id was previously stored in session in
            // CreatePaymentUsingPayPal.php
            $paymentId = $_GET['paymentId'];
            $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);


            // DebuggerUtility::var_dump($payment);
            // die;

            // ### Payment Execute
            // \PayPal\Api\PaymentExecution object includes information necessary
            // to execute a PayPal account payment.
            // The payer_id is added to the request query parameters
            // when the user is redirected from paypal back to your site
            $execution = new \PayPal\Api\PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);
            // ### Optional Changes to Amount
            // If you wish to update the amount that you wish to charge the customer,
            // based on the shipping address or any other reason, you could
            // do that by passing the transaction object with just `amount` field in it.
            // Here is the example on how we changed the shipping to $1 more than before.
            $transaction = new \PayPal\Api\Transaction();
            $amount = new \PayPal\Api\Amount();
            $details = new \PayPal\Api\Details();
            $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal($totalPrice);
            $amount->setCurrency('EUR');
            $amount->setTotal($totalPrice);
            $amount->setDetails($details);
            $transaction->setAmount($amount);
            // Add the above transaction object inside our Execution object.
            $execution->addTransaction($transaction);
            try {
                // Execute the payment
                // (See bootstrap.php for more on `ApiContext`)
                $result = $payment->execute($execution, $apiContext);

                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                // ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);
                try {
                    $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

                    DebuggerUtility::var_dump($payment);
                    die;
                die;
                } catch (Exception $ex) {
                    DebuggerUtility::var_dump($ex);
                    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                    // ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
                    exit(1);
                }
            } catch (Exception $ex) {
                DebuggerUtility::var_dump($ex);
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                // ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
                exit(1);
            }
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            // ResultPrinter::printResult("Get Payment", "Payment", $payment->getId(), null, $payment);
            // return $payment;
        } else {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            // ResultPrinter::printResult("User Cancelled the Approval", null);
            exit;
        }
        DebuggerUtility::var_dump($payment);
        die;
    }

    /**
     * action createPdf
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function createPdfAction(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('nws_tripmanage') . 'Resources/Private/PHP/mpdf/autoload.php');

        $variables = array('trip' => $trip);
        
        $mailBody = $this->getTemplateContents('TripPdf', $variables);
        $baseurl = $GLOBALS['TSFE']->baseUrl.'fileadmin/logo.png';
        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTopMargin('25%');
        $mpdf->SetHTMLHeader('
                <div style="text-align: right;">
                    <img src="'.$baseurl.'" style="width:35mm;" />
                </div>'
            );
        $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="33%">{DATE j-m-Y}</td>
                        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                        <td width="33%" style="text-align: right;">BALCOK Travel Agency GmbH</td>
                    </tr>
                </table>'
            );
        $mpdf->WriteHTML($mailBody);
        $mpdf->Output();
        die;
    }

    /**
     * action rememberTrip
     *
     * @param \Nwsnet\NwsTripmanage\Domain\Model\Trip $trip
     * @return void
     */
    public function rememberTripAction(\Nwsnet\NwsTripmanage\Domain\Model\Trip $trip)
    {
        $rememberTrips = $GLOBALS['TSFE']->fe_user->getKey('ses', 'rememberTrips');
        if (empty($rememberTrips)) {
            $rememberTrips = array();
        }
        if (!in_array($trip->getUid(), $rememberTrips)) {
            $rememberTrips[] = $trip->getUid();
        }
        $GLOBALS['TSFE']->fe_user->setKey('ses', 'rememberTrips', $rememberTrips);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        $this->redirect('show', 'Trip', 'NwsTripmanage', ['trip' => $trip]);
    }


    /**
     * action getRememberTrip
     *
     * @return void
     */
    public function getRememberTripAction()
    {
        $rememberedTrips = $GLOBALS['TSFE']->fe_user->getKey('ses', 'rememberTrips');
        if (empty($rememberedTrips)) {
            $rememberedTrips = array();
        }
        $rememberedTripsArr = array();
        foreach ($rememberedTrips as $rtrip) {
            $rememberedTripsArr[] = $this->tripRepository->findByUid($rtrip);
        }
        $this->view->assign('trips', $rememberedTripsArr);
    }

    /**
     * Get email body from template
     *
     * @param string $templateName
     * @param array $variables
     *
     * @return string
     */
    public function getTemplateContents($templateName, $variables = array())
    {
        /** @var \TYPO3\CMS\Fluid\View\StandaloneView $emailView */
        $emailView = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
     
        //$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        //$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
        $extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('nws_tripmanage');
            $templateRootPath = $extPath."/Resources/Private/Templates/";
            $layoutRootPath = $extPath."/Resources/Private/Layouts/";
            $templatePathAndFilename = $templateRootPath . 'Trip/' . $templateName . '.html';
        $emailView->setTemplatePathAndFilename($templatePathAndFilename);
        $emailView->setLayoutRootPaths(array($layoutRootPath));
        $emailView->assignMultiple($variables);
        //$emailBody = $emailView->render();
     
        // if you have an additional html Template //
        // $templatePathAndFilename = $templateRootPath . 'Email/' . $templateName . 'Html.html';
        // $emailView->setTemplatePathAndFilename($templatePathAndFilename);
        $emailHtmlBody = $emailView->render();
        return $emailHtmlBody;
    }

    /**
     * @param PersistenceManager $persistenceManager
     * @return void
     */
    public function injectPersistenceManager(PersistenceManager $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
    }
}
