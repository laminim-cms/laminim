<?php

namespace LaminimCMS;

use LaminimCMS\Instances\Page;
use LaminimCMS\Instances\Permission;
use LaminimCMS\Instances\User;
use Lkt\Factory\Schemas\Schema;
use Lkt\Phinx\PhinxConfigurator;


// Load schemas
Schema::add(require_once "Schemas/laminim-modular-blocks.php");
Schema::add(require_once "Schemas/laminim-modular-content.php");
Schema::add(require_once "Schemas/laminim-user-roles.php");
Schema::add(require_once "Schemas/laminim-users.php");

Permission::enableComponentPermission(Page::COMPONENT, 'create');
Permission::enableComponentPermission(Page::COMPONENT, 'read');
Permission::enableComponentPermission(Page::COMPONENT, 'update');
Permission::enableComponentPermission(Page::COMPONENT, 'drop');
Permission::enableComponentPermission(Page::COMPONENT, 'admin');

Permission::enableComponentPermission(User::COMPONENT, 'create');
Permission::enableComponentPermission(User::COMPONENT, 'read');
Permission::enableComponentPermission(User::COMPONENT, 'update');
Permission::enableComponentPermission(User::COMPONENT, 'drop');
Permission::enableComponentPermission(User::COMPONENT, 'admin');

// Only for CLI
if (php_sapi_name() == 'cli') {

    // Register migrations paths
    PhinxConfigurator::addMigrationPath(__DIR__ . '/../database/migrations');
}