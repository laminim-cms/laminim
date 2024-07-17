<?php

namespace LaminimCMS\Http;

use LaminimCMS\Instances\Translation;
use LaminimCMS\Instances\User;
use LaminimCMS\Laminim;
use Lkt\Factory\Instantiator\Instantiator;
use Lkt\Factory\Schemas\Schema;
use Lkt\Http\Response;
use Lkt\Locale\Enums\LangCode;
use Lkt\Locale\Locale;
use Lkt\Templates\Template;
use Lkt\Translations\Translations;
use function Lkt\Tools\Parse\clearInput;

class CmsHttp
{
    public static function indexHTML(): Response
    {
        return Response::ok(Template::file(__DIR__ . '/../../resources/phtml/index.phtml')->setData([
            'lang' => Locale::getLangCode(),
        ]));
    }

    public static function publicAppJs(): Response
    {
        return Response::ok(Template::file(__DIR__ . '/../../interface/dist/assets/index.js'))
            ->setContentTypeByFileExtension('js');
    }

    public static function publicAppCss(): Response
    {
        return Response::ok(Template::file(__DIR__ . '/../../interface/dist/assets/index.css'))
            ->setContentTypeByFileExtension('css');
    }

    public static function loadI18n($params = []): Response
    {
        $user = User::getLogged();
        $lang = 'es';
//        $lang = $user->getLanguage();
//        if ($user->isAnonymous()) {
//            $language = clearInput($params['language']);
//            $lang = match ($language) {
//                'es-ES' => LangCode::Spanish,
//                default => LangCode::English
//            };
//        }

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

        function assignArrayByPath(&$arr, $path, $value, $separator='.') {
            $keys = explode($separator, $path);

            foreach ($keys as $key) {
                $arr = &$arr[$key];
            }

            $arr = $value;
        }

        $response = [];
        foreach ($r as $key => $value) {
            assignArrayByPath($response, $key, $value);
        }

        return Response::ok([
            'data' => $response
        ]);
    }

    public static function getContentConfig($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $instance = Instantiator::make($decodedType, 0);
        $r = $instance->readViewFields('create');
        $fields = $schema->getViewConfigForFields('create');
        $layout = $schema->getViewLayout('create', true);

        return Response::ok([
            'layout' => $layout,
            'fields' => $fields,
            'item' => $r,
            'maxPage' => 0,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function indexItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $anonymous = Instantiator::make($decodedType, 0);
        $query = $anonymous::getQueryCaller();
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('index');

        $fields = $schema->getViewConfigForFields('index');

        return Response::ok([
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function optionItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $anonymous = Instantiator::make($decodedType, 0);
        $query = $anonymous::getQueryCaller();
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readAsRelated();

        $fields = $schema->getViewConfigForFields('index');

        return Response::ok([
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function createItem($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $decodedType = Laminim::getModuleByAlias($type);

        $data = $params['data'];
        $item = Instantiator::make($decodedType, 0);

        // Assign same table fields
        $item::feedInstance($item, $data, 'create');
        $item->save();

        return Response::ok([
            'item' => ['id' => $item->getId()],
        ]);
    }

    public static function updateItem($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);

        $data = $params['data'];
        $item = Instantiator::make($decodedType, $id);

        // Assign same table fields
        $item::feedInstance($item, $data, 'edit');
        $item->save();

        return Response::ok([
            'item' => ['id' => $item->getId()],
        ]);
    }

    public static function readItem(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $identifier = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $instance = Instantiator::make($decodedType, $identifier);
        $r = $instance->readViewFields('edit');
        $fields = $schema->getViewConfigForFields('edit');
        $layout = $schema->getViewLayout('edit', true);

        return Response::ok([
            'layout' => $layout,
            'fields' => $fields,
            'item' => $r,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }
}