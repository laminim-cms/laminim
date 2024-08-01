<?php

namespace LaminimCMS\Http;

use chillerlan\Filereader\File;
use LaminimCMS\Config\LaminimMenuEntry;
use LaminimCMS\Config\LaminimModule;
use LaminimCMS\Instances\Translation;
use LaminimCMS\Instances\User;
use LaminimCMS\Laminim;
use Lkt\Factory\Instantiator\Instantiator;
use Lkt\Factory\Schemas\Fields\AbstractField;
use Lkt\Factory\Schemas\Fields\FileField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IntegerField;
use Lkt\Factory\Schemas\Fields\PivotField;
use Lkt\Factory\Schemas\Fields\RelatedField;
use Lkt\Factory\Schemas\Fields\StringChoiceField;
use Lkt\Factory\Schemas\Fields\StringField;
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

    public static function loadModules($params = []): Response
    {
        return Response::ok([
            'data' => LaminimModule::getMappedModules()
        ]);
    }

    public static function loadMenu($params = []): Response
    {
        return Response::ok([
            'data' => LaminimMenuEntry::getMappedEntries()
        ]);
    }

    public static function getContentConfig($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $parentId = (int)clearInput($params['_lmm_parent_id']);
        $parentComponent = clearInput($params['_lmm_parent_component']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $instance = Instantiator::make($decodedType, 0);

        if ($parentId > 0 && $parentComponent !== '') {
            $decodedParentComponent = Laminim::getModuleByAlias($parentComponent);
            $foreignField = array_filter($schema->getFields(), function (AbstractField $field) use ($decodedParentComponent) {
                return $field instanceof ForeignKeyField
                    && $field->getComponent() === $decodedParentComponent;
            });

            $foreignField = reset($foreignField);

            if ($foreignField) {
                $setter = $foreignField->getSetterForPrimitiveValue();
                $instance->$setter($parentId);
            }
        }
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
        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $anonymous = Instantiator::make($decodedType, 0);
        $query = $anonymous::getQueryCaller();


        $filtersFieldsObjs = $schema->getViewFields('filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) $field = $schema->getField($filter);
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));

            } elseif ($field instanceof IntegerField) {
                $query->andIntegerEqual($field->getColumn(), clearInput($value));
            }
        }
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('index');

        $fields = $schema->getViewConfigForFields('index');
        $layout = $schema->getViewLayout('filters', true);
        $filtersFields = $schema->getViewConfigForFields('filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function relatedItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $fieldName = clearInput($params['_lmm_field']);

        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $fromSchema = Schema::get($decodedType);

        $relatedField = $fromSchema->getRelatedField($fieldName);
        if (!$relatedField instanceof RelatedField) return Response::notFound();

        $schema = Schema::get($relatedField->getComponent());

        $fromAnonymous = Instantiator::make($decodedType, $id);
        $getter = $relatedField->getQueryBuilderGetter();
        $query = $fromAnonymous->{$getter}();



        $filtersFieldsObjs = $schema->getViewFields('filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));
            }
        }

        $anonymous = Instantiator::make($relatedField->getComponent(), 0);
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('index');

        $fields = $schema->getViewConfigForFields('index');
        $layout = $schema->getViewLayout('filters', true);
        $filtersFields = $schema->getViewConfigForFields('filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function pivotItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $fieldName = clearInput($params['_lmm_field']);

        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $fromSchema = Schema::get($decodedType);

        $relatedField = $fromSchema->getPivotField($fieldName);
        if (!$relatedField instanceof PivotField) return Response::notFound();

        $schema = Schema::get($relatedField->getComponent());

        $fromAnonymous = Instantiator::make($decodedType, $id);
//        $getter = $relatedField->getQueryBuilderGetter();
//        $query = $fromAnonymous->{$getter}();
        $query = $fromAnonymous->_getPivotQueryBuilder($fieldName);



        $filtersFieldsObjs = $schema->getViewFields('filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));
            }
        }

        $anonymous = Instantiator::make($relatedField->getComponent(), 0);
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('related');

        $fields = $schema->getViewConfigForFields('related');
        $layout = $schema->getViewLayout('filters', true);
        $filtersFields = $schema->getViewConfigForFields('filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function availablePivotItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $fieldName = clearInput($params['_lmm_field']);

        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $fromSchema = Schema::get($decodedType);

        $relatedField = $fromSchema->getPivotField($fieldName);
        if (!$relatedField instanceof PivotField) return Response::notFound();

        $schema = Schema::get($relatedField->getComponent());

        $fromAnonymous = Instantiator::make($decodedType, $id);
        $query = $fromAnonymous->_getAvailablePivotQueryBuilder($fieldName);


        $filtersFieldsObjs = $schema->getViewFields('filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));
            }
        }

        $anonymous = Instantiator::make($relatedField->getComponent(), 0);
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('related');

        $fields = $schema->getViewConfigForFields('related');
        $layout = $schema->getViewLayout('filters', true);
        $filtersFields = $schema->getViewConfigForFields('filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
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
        $parentId = (int)clearInput($params['_lmm_parent_id']);
        $parentComponent = clearInput($params['_lmm_pivot_component']);
        $decodedType = Laminim::getModuleByAlias($type);

        $data = $params['data'];
        $item = Instantiator::make($decodedType, 0);

        // Assign same table fields
        $item::feedInstance($item, $data, 'create');
        $item->save();

        if ($parentId > 0 && $parentComponent !== '') {
            $item->linkPivot($parentComponent, $parentId);
        }

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

    public static function openItemField(array $params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $fieldName = clearInput($params['field']);
        $identifier = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);
        $field = $schema->getField($fieldName);

        $instance = Instantiator::make($decodedType, $identifier);

        if (!$field instanceof FileField) {
            return Response::notFound();
        }

        $path = $field->getStorePath();

        /** @var File $file */
        $file = $instance->{$field->getGetterForPrimitiveValue()}();
        if (!$file instanceof File) return Response::notFound();
        $path = $file->path;
        $content = $file->content();

        if (!$content) return Response::notFound();

        $content = file_get_contents($path);

        $filename = basename($file->name);
        $extension = strtolower(substr(strrchr($filename, '.'), 1));

        return Response::ok($content)
            ->setContentTypeByFileExtension($extension)
            ->setLastModifiedHeader(filemtime($path));
    }
}