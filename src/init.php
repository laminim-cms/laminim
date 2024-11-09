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
Schema::add(require_once "Schemas/laminim-metadata.php");
Schema::add(require_once "Schemas/laminim-visibility.php");

// Load menu
//LaminimMenuEntry::register(
//    LaminimMenuEntry::define('pages', '/laminim/page', '__:components.page.many', 'icon-stickies')
//);

LaminimMenuEntry::register(
    LaminimMenuEntry::define('users', '', '__:components.user.many', 'icon-users-cog')
        ->setChildren([
                LaminimMenuEntry::define('users-users', '/laminim/user', '__:components.user.many', 'icon-users-cog'),
                LaminimMenuEntry::define('users-roles', '/laminim/role', '__:components.role.many', 'icon-users-cog'),
            ]
        )
);

LaminimMenuEntry::register(
    LaminimMenuEntry::define('i18n', '', '__:components.i18n.many', 'icon-globe')
        ->setChildren([
                LaminimMenuEntry::define('i18n-i18n', '/laminim/i18n', '__:components.i18n.many', 'icon-globe'),
                LaminimMenuEntry::define('i18n-stack', '/laminim/i18n-stack', '__:components.i18n-stack.many', 'icon-globe'),
            ]
        )
);

LaminimMenuEntry::register(
    LaminimMenuEntry::define('files', '/laminim/multimedia', '__:components.multimedia.many', 'icon-folder')
);

// Setup permissions
Permission::enableComponentCrudPermission(Page::COMPONENT);
Permission::enableComponentPermission(Page::COMPONENT, 'admin');

Permission::enableComponentCrudPermission(User::COMPONENT);
Permission::enableComponentPermission(User::COMPONENT, 'admin');

LaminimModule::defineAuto('about-me', '__:lmm.mod.aboutMe');
LaminimModule::defineItemList('portfolio-projects', '__:lmm.mod.uri_portfolio_project', 'uri-portfolio-project', true);
LaminimModule::defineLayout('portfolio-featured', '__:lmm.mod.portfolioFeatured', Schema::table('_', 'portfolio-featured'));

// Only for CLI
if (php_sapi_name() == 'cli') {

    Commander::register(new SeedLmmTranslationsCommand());

    // Register migrations paths
    PhinxConfigurator::addMigrationPath(__DIR__ . '/../database/migrations');
}