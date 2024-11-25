<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedMetadata;

class Metadata extends GeneratedMetadata
{
    const COMPONENT = 'lmm-metadata';

    public function postProcessRead(array $r)
    {
        return $r;
    }
}