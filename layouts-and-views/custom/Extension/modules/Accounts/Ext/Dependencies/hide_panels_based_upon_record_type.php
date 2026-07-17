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

$dependencies['Accounts']['HidePanelsBasedUponRecordType'] = [
    'hooks' => ['edit', 'view'],
    'trigger' => 'true',
    'triggerFields' => ['record_type'],
    'onload' => true,
    'actions' => [
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_DEALCOMPANY',
                'value' => 'equal($record_type, "012300000008hws")',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_INPUTS',
                'value' => 'equal($record_type, "012300000008hws")',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_SOURCESCRUB',
                'value' => 'equal($record_type, "012300000008hws")',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_INTERMEDIARY',
                'value' => 'equal($record_type, "012300000007zin")',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_INVESTOR',
                'value' => 'equal($record_type, "012300000008hwr")',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_RECRUITING',
                'value' => 'equal($record_type, "012300000008hwt")',
            ],
        ],
    ],
    'notActions' => [
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_DEALCOMPANY',
                'value' => 'not(equal($record_type, "012300000008hws"))',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_INPUTS',
                'value' => 'not(equal($record_type, "012300000008hws"))',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_SOURCESCRUB',
                'value' => 'not(equal($record_type, "012300000008hws"))',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_INTERMEDIARY',
                'value' => 'not(equal($record_type, "012300000007zin"))',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_INVESTOR',
                'value' => 'not(equal($record_type, "012300000008hwr"))',
            ],
        ],
        [
            'name' => 'SetPanelVisibility',
            'params' => [
                'target' => 'LBL_RECORDVIEW_RECRUITING',
                'value' => 'not(equal($record_type, "012300000008hwt"))',
            ],
        ],
    ],
];
