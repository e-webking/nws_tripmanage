<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Nwsnet.NwsTripmanage',
            'Nwstrip',
            'NetzWerkstatt Trip List'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Nwsnet.NwsTripmanage',
            'Nwcurrentstrip',
            'NetzWerkstatt Current Trip List'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripfinder',
            'NetzWerkstatt Trip Finder'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripdetail',
            'NetzWerkstatt Trip Details'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripbooking',
            'NetzWerkstatt Trip Booking'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Nwsnet.NwsTripmanage',
            'Nwtripremembertrips',
            'NetzWerkstatt Remember Trips List'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('nws_tripmanage', 'Configuration/TypoScript', 'NetzWerkstatt Trip Management');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nwstripmanage_domain_model_trip', 'EXT:nws_tripmanage/Resources/Private/Language/locallang_csh_tx_nwstripmanage_domain_model_trip.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nwstripmanage_domain_model_trip');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nwstripmanage_domain_model_price', 'EXT:nws_tripmanage/Resources/Private/Language/locallang_csh_tx_nwstripmanage_domain_model_price.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nwstripmanage_domain_model_price');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nwstripmanage_domain_model_abflugort', 'EXT:nws_tripmanage/Resources/Private/Language/locallang_csh_tx_nwstripmanage_domain_model_abflugort.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nwstripmanage_domain_model_abflugort');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nwstripmanage_domain_model_tourguide', 'EXT:nws_tripmanage/Resources/Private/Language/locallang_csh_tx_nwstripmanage_domain_model_tourguide.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nwstripmanage_domain_model_tourguide');


        /**
         * Disable not needed fields in tt_content
         */
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['nwstripmanage_nwcurrentstrip'] = 'select_key,pages,recursive';
        /**
         * Include Flexform
         */
        // Pi1
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['nwstripmanage_nwcurrentstrip'] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            'nwstripmanage_nwcurrentstrip',
            'FILE:EXT:nws_tripmanage/Configuration/FlexForms/Nwcurrentstrip.xml'
        );


        /**
         * Disable not needed fields in tt_content
         */
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['nwstripmanage_nwcurrentstrip'] = 'select_key,pages,recursive';
        /**
         * Include Flexform
         */
        // Pi1
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['nwstripmanage_nwtripbooking'] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            'nwstripmanage_nwtripbooking',
            'FILE:EXT:nws_tripmanage/Configuration/FlexForms/Nwtripbooking.xml'
        );

        /**
         * Disable not needed fields in tt_content
         */
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['nwstripmanage_nwstrip'] = 'select_key,pages,recursive';
        /**
         * Include Flexform
         */
        // Pi1
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['nwstripmanage_nwstrip'] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            'nwstripmanage_nwstrip',
            'FILE:EXT:nws_tripmanage/Configuration/FlexForms/Nwstrip.xml'
        );

        /**
         * Disable not needed fields in tt_content
         */
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['nwstripmanage_nwtripdetail'] = 'select_key,pages,recursive';
        /**
         * Include Flexform
         */
        // Pi1
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['nwstripmanage_nwtripdetail'] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            'nwstripmanage_nwtripdetail',
            'FILE:EXT:nws_tripmanage/Configuration/FlexForms/Nwtripdetail.xml'
        );

    }
);
