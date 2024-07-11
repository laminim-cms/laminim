<?php

namespace LaminimCMS\Http;

use LaminimCMS\Instances\ModularBlock;
use LaminimCMS\Laminim;
use Lkt\Factory\Instantiator\Instances\AbstractInstance;
use Lkt\Factory\Instantiator\Instantiator;
use Lkt\Factory\Schemas\Fields\AbstractField;
use Lkt\Factory\Schemas\Fields\MethodGetterField;
use Lkt\Factory\Schemas\Schema;
use Lkt\Http\Response;
use Lkt\Http\Router;
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

        $fields = [];
        $item = [];

        /** @var AbstractField[] $viewFields */
        $viewFields = $schema->getFieldsAvailableInCreateView();

        foreach ($viewFields as $field) {
            $fields[] = [
                'key' => $field instanceof MethodGetterField ? $field->getColumn() : $field->getName(),
                'label' => $field->getLabel(),
                'type' => $field->getCustomType(),
                'mode' => $field->getModeInCreateView(),
            ];

            $val = '';

            if ($field->getCustomType() === 'lmm-modular-blocks') {
                $val = [];
                $item[$field->getName() . 'Id'] = [];
            }
            $item[$field->getName()] = $val;
        }

        $instance = Instantiator::make($decodedType, 0);
        $item = $instance->readFields($viewFields);

        return Response::ok([
            'fields' => $fields,
            'item' => $item,
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

        $fields = [];
        /** @var AbstractField[] $viewFields */
        $viewFields = $schema->getViewFields('index');

        foreach ($viewFields as $field) {
            $fields[] = [
                'key' => $field instanceof MethodGetterField ? $field->getColumn() : $field->getName(),
                'label' => $field->getLabel(),
                'type' => $field->getCustomType(),
                'mode' => $field->getModeInCreateView(),
            ];
        }


        $anonymous = Instantiator::make($decodedType, 0);
        $query = $anonymous::getQueryCaller();
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) {
            $t = [];
            foreach ($viewFields as $field) {
                $getter = $field->getGetterForPrimitiveValue();
                $t[$field->getName()] = $result->{$getter}();
            }

            $r[] = $t;
        }

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
        $item::feedInstance($item, $data);
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
        $item::feedInstance($item, $data);
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

        $fields = [];
        /** @var AbstractField[] $viewFields */
        $viewFields = $schema->getFieldsAvailableInUpdateView();

        foreach ($viewFields as $field) {
            $fields[] = [
                'key' => $field instanceof MethodGetterField ? $field->getColumn() : $field->getName(),
                'label' => $field->getLabel(),
                'type' => $field->getCustomType(),
                'mode' => $field->getModeInCreateView(),
            ];
        }


        $instance = Instantiator::make($decodedType, $identifier);
        $r = $instance->readFields($viewFields);

        return Response::ok([
            'fields' => $fields,
            'item' => $r,
            'maxPage' => 0,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }
}