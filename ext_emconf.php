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
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.0.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
