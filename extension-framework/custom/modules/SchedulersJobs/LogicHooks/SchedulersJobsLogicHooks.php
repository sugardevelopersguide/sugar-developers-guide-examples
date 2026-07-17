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

namespace Sugarcrm\Sugarcrm\custom\modules\SchedulersJobs\LogicHooks;

class SchedulersJobsLogicHooks
{
    public function sendJobFailureNotification($bean, $event, $arguments): void
    {
        $jobName = $bean->name ?? $bean->id;

        $GLOBALS['log']->warning(
            sprintf('Scheduler job "%s" reached its final failure.', $jobName)
        );
    }
}
