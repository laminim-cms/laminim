<?php

namespace LaminimCMS;

use LaminimCMS\Config\LaminimModule;
use LaminimCMS\Http\CmsHttp;
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
        GetRoute::register('/laminim/app.js', [CmsHttp::class, 'publicAppJs']);
        GetRoute::register('/laminim/app.css', [CmsHttp::class, 'publicAppCss']);

        foreach (static::$modules as $module => $config) {
            foreach ($config['schemas'] as $schema) {
                Schema::add($schema);
            }
            foreach ($config['routes'] as $route) {
                switch ($route['type']) {
                    case 'GET':
                        GetRoute::register($route['route'], $route['callable']);
                        break;

                    case 'POST':
                        PostRoute::register($route['route'], $route['callable']);
                        break;

                    case 'PUT':
                        PutRoute::register($route['route'], $route['callable']);
                        break;

                    case 'DELETE':
                        DeleteRoute::register($route['route'], $route['callable']);
                        break;
                }
            }
        }

        // Wildcard at the end (catch all)
        GetRoute::register('/laminim[/{path}]', [CmsHttp::class, 'home']);
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
                    'route' => '/laminim/pages',
                    'callable' => [CmsHttp::class, 'home'],
                    'type' => 'GET',
                ],
                [
                    'route' => '/laminim/pages/list',
                    'callable' => [CmsHttp::class, 'getList'],
                    'type' => 'GET',
                ],
                [
                    'route' => '/laminim/new-page',
                    'callable' => [CmsHttp::class, 'home'],
                    'type' => 'GET',
                ],
                [
                    'route' => '/laminim/pages/{slug}',
                    'callable' => [CmsHttp::class, 'home'],
                    'type' => 'GET',
                ]
            ]
        ];
    }
}