<?php

namespace LaminimCMS;

use LaminimCMS\Config\LaminimModule;
use LaminimCMS\Http\CmsHttp;
use LaminimCMS\Instances\Page;
use LaminimCMS\Instances\Translation;
use LaminimCMS\Instances\TranslationStack;
use LaminimCMS\Instances\User;
use LaminimCMS\Instances\UserRole;
use Lkt\Factory\Schemas\Schema;
use Lkt\Http\Routes\GetRoute;
use Lkt\Http\Routes\PostRoute;
use Lkt\Http\Routes\PutRoute;

class Laminim
{
    protected static string $pathToMainScript = '';
    protected static string $pathToMainStyle = '';

    protected static array $modules = [];
    protected static array $modulesAliases = [
        'page' => Page::COMPONENT,
        'role' => UserRole::COMPONENT,
        'user' => User::COMPONENT,
        'i18n' => Translation::COMPONENT,
        'i18n-stack' => TranslationStack::COMPONENT,
    ];

    public static function setModularAlias(string $component, string $alias): void
    {
        static::$modulesAliases[$alias] = $component;
    }

    public static function getModuleByAlias(string $alias)
    {
        if (isset(static::$modulesAliases[$alias])) return static::$modulesAliases[$alias];
        return $alias;
    }

    public static function setMainScriptPath(string $path): void
    {
        static::$pathToMainScript = $path;
    }

    public static function setMainStylePath(string $path): void
    {
        static::$pathToMainStyle = $path;
    }

    public static function setModule(LaminimModule $module)
    {

    }

    public static function getAvailableModularTypes(): array
    {
        return array_keys(static::$modules);
    }

    public static function setup()
    {
        // Assets
        GetRoute::register('/laminim/app.js', [CmsHttp::class, 'publicAppJs']);
        GetRoute::register('/laminim/app.css', [CmsHttp::class, 'publicAppCss']);

        // View routes
        GetRoute::register('/laminim/ls/{_lmm_type}', [CmsHttp::class, 'indexHTML']);
        GetRoute::register('/laminim/new/{_lmm_type}', [CmsHttp::class, 'indexHTML']);
        GetRoute::register('/laminim/edit/{_lmm_type}/{id}', [CmsHttp::class, 'indexHTML']);

        // CRUD routes
        GetRoute::register('/laminim/{_lmm_type}/config', [CmsHttp::class, 'getContentConfig']);
        GetRoute::register('/laminim/{_lmm_type}/index', [CmsHttp::class, 'indexItems']);
        GetRoute::register('/laminim/{_lmm_type}/options', [CmsHttp::class, 'optionItems']);
        GetRoute::register('/laminim/{_lmm_type}/{id}/read', [CmsHttp::class, 'readItem']);
        PostRoute::register('/laminim/{_lmm_type}/create', [CmsHttp::class, 'createItem']);
        PutRoute::register('/laminim/{_lmm_type}/{id}/update', [CmsHttp::class, 'updateItem']);

        // Load routes
        GetRoute::register('/laminim/load/i18n', [CmsHttp::class, 'loadI18n']);

        foreach (static::$modules as $module => $config) {
            foreach ($config['schemas'] as $schema) {
                Schema::add($schema);
            }
//            foreach ($config['routes'] as $route) {
//                switch ($route['type']) {
//                    case 'GET':
//                        GetRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
//                        break;
//
//                    case 'POST':
//                        PostRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
//                        break;
//
//                    case 'PUT':
//                        PutRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
//                        break;
//
//                    case 'DELETE':
//                        DeleteRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
//                        break;
//                }
//            }
        }

        // Wildcard at the end (catch all)
        GetRoute::register('/laminim[/{path}]', [CmsHttp::class, 'indexHTML']);
    }

    public static function setupPagesModule()
    {
        static::$modules['lmm-pages'] = [
            'schemas' => [
                require_once "Schemas/laminim-pages.php",
            ],
//            'routes' => [
//            ]
        ];
    }
}