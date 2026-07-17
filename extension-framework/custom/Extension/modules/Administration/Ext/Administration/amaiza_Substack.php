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

// Sugar builds each admin panel section with its own $admin_option_defs array.
$admin_option_defs = [];

$admin_option_defs['Amaiza']['amaiza_Substack_Launcher'] = [
    // Legacy BWC icon image name, without the .gif extension.
    'Administration',

    // Sidecar icon class.
    'icon' => 'sicon-process-definitions-lg',

    // Link title and description label keys.
    'LBL_AMAIZA_SUBSTACK_LAUNCHER_TITLE',
    'LBL_AMAIZA_SUBSTACK_LAUNCHER_DESC',

    // Link URL.
    'https://substack.com',

    // Optional warning flag and onclick handler.
    null,
    null,

    // Open the link in a new tab.
    '_blank',
];

$admin_group_header[] = [
    // Section header label key.
    'LBL_AMAIZA_SUBSTACK_SECTION_HEADER',

    // Optional BWC header text and help text flag.
    '',
    false,

    // Links for this section.
    $admin_option_defs,

    // Section description label key.
    'LBL_AMAIZA_SUBSTACK_SECTION_DESCRIPTION',
];
