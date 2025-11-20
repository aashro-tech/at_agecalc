<?php

use AgeCalc\AgeCalc\Controller\AgeController;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') || exit;

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AgeCalc',
    'Agecomp',
    [
        AgeController::class => 'list',
    ],
    // non-cacheable actions
    [
        AgeController::class => 'list',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:at_agecalc/Configuration/page.tsconfig">'
);

$iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
$iconRegistry->registerIcon(
    'at_agecalc-plugin-agecomp',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:at_agecalc/Resources/Public/Icons/user_plugin_agecomp.svg']
);
