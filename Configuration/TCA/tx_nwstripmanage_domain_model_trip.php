<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip',
        'label' => 'title',
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
        'searchFields' => 'title, image, description, itinerary, hotelimages, travelperiodstart, travelperiodend, priceperperson, travel_period, timeprice, studentdiscount, hotelpricedetails, abflugort, tourguide, triptype, ziel, gesonderte_reisen',
        'iconfile' => 'EXT:nws_tripmanage/Resources/Public/Icons/tx_nwstripmanage_domain_model_trip.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, image, description, itinerary, hotelimages, travelperiodstart, travelperiodend, priceperperson, travel_period, timeprice, studentdiscount, hotelpricedetails, abflugort, tourguide, currenttrip, triptype, ziel, gesonderte_reisen',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, image,  travelperiodstart, travelperiodend, priceperperson, travel_period, currenttrip, triptype, gesonderte_reisen,
        	--div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.description_tablabel, description,
        	--div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.itinerary_tablabel, itinerary,
        	--div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.timeprice_tablabel, studentdiscount, timeprice, hotelpricedetails,
        	--div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.abflugort_tablabel, abflugort,
        	--div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.hotelimages_tablabel, hotelimages,
        	--div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.tourguide_tablabel, tourguide,
        	--div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.ziel_tablabel, ziel,
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
                'foreign_table' => 'tx_nwstripmanage_domain_model_trip',
                'foreign_table_where' => 'AND tx_nwstripmanage_domain_model_trip.pid=###CURRENT_PID### AND tx_nwstripmanage_domain_model_trip.sys_language_uid IN (-1,0)',
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
        'title' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.title',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'image' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.image',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'image',
			    [
			        'appearance' => [
			            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			        ],
			        'foreign_types' => [
			            '0' => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ]
			        ],
			        'maxitems' => 99
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	    ],
	    'description' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.description',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
	    ],
	    'itinerary' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.itinerary',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
	    ],
	    'hotelpricedetails' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.hotelpricedetails',
	        'config' => [
			    'type' => 'text',
			    'cols' => 20,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
	    ],
	    'hotelimages' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.hotelimages',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'hotelimages',
			    [
			        'appearance' => [
			            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			        ],
			        'foreign_types' => [
			            '0' => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ]
			        ],
			        'maxitems' => 10
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	    ],
	    'travelperiodstart' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.travelperiodstart',
	        'config' => [
			    'type' => 'input',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => time()
			],
	    ],
	    'travelperiodend' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.travelperiodend',
	        'config' => [
			    'type' => 'input',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => time()
			],
	    ],
	    'priceperperson' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.priceperperson',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2'
			]
	    ],
	    'travel_period' => [
	    	'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.travel_period',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_nwstripmanage_domain_model_travelperiod',
			    'foreign_field' => 'trip',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
	    'timeprice' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.timeprice',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_nwstripmanage_domain_model_price',
			    'foreign_field' => 'trip',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
	    'abflugort' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.abflugort',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_nwstripmanage_domain_model_abflugort',
			    'foreign_field' => 'trip',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
	    'tourguide' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.tourguide',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_nwstripmanage_domain_model_tourguide',
			    'foreign_field' => 'trip',
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
	    'currenttrip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.currenttrip',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'triptype' => [
        	'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.triptype',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Hadsch', 'hadsch'],
                    ['Umrah', 'umrah'],
                    ['Quds', 'quds'],
                    ['Kulturreisen', 'kulturreisen'],
                ],
            ],
        ],
        'studentdiscount' => [
        	'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.studentdiscount',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['No', '0'],
                    ['Yes', '1'],
                ],
            ],
        ],
        'gesonderte_reisen' => [
        	'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.gesonderteReisen',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                	['Select', ''],
                    ['Special Umrah', 'special_umrah'],
                    ['Ferien', 'ferien'],
                ],
            ],
        ],
        'ziel' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_trip.ziel',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_nwstripmanage_domain_model_ziel',
			    'foreign_field' => 'trip',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
    ],
];
