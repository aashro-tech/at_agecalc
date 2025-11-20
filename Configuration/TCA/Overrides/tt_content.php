<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || exit;

ExtensionUtility::registerPlugin(
    'AgeCalc',
    'Agecomp',
    'Agecompute',
    'at_agecalc-plugin-agecomp'
);

$tempColumns = [
    'calc_alignment' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.calc_alignment',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Left', 'left'],
                ['Center', 'center'],
                ['Right', 'right'],
            ],
        ],
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'calc_header' => [
        'l10n_mode' => 'prefixLangTitle',
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.calc_header',
        'config' => [
            'type' => 'input',
            'size' => 25,
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ],
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'calc_header_clr' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.calc_header_clr',
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
            'size' => 10,
        ],
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'calc_btn_name' => [
        'l10n_mode' => 'prefixLangTitle',
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.calc_btn_name',
        'config' => [
            'type' => 'input',
            'size' => 20,
            'eval' => 'required',
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ],
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'rst_btn_name' => [
        'l10n_mode' => 'prefixLangTitle',
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.rst_btn_name',
        'config' => [
            'type' => 'input',
            'size' => 20,
            'eval' => 'required',
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ],
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'btn_bgclr' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.btn_bgclr',
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
            'size' => 10,
        ],
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'btn_txtclr' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.btn_txtclr',
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
            'size' => 10,
        ],
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'bg_clr_type' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.bg_clr_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['None', 0],
                ['Solid Color', 1],
                ['Gradient Color', 2],
            ],
        ],
        'onChange' => 'reload',
        'displayCond' => 'FIELD:list_type:=:agecalc_agecomp',
    ],
    'solid_bgclr' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.solid_bgclr',
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
            'size' => 10,
            'eval' => 'required',
        ],
        'displayCond' => 'FIELD:bg_clr_type:=:1',
    ],
    'grdnt_clr1' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.grdnt_clr1',
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
            'size' => 10,
        ],
        'displayCond' => 'FIELD:bg_clr_type:=:2',
    ],
    'grdnt_clr2' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:at_agecalc/Resources/Private/Language/locallang.xlf:tt_content.grdnt_clr2',
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
            'size' => 10,
        ],
        'displayCond' => 'FIELD:bg_clr_type:=:2',
    ],
];

ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

ExtensionManagementUtility::addFieldsToPalette('tt_content', 'calcheaders', 'calc_header,calc_header_clr');
ExtensionManagementUtility::addFieldsToPalette('tt_content', 'buttoncntrl', 'calc_btn_name,rst_btn_name,--linebreak--,btn_bgclr,btn_txtclr');
ExtensionManagementUtility::addFieldsToPalette('tt_content', 'bgclr', 'bg_clr_type,--linebreak--,solid_bgclr,grdnt_clr1,grdnt_clr2');

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'calc_alignment,
    --palette--;Header controls;calcheaders,
    --palette--;Button controls;buttoncntrl,
    --palette--;Background-color controls;bgclr',
    'list',
    'after:list_type'
);

$GLOBALS['TCA']['tt_content']['columns']['pages']['displayCond'] = 'FIELD:list_type:!=:agecalc_agecomp';
$GLOBALS['TCA']['tt_content']['columns']['recursive']['displayCond'] = 'FIELD:list_type:!=:agecalc_agecomp';
