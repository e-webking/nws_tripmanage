<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking',
        'label' => 'contactperson',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'trip, contactperson, telephone, email, street, housenumber, plz, city, country, travelguidance, travelguidanceother, seminarparticipation, additionalinformation, contactpersondetail, paymentstatus, paymentdate, verifysign, txnid, payeremail, paymentmethod, timeandprice, totalprice, abflugort, referenz, travel_period',
        'iconfile' => 'EXT:nws_tripmanage/Resources/Public/Icons/tx_nwstripmanage_domain_model_booking.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, trip, contactperson, contactpersondetail, telephone, email, street, housenumber, plz, city, country, travelguidance, travelguidanceother, seminarparticipation, additionalinformation, paymentstatus, paymentdate, verifysign, txnid, payeremail, paymentmethod, timeandprice, totalprice, abflugort, referenz, travel_period',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, trip, contactperson, contactpersondetail, telephone, email, street, housenumber, plz, city, country, travelguidance, travelguidanceother, seminarparticipation, additionalinformation, 
            --div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.paymentTab, paymentmethod, paymentstatus, paymentdate, verifysign, txnid, payeremail,
            --div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.timeprice_tablabel, timeandprice, totalprice, travel_period,
            --div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.abflugort_and_referenz_tablabel, abflugort, referenz,
        	--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_nwstripmanage_domain_model_booking',
                'foreign_table_where' => 'AND tx_nwstripmanage_domain_model_booking.pid=###CURRENT_PID### AND tx_nwstripmanage_domain_model_booking.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'telephone' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.telephone',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'email' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.email',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'street' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.street',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'housenumber' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.housenumber',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'plz' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.plz',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'city' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.city',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'country' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.country',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'trip' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.trip',
	        'config' => [
			    'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
			    'foreign_table' => 'tx_nwstripmanage_domain_model_trip',
			    // 'foreign_field' => 'trip',
			    // 'maxitems' => 1,
			    // 'appearance' => [
			    //     'collapseAll' => 0,
			    //     'levelLinksPosition' => 'top',
			    //     'showSynchronizationLink' => 1,
			    //     'showPossibleLocalizationRecords' => 1,
			    //     'showAllLocalizationLink' => 1
			    // ],
			],
	    ],
	    'contactperson' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.contactperson',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_nwstripmanage_domain_model_contactperson',
			    'foreign_field' => 'booking',
			    'maxitems' => 99,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],

        'contactpersondetail' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.contactpersondetail',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_nwstripmanage_domain_model_contactperson',
                'foreign_table_where' => 'AND tx_nwstripmanage_domain_model_contactperson.booking=###THIS_UID###'
            ],
        ],
        'travelguidance' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.travelguidance',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['Deutsch', 'Deutsch'],
                    ['Türkisch', 'Türkisch'],
                    ['Arabisch', 'Arabisch'],
                ],
            ],
        ],
        'travelguidanceother' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.travelguidanceother',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'seminarparticipation' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.seminarparticipation',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['Deutsch', 'Deutsch'],
                    ['Türkisch', 'Türkisch'],
                    ['Arabisch - Berbisch', 'Arabisch - Berbisch'],
                    ['Keine Seminarteilnahme', 'Keine Seminarteilnahme']
                ]
            ],
        ],
        'additionalinformation' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.additionalinformation',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['Reiserücktrittsversicherung', 'Reiserücktrittsversicherung'],
                    ['Auslandsversicherung', 'Auslandsversicherung']
                ]
            ],
        ],
        'paymentstatus' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.paymentstatus',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'paymentdate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.paymentdate',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'verifysign' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.verifysign',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'txnid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.txnid',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'payeremail' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.payeremail',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'paymentmethod' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.paymentmethod',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => true,
            ],
        ],
        'abflugort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.abflugort',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'referenz' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.referenz',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'timeandprice' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.timeprice',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_nwstripmanage_domain_model_price',
                // 'foreign_field' => 'booking',
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],
        'totalprice' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_booking.totalprice',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'travel_period' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.travel_period',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_nwstripmanage_domain_model_travelperiod',
                // 'foreign_field' => 'booking',
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ]
    ],
];
