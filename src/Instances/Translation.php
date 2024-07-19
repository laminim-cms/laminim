<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedTranslation;

class Translation extends GeneratedTranslation
{
    const COMPONENT = 'lmm-i18n';

    const TYPE_TEXT = 'text';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_EDITOR = 'editor';
    const TYPE_CHOICE = 'choice';

    const TYPES = [
        self::TYPE_TEXT,
        self::TYPE_TEXTAREA,
        self::TYPE_EDITOR,
        self::TYPE_CHOICE,
    ];
}