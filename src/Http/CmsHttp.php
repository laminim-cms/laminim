<?php

namespace LaminimCMS\Http;

use LaminimCMS\Laminim;
use Lkt\Factory\Instantiator\Instantiator;
use Lkt\Factory\Schemas\Schema;
use Lkt\Http\Response;
use Lkt\Locale\Locale;
use Lkt\Templates\Template;
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

    public static function getContentConfig($params = []): Response
    {
        $type = clearInput($params['type']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $instance = Instantiator::make($decodedType, 0);
        $r = $instance->readViewFields('create');
        $fields = $schema->getViewConfigForFields('create');


        return Response::ok([
            'fields' => $fields,
            'item' => $r,
            'maxPage' => 0,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function indexItems(array $params): Response
    {
        $type = clearInput($params['type']);
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
        $type = clearInput($params['type']);
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
        $type = clearInput($params['type']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

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
        $type = clearInput($params['type']);
        $id = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

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
        $type = clearInput($params['type']);
        $identifier = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $instance = Instantiator::make($decodedType, $identifier);
        $r = $instance->readViewFields('edit');
        $fields = $schema->getViewConfigForFields('edit');

        return Response::ok([
            'fields' => $fields,
            'item' => $r,
            'maxPage' => 0,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }
}