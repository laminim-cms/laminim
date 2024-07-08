<?php

namespace LaminimCMS;

use LaminimCMS\Config\LaminimModule;
use LaminimCMS\Http\CmsHttp;
use LaminimCMS\Instances\Page;
use Lkt\Factory\Schemas\Schema;
use Lkt\Http\Routes\DeleteRoute;
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
        'pages' => Page::COMPONENT,
    ];

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
        GetRoute::register('/laminim/new/{type}', [CmsHttp::class, 'indexHTML']);
        GetRoute::register('/laminim/edit/{type}/{id}', [CmsHttp::class, 'indexHTML']);

        // CRUD routes
        GetRoute::register('/laminim/{type}/config', [CmsHttp::class, 'getContentConfig']);
        GetRoute::register('/laminim/{type}/index', [CmsHttp::class, 'indexItems']);
        GetRoute::register('/laminim/{type}/{id}/read', [CmsHttp::class, 'readItem']);
        PostRoute::register('/laminim/{type}/create', [CmsHttp::class, 'createItem']);

        foreach (static::$modules as $module => $config) {
            foreach ($config['schemas'] as $schema) {
                Schema::add($schema);
            }
            foreach ($config['routes'] as $route) {
                switch ($route['type']) {
                    case 'GET':
                        GetRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
                        break;

                    case 'POST':
                        PostRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
                        break;

                    case 'PUT':
                        PutRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
                        break;

                    case 'DELETE':
                        DeleteRoute::register($route['route'], $route['callable'])->setLaminimConfig($route);
                        break;
                }
            }
        }

        // Wildcard at the end (catch all)
        GetRoute::register('/laminim[/{path}]', [CmsHttp::class, 'indexHTML']);
    }

    public static function setupPagesModule()
    {
        static::$modules['lmm-pages'] = [
            'schemas' => [
                require_once "Schemas/laminim-pages.php",
                require_once "Schemas/laminim-modular-blocks.php",
                require_once "Schemas/laminim-modular-content.php",
            ],
            'routes' => [
                [
                    'route' => '/laminim/ls/page',
                    'callable' => [CmsHttp::class, 'indexHTML'],
                    'type' => 'GET',
                ],
                [
                    'route' => '/laminim/pages/list',
                    'callable' => [CmsHttp::class, 'indexItems'],
                    'type' => 'GET',
                ],
                [
                    'route' => '/laminim/page/{slug}',
                    'callable' => [CmsHttp::class, 'indexHTML'],
                    'type' => 'GET',
                ],
                [
                    'route' => '/laminim/pages/{slug}',
                    'callable' => [CmsHttp::class, 'readItem'],
                    'type' => 'GET',
                ],
            ]
        ];
    }
}