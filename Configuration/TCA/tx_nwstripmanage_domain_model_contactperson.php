<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson',
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
        'searchFields' => 'gender, birthdate, firstname, lastname, passportnumber, nationality, age, roomprice',
        'iconfile' => 'EXT:nws_tripmanage/Resources/Public/Icons/tx_nwstripmanage_domain_model_contactperson.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, gender, birthdate, firstname, lastname, passportnumber, nationality, age, roomprice',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, gender, birthdate, firstname, lastname, passportnumber, nationality, age, roomprice,
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
                'foreign_table' => 'tx_nwstripmanage_domain_model_contactperson',
                'foreign_table_where' => 'AND tx_nwstripmanage_domain_model_contactperson.pid=###CURRENT_PID### AND tx_nwstripmanage_domain_model_contactperson.sys_language_uid IN (-1,0)',
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
        'gender' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.gender',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'birthdate' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.birthdate',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'firstname' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.firstname',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'lastname' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.lastname',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'passportnumber' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.passportnumber',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'nationality' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.nationality',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
        'age' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.age',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'roomprice' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_contactperson.roomprice',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
	    'booking' => [
	        'config' => [
		        'type' => 'passthrough',
		    ],
	    ],
    ]
];
