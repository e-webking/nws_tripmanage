<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_travelperiod',
        'label' => 'startdate',
        'label_alt' => 'startdate,enddate',
        'label_alt_force' => false,
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
        'searchFields' => 'startdate,enddate,price',
        'iconfile' => 'EXT:nws_tripmanage/Resources/Public/Icons/tx_nwstripmanage_domain_model_travelperiod.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, startdate, enddate, price',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, startdate, enddate, price, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_nwstripmanage_domain_model_travelperiod',
                'foreign_table_where' => 'AND tx_nwstripmanage_domain_model_travelperiod.pid=###CURRENT_PID### AND tx_nwstripmanage_domain_model_travelperiod.sys_language_uid IN (-1,0)',
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
        'startdate' => [
	        'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_travelperiod.startdate',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
	    ],
        'enddate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_travelperiod.enddate',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
	    'price' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nwstripmanage_domain_model_travelperiod.price',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2'
			]
	    ],
        'trip' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
