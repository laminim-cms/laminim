<?php

namespace LaminimCMS;

use LaminimCMS\Http\CmsHttp;
use Lkt\Http\Routes\GetRoute;
use Lkt\Phinx\PhinxConfigurator;

require_once "Schemas/laminim-pages.php";
require_once "Schemas/laminim-modular-blocks.php";
require_once "Schemas/laminim-modular-content.php";

GetRoute::register('/laminim', [CmsHttp::class, 'home']);
GetRoute::register('/laminim/app.js', [CmsHttp::class, 'publicAppJs']);
GetRoute::register('/laminim/app.css', [CmsHttp::class, 'publicAppCss']);


// Only for CLI
if (php_sapi_name() == 'cli') {

    // Register migrations paths
    PhinxConfigurator::addMigrationPath(__DIR__ . '/../database/migrations');
}