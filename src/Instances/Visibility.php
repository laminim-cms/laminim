<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedVisibility;

class Visibility extends GeneratedVisibility
{
    const COMPONENT = 'lmm-visibility';

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_SCHEDULED = 'scheduled';

    const STATUSES = [
        self::STATUS_DRAFT,
        self::STATUS_PUBLISHED,
        self::STATUS_SCHEDULED,
    ];

    public function postProcessRead(array $r)
    {
        return $r;
    }
}