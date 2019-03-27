<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest',
        'label' => 'firstname',
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
        'searchFields' => 'trip, gender, email, firstname, lastname, street, city, zip, telephone, startdate, enddate',
        'iconfile' => 'EXT:nws_tripmanage/Resources/Public/Icons/tx_nwstripmanage_domain_model_daterequest.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, trip, gender, email, firstname, lastname, street, city, zip, telephone, startdate, enddate',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, trip, gender, email, firstname, lastname, street, city, zip, telephone,
            --div--;LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.tab, startdate, enddate,
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
                'foreign_table' => 'tx_nwstripmanage_domain_model_daterequest',
                'foreign_table_where' => 'AND tx_nwstripmanage_domain_model_daterequest.pid=###CURRENT_PID### AND tx_nwstripmanage_domain_model_daterequest.sys_language_uid IN (-1,0)',
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
        'trip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.trip',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_nwstripmanage_domain_model_trip',
            ],
        ],
        'gender' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.gender',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'email' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.email',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'firstname' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.firstname',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'lastname' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.lastname',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'street' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.street',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'city' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.city',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'telephone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.telephone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'startdate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.startdate',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'eval' => 'trim',
            ],
        ],
        'enddate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_daterequest.enddate',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'eval' => 'trim',
            ],
        ],
    ]
];
