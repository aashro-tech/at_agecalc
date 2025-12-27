<?php

use AgeCalc\AgeCalc\Controller\AgeController;

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