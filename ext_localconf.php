<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Nwsnet.NwsTripmanage',
            'Nwstrip',
            [
                'Trip' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Trip' => ''
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Nwsnet.NwsTripmanage',
            'Nwcurrentstrip',
            [
                'CurrentTrip' => 'list, show'
            ],
            // non-cacheable actions
            [
                'CurrentTrip' => ''
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripfinder',
            [
                'Trip' => 'filter, list, show'
            ],
            // non-cacheable actions
            [
                'Trip' => 'filter'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripdetail',
            [
                'Trip' => 'list, show, createPdf, rememberTrip, dateRequest'
            ],
            // non-cacheable actions
            [
                'Trip' => 'createPdf, rememberTrip, dateRequest'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripbooking',
            [
                'Trip' => 'bookingForm, createBooking, paypalForm, paypalExecutePayment, list, show'
            ],
            // non-cacheable actions
            [
                'Trip' => 'bookingForm, createBooking, paypalForm, paypalExecutePayment'
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripremembertrips',
            [
                'Trip' => 'getRememberTrip'
            ],
            // non-cacheable actions
            [
                'Trip' => 'getRememberTrip'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripbookingajax',
            array(
                'Trip' => 'roompricce',
            ),
            // non-cacheable actions
            array(
                'Trip' => 'roompricce',
            )
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					nwstrip {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nws_tripmanage') . 'Resources/Public/Icons/user_plugin_nwstrip.svg
						title = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwstrip
						description = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwstrip.description
						tt_content_defValues {
							CType = list
							list_type = nwstripmanage_nwstrip
						}
					}
					nwcurrentstrip {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nws_tripmanage') . 'Resources/Public/Icons/user_plugin_nwcurrentstrip.svg
						title = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwcurrentstrip
						description = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwcurrentstrip.description
						tt_content_defValues {
							CType = list
							list_type = nwstripmanage_nwcurrentstrip
						}
					}
					nwtripfinder {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nws_tripmanage') . 'Resources/Public/Icons/user_plugin_nwtripfinder.svg
						title = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripfinder
						description = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripfinder.description
						tt_content_defValues {
							CType = list
							list_type = nwstripmanage_nwtripfinder
						}
					}
					nwtripdetail {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nws_tripmanage') . 'Resources/Public/Icons/user_plugin_nwtripfinder.svg
						title = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripdetail
						description = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripdetail.description
						tt_content_defValues {
							CType = list
							list_type = nwstripmanage_nwtripdetail
						}
					}
					nwtripbooking {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nws_tripmanage') . 'Resources/Public/Icons/user_plugin_nwtripfinder.svg
						title = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripbooking
						description = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripbooking.description
						tt_content_defValues {
							CType = list
							list_type = nwstripmanage_nwtripbooking
						}
					}
                    nwtripremembertrips {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('nws_tripmanage') . 'Resources/Public/Icons/user_plugin_nwtripfinder.svg
                        title = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripremembertrips
                        description = LLL:EXT:nws_tripmanage/Resources/Private/Language/locallang_db.xlf:tx_nws_tripmanage_domain_model_nwtripremembertrips.description
                        tt_content_defValues {
                            CType = list
                            list_type = nwstripmanage_nwtripremembertrips
                        }
                    }
				}
				show = *
			}
	   }'
	);
    }
);

$TYPO3_CONF_VARS['FE']['eID_include']['Nwtripbookingajax'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('nws_tripmanage').'Classes/Ajax/EidDispatcher.php';
