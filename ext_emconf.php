<?php

$EM_CONF[$_EXTKEY] = [
    'title' => '[Aashro] Age Calculator',
    'description' => 'Advanced age calculator to fix problems with singular/plural grammatical forms in age.',
    'category' => 'plugin',
    'author' => 'Team Aashro',
    'author_email' => 'info@aashro.com',
    'author_company' => 'Aashro Tech',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-13.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
