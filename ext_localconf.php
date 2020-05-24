<?php
defined('TYPO3_MODE') || die();

(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:deepltranslate/Configuration/TsConfig/Page/pagetsconfig.txt">'
    );
    //hook for translate content
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processTranslateToClass']['deepl'] = 'PITS\\Deepltranslate\\Hooks\\TranslateHook';
    //hook for overriding localization.js,recordlist.js and including deepl.css
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess']['deepl'] = 'PITS\\Deepltranslate\\Hooks\\TranslateHook->executePreRenderHook';

    //xclass localizationcontroller for localizeRecords() and process() action
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Backend\Controller\Page\LocalizationController::class] = [
        'className' => \PITS\Deepltranslate\Override\LocalizationController::class,
    ];

    //xclass databaserecordlist for rendering custom checkboxes to toggle deepl selection in recordlist
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList::class] = [
        'className' => \PITS\Deepltranslate\Override\DatabaseRecordList::class,
    ];

    //icons to icon registry
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    $iconRegistry->registerIcon(
        'actions-localize-deepl',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:deepltranslate/Resources/Public/Icons/actions-localize-deepl.svg']
    );
    $iconRegistry->registerIcon(
        'actions-localize-google',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:deepltranslate/Resources/Public/Icons/actions-localize-google.svg']
    );
})();
