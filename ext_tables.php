<?php
defined('TYPO3_MODE') || die();

(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'deepltranslate',
        'Configuration/TypoScript',
        'deepltranslate'
    );

    //register backend module
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'PITS.Deepltranslate',
        'Deepl',
        '',
        '',
        [],
        [
            'icon' => 'EXT:deepltranslate/Resources/Public/Icons/deepl.svg',
            'access' => 'user,group',
            'labels' => 'LLL:EXT:deepltranslate/Resources/Private/Language/locallang.xlf',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'PITS.Deepltranslate',
        'Deepl',
        'Settings',
        '',
        [
            'Settings' => 'index,saveSettings',
        ],
        [
            'icon' => 'EXT:deepltranslate/Resources/Public/Icons/settings.svg',
            'access' => 'user,group',
            'labels' => 'LLL:EXT:deepltranslate/Resources/Private/Language/locallang_module_settings.xlf',
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['/typo3/sysext/backend/Resources/Private/Language/locallang_layout.xlf'] = 'EXT:deepltranslate/Resources/Private/Language/locallang.xlf';
})();
