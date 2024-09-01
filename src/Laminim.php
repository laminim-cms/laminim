<?php

namespace LaminimCMS;

use LaminimCMS\Http\CmsHttp;
use LaminimCMS\Instances\MultimediaItem;
use LaminimCMS\Instances\Page;
use LaminimCMS\Instances\Translation;
use LaminimCMS\Instances\TranslationStack;
use LaminimCMS\Instances\User;
use LaminimCMS\Instances\UserRole;
use Lkt\Http\Routes\DeleteRoute;
use Lkt\Http\Routes\GetRoute;
use Lkt\Http\Routes\PostRoute;
use Lkt\Http\Routes\PutRoute;
use Lkt\Locale\Locale;
use Lkt\Translations\Translations;

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
        'multimedia' => MultimediaItem::COMPONENT,
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

    public static function getAvailableModularTypes(): array
    {
        return array_keys(static::$modules);
    }

    public static function loadI18n()
    {
        $query = Translation::getQueryCaller();
        $results = Translation::getMany($query);

        $r = [];
        foreach ($results as $result) {
            $key = [];
            if ($result->hasStack()) $key[] = $result->getStack()?->getProperty();
            if ($result->hasProperty()) $key[] = $result->getProperty();

            $key = implode('.', $key);
            if ($result->typeIsChoice()) {

                $temp = [];
                foreach ($result->getModularOptions() as $modularOption) {
                    $temp[$modularOption->getName()] = $modularOption->getValue();
                }

                $r[$key] = $temp;
            } else {

                $r[$key] = $result->getValue();
            }
        }

        if (!function_exists('LaminimCMS\assignArrayByPath')) {
            function assignArrayByPath(&$arr, $path, $value, $separator='.') {
                $keys = explode($separator, $path);

                foreach ($keys as $key) {
                    $arr = &$arr[$key];
                }

                $arr = $value;
            }
        }

        $response = [];
        foreach ($r as $key => $value) {
            assignArrayByPath($response, $key, $value);
        }

        Translations::setLangTranslations(Locale::getLangCode(), $response);
    }

    public static function setup()
    {
        // Assets
        GetRoute::register('/laminim/app.js', [CmsHttp::class, 'publicAppJs']);
        GetRoute::register('/laminim/app.css', [CmsHttp::class, 'publicAppCss']);

        // Load routes
        GetRoute::register('/laminim/load/i18n', [CmsHttp::class, 'loadI18n']);
        GetRoute::register('/laminim/load/modules', [CmsHttp::class, 'loadModules']);
        GetRoute::register('/laminim/load/menu', [CmsHttp::class, 'loadMenu']);
        PostRoute::register('/laminim/sing-up', [CmsHttp::class, 'singUp']);
        PostRoute::register('/laminim/login', [CmsHttp::class, 'login']);
        PostRoute::register('/laminim/logout', [CmsHttp::class, 'logout']);

        // View routes
        GetRoute::register('/laminim', [CmsHttp::class, 'indexHTML']);
        GetRoute::register('/laminim/{_lmm_type}', [CmsHttp::class, 'indexHTML']);
        GetRoute::register('/laminim/{_lmm_type}/new', [CmsHttp::class, 'indexHTML']);
        GetRoute::register('/laminim/{_lmm_type}/config', [CmsHttp::class, 'getContentConfig']);
        GetRoute::register('/laminim/{_lmm_type}/index', [CmsHttp::class, 'indexItems']);
        GetRoute::register('/laminim/{_lmm_type}/options', [CmsHttp::class, 'optionItems']);
        GetRoute::register('/laminim/{_lmm_type}/metadata-slug', [CmsHttp::class, 'validateMetadataSlug']);
        GetRoute::register('/laminim/{_lmm_type}/{id}', [CmsHttp::class, 'indexHTML']);
        GetRoute::register('/laminim/open/{_lmm_type}/{field}/{id}', [CmsHttp::class, 'openItemField']);

        // CRUD routes
        GetRoute::register('/laminim/{_lmm_type}/{_lmm_own_type}/{_lmm_field}/index', [CmsHttp::class, 'indexForField']);
        GetRoute::register('/laminim/{_lmm_type}/{_lmm_id}/read', [CmsHttp::class, 'readItem']);
        PostRoute::register('/laminim/{_lmm_type}/create', [CmsHttp::class, 'createItem']);
        PutRoute::register('/laminim/{_lmm_type}/{id}/update', [CmsHttp::class, 'updateItem']);
        DeleteRoute::register('/laminim/{_lmm_type}/{id}/drop', [CmsHttp::class, 'deleteItem']);
        GetRoute::register('/laminim/{_lmm_type}/{_lmm_id}/related/{_lmm_field}', [CmsHttp::class, 'relatedItems']);
        GetRoute::register('/laminim/{_lmm_type}/{_lmm_id}/pivot/{_lmm_field}', [CmsHttp::class, 'pivotItems']);
        GetRoute::register('/laminim/{_lmm_type}/{_lmm_id}/pivot/{_lmm_field}/available', [CmsHttp::class, 'availablePivotItems']);
        PutRoute::register('/laminim/{_lmm_type}/{_lmm_id}/pivot/{_lmm_field}/store', [CmsHttp::class, 'storePivotItems']);

        // Wildcard at the end (catch all)
//        GetRoute::register('/laminim[/{path}]', [CmsHttp::class, 'indexHTML']);
    }
}