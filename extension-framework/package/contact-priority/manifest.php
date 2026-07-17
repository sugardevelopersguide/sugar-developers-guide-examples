<?php

/*
 * Copyright (C) Amaiza LLC. - All Rights Reserved
 *
 * This source code is proprietary and confidential and protected under
 * international copyright law. All rights reserved and protected by
 * the copyright holders. This file is only available to authorized individuals
 * with the permission of the copyright holders. Unauthorized copying of this file,
 * via any medium is strictly prohibited. If you encounter this file and do not have
 * permission, please contact the copyright holders and delete this file.
 *
 */

$manifest = [
    'acceptable_sugar_versions' => ['regex_matches' => ['26\..*']],
    'acceptable_sugar_flavors' => ['PRO', 'ENT', 'ULT'],
    'author' => 'Amaiza',
    'description' => 'Adds support priority custom field to Contacts',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Contact Priority Extension',
    'published_date' => '2026-07-16',
    'type' => 'module',
    'version' => '1.0.0',
];

$installdefs = [
    'id' => 'contact_priority_mlp',
    'custom_fields' => [
        [
            'name' => 'custom_priority_c',
            'label' => 'LBL_CUSTOM_PRIORITY',
            'type' => 'enum',
            'ext1' => 'contact_priority_list',
            'default_value' => '',
            'require_option' => 0,
            'audited' => true,
            'module' => 'Contacts',
            'mass_update' => 0,
            'duplicate_merge' => 0,
            'reportable' => 1,
            'importable' => true,
        ],
    ],
    'language' => [
        [
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/en_us.custom_priority.php',
            'to_module' => 'Contacts',
            'language' => 'en_us',
        ],
        [
            'from' => '<basepath>/Extension/application/Ext/Language/en_us.contact_priority.php',
            'to_module' => 'application',
            'language' => 'en_us',
        ],
    ],
];
