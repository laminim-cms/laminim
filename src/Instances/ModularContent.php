<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Config\LaminimModule;
use LaminimCMS\Generated\GeneratedModularContent;

class ModularContent extends GeneratedModularContent
{
    const COMPONENT = 'lmm-modular-content';

    public function postProcessRead(array $r)
    {
        $r['typeOptions'] = [];

        $module = LaminimModule::getModule($r['type']);
        if ($module) $r['typeOptions'][] = $module->read();

        return $r;
    }
}