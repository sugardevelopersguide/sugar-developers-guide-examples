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

$viewdefs['Accounts']['base']['view']['record']['panels'][] = [
    'name' => 'panel_custom',
    'label' => 'LBL_PANEL_CUSTOM',
    'columns' => 2,
    'fields' => [
        'industry',
        'phone_office',
    ],
];

$viewdefs['Accounts']['base']['view']['record']['buttons'][] = [
    'type' => 'rowaction',
    'event' => 'button:sync_external:click',
    'name' => 'sync_external',
    'label' => 'LBL_SYNC_EXTERNAL',
    'css_class' => 'btn btn-primary',
    'showOn' => 'view',
    'acl_action' => 'edit',
];
