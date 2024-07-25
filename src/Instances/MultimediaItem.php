<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedMultimediaItem;

class MultimediaItem extends GeneratedMultimediaItem
{
    const COMPONENT = 'lmm-multimedia';

    const TYPE_IMAGE = 'image';
    const TYPE_VIDEO = 'video';
    const TYPE_FILE = 'file';
    const TYPE_OFFICE = 'office';
    const TYPE_YOUTUBE = 'youtube';
    const TYPE_VIMEO = 'vimeo';
    const TYPE_URL = 'url';

    const TYPES = [
        self::TYPE_IMAGE,
        self::TYPE_VIDEO,
        self::TYPE_FILE,
        self::TYPE_OFFICE,
        self::TYPE_YOUTUBE,
        self::TYPE_VIMEO,
        self::TYPE_URL,
    ];
}