<?php

namespace LaminimCMS;

use LaminimCMS\Config\LaminimMenuEntry;
use LaminimCMS\Config\LaminimModule;
use LaminimCMS\Console\Commands\SeedLmmTranslationsCommand;
use LaminimCMS\Instances\Page;
use LaminimCMS\Instances\Permission;
use LaminimCMS\Instances\User;
use Lkt\Commander\Commander;
use Lkt\Factory\Schemas\Schema;
use Lkt\Phinx\PhinxConfigurator;


// Load schemas
Schema::add(require_once "Schemas/laminim-modular-blocks.php");
Schema::add(require_once "Schemas/laminim-modular-content.php");
Schema::add(require_once "Schemas/laminim-modular-options.php");
Schema::add(require_once "Schemas/laminim-user-roles.php");
Schema::add(require_once "Schemas/laminim-users.php");
Schema::add(require_once "Schemas/laminim-translations.php");
Schema::add(require_once "Schemas/laminim-translations-stacks.php");
Schema::add(require_once "Schemas/laminim-multimedia.php");
Schema::add(require_once "Schemas/laminim-pages.php");

// Load menu
LaminimMenuEntry::register(
    LaminimMenuEntry::define('pages', '/laminim/ls/page', '__:lmm.menu.page', 'icon-stickies')
);

LaminimMenuEntry::register(
    LaminimMenuEntry::define('users', '', '__:lmm.menu.user', 'icon-users-cog')
        ->setChildren([
                LaminimMenuEntry::define('users-users', '/laminim/ls/user', '__:lmm.menu.user', 'icon-users-cog'),
                LaminimMenuEntry::define('users-roles', '/laminim/ls/role', '__:lmm.menu.role', 'icon-users-cog'),
            ]
        )
);

LaminimMenuEntry::register(
    LaminimMenuEntry::define('i18n', '', '__:lmm.menu.i18n', 'icon-globe')
        ->setChildren([
                LaminimMenuEntry::define('i18n-i18n', '/laminim/ls/i18n', '__:lmm.menu.i18n', 'icon-globe'),
                LaminimMenuEntry::define('i18n-stack', '/laminim/ls/i18n-stack', '__:lmm.menu.i18nStack', 'icon-globe'),
            ]
        )
);

LaminimMenuEntry::register(
    LaminimMenuEntry::define('files', '/laminim/ls/multimedia', '__:lmm.menu.multimedia', 'icon-folder')
);

// Setup permissions
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

LaminimModule::defineAuto('about-me', '__:lmm.mod.aboutMe');
LaminimModule::defineLayout('portfolio-featured', '__:lmm.mod.portfolioFeatured', Schema::table('_', 'portfolio-featured'));

// Only for CLI
if (php_sapi_name() == 'cli') {

    Commander::register(new SeedLmmTranslationsCommand());

    // Register migrations paths
    PhinxConfigurator::addMigrationPath(__DIR__ . '/../database/migrations');
}